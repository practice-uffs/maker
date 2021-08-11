@extends('layouts.base')
@section('content')
    
<div class="py-12">
    <div class="flex justify-center">
        <a href="{{ route('books') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
            Ir para os meus Livros</a>
    </div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            @livewire('make-book')
        </div>
    </div>
</div>

@endsection
