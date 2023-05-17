<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="./css/login.css">
    <link rel="stylesheet" type="text/css" href="./css/styles.css">
    <title>Entrar</title>
</head>

<body>
    <section class="vh-100" style="display:flex; align-items:center;">
        <div class="container-fluid h-custom" style="width:100%">
            <div class="row d-flex align-items-center h-100" style="padding:0px; ">
                <div class="col-md-9 col-lg-6 col-xl-5" style="padding-left:0px; padding-right:0px;">
                    <img src="https://giu.unimed.coop.br/img/thumbnail_2-01.d1fca7ec.jpg" class="img-fluid" alt="Sample image">
                </div>

                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1" style="margin-top:10px">
                    <form action="{{route('login')}}" method="post">
                        @csrf
                        <div class="form-outline mb-4">
                            <input type="text" id="username" name="username" class="form-control form-control-lg" placeholder="Usuário" required value="{{ old('username') }}" />
                            @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-outline mb-3">
                            <input type="password" id="password" name="password" class="form-control form-control-lg" placeholder="Senha" required value="{{ old('password') }}">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="text-center text-lg-center mt-1 pt-2" style="display: flex; flex-direction:column;">
                      
                        <a href="/esqueciSenha" class="text-dark">Esqueci minha
                                        senha </a>
                                        <br>
                            <input type="submit" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;">
                            <br> <br>
                            <div class="d-flex justify-content-center align-items-cente text-center">
                                <p>
                                    <!--<a href="/esqueciSenha" class="text-decoration-none text-dark">Esqueci minha
                                        senha </a>
                                    <a href="/solicitarCadastro" class="text-decoration-none text-dark">| Solicitar
                                        cadastro</a>-->
                                </p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </section>

    <style>
        body {
            padding: 0px;
            margin: 0px;
        }

        .btn-primary {
            background-color: #00995d;
            border-color: #00995d;
        }

        .btn-primary:hover {
            background-color: #00995d;
            border-color: white;
        }
    </style>
</body>

</html>