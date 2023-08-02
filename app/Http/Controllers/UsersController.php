<?php

    namespace App\Http\Controllers;

    use App\Http\Middleware\Authe;
    use App\Models\User;
    use App\Http\Requests\StoreUsersRequest;
    use App\Http\Requests\UpdateUsersRequest;
    use App\Repository\UserRepository;
    use Illuminate\Support\Facades\Auth;

    class UsersController extends Controller
    {
        public function __construct(
            private readonly UserRepository $userRepository
        ) {
            $this->middleware(Authe::class);

        }

        public function index()
        {
            $search = request('search');
            if ($search) {
                $users = User::where([
                    ['name', 'like', '%'.$search.'%']
                ]);
            } else {
                $users = User::all();
            }
            return view('users.index', [
                'users' => $users
            ]);
        }

        public function create()
        {
            return view('users.create');
        }


        public function store(StoreUsersRequest $request)
        {
            //            dd($request->all());
            $user = $this->userRepository->add($request);
            Auth::login($user);
            return to_route('cars.index');
        }

        public function show($users)
        {
            $user = User::findOrFail($users);
            return view('users.show', [
                    'users' => $user
                ]
            );
        }

        public function edit(User $users)
        {
            //
        }

        public function update(UpdateUsersRequest $request, Users $users)
        {
            //
        }

        /**
         * Remove the specified resource from storage.
         */
        public function destroy(Users $users)
        {
            //
        }
    }
