@extends('layouts.base')
@section('content')

<section class="text-gray-600 body-font">
    <div class="container px-5 py-24 mx-auto">
        <div class="flex flex-col text-center w-full mb-20">
            <h2 class="text-xs text-indigo-500 tracking-widest font-medium title-font mb-1" data-aos="fade-up">FERRAMENTAS DISPONÍVEIS</h2>
            <h1 class="sm:text-3xl text-2xl font-medium title-font text-gray-900"  data-aos="fade-up" data-aos-delay="200">O que você gostaria de criar hoje?</h1>
        </div>
        <div class="flex flex-wrap -m-4">
            <div class="p-4 md:w-1/3" data-aos="fade-up" data-aos-delay="400">
                <div class="flex rounded-lg h-full bg-gray-100 p-8 flex-col">
                    <div class="flex items-center mb-3">
                        <div class="w-8 h-8 mr-3 inline-flex items-center justify-center rounded-full bg-indigo-500 text-white flex-shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                        </div>
                        <h2 class="text-gray-900 text-lg title-font font-medium">Livro Digital</h2>
                    </div>
                    <div class="flex-grow">
                        <p class="leading-relaxed text-base">Esta magnifica ferramenta transforma um documento google com markdown em um e-book, basta compartilhar com o e-mail practiceuffs.maker@gmail.com, simples assim!</p>
                        <a href="{{ route('book.create') }}" class="mt-3 text-indigo-500 inline-flex items-center">Vamos lá!
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                                <path d="M5 12h14M12 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <div class="p-4 md:w-1/3" data-aos="fade-up" data-aos-delay="500">
                <div class="flex rounded-lg h-full bg-gray-100 p-8 flex-col">
                    <div class="flex items-center mb-3">
                        <div class="w-8 h-8 mr-3 inline-flex items-center justify-center rounded-full bg-indigo-500 text-white flex-shrink-0">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                                <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                        </div>
                        <h2 class="text-gray-900 text-lg title-font font-medium">Poster</h2>
                    </div>
                    <div class="flex-grow">
                        <p class="leading-relaxed text-base">Crie o material gráfico para publicações, lives, entre outros. Aqui você encontra diversos modelos configuráveis para agilizar seu dia-a-dia.</p>
                        <a href="{{ route('poster') }}" class="mt-3 text-indigo-500 inline-flex items-center">Começar a criar
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                                <path d="M5 12h14M12 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <div class="p-4 md:w-1/3" data-aos="fade-up" data-aos-delay="600">
                <div class="flex rounded-lg h-full bg-gray-100 p-8 flex-col">
                    <div class="flex items-center mb-3">
                        <div class="w-8 h-8 mr-3 inline-flex items-center justify-center rounded-full bg-indigo-500 text-white flex-shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                            </svg>
                        </div>
                        <h2 class="text-gray-900 text-lg title-font font-medium">Página Web</h2>
                    </div>
                    <div class="flex-grow">
                        <p class="leading-relaxed text-base">Outra magnifica ferramenta, esta é capaz de gerar uma página web através de um documento google que contenha as instruções para que seja gerada a página, legal né? Basta compartilhar o seu documento google com practiceuffs.ebooks@gmail.com e tá feito!</p>
                        <a href="{{ route('site.create') }}" class="mt-3 text-indigo-500 inline-flex items-center">Vamos lá!
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                                <path d="M5 12h14M12 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection