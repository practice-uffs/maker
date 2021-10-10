@extends('layouts.base')
@section('content')
<div class="py-12">
    <div class="flex justify-evenly pb-5">
        <div class="flex flex-row justify-center">
            <a href="{{ route('sites') }}">
                <button
                id="btn-submit-index" 
                class="btn btn-primary bg-blue-500 hover:bg-blue-700 text-white font-bold border-0" 
                onclick="   el = document.getElementById('btn-submit-index'); 
                            el.innerHTML = '<i class=\'bi bi-arrow-repeat\'></i>'; 
                            el.disabled = true; 
                            el.innerHTML = '<div class=\'spinner-border\'></div>Aguarde'; 
                            ">Ir para os meus Sites</button></a>
        </div>

        <div class="flex flex-column">
            <a href="{{ route('site.update', ['siteToUpdate' => $site]) }}">
                <button
                id="btn-submit-update" 
                class="btn btn-primary bg-blue-500 hover:bg-blue-700 text-white font-bold border-0" 
                onclick="   el = document.getElementById('btn-submit-update'); 
                            el.innerHTML = '<i class=\'bi bi-arrow-repeat\'></i>'; 
                            el.disabled = true; 
                            el.innerHTML = '<div class=\'spinner-border\'></div>Aguarde'; 
                            ">Atualizar Site</button></a>
        </div>
    </div>
    <div>
        <?php 
        use Illuminate\Support\Facades\Storage;
        foreach( glob(Storage::disk('sites')->path($site->google_drive_id)."/*.html") as $path){
            readfile( $path );
            echo "<hr>";
        }
        ?>
    </div>
</div>
@endsection
