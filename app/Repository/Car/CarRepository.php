<?php

    namespace App\Repository\Car;

    use App\Http\Requests\StoreCarRequest;
    use App\Models\Car;

    interface CarRepository
    {
        public function index($request): array;
        public function store(StoreCarRequest $request): Car;
        public function show(int $id): Car | null;
        public function update(Car $car, StoreCarRequest $request): Car;
        public function destroy(int $id);

    }
