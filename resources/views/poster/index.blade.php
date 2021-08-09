@extends('layouts.base')
@section('content')

<section class="mt-5 m-auto">
    <div class="bg-cc-uffs overflow-hidden shadow-xl sm:rounded-lg" style="position: relative">
        <script>
            //recebe um dataurl e baixa um arquivo com nome filename
            function download(dataurl, filename) {
                var a = document.createElement("a");
                a.href = dataurl;
                a.setAttribute("download", filename);
                a.click();
            }

            //captura todo css do elemento (tentativa de obter o css e inserir no htmlToImage)
            function dumpCSSText(element){
                var s = '';
                var o = getComputedStyle(element);
                for(var i = 0; i < o.length; i++){
                    s+=o[i] + ':' + o.getPropertyValue(o[i])+';';
                }
                return s;
            }

            // Função que faz o download de um frame em png
            function download_frame(){
                var iframe = document.getElementById("content2");
                var iframe2 = iframe.contentWindow.document.getElementById("content");
                var element = iframe2.contentWindow.document.getElementsByTagName("html")[0];

            
                // element.style.cssText = dumpCSSText(element);
                
                
                htmlToImage.toPng(element)
                    .then(function (dataUrl) {
                        download(dataUrl, 'contents.png');

                });   
            } 


            //gerando imagens para o gif
            function generate_gif(){
                for(var x = 0; x < 10; x++) {
                    var iframe = document.getElementById("content2");
                    var iframe2 = iframe.contentWindow.document.getElementById("content");
                    var element = iframe2.contentWindow.document.getElementsByTagName("html")[0];

                    htmlToImage.toPng(element)
                    .then(function (dataUrl) {
                        var img = new Image();
                        img.src = dataUrl;
                        img.classList = 'img_gif';
                        $('#gif_images').append(img);
                    })
                }
            }


            //recuperando imagens 
            function download_gif(result) {
                var imgs = $('#gif_images');
                var ag = new animated_gif(); 
                ag.setSize(320, 240);

              
                var imgs = document.getElementsByClassName('img_gif');
                for(var i = 0; i < imgs.length; i++) {
                    ag.addFrame(imgs[i]);
                }

                ag.getBase64GIF(function(dataUrl) {
                    download(dataUrl, 'contents.gif');
                });



                
            }

        </script>
        <iframe src="assets/lbk/index.html" style="height: 110vh; width: 100%;" name="content" id="content2" scrolling="no" allow="display" allow="display-capture"></iframe>
        <div id="gif"></div>
        <div id="gif_images"></div>
   
    </div>
</section>
