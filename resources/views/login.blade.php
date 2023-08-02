@extends('layout.main')

@section('title', 'Login')

@section('content')
    <div class="container">
        <h1 class="mt-3">login</h1>
        <form method="POST">
            @csrf
            <div class="mb-3 col-md-4">
                <label for="email" class="form-label">E-mail</label>
                <input type="text" class="form-control" id="email" placeholder="E-mail" name="email">
            </div>
            <div class="mb-3 col-md-4">
                <label for="password" class="form-label">Senha</label>
                <input type="password" class="form-control" id="password" placeholder="Senha" name="password">
            </div>
            <input type="submit" class="mb-3 btn btn-primary" value="Entrar">
        </form>
        <a href="{{ route('users.create') }}" class="--bs-primary">Criar Conta</a>
    </div>
@endsection


