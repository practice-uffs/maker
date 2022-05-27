<div>
    <form wire:submit.prevent="submit" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <div class="mb-4">
            <label for="docsUrl" class="block text-gray-700 text-sm font-bold mb-2" for="username">
            Endereço do documento Google que deseja transformar em um livro
            </label>
            <input type="text" wire:model="docsUrl" id="docsUrl" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="text" placeholder="Ex: https://docs.google.com/document/d/14612333lwSmspK--sRXDIaNExssf123pMF06x-XHrHQ/edit">
        </div>
        <div class="flex items-center justify-center">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
                Ache meu livro!
            </button>
        </div>
    </form>

    @if ($docsContent != null)
        @if ($docsContent['error'] == '')
            <div class="flex flex-col justify-center">
                <p class="font-medium pl-4">Título: {{ $docsContent['title'] }}</p>
                <p class="pl-4 font-medium">Donos do arquivo:</p>
                @foreach ($docsContent['ownerEmail'] as $owner)
                    @if(isset($owner))
                        <p class="pl-5">{{ $owner }}<p>
                    @endif 
                @endforeach
                <dd class="group-hover:text-light-red-200 text-sm font-medium sm:mb-4 lg:mb-0 xl:mb-4">
                    <div x-data="{show:false}">
                        <p class="flex justify-center">
                            <button  @click="show=!show" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
                            Verifique se está tudo certo
                            </button>
                        </p> 
                        <div x-show="show" class="bg-white border px-4 py-3 my-2 text-gray-700 rounded-lg">
                            <div style="white-space: pre-wrap;">
                                {{ $docsContent['content'] }}
                            </div>
                            <div class="flex justify-content-around">
                                <button wire:click="createBook('dark')" 
                                        type="button"
                                        id="btn-submit-index" 
                                        class="btn btn-primary bg-blue-500 hover:bg-blue-700 text-white font-bold border-0" 
                                        onclick="   el = document.getElementById('btn-submit-index'); 
                                                    el.innerHTML = '<i class=\'bi bi-arrow-repeat\'></i>'; 
                                                    el.disabled = true; 
                                                    el.innerHTML = '<div class=\'spinner-border\'></div>Aguarde';">
                                    Está tudo certo, transforme em um e-book versão dark!
                                </button>
                                <button wire:click="createBook('light')" 
                                        type="button"
                                        id="btn-submit-index" 
                                        class="btn btn-primary bg-blue-500 hover:bg-blue-700 text-white font-bold border-0" 
                                        onclick="   el = document.getElementById('btn-submit-index'); 
                                                    el.innerHTML = '<i class=\'bi bi-arrow-repeat\'></i>'; 
                                                    el.disabled = true; 
                                                    el.innerHTML = '<div class=\'spinner-border\'></div>Aguarde';">
                                    Está tudo certo, transforme em um e-book versão light!
                                </button>
                            </div>
                            @if ($createBookError)
                                <div class="pt-4  flex justify-center">
                                    <p class="text-center font-medium text-red-700 font-bold pt-4">{{ $docsContent['error'] }}</p>
                                </div>
                            @endif
                        </div>
                    </div>
                    
                </dd>
            
            </div>
        @else
            <p class="pb-4 text-center font-medium text-red-700 font-bold pt-4">{{ $docsContent['error'] }}</p>
        @endif
    @else
        <div class="flex flex-col justify-center pb-5">
            <p class="text-center font-medium text-gray-700 font-bold">Aqui estará o seu documento assim que você procurá-lo</p>
        </div>
    @endif
</div>
