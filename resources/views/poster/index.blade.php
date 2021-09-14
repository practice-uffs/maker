@extends('layouts.base')
@section('wideTopContent')

<!--
<link href="{{ asset('assets/lbk/media/fontawesome-5.13.0/css/all.min.css') }}" type="text/css" rel="stylesheet">
<link href="{{ asset('assets/lbk/media/cssanimation.io/cssanimation.min.css') }}" type="text/css" rel="stylesheet">
<link href="{{ asset('assets/lbk/media/woah/woah.css') }}" type="text/css" rel="stylesheet">
<link href="{{ asset('assets/lbk/media/animate.css/animate.min.css') }}" type="text/css" rel="stylesheet">

<link href="{{ asset('assets/lbk/css/bootstrap4-toggle.min.css') }}" rel="stylesheet">
-->
<!-- app styles -->
<link href="{{ asset('assets/lbk/css/main.css') }}" rel="stylesheet">

<div id="lbkContainer" class="relative h-screen mt-28 mb-10">
    <div id="menu" class="h-screen">
        <div class="wrapper">
            <form id="settings" name="settings" class="w-full max-w-lg">
                <p class="title" data-toggle="collapse" data-target="#settingsContent">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17V7m0 10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2m0 10a2 2 0 002 2h2a2 2 0 002-2M9 7a2 2 0 012-2h2a2 2 0 012 2m0 10V7m0 10a2 2 0 002 2h2a2 2 0 002-2V7a2 2 0 00-2-2h-2a2 2 0 00-2 2" />
                    </svg>
                    Tamanhos
                </p>
                
                <div id="settingsContent" class="collapse show">
                    <div class="form-row grid grid-cols-4 gap-1">
                        <div class="form-group col-span-2">
                            <label for="settingsSizePreset" class="label"><span class="label-text">Configurações</span></label>
                            <select class="select select-bordered w-full max-w-xs select-sm contentParam" id="settingsSizePreset" name="settingsSizePreset">
                                <!-- Added dynamically -->
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="settingsContentWidth" class="label"><span class="label-text">Largura</span></label>
                            <input type="input" class="input input-bordered input-sm w-full contentParam" id="settingsContentWidth" name="settingsContentWidth" value="1920">
                        </div>
                        <div class="form-group">
                            <label for="settingsContentHeight" class="label"><span class="label-text">Altura</span></label>
                            <input type="input" class="input input-bordered input-sm w-full contentParam" id="settingsContentHeight" name="settingsContentHeight" value="1080">
                        </div>
                    </div>

                    <!-- TODO: pensar se temos que colocar isso de novo -->
                    <label for="settingsSizePreset" class="hidden">Margens</label>
                    <div class="form-row grid grid-cols-4 gap-1 hidden">
                        <div class="form-group">
                            <label for="settingsContentPaddingLeft" class="label"><span class="label-text">Esquerda</span></label>
                            <input type="input" class="input input-bordered input-sm w-full contentParam" id="settingsContentPaddingLeft" value="0">
                        </div>
                        <div class="form-group">
                            <label for="settingsContentPaddingTop" class="label"><span class="label-text">Superior</span></label>
                            <input type="input" class="input input-bordered input-sm w-full contentParam" id="settingsContentPaddingTop" value="0">
                        </div>
                        <div class="form-group">
                            <label for="settingsContentPaddingRight" class="label"><span class="label-text">Direita</span></label>
                            <input type="input" class="input input-bordered input-sm w-full contentParam" id="settingsContentPaddingRight" value="0">
                        </div>
                        <div class="form-group">
                            <label for="settingsContentPaddingBottom" class="label"><span class="label-text">Inferior</span></label>
                            <input type="input" class="input input-bordered input-sm w-full contentParam" id="settingsContentPaddingBottom" value="0">
                        </div>
                    </div>

                    <div class="form-row hidden">
                        <div class="form-group col-md-6">
                            <label for="settingsContentScale">Escala</label>
                            <input type="number" step="0.1" min="0.1" class="form-control contentParam" id="settingsContentScale" value="1.0">
                        </div>
                        
                        <div class="form-group col-md-6">
                            <label for="settingsContentBgColor">Cor de Fundo</label>
                            <input type="color" class="form-control contentParam" id="settingsContentBgColor" value="#ff00ff">
                        </div>
                    </div>

                    <div class="form-row hidden">
                        <div class="form-group col-md-6">
                            <label for="settingsContentExternaWindow">Aba externa</label>
                            <input type="checkbox" class="form-control contentParam" id="settingsContentExternaWindow" data-toggle="toggle" data-onstyle="primary" data-offstyle="outline-secondary" data-size="sm">
                        </div>
                    </div>
                    
                </div>

                <p class="title" data-toggle="collapse" data-target="#settingsCreation">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                    </svg>    
                    Conteúdo
                </p>

                <div id="settingsCreation" class="collapse show panel">
                    <div class="grid-cols-2 gap-1">
                        <div class="form-group col-span-2">
                            <label for="settingsCreationType" class="label"><span class="label-text">Modelo</span></label>
                            <select class="select select-bordered w-full contentParam" id="settingsCreationType">
                                <option></option>
                            </select>
                        </div>
                    </div>                

                    <div class="form-row">
                        <!-- screen params -->
                        <div class="form-group col-md-12" id="settingsCreationScreenParams">
                            <!-- will be populated dynamically -->
                        </div>

                        <div class="form-group">
                            <label for="settingsCreationName" class="label"><span class="label-text">Nome</span></label>
                            <input type="text" class="input input-bordered w-full contentParam" name="settingsCreationName" id="settingsCreationName" value="" placeholder="E.g. Cartaz para evento">
                        </div>

                        <!-- creation in -->
                        <div class="form-group col-md-6" style="display:none;">
                            <label for="settingsCreationInAfter">In after</label>
                            <div class="input-group">
                                <input type="number" step="0.1" min="0.1" value="1.0" class="form-control contentParam" id="settingsCreationInAfter">
                                <div class="input-group-append">
                                    <span class="input-group-text">s</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-6" style="display:none;">
                            <label for="settingsCreationInEffect">In effect</label>
                            <select class="form-control contentParam" id="settingsCreationInEffect">
                                <option></option>
                            </select>
                        </div>

                        <!-- creation middle -->
                        <div class="form-group col-md-6" style="display:none;">
                            <label for="settingsCreationMiddleAfter">Middle after</label>
                            <div class="input-group">
                                <input type="number" step="0.1" min="0.1" value="2.0" class="form-control contentParam" id="settingsCreationMiddleAfter">
                                <div class="input-group-append">
                                    <span class="input-group-text">s</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-6" style="display:none;">
                            <label for="settingsCreationMiddleEffect">Middle effect</label>
                            <select class="form-control contentParam" id="settingsCreationMiddleEffect">
                                <option></option>
                            </select>
                        </div>

                        <!-- creation out -->
                        <div class="form-group col-md-6" style="display:none;">
                            <label for="settingsCreationOutAfter">Out after</label>
                            <div class="input-group">
                                <input type="number" step="0.1" min="0.1" value="15.0" class="form-control contentParam" id="settingsCreationOutAfter">
                                <div class="input-group-append">
                                    <span class="input-group-text">s</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-6" style="display:none;">
                            <label for="settingsCreationOutEffect">Out effect</label>
                            <select class="form-control contentParam" id="settingsCreationOutEffect">
                                <option></option>
                            </select>
                        </div>
                    </div>      

                    <div class="form-row grid grid-cols-2 gap-2 mt-4">
                        <div class="form-group hidden">
                            <a class="btn btn-primary w-full" id="btnTest">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                </svg>
                                Atualizar
                            </a>
                        </div>
                        <div class="form-group">
                            <a class="btn btn-primary w-full" id="btnAdd">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                </svg>
                                Salvar modelo
                            </a>
                        </div>

                        <div class="form-group">
                            <a class="btn btn-primary w-full" onclick="window.parent.download_frame()">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                                Baixar Imagem
                            </a>
                        </div>

                    </div>
                </div>

                <p class="title" data-toggle="collapse" data-target="#settingsElements"><i class="fa fa-cubes"></i> Modelos Salvos</p>

                <div id="settingsElements" class="collapse show panel">
                    <ul class="list-group">
                        <li class="list-group-item"><a href="./screens/blank/index.html" target="content">blank</a></li>
                        <li class="list-group-item"><a href="./screens/alert-message/index.html?size=6&icon=fa-check-circle&type=success&title=Hey&text=ISso é uim test&ttl=10" target="content">alert</a></li>
                        <li class="list-group-item"><a href="./screens/test/index.html" target="content">test</a></li>
                        <li class="list-group-item"><a href="./screens/try/index.html?key=value" target="content">try</a></li>
                        <li class="list-group-item"><a href="./screens/notification/run.html?text=Fernando Bevilacqua&subtext=Coordenador, Curso de Ciência da Computação (UFFS)&ttl=20&icon=cc.svg&delay=0.3&effect=cornerexpand" target="content">run</a></li>
                        <li class="list-group-item"><a href="./screens/basic-overlay/?ttl=20&delay=0.3&message=hello&adjusts=elements,width;1920px,height;1080px,justifyContent;flex-start" target="content">basic-overlay</a></li>

                        <li class="list-group-item"><a href="./screens/notification/corner-top-right.html?title=Quarentena UFFS&ttl=20&icon=discord&frame=fa-3x&pallet=blueish&text=%23geral<br>discord.gg/Gj7Nx7x" target="content">Discord - corner</a></li>
                        <li class="list-group-item"><a href="./screens/notification/corner-top-right.html?title=Youtube&ttl=20&icon=youtube&frame=fa-3x&pallet=red&text=uffs.cc%2Fyoutube" target="content">Youtube - corner</a></li>
                        <li class="list-group-item"><a href="./screens/notification/corner-top-right.html?title=Instagram&ttl=20&icon=instagram&frame=fa-3x&pallet=pink&text=@computacaouffs" target="content">Instagram - corner</a></li>
                        <li class="list-group-item"><a href="./screens/notification/corner-top-right.html?title=Github&text=github.com%2Fccuffs&ttl=20&icon=github&frame=fa-3x&pallet=black" target="content">Github - corner</a></li>
                        <li class="list-group-item"></li>
                        <li class="list-group-item"><a href="./screens/notification/icon-content.html?text=github.com%2Fccuffs&subtext=Aplicativos, materiais e discussões.&ttl=20&icon=github.png" target="content">github - overlay</a></li>
                        <li class="list-group-item"><a href="./screens/notification/icon-content.html?text=cc.uffs.edu.br%2Fhorario&subtext=&ttl=20&icon=cc.png" target="content">/horario - overlay</a></li>
                        <li class="list-group-item"><a href="./screens/notification/icon-content.html?text=computacao.ch@uffs.edu.br&subtext=E-mail da Coordenação do Curso.&ttl=20&icon=cc.svg" target="content">computacao.ch - overlay</a></li>
                        <li class="list-group-item"></li>
                        <li class="list-group-item"><a href="./screens/notification/icon-content.html?text=Fernando Bevilacqua&subtext=Coordenador, Curso de Ciência da Computação (UFFS)&ttl=20&icon=cc.svg" target="content">fernando - overlay</a></li>
                        <li class="list-group-item"><a href="./screens/notification/icon-content.html?text=Luciano Lores Caimi&subtext=Coordenador Adjunto, Curso de Ciência da Computação (UFFS)&ttl=20&icon=cc.svg" target="content">caimi - overlay</a></li>
                        <li class="list-group-item"><a href="./screens/notification/icon-content.html?text=Andressa Sebben&subtext=Professora, Curso de Ciência da Computação (UFFS)&ttl=20&icon=cc.svg" target="content">andressa - overlay</a></li>
                        <li class="list-group-item"><a href="./screens/notification/icon-content.html?text=Denio Duarte&subtext=Professor, Curso de Ciência da Computação (UFFS)&ttl=20&icon=cc.svg" target="content">denio - overlay</a></li>
                        <li class="list-group-item"><a href="./screens/notification/icon-content.html?text=Guilherme dal Bianco&subtext=Professor, Curso de Ciência da Computação (UFFS)&ttl=20&icon=cc.svg" target="content">guilherme - overlay</a></li>
                        <li class="list-group-item"><a href="./screens/notification/icon-content.html?text=Emilio Wuergues&subtext=Professor, Curso de Ciência da Computação (UFFS)&ttl=20&icon=cc.svg" target="content">emilio - overlay</a></li>
                        <li class="list-group-item"><a href="./screens/notification/icon-content.html?text=Adriano Sanick Padilha&subtext=Professor, Curso de Ciência da Computação (UFFS)&ttl=20&icon=cc.svg" target="content">padilha - overlay</a></li>
                        <li class="list-group-item"><a href="./screens/notification/icon-content.html?text=Raquel Aparecida Pegoraro&subtext=Professor, Curso de Ciência da Computação (UFFS)&ttl=20&icon=cc.svg" target="content">raquel - overlay</a></li>
                        <li class="list-group-item"><a href="./screens/notification/icon-content.html?text=Graziela Simone Tonin&subtext=Professor, Curso de Ciência da Computação (UFFS)&ttl=20&icon=cc.svg" target="content">grazi - overlay</a></li>
                        <li class="list-group-item"><a href="./screens/notification/icon-content.html?text=Claunir Pavan&subtext=Professor, Curso de Ciência da Computação (UFFS)&ttl=20&icon=cc.svg" target="content">pavan - overlay</a></li>
                        <li class="list-group-item"><a href="./screens/notification/icon-content.html?text=Marco Aurelio Spohn&subtext=Professor, Curso de Ciência da Computação (UFFS)&ttl=20&icon=cc.svg" target="content">marco - overlay</a></li>
                        <li class="list-group-item"><a href="./screens/notification/icon-content.html?text=Geomar Schneider&subtext=Professor, Curso de Ciência da Computação (UFFS)&ttl=20&icon=cc.svg" target="content">geomar - overlay</a></li>
                        <li class="list-group-item"><a href="./screens/notification/icon-content.html?text=Andrei Braga&subtext=Professor, Curso de Ciência da Computação (UFFS)&ttl=20&icon=cc.svg" target="content">andrei - overlay</a></li>
                        <li class="list-group-item"></li>
                        <li class="list-group-item"><a href="./screens/video-logo/index.html" target="content">video-logo</a></li>
                        <li class="list-group-item"></li>
                        <li class="list-group-item"><a href="./screens/notification/icon-content.html?text=Fernando Bevilacqua&subtext=&ttl=20&icon=cc.svg" target="content">icon-content</a></li>
                    </ul>
                </div>

                <p class="title hidden" data-toggle="collapse" data-target="#settingsRecording"><i class="fa fa-cubes"></i> Compartilhar Tela</p>

                <div id="settingsRecording" class="collapse show panel hidden">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="settingsRecordingEnabledToggle">Recording is currently</label>
                        </div>
                        <div class="form-group col-md-6 justify-content-center">
                            <input type="checkbox" class="form-control" id="settingsRecordingEnabledToggle" data-toggle="toggle" data-onstyle="primary" data-offstyle="outline-danger" data-on="Enabled" data-off="Disabled" data-size="sm">
                        </div>
                    </div>

                    <div id="settingsRecordingPanel" class="form-row collapse hide panel">
                    </div>
                </div>

                <p class="title hidden" data-toggle="collapse" data-target="#settingsApplication"><i class="fa fa-cubes"></i> Application</p>

                <div id="settingsApplication" class="collapse show panel hidden">
                    <div class="form-row">
                        <div class="form-group col-md-10">
                            <label for="settingsAppSomething"><strong>Test</strong><br />Configuration settings</label>
                        </div>
                        <div class="form-group col-md-2 pt-2">
                            <input type="checkbox" class="form-control contentParam" id="settingsAppSomething" data-toggle="toggle" data-onstyle="primary" data-offstyle="outline-secondary" data-size="sm">
                        </div>
                    </div>                    
                </div>
            </form>
        </div>
    </div>

    <iframe src="{{ asset('assets/lbk/screens/blank/') }}" name="content" id="content" scrolling="no" allow="display-capture"></iframe>

</div>

@endsection

@section('scripts')
<script>
    var LBK_BASE_URL = "{{ asset('assets/lbk/') }}";
</script>

<script src="{{ asset('assets/lbk/js/jquery-3.5.1.min.js') }}"></script>
<script src="{{ asset('assets/lbk/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/lbk/js/hotkeys.min.js') }}"></script>
<script src="{{ asset('assets/lbk/js/bootstrap4-toggle.min.js') }}"></script>
<script src="{{ asset('assets/lbk/js/store.legacy.min.js') }}"></script>
<script src="{{ asset('assets/lbk/js/main.js') }}"></script>
<script src="{{ asset('assets/lbk/media/cssanimation.io/letteranimation.min.js') }}"></script>
@endsection