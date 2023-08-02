<?php

    namespace App\Repository\Car;

    use App\Models\Car;
    use Illuminate\Support\Facades\DB;

    class EloquentCarRepository implements CarRepository
    {
        public function index()
        {
            $cars = DB::transaction(function () {
                $res = Car::select(
                    'cars.id as car_id', 'cars.modelo', 'cars.marca',
                    'cars.ano','cars.type',
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
    }
