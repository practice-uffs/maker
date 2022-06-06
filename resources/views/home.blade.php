@extends('layouts.base')
@section('content')

<section class="text-gray-600 body-font">
    <div class="container px-5 py-24 mx-auto">
        <div class="flex flex-col text-center w-full mb-20">
            <h2 class="text-xs text-indigo-500 tracking-widest font-medium title-font mb-1" data-aos="fade-up">FERRAMENTAS DISPONÍVEIS</h2>
            <h1 class="sm:text-3xl text-2xl font-medium title-font text-gray-900"  data-aos="fade-up" data-aos-delay="200">O que você gostaria de criar hoje?</h1>
        </div>

        <div class="mt-12 m-auto items-center justify-center space-y-6 lg:flex lg:space-y-0 lg:space-x-6 xl:w-10/12">

            <div class="relative p-2 z-10 group mx-auto sm:w-7/12 lg:w-4/12" data-aos="fade-up" data-aos-delay="300">
                <a href="{{ route('book.create') }}" class="no-underline hover:no-underline">
                    <div aria-hidden="true" class="h-80 sm:h-96 lg:h-96 rounded-2xl shadow-xl p-6 space-y-8 rounded-lg bg-gray-100 hover:bg-gray-200" >
                        <div class="flex items-center">
                            <div class="w-8 h-8 mr-3 inline-flex items-center justify-center rounded-full bg-indigo-500 text-white flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                </svg>
                            </div>
                            <h5 class="text-xl text-gray-700 hover:text-indigo-500 font-semibold">Livro Digital</h5>
                        </div>
                        <p class="xs:h-52 sm:h-72 md:h-72 lg:h-72 xl:h-72 overflow-hidden leading-relaxed text-base">Esta maravilhosa ferramenta transforma um documento google com markdown em um e-book, basta compartilhar com o e-mail practiceuffs.maker@gmail.com, simples assim!</p>
                    </div>
                </a>
            </div>

            <div class="relative p-2 z-10 group mx-auto sm:w-7/12 lg:w-4/12" data-aos="fade-up" data-aos-delay="300">
                <a href="{{ route('poster') }}" class="no-underline hover:no-underline">
                    <div aria-hidden="true" class="h-80 sm:h-96 lg:h-96 rounded-2xl shadow-xl p-6 space-y-8 rounded-lg bg-gray-100 hover:bg-gray-200">
                        <div class="flex items-center">
                            <div class="w-8 h-8 mr-3 inline-flex items-center justify-center rounded-full bg-indigo-500 text-white flex-shrink-0">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                                    <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg>
                            </div>
                            <h5 class="text-xl text-gray-700 hover:text-indigo-500 font-semibold">Poster</h5>
                        </div>
                        <p class="xs:h-52 sm:h-72 md:h-72 lg:h-72 xl:h-72 overflow-hidden leading-relaxed text-base">Crie o material gráfico para publicações, lives, entre outros. Aqui você encontra diversos modelos configuráveis para agilizar seu dia-a-dia.</p>
                    </div>
                </a>
            </div>

            <div class="relative p-2 z-10 group mx-auto sm:w-7/12 lg:w-4/12" data-aos="fade-up" data-aos-delay="300">
                <a href="{{ route('site.create') }}" class="no-underline hover:no-underline">
                    <div aria-hidden="true" class="h-80 sm:h-96 lg:h-96 rounded-2xl shadow-xl p-6 space-y-8 rounded-lg bg-gray-100 hover:bg-gray-200">
                        <div class="flex items-center">
                            <div class="w-8 h-8 mr-3 inline-flex items-center justify-center rounded-full bg-indigo-500 text-white flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                                </svg>
                            </div>
                            <h5 class="text-xl text-gray-700 hover:text-indigo-500 font-semibold">Página Web</h5>
                        </div>
                        <p class="xs:h-52 sm:h-72 md:h-72 lg:h-72 xl:h-72 leading-relaxed text-base overflow-hidden ...">Esta magnifica ferramenta gera uma página web através de um documento google que contenha instruções para que seja gerada. Basta compartilhar o seu documento google com practiceuffs.ebooks@gmail.com</p>
                    </div>
                </a>
            </div>
        </div>

    </div>
</section>

@endsection