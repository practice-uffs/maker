@extends('layouts.base')
@section('content')
    <div class="container my-12 mx-auto px-4 md:px-12">
        
        @if (count($books) != 0)
            <div class="flex flex-wrap -mx-1 lg:-mx-4">

                @foreach($books as $book)
                    <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/3" data-aos="zoom-out" data-aos-delay="500">

                        <article class="overflow-hidden rounded-lg shadow-lg">
                            <embed class="" src="{{ $book->pdf_path }}" width="370px" height="250px" />

                            <header class="flex flex-column items-center justify-between leading-tight p-2 md:p-4">
                                <h1 class="text-lg">
                                    <a href="{{ route('book.show', ['book' => $book]) }}" class="no-underline hover:underline text-indigo-500 hover:text-indigo-900">
                                        {{ $book->name }}
                                    </a>
                                </h1>
                                <div class="text-grey-darker text-sm">
                                    <p class="text-sm"> Última atualização: {{ $book->updated_at->format('d/m/Y') }} às {{ $book->updated_at->format('H:i') }} </p>
                                </div>
                            </header>
                            
                            <footer class="flex items-center justify-evenly leading-none p-2 md:p-4">
                                <a href="{{ route('book.update', ['bookToUpdate' => $book]) }}">
                                    <button
                                        id="{{ $book->id }}" 
                                        class="btn btn-primary rounded-full bg-blue-500 hover:bg-blue-700 text-white font-bold border-0" 
                                        onclick="el = document.getElementById('{{ $book->id }}'); 
                                                    el.innerHTML = '<i class=\'bi bi-arrow-repeat\'></i>'; 
                                                    el.disabled = true; 
                                                    el.innerHTML = '<div class=\'spinner-border\'></div>Aguarde'; 
                                    ">Atualizar
                                    </button>
                                </a>
                                <a href="{{ route('book.show', ['book' => $book]) }}">
                                    <button class="btn btn-primary rounded-full bg-blue-500 hover:bg-blue-700 text-white font-bold border-0">
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
