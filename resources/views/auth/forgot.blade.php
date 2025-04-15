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
    <style>
        :root {
            /* Cores principais */
            --primary: #00995D;
            --primary-dark: #007A4B;
            --primary-light: #33AD7B;
            --surface: #FFFFFF;
            --background: #F5F7FA;
            --text-primary: #1A202C;
            --text-secondary: #4A5568;
            --text-light: #718096;
            --border: #E2E8F0;
            
            /* Espaçamentos */
            --space-xs: 0.25rem;
            --space-sm: 0.5rem;
            --space-md: 1rem;
            --space-lg: 1.5rem;
            --space-xl: 2rem;
            
            /* Sombras */
            --shadow-sm: 0 1px 2px rgba(0, 0, 0, 0.05);
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            
            /* Transições */
            --transition: 200ms ease-in-out;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--background);
            color: var(--text-primary);
            line-height: 1.5;
            min-height: 100vh;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        /* Header */
        .header {
            background-color: var(--primary);
            color: white;
            padding: var(--space-md);
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: var(--shadow-md);
            position: relative;
        }

        .logo {
            height: 30px;
        }

        /* Esqueci Senha Container */
        .forgot-container {
            display: flex;
            min-height: calc(100vh - 62px); /* Altura total menos a altura do header */
            width: 100%;
        }

        /* Imagem lateral */
        .forgot-image {
            display: none;
            background-image: url('https://giu.unimed.coop.br/img/thumbnail_2-01.d1fca7ec.jpg');
            background-size: cover;
            background-position: center;
            flex: 1;
        }

        @media (min-width: 992px) {
            .forgot-image {
                display: block;
            }
        }

        /* Formulário de recuperação de senha */
        .forgot-form-container {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: var(--space-xl);
            background-color: var(--surface);
        }

        .forgot-form {
            width: 100%;
            max-width: 400px;
            padding: var(--space-xl);
            background-color: var(--surface);
            border-radius: 8px;
            box-shadow: var(--shadow-md);
        }

        .forgot-form-title {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: var(--space-lg);
            color: var(--primary);
            text-align: center;
        }

        .forgot-form-subtitle {
            font-size: 0.875rem;
            color: var(--text-secondary);
            margin-bottom: var(--space-lg);
            text-align: center;
        }

        .form-group {
            margin-bottom: var(--space-lg);
        }

        .form-control {
            width: 100%;
            padding: 0.75rem 1rem;
            font-size: 1rem;
            line-height: 1.5;
            border: 1px solid var(--border);
            border-radius: 4px;
            transition: border-color var(--transition);
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(0, 153, 93, 0.2);
        }

        .invalid-feedback {
            display: block;
            width: 100%;
            margin-top: 0.25rem;
            font-size: 0.875rem;
            color: #E53E3E;
        }

        .btn {
            display: inline-block;
            font-weight: 500;
            text-align: center;
            vertical-align: middle;
            cursor: pointer;
            border: 1px solid transparent;
            padding: 0.75rem 1.5rem;
            font-size: 1rem;
            line-height: 1.5;
            border-radius: 4px;
            transition: 
                background-color var(--transition),
                border-color var(--transition),
                box-shadow var(--transition);
        }

        .btn-primary {
            color: white;
            background-color: var(--primary);
            border-color: var(--primary);
            width: 100%;
        }

        .btn-primary:hover {
            background-color: var(--primary-dark);
            border-color: var(--primary-dark);
        }

        .btn-primary:focus {
            box-shadow: 0 0 0 3px rgba(0, 153, 93, 0.3);
        }

        .footer-links {
            margin-top: var(--space-lg);
            text-align: center;
        }

        .footer-links a {
            color: var(--text-secondary);
            text-decoration: none;
            margin: 0 var(--space-sm);
            transition: color var(--transition);
        }

        .footer-links a:hover {
            color: var(--primary);
        }

        .footer-links a:not(:last-child):after {
            content: '|';
            margin-left: var(--space-sm);
            color: var(--text-light);
        }

        /* Footer */
        .footer {
            padding: var(--space-md);
            text-align: center;
            color: var(--text-light);
            font-size: 0.875rem;
        }
    </style>
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
                
                <form action="{{ route('/forgot-password') }}" method="post">
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
                        <a href="/solicitarCadastro">
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