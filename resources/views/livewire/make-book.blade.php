<div class="bg-white overflow-hidden sm:rounded-lg px-2 py-24">
    <div class="flex flex-col text-center w-full mb-20">
        <h2 class="text-2xl text-indigo-500 tracking-widest font-medium title-font mb-1">LIVRO DIGITAL</h2>
        <h1 class="sm:text-2xl text-1xl font-medium title-font text-gray-900">
            Insira o endereço do documento Google que deseja transformar em um livro.
        </h1>
        <form wire:submit.prevent="submit" method="POST" class="flex mt-4 items-center">  
            <div class="relative w-full">
                <input 
                    type="text" wire:model="docsUrl" id="docsUrl" required
                    placeholder="Ex: https://docs.google.com/document/d/14612333lwSmspK--sRXDIaNExssf123pMF06x-XHrHQ/edit" 
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500" 
                >
            </div>
            <button type="submit" class="inline-flex items-center py-2.5 px-3 ml-2 text-sm font-medium text-white bg-indigo-700 rounded-lg border border-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-800">
                <svg class="mr-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
                Buscar
            </button>
        </form>
    </div>

    <div class="mt-12 m-auto items-center justify-center space-y-6 lg:flex lg:space-y-0 lg:space-x-6">
        <div aria-hidden="true" class="w-full rounded-2xl p-6 space-y-8 bg-gray-200">
            @if ($docsContent != null)
                @if ($docsContent['error'] == '')

                        <div class="flex items-center">
                            <div class="w-8 h-8 mr-3 inline-flex items-center justify-center rounded-full bg-indigo-500 text-white flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                </svg>
                            </div>
                            <h5 class="text-xl overflow-hidden text-indigo-500 font-semibold">
                                {{ $docsContent['title'] }}
                            </h5>
                            <div class="form-check form-switch w-100 d-flex flex-row-reverse" >
                                <label class="form-check-label" for="flexSwitchCheckDefault">Tema escuro</label>
                                <input class="form-check-input mr-3" type="checkbox" wire:model="bookDarkTheme" id="flexSwitchCheckDefault">
                            </div>
                        </div>
                        <p class="pl-1 font-medium">Proprietário(s):</p>
                        <p class="pl-3 mt-0 overflow-hidden">
                            @foreach ($docsContent['ownerEmail'] as $owner)
                                @if(isset($owner))
                                    - {{ $owner }}<br>
                                @endif 
                            @endforeach
                        <p>
                        
                        
                        
                        <dd class="group-hover:text-light-red-200 text-sm font-medium sm:mb-4 lg:mb-0 xl:mb-4">
                            <div x-data="{show:false}">
                                <div class="flex justify-center bg-indigo-100 hover:bg-indigo-300 rounded-lg">
                                    <button  @click="show=!show" class="flex items-center justify-center bg-transparent text-indigo-500 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
                                        Mostrar conteúdo
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                        </svg>
                                    </button>
                                </div> 
                                <div class="flex justify-center">
                                    <p class="overflow-hidden bg-red-200 rounded-lg border-2 border-red-300 px-2 mt-2">
                                        Após criar é possível atualizar o conteúdo em Livro digital!
                                    </p>
                                    <button wire:click="createBook" 
                                            type="button"
                                            id="btn-submit-index" 
                                            class="fixed bottom-3.5 center btn rounded-full bg-indigo-500 hover:bg-indigo-700 text-white font-bold border-0" 
                                            onclick="   el = document.getElementById('btn-submit-index'); 
                                                        el.innerHTML = '<i class=\'bi bi-arrow-repeat\'></i>'; 
                                                        el.disabled = true; 
                                                        el.innerHTML = '<div class=\'spinner-border\'></div>Aguarde';">
                                        Criar livro!
                                    </button>
                                </div>
                                <div x-show="show" class="bg-white border px-4 py-3 my-2 text-gray-700 rounded-lg">
                                    <div style="white-space: pre-wrap;">
                                        {{ $docsContent['content'] }}
                                    </div>
                                    @if ($createBookError)
                                        <div class="pt-4  flex justify-center">
                                            <p class="text-center font-medium text-red-700 font-bold pt-4">{{ $docsContent['error'] }}</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </dd>

                @else
                    <p class="pb-4 text-center font-medium text-red-700 font-bold pt-4">{{ $docsContent['error'] }}</p>
                @endif
            @else
                <div class="flex items-center justify-center p-14">
                    <div class="flex flex-column ">
                        <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">
                            <p class="font-bold">Aviso!</p>
                            <p>Parece que você não buscou nenhum conteúdo.</p>
                            <p>Insira um link válido e clique em buscar...</p>
                        </div>  
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
