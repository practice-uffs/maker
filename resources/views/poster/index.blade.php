@extends('layouts.base')
@section('wideTopContent')

<link href="{{ asset('assets/lbk/media/fontawesome-5.13.0/css/all.min.css') }}" type="text/css" rel="stylesheet">
<link href="{{ asset('assets/lbk/media/cssanimation.io/cssanimation.min.css') }}" type="text/css" rel="stylesheet">
<link href="{{ asset('assets/lbk/media/woah/woah.css') }}" type="text/css" rel="stylesheet">
<link href="{{ asset('assets/lbk/media/animate.css/animate.min.css') }}" type="text/css" rel="stylesheet">

<!-- 3rd party styles -->
<link href="{{ asset('assets/lbk/css/bootstrap4-toggle.min.css') }}" rel="stylesheet">

<!-- app styles -->
<link href="{{ asset('assets/lbk/css/main.css') }}" rel="stylesheet">

<div id="lbkContainer" class="relative h-screen mt-28 mb-10">
    <div id="menu" class="h-screen">
        <div class="wrapper">
            <form id="settings" name="settings">
                <p class="title" data-toggle="collapse" data-target="#settingsContent"><i class="fa fa-tv"></i> Área de conteúdo</p>
                <div id="settingsContent" class="collapse show">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="settingsSizePreset">Configurações</label>
                            <select class="form-control contentParam" id="settingsSizePreset" name="settingsSizePreset">
                                <!-- Added dynamically -->
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="settingsContentWidth">Largura</label>
                            <input type="input" class="form-control contentParam" id="settingsContentWidth" name="settingsContentWidth" value="1920">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="settingsContentHeight">Altura</label>
                            <input type="input" class="form-control contentParam" id="settingsContentHeight" name="settingsContentHeight" value="1080">
                        </div>
                    </div>

                    <label for="settingsSizePreset">Margens</label>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="settingsContentPaddingLeft">Esquerda</label>
                            <input type="input" class="form-control contentParam" id="settingsContentPaddingLeft" value="0">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="settingsContentPaddingTop">Superior</label>
                            <input type="input" class="form-control contentParam" id="settingsContentPaddingTop" value="0">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="settingsContentPaddingRight">Direita</label>
                            <input type="input" class="form-control contentParam" id="settingsContentPaddingRight" value="0">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="settingsContentPaddingBottom">Inferior</label>
                            <input type="input" class="form-control contentParam" id="settingsContentPaddingBottom" value="0">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="settingsContentScale">Escala</label>
                            <input type="number" step="0.1" min="0.1" class="form-control contentParam" id="settingsContentScale" value="1.0">
                        </div>
                        
                        <div class="form-group col-md-6">
                            <label for="settingsContentBgColor">Cor de Fundo</label>
                            <input type="color" class="form-control contentParam" id="settingsContentBgColor" value="#ff00ff">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="settingsContentExternaWindow">Aba externa</label>
                            <input type="checkbox" class="form-control contentParam" id="settingsContentExternaWindow" data-toggle="toggle" data-onstyle="primary" data-offstyle="outline-secondary" data-size="sm">
                        </div>
                    </div>
                </div>

                <p class="title" data-toggle="collapse" data-target="#settingsCreation"><i class="fa fa-cubes"></i> Detalhes do arquivo</p>

                <div id="settingsCreation" class="collapse show panel">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="settingsCreationName">Nome</label>
                            <input type="text" class="form-control contentParam" name="settingsCreationName" id="settingsCreationName" value="" placeholder="E.g. Show ad bottom corner">

                        </div>
                        <div class="form-group col-md-12">
                            <label for="settingsCreationType">Modelo</label>
                            <select class="form-control contentParam" id="settingsCreationType">
                                <option></option>
                            </select>
                        </div>
                    </div>                

                    <div class="form-row">
                        <!-- screen params -->
                        <div class="form-group col-md-12" id="settingsCreationScreenParams">
                            <!-- will be populated dynamically -->
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

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <a class="btn btn-block btn-primary" id="btnTest"><i class="fa fa-play-circle"></i> Atualizar</a>
                        </div>
                        <div class="form-group col-md-6">
                            <a class="btn btn-block btn-primary" id="btnAdd"><i class="fa fa-plus-square"></i> Salvar Modelo</a>
                        </div>

                        <div class="form-group col-md-6">
                            <a class="btn btn-block btn-primary" onclick="window.parent.download_frame()"><i class="fa fa-arrow-down"></i> Baixar Imagem</a>
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

                <p class="title" data-toggle="collapse" data-target="#settingsRecording"><i class="fa fa-cubes"></i> Compartilhar Tela</p>

                <div id="settingsRecording" class="collapse show panel">
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

                <p class="title" data-toggle="collapse" data-target="#settingsApplication"><i class="fa fa-cubes"></i> Application</p>

                <div id="settingsApplication" class="collapse show panel">
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