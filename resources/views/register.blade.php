<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login e Cadastro no Laravel 10 - Página de Cadastro</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="row justify-content-center mt-5">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h1 class="card-title">Cadastro</h1>
                    </div>
                    <div class="card-body">
                    @if(session()->has('sucess'))
                        <p class="alert alert-success">
                            {{session()->get('sucess')}}
                        </p>
                    @endif
                        <form action="{{ route ('save') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Nome</label>
                                <input type="text" name="name" class="form-control" id="name" placeholder="Escreva aqui" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">E-mail</label>
                                <input type="email" name="email" class="form-control" id="email" placeholder="exemplo@gmail.com" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Senha</label>
                                <input type="password" name="password" class="form-control" id="password" required>
                            </div>

                            <div class="inline">
                            <button type="submit" class="btn btn-primary">Cadastrar</button>

                            <a class="btn btn-success" href="{{ route('login') }}" style="position: absolute; right:16px;" role="button">Log-in</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>