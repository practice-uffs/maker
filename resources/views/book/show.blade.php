@extends('layouts.base')
@section('content')
<div class="py-12">
    <div class="flex justify-evenly">
        <div class="flex flex-row justify-center">
            <a href="{{ route('books') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Ir para os meus Livros</a>
                
        </div>
        <div class="flex flex-column">
            <a href="{{ route('book.update', ['bookToUpdate' => $book]) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Atualizar livro</a>
        </div>
    </div>
    <div class="flex justify-center">
        <embed class="pt-5 " src="{{ $book->pdf_path }}" width="800px" height="900px" />
    </div>
</div>
@endsection
