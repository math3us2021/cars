@extends('layout.main')

@section('title', 'Users')

@section('content')
    <div class="container">
        <h1>Usuário</h1>
        <form action="{{ route('users.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="mb-3 col-md-8">
                    <label for="name" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="name" placeholder="Nome" name="name">
                </div>
                <div class="mb-3 col-md-4">
                    <label for="cpf" class="form-label">CPF</label>
                    <input type="text" class="form-control" id="cpf" name="cpf">
                </div>

            </div>
            <div class="row">
                <div class="mb-3 col-md-4">
                    <label for="phone" class="form-label">Telefone</label>
                    <input type="text" class="form-control" id="phone" name="phone">
                </div>
                <div class="mb-3 col-md-4">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="text" class="form-control" id="email" placeholder="E-mail" name="email">
                </div>
                <div class="mb-3 col-md-4">
                    <label for="password" class="form-label">Senha</label>
                    <input type="password" class="form-control" id="password" placeholder="Senha" name="password">
                </div>
            </div>

            <input type="submit" class="btn btn-primary" value="Criar Usuário">
    </form>
    {{--    @push('scripts')--}}
    {{--        <script>--}}
    {{--            $(document).ready(function () {--}}
    {{--                $('#phone').mask('(99) 99999-9999');--}}
    {{--            });--}}
    {{--        </script>--}}
    {{--        @endpush--}}
    </div>
@endsection


