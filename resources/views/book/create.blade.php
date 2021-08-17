@extends('layouts.base')
@section('content')
    
<div class="py-12">
    <div class="flex justify-center">
        <a href="{{ route('books') }}">
            <button id="btn-index" 
                    class="btn btn-primary bg-blue-500 hover:bg-blue-700 text-white font-bold border-0" 
                    onclick="   el = document.getElementById('btn-index'); 
                                el.innerHTML = '<i class=\'bi bi-arrow-repeat\'></i>'; 
                                el.disabled = true; 
                                el.innerHTML = '<div class=\'spinner-border\'></div>Aguarde';"
                    >Ir para os meus Livros</button>
        </a>
    </div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            @livewire('make-book')
        </div>
    </div>
</div>

@endsection
