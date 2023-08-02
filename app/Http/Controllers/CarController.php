<?php

    namespace App\Http\Controllers;

    use App\Http\Middleware\Authe;
    use App\Http\Requests\StoreCarRequest;
    use App\Http\Requests\UpdateCarRequest;
    use App\Models\Car;
    use App\Repository\Car\CarRepository;
    use Illuminate\Support\Facades\Auth;

    class CarController extends Controller
    {
        public $types = ['carro', 'moto', 'caminhao', 'caminhonete'];

        public function __construct(
            public readonly CarRepository $carRepository
        ) {
            $this->middleware(Authe::class)->except(['index', 'show']);
        }

        public function index()
        {
            $cars = $this->carRepository->index();
            $user = Auth::user();
            return view('welcome', [
                'cars' => $cars,
                'user' => $user
            ]);
        }

        /**
         * Show the form for creating a new resource.
         */
        public function create()
        {
            $car = null;
            return view('cars.create', [
                'car' => $car,
                'types' => $this->types
            ]);
        }

        /**
         * Store a newly created resource in storage.
         */
        public function store(StoreCarRequest $request)
        {
            dd($request->validated());
            Car::create($request->validated());
            return redirect()->route('cars.index')->with(
                'success', 'Carro cadastrado com sucesso!'
            );
        }

        /**
         * Display the specified resource.
         */
        public function show(Car $car)
        {
            return view('cars.show', [
                'car' => $car
            ]);
        }

        /**
         * Show the form for editing the specified resource.
         */
        public function edit(Car $car)
        {
            return view('cars.create', [
                'car' => $car,
                'types' => $this->types
            ]);
        }

        /**
         * Update the specified resource in storage.
         */
        public function update(UpdateCarRequest $request, Car $car)
        {
            $car->update($request->validated());
            return redirect()->route('cars.index');
        }

        /**
         * Remove the specified resource from storage.
         */
        public function destroy(Car $car)
        {
            $car->delete();
            return redirect()->route('cars.index')->with(
                'success', 'Carro excluído com sucesso!'
            );
        }
    }
