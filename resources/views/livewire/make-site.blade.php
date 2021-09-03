<div>
    <form wire:submit.prevent="submit" method="POST" class="bg-white rounded px-8 pt-6 pb-8 mb-4">
        <div class="mb-4">
            <label for="docsUrl" class="block text-gray-700 text-sm font-bold mb-2" for="username">
            Endereço do documento Google que deseja transformar em um site.
            </label>
            <input type="text" wire:model="docsUrl" id="docsUrl" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="text" placeholder="Ex: https://docs.google.com/document/d/14612333lwSmspK--sRXDIaNExssf123pMF06x-XHrHQ/edit">
            
            <label for="docsUrl" class="pt-4 block text-gray-700 text-sm font-bold mb-2" for="username">
                Endereço que deseja para o site.
            </label>
            <input type="text" wire:model="siteUrl" id="docsUrl" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="text" placeholder="Ex: meusitedeEngenharia" required>
        </div>
        <div class="flex items-center justify-center">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Ache meu site!
            </button>
        </div>
    </form>
    @if ($createSiteError != null)
        <div class="pt-1 pb-3  flex justify-center">
            <p class="text-center font-medium text-red-700 font-bold pt-4">Algum erro ocorreu durante a criação do seu site.</p>
        </div>
    @endif
</div>
