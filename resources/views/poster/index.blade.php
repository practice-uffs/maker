@extends('layouts.base')
@section('content')

<section class="mt-5 m-auto">
    <div class="bg-cc-uffs overflow-hidden shadow-xl sm:rounded-lg" style="position: relative">
    

        <iframe src="assets/lbk/index.html" style="height: 110vh; width: 100%;" name="content" id="content2" scrolling="no" allow="display" allow="display-capture"></iframe>


        <script>
            //recebe um dataurl e baixa um arquivo com nome filename
            function download(dataurl, filename) {
                var a = document.createElement("a");
                a.href = dataurl;
                a.setAttribute("download", filename);
                a.click();
            }

            // Função que faz o download de um frame em png
            function download_frame(){
                var iframe = document.getElementById("content2");
                var iframe2 = iframe.contentWindow.document.getElementById("content");
                var element = iframe2.contentWindow.document.getElementsByTagName("html")[0];

                htmlToImage.toPng(element)
                    .then(function (dataUrl) {
                        download(dataUrl, 'contents.png');

                });   
            }

        </script>
   
    </div>
</section>
