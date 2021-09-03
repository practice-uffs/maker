@extends('layouts.base')
@section('content')
<div class="container my-12 mx-auto px-4 md:px-12">
    @if (count($sites) != 0)
    <div class="flex flex-wrap -mx-1 lg:-mx-4">

        <!-- Column -->
        @foreach($sites as $site)
            <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/3" data-aos="zoom-out" data-aos-delay="500">

                <!-- Article -->
                <article class="overflow-hidden rounded-lg shadow-lg">
                    <a href="{{ route('site.show', ['site' => $site]) }}">
                        <img alt="Placeholder" class="block h-auto w-full" src="https://picsum.photos/600/400/?random">
                    </a>

                    <header class="flex flex-column items-center justify-between leading-tight p-2 md:p-4">
                        <h1 class="text-lg">
                            <a class="no-underline hover:underline text-black" href="{{ route('site.show', ['site' => $site]) }}">
                                {{ $site->name }}
                            </a>
                        </h1>
                        <div class="text-grey-darker pt-2">
                            <p class="text-sm"> Última atualização: {{ $site->updated_at->format('d/m/Y') }} </p>
                            <p class="text-center text-sm"> Às: {{ $site->updated_at->format('H:i') }} </p>
                        </div>
                        
                    </header>

                    <footer class="flex items-center justify-between leading-none p-2 md:p-4">
                        <a class="flex items-center no-underline hover:underline text-black" href="#">
                            <img alt="Placeholder" class="block rounded-full w-8 h-8" src="https://cc.uffs.edu.br/avatar/iduffs/{{ $site->user->uid }}">
                            <p class="ml-2 text-sm">
                                {{ ucwords(strtolower($site->user->name)) }}
                            </p>
                        </a>
                    </footer>

                </article>
                <!-- END Article -->

            </div>
            <!-- END Column -->
        @endforeach
    </div>
    @else
    <div class="flex justify-center pt-28 pb-28">
        <div class="flex flex-column ">
            <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">
                <p class="font-bold">Aviso!</p>
                <p>Parece que você não possui sites.</p>
            </div>  
            <a href="{{ route('site.create') }}" class="pt-4">
                <button class="btn btn-primary bg-blue-500 hover:bg-blue-700 text-white font-bold border-0">Voltar ara a criação de sites</button>
            </a>
        </div>
    </div>
    @endif
</div>
@endsection
