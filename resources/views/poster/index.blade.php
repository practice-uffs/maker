<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Poster') }}
        </h2>
    </x-slot>

    <div class="py-12 m-auto">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-cc-uffs overflow-hidden shadow-xl sm:rounded-lg" style="position: relative">
                
                <iframe src="http://127.0.0.1:8000/assets/lbk/index.html" style="height: 110vh; width: 100%;" name="content" id="content" scrolling="no" allow="display" allow="display-capture"></iframe>
        
            </div>
        </div>
    </div>
</x-app-layout>
