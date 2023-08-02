@extends('layout.main')

@section('title', 'Usuários')

@section('content')
    <div class="container">
        <a href="{{ route('users.create') }}" class="btn btn-primary">Criar Usuário</a>

        <div class="mb-3">
            <label for="search" class="form-label">Pesquisar por usuário</label>
            <input type="text" class="form-control" id="search" placeholder="...digite o nome de um usuário"
                   name="search">
        </div>
        <h1 class="col-md-12 justify-content-center">Modelos</h1>

        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Telefone</th>
                <th scope="col">Detalhe</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <th scope="row">{{ $loop->index + 1 }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone }}</td>
                    <td class="d-flex justify-content-around">
                        <a href="{{ route('users.show', $user->id) }}" class="btn btn-primary">Detalhes</a>
                        <a href="#" class="btn btn-warning">Editar</a>
                        <form action="{{ route('users.destroy', $user->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Deletar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
