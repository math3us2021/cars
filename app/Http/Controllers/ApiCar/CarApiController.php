<?php

    namespace App\Http\Controllers\ApiCar;

    use App\Http\Controllers\Controller;
    use App\Http\Middleware\Authe;
    use App\Http\Requests\StoreCarRequest;
    use App\Http\Requests\UpdateCarRequest;
    use App\Models\Car;
    use App\Models\User;
    use App\Repository\Car\CarRepository;
    use Illuminate\Http\Request;

    use Illuminate\Support\Facades\Auth;

    class CarApiController extends Controller
    {
        public $types = ['carro', 'moto', 'caminhao', 'caminhonete'];

        public function __construct(
            public readonly CarRepository $carRepository
        ) {
        }

        public function index(Request $request)
        {
            return $this->carRepository->index($request);
        }

        public function store(StoreCarRequest $request)
        {
            $coverPath = $request->hasFile('cover')
                ? $request->file('cover')->store('covers', 'public')
                : null;
            $request->merge(['cover' => $coverPath]);
            $cars = $this->carRepository->store($request);
            return response()
                ->json($cars, 201);
        }

        public function show(int $id)
        {
            $car = Car::with([
                'users' => function ($query) {
                    $query->select('id', 'name', 'email');
                }
            ])->find($id);
            //            $car = $this->carRepository->show($id);
            return $car == null
                ? response()->json([
                    'message' => 'Carro não encontrado!'
                ], 404)
                : $car;
        }

        public function update(Car $car, StoreCarRequest $request)
        {
            $coverPath = $request->hasFile('cover')
                ? $request->file('cover')->store('covers', 'public')
                : null;
            $request->merge(['cover' => $coverPath]);
            $cars = $this->carRepository->update($car, $request);
            return response()
                ->json($cars, 200);
        }

        public function destroy(int $id)
        {
            $this->carRepository->destroy($id);
        }

        public function carsPerUser(int $id)
        {
            $cars = Car::where('user_id', $id)->get();
            return $cars;
        }
    }
