@extends('layouts.base')
@section('content')
<div class="container my-12 mx-auto px-4 md:px-12">
        
    <div class="flex flex-wrap -mx-1 lg:-mx-4">

        <!-- Column -->
        @foreach($sites as $site)
            <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/3" data-aos="zoom-out" data-aos-delay="500">

                <!-- Article -->
                <article class="overflow-hidden rounded-lg shadow-lg">

                    {{-- <a href="{{ route('site.show', ['site' => $site]) }}"> --}}
                    <a href="#">
                        <img alt="Placeholder" class="block h-auto w-full" src="https://picsum.photos/600/400/?random">
                    </a>

                    <header class="flex flex-column items-center justify-between leading-tight p-2 md:p-4">
                        <h1 class="text-lg">
                            {{-- <a class="no-underline hover:underline text-black" href="{{ route('site.show', ['site' => $site]) }}"> --}}
                            <a class="no-underline hover:underline text-black" href="#">
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
</div>
@endsection
