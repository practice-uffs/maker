@extends('layouts.base')
@section('content')

<section class="mt-5 m-auto">
    <div class="bg-cc-uffs overflow-hidden shadow-xl sm:rounded-lg" style="position: relative">
        <script>
            function download(dataurl, filename) {
                var a = document.createElement("a");
                a.href = dataurl;
                a.setAttribute("download", filename);
                a.click();
            }

            function dumpCSSText(element){
                var s = '';
                var o = getComputedStyle(element);
                for(var i = 0; i < o.length; i++){
                    s+=o[i] + ':' + o.getPropertyValue(o[i])+';';
                }
                return s;
            }

            // window.onload = function () {
            function download_ldk(){
                var iframe = document.getElementById("content2");
                var iframe2 = iframe.contentWindow.document.getElementById("content");
                var element = iframe2.contentWindow.document.getElementsByTagName("html")[0];

            
                // element.style.cssText = dumpCSSText(iframe);
                
                htmlToImage.toPng(element)
                    .then(function (dataUrl) {
                        download(dataUrl, 'contents.png');
                });   
            } 
        </script>
        <iframe src="assets/lbk/index.html" style="height: 110vh; width: 100%;" name="content" id="content2" scrolling="no" allow="display" allow="display-capture"></iframe>
    </div>
</section>
