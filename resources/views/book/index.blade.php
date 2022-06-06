@extends('layouts.base')
@section('content')
    <div class="container my-12 mx-auto px-4 md:px-12">
        
        @if (count($books) != 0)
            <div class="flex flex-wrap -mx-1 lg:-mx-4">

                @foreach($books as $book)
                    <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/3" data-aos="zoom-out" data-aos-delay="500">

                        <article class="rounded-lg shadow-lg">
                            <embed class="w-full h-full" src="{{ $book->pdf_path }}" />

                            <header class="flex flex-column items-center justify-between leading-tight p-2 md:p-4">
                                <h1 class="text-lg">
                                    <a  href="{{ route('book.show', ['book' => $book]) }}" class="no-underline hover:underline text-blue-500 hover:text-blue-900">
                                        <p>
                                            {{ Str::substr($book->name, 0, 28) }}
                                            @if (strlen($book->name) > 28)
                                                ...
                                            @endif
                                        </p>
                                    </a>
                                </h1>
                                <div class="text-grey-darker text-sm">
                                    <p class="text-sm"> Última atualização: {{ $book->updated_at->format('d/m/Y') }} às {{ $book->updated_at->format('H:i') }} </p>
                                    <p class="text-sm text-center">
                                        Tema: {{ $book->theme }}
                                    </p>
                                </div>
                            </header>
                            
                            <footer class="flex items-center justify-evenly leading-none p-2 md:p-4">
                                <a href="{{ route('book.update', ['bookToUpdate' => $book]) }}">
                                    <button type="button" id="{{ $book->id }}" 
                                        class="text-indigo-700 hover:text-white border border-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-indigo-400 dark:text-indigo-400 dark:hover:text-white dark:hover:bg-indigo-500 dark:focus:ring-indigo-900"
                                        onclick="el = document.getElementById('{{ $book->id }}'); 
                                                    el.innerHTML = '<i class=\'bi bi-arrow-repeat\'></i>'; 
                                                    el.disabled = true; 
                                                    el.innerHTML = '<div class=\'spinner-border\'></div>Aguarde';"
                                        >
                                        Atualizar
                                    </button>
                                </a>
                                <a href="{{ route('book.show', ['book' => $book]) }}">
                                    <button type="button" class="text-white border border-indigo-700 bg-indigo-500 hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-indigo-400 dark:text-white dark:bg-indigo-500 dark:focus:ring-indigo-900">
                                        Acessar
                                    </button>
                                </a>
                            </footer>

                        </article>

                    </div>
                @endforeach
            </div>
        @else
            <div class="flex justify-center pt-28 pb-28">
                <div class="flex flex-column ">
                    <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">
                        <p class="font-bold">Aviso!</p>
                        <p>Parece que você não possui livros digitais.</p>
                        <p>Acesse "Criar um e-book!" para continuar...</p>
                    </div>  
                </div>
            </div>
        @endif

        <a href="{{ route('book.create') }}">
            <div class="flex justify-center">
                <button type="button" id="btn-submit-index" class="fixed bottom-3.5 center btn rounded-full bg-indigo-500 hover:bg-indigo-700 text-white font-bold border-0" >
                    Criar novo livro!
                </button>
            </div>
        </a>
    </div>
@endsection
