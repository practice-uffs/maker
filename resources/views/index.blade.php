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
            <div class="p-4 md:w-1/3 flex flex-col text-center items-center">
                <div class="w-20 h-20 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 mb-5 flex-shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                </div>
                <div class="flex-grow">
                    <h2 class="text-gray-900 text-lg title-font font-medium mb-3">Livro Digital</h2>
                    <p class="leading-relaxed text-base">
                        Esta magnifica ferramenta transforma um documento google com markdown em um e-book, basta compartilhar o Google Docs com o e-mail practiceuffs.maker@gmail.com, simples assim!
                    </p>
                    <a href="{{ route('book.create') }}" class="mt-3 text-indigo-500 inline-flex items-center">
                        Vamos lá!
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                            <path d="M5 12h14M12 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="p-4 md:w-1/3 flex flex-col text-center items-center">
                <div class="w-20 h-20 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 mb-5 flex-shrink-0">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-10 h-10" viewBox="0 0 24 24">
                        <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                </div>
                <div class="flex-grow">
                    <h2 class="text-gray-900 text-lg title-font font-medium mb-3">Poster</h2>
                    <p class="leading-relaxed text-base">
                    Crie o material gráfico para publicações, lives, entre outros. 
                    Aqui você encontra diversos modelos configuráveis 
                    para agilizar seu dia-a-dia.    
                    </p>
                    <a href="{{ route('poster')}}" class="mt-3 text-indigo-500 inline-flex items-center">Começar a criar
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                            <path d="M5 12h14M12 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="p-4 md:w-1/3 flex flex-col text-center items-center">
                <div class="w-20 h-20 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 mb-5 flex-shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M4.083 9h1.946c.089-1.546.383-2.97.837-4.118A6.004 6.004 0 004.083 9zM10 2a8 8 0 100 16 8 8 0 000-16zm0 2c-.076 0-.232.032-.465.262-.238.234-.497.623-.737 1.182-.389.907-.673 2.142-.766 3.556h3.936c-.093-1.414-.377-2.649-.766-3.556-.24-.56-.5-.948-.737-1.182C10.232 4.032 10.076 4 10 4zm3.971 5c-.089-1.546-.383-2.97-.837-4.118A6.004 6.004 0 0115.917 9h-1.946zm-2.003 2H8.032c.093 1.414.377 2.649.766 3.556.24.56.5.948.737 1.182.233.23.389.262.465.262.076 0 .232-.032.465-.262.238-.234.498-.623.737-1.182.389-.907.673-2.142.766-3.556zm1.166 4.118c.454-1.147.748-2.572.837-4.118h1.946a6.004 6.004 0 01-2.783 4.118zm-6.268 0C6.412 13.97 6.118 12.546 6.03 11H4.083a6.004 6.004 0 002.783 4.118z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="flex-grow">
                    <h2 class="text-gray-900 text-lg title-font font-medium mb-3">Página Web</h2>
                    <p class="leading-relaxed text-base">
                        Outra magnifica ferramenta, esta é capaz de gerar uma página web através de um documento google que contenha as instruções para que seja gerada a página, legal né? Basta compartilhar o seu Google Docs com o e-mail practiceuffs.maker@gmail.com e tá feito!
                    </p>
                    <a href="{{ route('site.create') }}" class="mt-3 text-indigo-500 inline-flex items-center">
                        Vamos lá!
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                            <path d="M5 12h14M12 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection