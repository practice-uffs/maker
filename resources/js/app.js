require('./bootstrap');
require('alpinejs');

import * as FilePond from 'filepond';
import FilePondPluginImagePreview from 'filepond-plugin-image-preview';

window.FilePond = FilePond;
window.FilePondPluginImagePreview = FilePondPluginImagePreview;


// import htmlToImage from 'html-to-image';
// import { toPng, toJpeg, toBlob, toPixelData, toSvg } from 'html-to-image';
window.htmlToImage = require('html-to-image');
window.animated_gif = require('animated_gif');
