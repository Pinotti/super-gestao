@extends('site.layouts.basico')

@section('titulo', 'Login')

@section('conteudo')    

<div class="conteudo-pagina">
    <div class="titulo-pagina">
        <h1>Login</h1>
    </div>

    <div class="informacao-pagina">
        <div style="width: 30%; margin-left: auto; margin-right: auto;">
            <form action="{{ route('site.login') }}" method="post">
                @csrf
                <input type="text" name="usuario" placeholder="Usuário" class="borda-preta">
                {{ $errors->has('usuario') ? $errors->first('usuario') : '' }}
                <input type="password" name="senha" placeholder="Senha" class="borda-preta">
                {{ $errors->has('senha') ? $errors->first('senha') : '' }}
                <button type="submit" class="borda-preta">Acessar</button>
            </form>
            {{ isset($erro) && $erro != '' ? $erro : '' }}
        </div>
    </div>  
</div>

@include('site.layouts._partials.rodape')

@endsection
