<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>Entrar</title>
    @vite(['resources/css/login.css'])
</head>
<body>
    <!-- Header -->
    <header class="header">
        <img src="./img/logo.png" alt="Logo da empresa" class="logo">
    </header>

    <div class="login-container">
        <!-- Imagem lateral (visível apenas em telas maiores) -->
        <div class="login-image"></div>

        <!-- Formulário de login -->
        <div class="login-form-container">
            <div class="login-form">
                <h1 class="login-form-title">Acesso ao Sistema</h1>
                
                <form action="{{route('login')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <input type="text" id="username" name="username" class="form-control" 
                            placeholder="Usuário" required value="{{ old('username') }}" />
                        @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input type="password" id="password" name="password" class="form-control" 
                            placeholder="Senha" required value="{{ old('password') }}">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <a href="/forgot-password" class="forgot-password">
                        <i class="fas fa-lock-open"></i> Esqueci minha senha
                    </a>

                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-sign-in-alt"></i> Entrar
                    </button>
                </form>
            </div>
        </div>
    </div>

    <footer class="footer">
        <p>&copy; 2025 - Todos os direitos reservados</p>
    </footer>
</body>
</html>