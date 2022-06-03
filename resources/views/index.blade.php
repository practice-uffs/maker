@extends('layouts.base')
@section('content')

@section('wideTopContent')
    <div class="float-cube-area">
        <ul class="float-cube">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
    </div>
@endsection

<section class="text-gray-600 body-font hero">
    <div class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-center">
        <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6 mb-10 md:mb-0" data-aos="zoom-out" data-aos-delay="200">
            <img class="object-cover object-center w-full" alt="hero" src="{{ asset('img/manypixels.co/science-monochromatic.svg') }}">
        </div>
        <div class="lg:flex-grow md:w-1/2 lg:pl-24 md:pl-16 flex flex-col md:items-start text-left items-center">
            <h1 data-aos="fade-up" class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">
                Crie conteúdo digital
            </h1>
            <p data-aos="fade-up" data-aos-delay="400" class="mb-8 leading-relaxed">
                Crie diversos materiais digitais de forma rápida e descomplicada. E o melhor de tudo? Não precisa de conhecimento técnico algum! 
                Deixe essa parte para o <strong>Maker</strong> fazer por você. Se preocupe com o conteúdo, o resto é criado automaticamente.
            </p>
        </div>
    </div>
</section>

<section class="text-gray-600 body-font">
    <div class="container mx-auto flex px-5 py-5 md:flex-row flex-col items-center">
        <div class="lg:flex-grow md:w-1/2 lg:pl-24 md:pl-16 flex flex-col md:items-start text-left items-center">
            <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">
                Inteligência artificial
                <br class="hidden lg:inline-block">ao seu dispor
            </h1>
            <p class="mb-8 leading-relaxed">
                Nossa ferramenta utiliza tecnologias de inteligência artificial para entender o seu texto. A partir disso, criamos uma apresentação de acordo. 
                Já imaginou escrever <em>"quero uma imagem para rede social de um evento dia 20, às 19 horas"</em> e ter como resultado um cartaz lindo?
                Não imagine mais, isso é uma realidade aqui.
            </p>
        </div>
        <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6 mb-10 md:mb-0">
            <img class="object-cover object-center rounded" alt="hero" src="{{ asset('img/manypixels.co/artificial-intelligence-monochromatic.svg') }}">
        </div>
    </div>
</section>

<section class="text-gray-600 body-font">
    <div class="container px-5 py-10 mx-auto">
        <div class="text-center mb-20">
            <h1 class="sm:text-3xl text-2xl font-medium title-font text-gray-900 mb-4">Ferramentas disponíveis</h1>
            <p class="text-base leading-relaxed xl:w-2/4 lg:w-3/4 mx-auto text-gray-500s">
                Aqui se encontram as ferramentas
                que que a equipe do PRACTICE desenvolveu 
                até o momento.
            </p>
            <div class="flex mt-6 justify-center">
                <div class="w-16 h-1 rounded-full bg-indigo-500 inline-flex"></div>
            </div>
        </div>

        <div class="flex flex-wrap sm:-m-4 -mx-4 -mb-10 -mt-4 md:space-y-0 space-y-6">

            <div class="relative p-2 z-10 group mx-auto sm:w-7/12 lg:w-4/12" data-aos="fade-up" data-aos-delay="300">
                <a href="{{ route('book.create') }}" class="no-underline hover:no-underline">
                    <div aria-hidden="true" class="h-80 sm:h-96 lg:h-96 rounded-2xl shadow-xl p-6 space-y-8 rounded-lg bg-gray-100 hover:bg-gray-200">
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