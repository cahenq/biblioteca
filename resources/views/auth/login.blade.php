@extends('components.layoutlogin')

@section('title', 'Login')

@section('content')
    <div class="logo-container">
        <img src="img/logo-escola.png" alt="Logo EET">
    </div>
    <form>
        <h1 class="title">Biblioteca</h1>
        <h2 class="subtitle">EEEFM Estudo e Trabalho</h2>

        <div class="form-group">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" class="form-control" id="email" placeholder="nome@exemplo.com" required>
        </div>

        <div class="form-group">
            <label for="password" class="form-label">Senha</label>
            <input type="password" class="form-control" id="password" placeholder="********" required>
        </div>

        <button class="btn-submit" type="submit">Entrar</button>
    </form>
@endsection
