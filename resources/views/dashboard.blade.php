{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-jet-welcome />
            </div>
        </div>
    </div>
</x-app-layout> --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            {{ __('Inicial') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-ccuffs overflow-hidden shadow-xl sm:rounded-lg border border-gray-900">
                <div class="p-6 bg-ccuffs-strong sm:px-20 border-b border-gray-900">
                    <div class="mt-8 text-2xl text-gray-300">
                        Boas-vindas!
                    </div>

                    <div class="mt-6 text-gray-400">
                        Essa é a intranet do curso. Ela é um conjunto de sistemas criados para facilitar sua vida acadêmica, além de ajudar em sua carreira profissional e rede de contatos entre ex-alunos do curso. Veja abaixo alguns dos serviços disponíveis.
                    </div>
                </div>

                <div class=" bg-opacity-25 grid grid-cols-1 md:grid-cols-2">
                    <div class="p-6">
                        <div class="flex items-center">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-green-300"><path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                            <div class="ml-4 text-lg text-gray-300 leading-7 font-semibold"><a href="{{ ('profile.show') }}">Minha conta e perfil</a></div>
                        </div>

                        <div class="ml-12">
                            <div class="mt-2 text-sm text-gray-400">
                                Sua conta e perfil na intranet do curso permite que você personalize como é aparece no site, além de agregar informações e permitir uso de nossos serviços online.
                            </div>

                            <a href="{{ ('profile.show') }}">
                                <div class="mt-3 flex items-center text-sm font-semibold text-green-300">
                                    <div>Ver minha conta e perfil</div>

                                    <div class="ml-1 text-green-400">
                                        <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="p-6 border-t border-gray-900 md:border-t-0 md:border-l">
                        <div class="flex items-center">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-green-300"><path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                            <div class="ml-4 text-lg text-gray-300 leading-7 font-semibold"><a href="{{ ('sites.show') }}">Sites pessoais</a></div>
                        </div>

                        <div class="ml-12">
                            <div class="mt-2 text-sm text-gray-400">
                                São páginas pessoais mostradas junto com o site do curso. O endereço dessa página será <code>cc.uffs.edu.br/pessoa/iduffs</code>, onde <code>iduffs</code> será substituído pelo seu idUFFS.
                            </div>

                            <a href="{{ ('sites.show') }}">
                                <div class="mt-3 flex items-center text-sm font-semibold text-green-300">
                                    <div>Ver esse serviço de sites</div>

                                    <div class="ml-1 text-green-400">
                                        <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="p-6 border-t border-gray-900">
                        <div class="flex items-center">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-green-300"><path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                            <div class="ml-4 text-lg text-gray-300 leading-7 font-semibold"><a href="{{ ('aura.show') }}">Assistente virtual <span class="text-gray-500 text-sm font-light">(em breve)</span></a></div>
                        </div>

                        <div class="ml-12">
                            <div class="mt-2 text-sm text-gray-400">
                                Já imaginou ter uma assistente virtual do curso que responda perguntas como datas importantes, horas de ACC, procedimentos da UFFS, enfim?
                            </div>

                            <a href="{{ ('aura.show') }}">
                                <div class="mt-3 flex items-center text-sm font-semibold text-green-300">
                                    <div>Conheça a Aura</div>

                                    <div class="ml-1 text-green-400">
                                        <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="p-6 border-t border-gray-900 md:border-l">
                        <div class="flex items-center">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-green-300"><path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                            <div class="ml-4 text-lg text-gray-300 leading-7 font-semibold">Aplicativo do curso</div>
                        </div>

                        <div class="ml-12">
                            <div class="mt-2 text-sm text-gray-400">
                                Acesse todas as informações e serviços da nossa intranet na palma da sua mão. O aplicativo do curso foi desenvolvido para facilitar a sua vida acadêmica.
                            </div>

                            <div class="mt-3 flex items-center text-sm font-semibold text-gray-500">
                                <div>Lançamento esse ano!</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
