@extends('layouts.base')
@section('content')
    <div class="container py-24">
        <a href="{{ route('book.update', ['bookToUpdate' => $book]) }}">
            <div class="flex justify-center">
                <button type="button"
                        id="btn-submit-update" 
                        class="fixed bottom-3.5 center btn rounded-full bg-indigo-500 hover:bg-indigo-700 text-white font-bold border-0" 
                        onclick="   el = document.getElementById('btn-submit-update'); 
                                    el.innerHTML = '<i class=\'bi bi-arrow-repeat\'></i>'; 
                                    el.disabled = true; 
                                    el.innerHTML = '<div class=\'spinner-border\'></div>Aguarde';">
                    Atualizar livro!
                </button>
            </div>
        </a>
        
        <div class="flex flex-col text-center w-full">
            <h2 class="text-2xl text-indigo-500 tracking-widest font-medium title-font mb-1">
                {{ $book->name }}
            </h2>
            <h1 class="sm:text-2xl text-1xl font-small title-font text-gray-900">
                Última atualização: {{ $book->updated_at->format('d/m/Y') }} às {{ $book->updated_at->format('H:i') }}
            </h1>
        </div>

        <div class="flex justify-center w-full">
            <embed class="pt-5 " src="{{ $book->pdf_path }}" width="1000px" height="900px" />
        </div>
    </div>
@endsection
