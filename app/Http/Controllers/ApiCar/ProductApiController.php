<?php

    namespace App\Http\Controllers\ApiCar;

    use App\Http\Controllers\Controller;
    use App\Http\Middleware\Authe;
    use App\Http\Requests\StoreCarRequest;
    use App\Http\Requests\UpdateCarRequest;
    use App\Models\Car;
    use App\Repository\Car\CarRepository;
    use Illuminate\Support\Facades\Auth;

    class ProductApiController extends Controller
    {
        public function __construct(
            public readonly CarRepository $carRepository
        ) {
        }

        public function index()
        {
            return $this->carRepository->index();
        }

        public function store( StoreCarRequest $request)
        {

            dd($request->all());
}
          }
