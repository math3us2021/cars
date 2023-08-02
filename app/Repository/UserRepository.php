<?php

    namespace App\Repository;

    use App\Http\Requests\StoreUsersRequest;
    use App\Models\User;

    interface UserRepository
    {
        public function add(StoreUsersRequest $request): User;
    }
