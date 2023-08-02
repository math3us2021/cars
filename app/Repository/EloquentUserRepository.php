<?php

    namespace App\Repository;

    use App\Http\Requests\StoreUsersRequest;
    use App\Models\User;
    use Illuminate\Support\Facades\Hash;

    class EloquentUserRepository implements UserRepository
    {
        public function add(StoreUsersRequest $request): User
        {
            $user = new User();
            $user->name = $request->name;
            $user->cpf = $request->cpf;
            $user->phone = $request->phone;
            $user->email = $request->email;
//            $user['password'] = Hash::make($request->password);
            $user->password = $request->password;
            $user->save();
            return $user;
        }
    }

