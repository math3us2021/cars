@extends('layout.main')
{{--@section('styles')--}}
@section('title', 'Deshboard')

@section('content')
    <div class="container">
        <p>Seja bem vindo <h4 class="col-md-12 justify-content-center mb-5">{{ $user->name }}</h4></p>
        <a href="{{ route('cars.create') }}" class="btn btn-primary">Criar Carro</a>

        <div class="col-md-12" id="search-container">
        <label for="search" class="form-label">Pesquisar por carro</label>
            <input type="text" class="form-control" id="search" placeholder="...digite o nome de um carro"
                   name="search">
        </div>
        <h1 class="col-md-12 justify-content-center">Modelos</h1>

        <div class="row justify-content-between">
            @foreach($cars as $car)
                <div class="card" style="width: 18rem; margin-top: 10px">
                    @if($car->cover === null)
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
                    @else
                        <img src="{{ asset('storage/'. $car->cover) }}" class="card-img-top" style="height: 250px" alt="...">
                    @endif
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
                                <a href="{{ route('cars.edit', $car->car_id) }}"
                                   class="bi bi-pen text-warning">Editar</a>
                                <form id="delete-car-form-{{ $car->car_id }}" action="{{ route('cars.destroy', $car->car_id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-link" onclick="deleteCar({{ $car->car_id }})">
                                        <i class="bi bi-trash3 text-danger"></i>
                                    </button>
                                </form>

                                <script>
                                    function deleteCar(carId) {
                                        if (confirm("Tem certeza que deseja deletar este carro?")) {
                                            document.getElementById('delete-car-form-' + carId).submit();
                                        }
                                    }
                                </script>
                            </div>
                        </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
