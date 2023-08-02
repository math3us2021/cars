@extends('layout.main')
{{--@section('styles')--}}
@section('title', 'Deshboard')

@section('content')
    <div class="container">
        <h4 class="col-md-12 justify-content-center mb-5">Seja bem vindo {{ $user->name }}</h4>
        <a href="{{ route('cars.create') }}" class="btn btn-primary">Criar Carro</a>

        <div class="mb-3">
            <label for="search" class="form-label">Pesquisar por carro</label>
            <input type="text" class="form-control" id="search" placeholder="...digite o nome de um carro"
                   name="search">
        </div>
        <h1 class="col-md-12 justify-content-center">Modelos</h1>

        <div class="row justify-content-between">
            @foreach($cars as $car)
                <div class="card" style="width: 18rem; margin-top: 10px">
                    @switch($car->type)
                        @case('carro')
                            <img src="img/car.png" class="card-img-top" alt="...">
                            @break
                        @case('moto')
                            <img src="img/moto.png" class="card-img-top" alt="...">
                            @break
                        @case('caminhonete')
                            <img src="img/caminhonete.png" class="card-img-top" alt="...">
                            @break
                    @endswitch
                    {{--                    <img src="img/car.png" class="card-img-top" alt="...">--}}
                    <div class="card-body">
                        <h5 class="card-title">{{ $car->modelo }} - {{ $car->marca }}</h5>
                        <h5 class="card-title ">R${{ $car->valor }}</h5>
                        <p class="card-text">Proprietário:
                            <a href="{{ route('users.show', $car->user_id) }}" class="link-primary">
                                {{ $car->user_name }}</a>
                        </p>
                        <p class="card-text">Telefone: {{ $car->user_phone }}</p>
                        <div class="row justify-content-around">
                            <a href="{{ route('cars.show' , $car->car_id) }}" class="bi bi">Detalhes</a>
                            <a href="{{ route('cars.edit', $car->car_id) }}" class="bi bi-pen text-warning">Editar</a>
                            <form action="{{ route('cars.destroy', $car->car_id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <a type="submit" class="bi bi-trash3 text-danger"></a>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
