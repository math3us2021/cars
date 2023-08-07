@extends('layout.main')
@section('title', 'Create Car')

@section('content')
    <div class="container">
        <form
            enctype="multipart/form-data"
            @if($car != null)
                action="{{ route('cars.update', $car->id) }}" method="POST">
            @method('PUT')
            @else
                action="{{ route('cars.store') }}" method="POST">
            @endif

            @csrf
            <div class="row">
                <div class="mb-3 col-md-4">
                    <label for="modelo" class="form-label">Modelo</label>
                    <input type="text" class="form-control" id="modelo" placeholder="Volkswagen" name="modelo"
                           <?php
                           if ($car) { ?> value="{{ $car->modelo }}" <?php
                                                                     } ?>>
                </div>
                <div class="mb-3 col-md-4">
                    <label for="marca" class="form-label">Marca</label>
                    <input type="text" class="form-control" id="marca" placeholder="Gol" name="marca"
                           <?php
                           if ($car) { ?> value="{{ $car->marca }}" <?php
                                                                    } ?>>
                </div>
                <div class="mb-3 col-md-4">
                    <label for="cor" class="form-label">Cor</label>
                    <input type="text" class="form-control" id="cor" placeholder="Vermelho" name="cor"
                           <?php
                           if ($car) { ?> value="{{ $car->cor }}" <?php
                                                                  } ?>>
                </div>
            </div>


            <div class="row">
                <div class="mb-3 col-md-4">
                    <label for="ano" class="form-label">Ano</label>
                    <input type="date" class="form-control" id="ano" placeholder="2021" name="ano"
                           <?php
                           if ($car) { ?> value="{{ $car->ano }}" <?php
                                                                  } ?>>
                </div>
                <div class="mb-3 col-md-4">
                    <label for="placa" class="form-label">Placa</label>
                    <input type="text" class="form-control" id="placa" name="placa" placeholder="ABC-1234"
                           <?php
                           if ($car) { ?> value="{{ $car->placa }}" <?php
                                                                    } ?>>
                </div>
                <div class="mb-3 col-md-4">
                    <label for="chassi" class="form-label">Chassi</label>
                    <input type="number" class="form-control" id="chassi" placeholder="123456789" name="chassi"
                           <?php
                           if ($car) { ?> value="{{ $car->chassi }}" <?php
                                                                     } ?>>
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col-md-4">
                    <label for="renavam" class="form-label">Renavam</label>
                    <input type="text" class="form-control" id="renavam" placeholder="123456789" name="renavam"
                           <?php
                           if ($car) { ?> value="{{ $car->renavam }}" <?php
                                                                      } ?>>
                </div>
                <div class="mb-3 ml-1 col-md-8 row">
                    <label for="cover" class="form-label">Foto do carro</label>
                    <input type="file"
                           class="form-control"
                           id="cover"
                           name="cover"
                           accept="image/git image/png, image/jpeg"
                    >
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col-md-4">
                    <label for="valor" class="form-label">Valor</label>
                    <input type="number" class="form-control" id="valor" placeholder="Preto" name="valor"
                           <?php
                           if ($car) { ?> value="{{ $car->valor }}" <?php
                                                                    } ?>>
                </div>

                <div class="mb-3 col-md-2">
                    <label for="cor" class="form-label">Tipo de Veiculo</label>
                    <select class="form-control" aria-label="Default select example" name="type">
                        @foreach($types as $type)
                            <option value="{{ $type }}"
                                    <?php
                                if ($car) {
                                    if ($car->type == $type) {
                                        echo 'selected';
                                    }
                                } ?>>{{ $type }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            @if($car)
                <input type="submit" class="btn btn-primary" value="Editar anuncio">
            @else
                <input type="submit" class="btn btn-primary" value="Criar anuncio">
            @endif
            <a href="{{ route('cars.index') }}" class="btn btn-warning">Voltar</a>
        </form>
        @push('scripts')
            <script>
                $(document).ready(function () {
                    $('#placa').mask('AAA-0000');
                });
            </script>
        @endpush
    </div>
@endsection
