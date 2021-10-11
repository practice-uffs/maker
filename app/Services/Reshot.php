<?php

namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;
use PHPHtmlParser\Dom;

class Reshot
{
    protected $client;

    public function __construct(array $config = [])
    {
        $this->config = $config;
        $this->client = $this->getClient();
    }

    protected function getUrl($type) {
        $url = isset($this->config['url']) ? $this->config['url'] : [];
        return isset($url[$type]) ? $url[$type] : null;
    }

    protected function getUrlContent($type, $term) {
        $term = str_replace(' ', '-', $term);
        $url = $this->getUrl($type) . '/' . $term;
        $cacheTtlHours = 72;
        
        $content = Cache::remember($url, $cacheTtlHours * 60 * 60, function() use ($url) {
            $response = $this->client->get($url);
        
            if ($response->getStatusCode() != 200) {
                return '';
            }

            return $response->getBody()->getContents();
        });

        return $content;
    }

    public function icons($term, $amount = 50) {
        $icons = [];
        
        $dom = new Dom();
        $dom->loadStr($this->getUrlContent('icons', $term));
        
        $entries = $dom->find('div.icons-card__image');
       
        foreach ($entries as $entry) {
            $style = $entry->getAttribute('style');
            preg_match('/--image: url\((.*)\)/', $style, $matches);
            $icons[] = $matches[1];
        }

        return $icons;
    }

    public function illustrations($term, $amount = 1) {
        $illustrations = [];
        
        $dom = new Dom();
        $dom->loadStr($this->getUrlContent('illustrations', $term));
        
        $entries = $dom->find('button.download-button');
        $ids = [];
       
        foreach ($entries as $entry) {
            $id = $entry->getAttribute('data-download--button-humane-id-value');
            $ids[] = $id;
        }

        $ids = Arr::shuffle($ids);
        $ids = Arr::random($ids, $amount);

        foreach ($ids as $id) {
            $response = $this->client->get($this->config['url']['illustrations'] . "/download/$id/?operation=download_png");

            if ($response->getStatusCode() != 200) {
                continue;
            }
    
            $json = json_decode($response->getBody()->getContents());
    
            if (@$json->result != 'success') {
                continue;
            }

            $illustrations[] = $json->download_asset_url;
        }

        return $illustrations;
    }

    public function photos($term, $amount = 1) {
        $photos = [];
        
        $dom = new Dom();
        $dom->loadStr($this->getUrlContent('photos', $term));
        
        $entries = $dom->find('button.photos-item-card__download-button');
        $ids = [];
       
        foreach ($entries as $entry) {
            $id = $entry->getAttribute('data-photo-download-photo-id-value');
            $ids[] = $id;
        }

        $ids = Arr::shuffle($ids);
        $ids = Arr::random($ids, min($amount, count($ids)));

        foreach ($ids as $id) {
            $response = $this->client->post("https://api-beta.reshot.com/reshot/download/$id");

            if ($response->getStatusCode() != 200) {
                continue;
            }
    
            $json = json_decode($response->getBody()->getContents());
    
            if (!$json) {
                continue;
            }

            $photos[] = $json->data->attributes->{'download-url'};
        }

        return $photos;
    }

    /**
     * Returns an authorized API client.
     * @return \GuzzleHttp\Client the authorized client object
     */
    protected function getClient(array $options = []): Client
    {
        $client = new \GuzzleHttp\Client([
            \GuzzleHttp\RequestOptions::VERIFY => \Composer\CaBundle\CaBundle::getSystemCaRootBundlePath()
        ]);

        return $client;
    }
}