@extends('layout.main')

@section('title', 'Detalhes do carro')

@section('content')
    <div class="container">


        <h1 class="col-md-12 justify-content-center">Detalhes do Carro</h1>

        <div class="card" style="width: 18rem;">
            <img src="/img/car2.png" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Modelo: <strong>{{ $car->modelo }}</strong> </h5>
                <h5 class="card-title">Marca: <strong>{{ $car->marca }}</strong> </h5>
                <p class="card-text">Ano: <strong>{{ $car->ano }}</strong></p>
                <p class="card-text">Valor: <strong>{{ $car->valor }}</strong></p>
                <p class="card-text">Placa: <strong>{{ $car->placa }}</strong></p>
                <p class="card-text">Chassi: <strong>{{ $car->chassi }}</strong></p>
                <p class="card-text">Renavan: <strong>{{ $car->renavam }}</strong></p>
                <p class="card-text">Cor: <strong>{{ $car->cor }}</strong></p>
                <a href="/" class="btn btn-primary">Voltar</a>
            </div>
        </div>
    </div>
@endsection
