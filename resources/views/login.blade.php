@extends("layouts.base-raw", ["view_name" => "Login"])

@section('content')
<div class="login container row mx-auto login-size" >
    <div class="login-img col-md-5 pr-lg-5 mb-5 mb-md-0 mt-5">
        <div class="text-center">
            <img src="assets/img/practice-maker.png" alt="" class="mb-5 img-fluid" width="70%">
        </div>
        
        <h1>Conecte-se ao PRACTICE <strong>{{ config('app.name') }}</strong></h1>
        <p class="font-italic text-muted mb-0">Utilize seu idUFFS para conectar-se e aproveitar tudo que nossa plataforma oferece.</p>
    </div>

    <form id="loginForm" class="login-form col-md-6 mx-auto form-signin text-center " action="" method="post" >
        @csrf
        <a href="{{ route('index') }}">
            <img class=" login-img  mb-5" src="{{ asset('img/logo-practice.png') }}" alt="Logo do Practice" width="272" >
            <div class="text-center maker-icon">
                <h1><strong>Maker</strong></h1>
            </div>
            <img src="assets/img/practice-maker.png" alt="" class="maker-img-litle img-fluid mb-5 mt-1" width="20%">
        </a>

        <h1 class="h4 mb-3 font-weight-normal">Entre com seu idUFFS</h1>
        @if ($errors->any()) 
            <div class="alert-error">
                @foreach ($errors->all() as $error)
                    {{ $error }}
                @endforeach
            </div>
        @endif
        
        <!-- idUFFS -->
        <div class="input-group col-lg-6 mb-4">
            <div class="input-group-prepend">
                <span class="input-group-text bg-white px-4 border-md border-right-0">
                    <i class="bi bi-person text-muted"></i>
                </span>
            </div>
            <input type="text" placeholder="idUFFS" required="" autofocus=""
                name="username" value="{{ old('username') }}" placeholder="idUFFS"
                class="form-control validate @error('username') is-invalid @enderror card__input" >
            
        </div>
        <!-- Password -->
        <div class="input-group col-lg-6 mb-4">
            <div class="input-group-prepend">
                <span class="input-group-text bg-white px-4 border-md border-right-0">
                    <i class="bi bi-lock-fill text-muted"></i>
                </span>
            </div>
            <input type="password" name="password" placeholder="Senha" required="" placeholder="Senha"
                   class="form-control @error('password') is-invalid @enderror validate card__input"
                   autocomplete="current-password">
        </div>

        <button type="submit" id="btn-submit" class="btn btn-lg btn-block btn-primary col-12" onclick="el = document.getElementById('btn-submit'); el.innerHTML = '<i class=\'bi bi-arrow-repeat\'></i>'; el.disabled = true; el.innerHTML = '<div class=\'spinner-border\'></div> Aguarde'; document.forms.loginForm.submit();">ENTRAR</button>

        <!-- Divider Text -->
        <div class="form-group col-lg-12 mx-auto d-flex align-items-center my-4">
            <div class="border-bottom w-100 ml-5"></div>
            <div class="border-bottom w-100 mr-5"></div>
        </div>
        <nav class="login-help-links text-center mx-auto" role="navigation">
            <a href="https://id.uffs.edu.br/id/XUI/?realm=/#forgotUsername/">Não sabe seu IdUFFS?</a>
            <div>|</div>
            <a href="https://id.uffs.edu.br/id/XUI/?realm=/#passwordReset/">Esqueceu a Senha?</a>
            <div>|</div>
            <a href="https://ati.uffs.edu.br/public.pl?CategoryID=17">Ajuda</a>
        </nav>
    </form>
</div>
@endsection