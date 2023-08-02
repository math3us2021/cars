@extends('layout.main')

@section('title', 'Detalhes do usuário')

@section('content')
    <div class="container">


        <h1 class="col-md-12 justify-content-center">Detalhes do {{ $users->name }}</h1>

        <div class="card" style="width: 18rem;">
            <img src="/img/casal.png" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"><strong>Name: {{ $users->name }}</strong> </h5>
                <p class="card-text">CPF: <strong>{{ $users->cpf }}</strong></p>
                <p class="card-text">Email: <strong>{{ $users->email }}</strong></p>
                <p class="card-text"><strong>Telefone: {{ $users->phone }}</strong></p>
                <a href="/" class="btn btn-primary">Voltar</a>
            </div>
        </div>
    </div>
@endsection
