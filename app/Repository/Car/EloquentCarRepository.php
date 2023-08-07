<?php

    namespace App\Repository\Car;

    use App\Http\Requests\StoreCarRequest;
    use App\Models\Car;
    use http\Env\Request;
    use Illuminate\Support\Facades\DB;

    class EloquentCarRepository implements CarRepository
    {
        public function index($request): array
        {
            $cars = DB::transaction(function () {
                $res = Car::select(
                    'cars.id as car_id', 'cars.modelo', 'cars.marca',
                    'cars.ano', 'cars.type', 'cars.cover',
                    'cars.valor', 'users.id as user_id',
                    'users.name as user_name', 'users.email as user_email',
                    'users.phone as user_phone'
                )
                    ->join('users', 'users.id', '=', 'cars.user_id')
                    ->get();
                return $res;
            });
            return $cars;
        }

        public function store(StoreCarRequest $request): Car
        {
//                        dd($request->all());
            $car = new Car();
            $car->modelo = $request->modelo;
            $car->marca = $request->marca;
            $car->type = $request->type;
            $car->ano = $request->ano;
            $car->cor = $request->cor;
            $car->placa = $request->placa;
            $car->chassi = $request->chassi;
            $car->renavam = $request->renavam;
            $car->valor = $request->valor;
            $car->user_id = $request->user_id;
            $car->cover = $request->hasFile('cover')
                ? $request->file('cover')->store('covers', 'public')
                : null;
//            dd($car);
            $car->save();

            return $car;
        }

        public function show(int $id): Car | null
        {
            $car = Car::find($id);
            return $car;
        }

        public function update(Car $car, StoreCarRequest $request): Car
        {
            $car->modelo = $request->modelo;
            $car->marca = $request->marca;
            $car->type = $request->type;
            $car->ano = $request->ano;
            $car->cor = $request->cor;
            $car->placa = $request->placa;
            $car->chassi = $request->chassi;
            $car->renavam = $request->renavam;
            $car->valor = $request->valor;
            $car->user_id = $request->user_id;
            $car->cover = $request->hasFile('cover')
                ? $request->file('cover')->store('covers', 'public')
                : null;
            $car->save();

            return $car;
        }

        public function destroy(int $id)
        {
            Car::destroy($id);
            return response()->json([
                'message' => 'Carro deletado com sucesso!'
            ], 204);
        }
    }
