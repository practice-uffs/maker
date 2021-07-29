<header id="header" class="header fixed-top">
    <div class="container-lg d-flex align-items-center justify-content-between">
        <a href="{{ route('index') }}" class="logo d-flex align-items-center">
            <img src="{{ asset('img/logo-practice.png') }}" alt="">
            <span>{{ config('app.name') }}</span>
        </a>

        <nav id="navbar" class="navbar">
            <ul>
                @auth
                    <li><a href="{{ route('home') }}" class="nav-link @if (Route::is('home')) active @endif" >Inicial</a></li>
                    @admin
                        <li class="dropdown ml-3">
                            <div tabindex="0" class="btn btn-primary btn-outline">Admin <i class="bi bi-chevron-down"></i></div>
                            <ul class="shadow menu dropdown-content bg-base-100 rounded-box w-52">
                                <li><hr /></li> 
                                <li><a href="{{ route('admin.user') }}">Usuários</a></li> 
                                <li><a href="{{ route('admin.subscriber') }}">Newsletter</a></li>
                            </ul>
                        </li>
                    @endadmin

                    <li class="ml-8 mr-2">
                        <span class="font-semibold">{{ Str::title(Auth()->user()->name) }}</span>
                    </li>

                    <li class="flex-none">
                        <div class="avatar">
                            <div class="rounded-full w-10 h-10 m-1">
                                <img src="https://cc.uffs.edu.br/avatar/iduffs/{{ auth()->user()->uid }}" />
                            </div>
                        </div>
                    </li>

                    <li>
                        <a href="{{ route('logout') }}">Sair</a>
                    </li>
                @endauth
                
                @guest
                    <li><a href="{{ route('login') }}" class="getstarted">Entrar <i class="bi bi-box-arrow-in-right"></i></a></li>
                @endguest
            </ul>
        </nav>

    </div>
</header>