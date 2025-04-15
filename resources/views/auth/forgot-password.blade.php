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
    <title>Esqueci Senha</title>
    @vite(['resources/css/forgot-password.css'])
</head>
<body>
    <!-- Header -->
    <header class="header">
        <img src="./img/logo.png" alt="Logo da empresa" class="logo">
    </header>

    <div class="forgot-container">
        <!-- Imagem lateral (visível apenas em telas maiores) -->
        <div class="forgot-image"></div>

        <!-- Formulário de recuperação de senha -->
        <div class="forgot-form-container">
            <div class="forgot-form">
                <h1 class="forgot-form-title">Recuperação de Senha</h1>
                <p class="forgot-form-subtitle">Informe seu email para receber instruções de recuperação de senha</p>
                
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="form-group">
                        <input type="email" id="email" name="email" class="form-control" 
                            placeholder="Digite seu email cadastrado" required />
                        <?php
                        if (isset($message)) {
                            echo '<script>alert("Enviado com sucesso!");</script>';
                        }
                        ?>
                    </div>

                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-paper-plane"></i> Enviar Instruções
                    </button>
                    
                    <div class="footer-links">
                        <a href="/login">
                            <i class="fas fa-sign-in-alt"></i> Acessar minha conta
                        </a>
                        <a href="/register">
                            <i class="fas fa-user-plus"></i> Solicitar cadastro
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <footer class="footer">
        <p>&copy; 2025 - Todos os direitos reservados</p>
    </footer>
</body>
</html>