<div>
    <section class="px-4 sm:px-6 lg:px-4 xl:px-6 pt-4 pb-4 sm:pb-6 lg:pb-4 xl:pb-6 space-y-4">
        <header class="flex items-center justify-between">
        <h2 class="text-lg leading-6 font-medium text-black">Conteúdos digitais</h2>
        </header>
        @if ($this->getHtmlDocs() != null)
            <h3 class="text-lg leading-6 font-medium text-black text-center">Em HTML</h3>
            <form class="relative">
            <ul class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-1 xl:grid-cols-2 gap-4">
            @foreach ($this->getHtmlDocs() as $doc)
                <li x-for="item in items">
                    <a :href="item.url" class="bg-purple-100 hover:bg-purple-500 hover:border-transparent hover:shadow-lg group block rounded-lg p-4 border border-purple-900">
                    <dl class="grid sm:block lg:grid xl:block grid-cols-2 grid-rows-2 items-center">
                        <div>
                        <dt class="sr-only">Título</dt>
                        <dd class="group-hover:text-white leading-6 font-medium text-black">
                            {{ $doc['title'] }}
                        </dd>
                        </div>
                        <div>
                        <dt class="sr-only">Category</dt>
                        <dd class="group-hover:text-light-red-200 text-sm font-medium sm:mb-4 lg:mb-0 xl:mb-4">
                            <p>Donos deste documento:</p>
                            @foreach ($doc['ownerEmail'] as $owner)
                                @if(isset($owner))
                                    <p>{{ $owner }}<p>
                                @endif  
                            @endforeach
                        </dd>
                        <dd class="group-hover:text-light-red-200 text-sm font-medium sm:mb-4 lg:mb-0 xl:mb-4">
                            <div x-data="{show:false}">
                                <p class="flex">
                                    <button  @click="show=!show" class="bg-purple-400 text-gray-200 rounded hover:bg-purple-700 px-4 py-3 text-sm focus:outline-none" type="button">
                                    Mostrar Conteúdo
                                    </button>
                                </p> 
                                <div x-show="show" class="bg-white border px-4 py-3 my-2 text-gray-700 rounded-lg">
                                    {!! $doc['content'] !!}
                                </div>
                            </div>
                        </dd>
                        </div>
                    </dl>
                    </a>
                </li>
            @endforeach
            </ul>
        @else
        <h3 class="text-lg leading-6 font-medium text-black p-9 text-center ">Não há docs em html ou ou o id da pasta está errado</h3>
        @endif
        @if ($this->getPlainTextDocs() != null)
            <h3 class="text-lg leading-6 font-medium text-black p-9 text-center ">Em Texto</h3>
            <ul class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-1 xl:grid-cols-2 gap-4">
                @foreach ($this->getPlainTextDocs() as $doc)
                    <li x-for="item in items">
                        <a :href="item.url" class="bg-green-100 hover:bg-green-500 hover:border-transparent hover:shadow-lg group block rounded-lg p-4 border border-green-900">
                        <dl class="grid sm:block lg:grid xl:block grid-cols-2 grid-rows-2 items-center">
                            <div>
                            <dt class="sr-only">Título</dt>
                            <dd class="group-hover:text-white leading-6 font-medium text-black">
                                {{ $doc['title'] }}
                            </dd>
                            </div>
                            <div>
                            <dt class="sr-only">Category</dt>
                            <dd class="group-hover:text-light-red-200 text-sm font-medium sm:mb-4 lg:mb-0 xl:mb-4">
                                <p>Donos deste documento:</p>
                                @foreach ($doc['ownerEmail'] as $owner)
                                    @if(isset($owner))
                                        <p>{{ $owner }}<p>
                                    @endif  
                                @endforeach
                            </dd>
                            <dd class="group-hover:text-light-red-200 text-sm font-medium sm:mb-4 lg:mb-0 xl:mb-4">
                                <div x-data="{show:false}">
                                    <p class="flex">
                                        <button  @click="show=!show" class="bg-green-400 text-gray-200 rounded hover:bg-green-700 px-4 py-3 text-sm focus:outline-none" type="button">
                                        Mostrar Conteúdo
                                        </button>
                                    </p> 
                                    <div x-show="show" class="bg-white border px-4 py-3 my-2 text-gray-700 rounded-lg">
                                        <div style="white-space: pre-wrap;">
                                            {{ $doc['content'] }}
                                        </div>
                                    </div>
                                </div>
                            </dd>
                            </div>
                        </dl>
                        </a>
                    </li>
                @endforeach
                </ul>
            @else
            <h3 class="text-lg leading-6 font-medium text-black p-9 text-center ">Não há docs em texto ou ou o id da pasta está errado</h3>
            @endif
    </section>
</div>
