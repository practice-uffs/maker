<header id="header" class="header fixed-top">
    <div class="container-lg d-flex align-items-center justify-content-between">
        
        <a href="{{ route('index') }}" class="logo d-flex align-items-center">
            <img src="{{ asset('img/practice-maker.png') }}" alt="">
            <span>{{ config('app.name') }}</span>
        </a>

        <nav id="navbar" class="navbar oculto">
            <ul>
                @auth
                    <li class="dropdown relative">
                        <button class="dropdown-toggle px-6 inline-block py-2.5 text-blue-900 font-medium leading-tight hover:text-blue-600 whitespace-nowrap"
                            id="dropdownMenuButton2" type="button" data-bs-toggle="dropdown" aria-expanded="false"
                        >
                            Ferramentas
                        </button>

                        <ul aria-labelledby="dropdownMenuButton2" class="dropdown-menu min-w-max absolute hidden bg-white text-base z-50 float-left py-2 list-none text-left rounded-lg shadow-lg mt-1 hidden m-0 bg-clip-padding border-none bg-gray-800">
                            <li>
                                <a href="{{ route('home') }}" class="dropdown-item text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-300 hover:bg-gray-700 hover:text-white focus:text-white focus:bg-gray-700 active:bg-blue-600">
                                    Todas
                                </a>
                            </li>
                            <li><hr class="h-0 my-2 border border-solid border-t-0 border-gray-300 opacity-25" /></li>
                            <li>
                                <a href="{{ route('books') }}" class="dropdown-item text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-300 hover:bg-gray-700 hover:text-white focus:text-white focus:bg-gray-700">
                                    Livro digital
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('poster') }}" class="dropdown-item text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-300 hover:bg-gray-700 hover:text-white focus:text-white focus:bg-gray-700">
                                    Poster
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('site.create') }}" class="dropdown-item text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-300 hover:bg-gray-700 hover:text-white focus:text-white focus:bg-gray-700">
                                    Página Web
                                </a>
                            </li>
                        </ul>
                    </li>
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
                        <a href="{{ route('logout') }}">Sair <i class="bi bi-door-open"></i></a>
                    </li>
                @endauth

                @guest
                    <li><a href="{{ route('login') }}" class="getstarted">Entrar <i
                                class="bi bi-box-arrow-in-right"></i></a></li>
                @endguest
            </ul>
        </nav>

        <nav class="lg:invisible absolute pr-5 left-1 w-full d-flex justify-content-end">
            <li class="dropdown mx-2">
                @auth
                    <div tabindex="0" class="btn btn-primary" data-bs-toggle="dropdown" aria-expanded="false">
                        Menu <i class="pl-2 bi bi-chevron-down"></i>
                    </div>
                    <ul class="dropdown-menu rounded-box">
                        <p class="text-blue-800 pl-5 d-xl-none">Ferramentas</p>
                        <li class="dropdown-item">
                            <a href="{{ route('home') }}" class="nav-link focus:text-white pt-1 pb-1 text-sm hover:text-blue-500">
                                Todas
                            </a>
                        </li>
                        <li class="dropdown-item">
                            <a href="{{ route('books') }}" class="nav-link focus:text-white pt-1 pb-1 text-sm hover:text-blue-500">
                                Livro digital
                            </a>
                        </li>
                        <li class="dropdown-item">
                            <a href="{{ route('poster') }}" class="nav-link focus:text-white pt-1 pb-1 text-sm hover:text-blue-500">
                                Poster
                            </a>
                        </li>
                        <li class="dropdown-item">
                            <a href="{{ route('site.create') }}" class="nav-link focus:text-white pt-1 pb-1 text-sm hover:text-blue-500">
                                Página Web
                            </a>
                        </li>

                        <li><hr class="dropdown-divider d-xl-none" /></li>
                        
                        <li class="dropdown-item d-flex d-xl-none justify-content-between">
                            <div tabindex="0" class="avatar ml-2">
                                <div class="rounded-full w-10 h-10 m-1">
                                    <img src="https://cc.uffs.edu.br/avatar/iduffs/{{ auth()->user()->uid }}" />
                                </div>
                            </div> 
                            <div class="text-right mt-1">
                                <p class="font-semibold">{{ auth()->user()->first_name }}</p>
                                <p class="text-xs font-extralight -mt-1 text-gray-900">{{ auth()->user()->username }}</p>
                            </div>
                        </li>
                    
                        <li class="dropdown-item">
                            <a href="{{ route('logout') }}" class="nav-link getstarted focus:text-white">
                                Sair <i class="bi bi-door-open"></i>
                            </a>
                        </li>
                    </ul>
                @endauth
            </li>
        </nav>

    </div>
</header>
