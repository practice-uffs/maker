@extends('layouts.base')
@section('content')
    
<div class="py-12">
    <div class="flex justify-center">
        <a href="{{ route('books') }}">
            <button id="btn-index" alt="Meus livros"
                    class="fixed h-14 w-14 bottom-3.5 right-4 btn rounded-full bg-indigo-500 hover:bg-indigo-700 text-white font-bold border-0" 
                    onclick="   el = document.getElementById('btn-index'); 
                                el.innerHTML = '<i class=\'bi bi-arrow-repeat\'></i>'; 
                                el.disabled = true; 
                                el.innerHTML = '<div class=\'spinner-border\'></div>Aguarde';"
            >
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
            </svg>
            </button>
        </a>
    </div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            @livewire('make-book')
        </div>
    </div>
</div>

@endsection
