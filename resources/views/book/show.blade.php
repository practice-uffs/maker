@extends('layouts.base')
@section('content')
<div class="py-12">
    <div class="flex justify-evenly">
        <div class="flex flex-row justify-center">
            <a href="{{ route('books') }}">
                <button
                id="btn-submit-index" 
                class="btn btn-primary bg-blue-500 hover:bg-blue-700 text-white font-bold border-0" 
                onclick="   el = document.getElementById('btn-submit-index'); 
                            el.innerHTML = '<i class=\'bi bi-arrow-repeat\'></i>'; 
                            el.disabled = true; 
                            el.innerHTML = '<div class=\'spinner-border\'></div>Aguarde'; 
                            ">Ir para os meus Livros</button></a>
        </div>

        
        
        <div class="flex flex-column">
            <a href="{{ route('book.update', ['bookToUpdate' => $book]) }}">
                <button
                id="btn-submit-update" 
                class="btn btn-primary bg-blue-500 hover:bg-blue-700 text-white font-bold border-0" 
                onclick="   el = document.getElementById('btn-submit-update'); 
                            el.innerHTML = '<i class=\'bi bi-arrow-repeat\'></i>'; 
                            el.disabled = true; 
                            el.innerHTML = '<div class=\'spinner-border\'></div>Aguarde'; 
                            ">Atualizar Livro</button></a>

        </div>
    </div>
    <div class="flex justify-center">
        <embed class="pt-5 " src="{{ $book->pdf_path }}" width="800px" height="900px" />
    </div>
</div>
@endsection
