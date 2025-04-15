
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
            
            /* Z-index */
            --z-header: 10;
            --z-sidebar: 30;
            --z-modal: 20;
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
            display: flex;
            flex-direction: column;
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
            justify-content: space-between;
            box-shadow: var(--shadow-md);
            position: relative;
            z-index: var(--z-header);
        }

        .header-left {
            display: flex;
            align-items: center;
            gap: var(--space-md);
        }

        .menu-button {
            background: none;
            border: none;
            color: white;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 44px;
            height: 44px;
            border-radius: 50%;
            transition: var(--transition);
        }

        .menu-button i {
            font-size: 24px; /* Aumentando o tamanho do ícone */
        }

        .menu-button:hover, 
        .menu-button:focus {
            background-color: rgba(255, 255, 255, 0.1);
        }

        .header-right {
            display: flex;
            align-items: center;
        }
        
        .logo {
            height: 30px;
        }

        /* Sidebar */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: 260px;
            background-color: var(--surface);
            box-shadow: var(--shadow-lg);
            z-index: var(--z-sidebar);
            transform: translateX(-100%); /* Garante que o menu começa fechado */
            transition: transform var(--transition);
            overflow-y: auto;
        }

        .sidebar.active {
            transform: translateX(0);
        }

        .sidebar-header {
            background-color: var(--primary);
            color: white;
            padding: var(--space-lg);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .sidebar-title {
            font-size: 1.25rem;
            font-weight: 600;
        }

        .close-button {
            background: none;
            border: none;
            color: white;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 32px;
            height: 32px;
            border-radius: 50%;
            transition: var(--transition);
        }

        .close-button:hover,
        .close-button:focus {
            background-color: rgba(255, 255, 255, 0.1);
        }

        .sidebar-menu {
            list-style: none;
            padding: var(--space-md);
        }

        .sidebar-item {
            margin-bottom: var(--space-xs);
        }

        .sidebar-link {
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            text-decoration: none;
            color: var(--text-secondary);
            padding: var(--space-sm) var(--space-md);
            border-radius: 4px;
            transition: var(--transition);
        }

        .sidebar-link:hover,
        .sidebar-link:focus,
        .sidebar-link.active {
            background-color: var(--primary-light);
            color: white;
        }

        .sidebar-divider {
            height: 1px;
            margin: var(--space-md) 0;
            background-color: var(--border);
            list-style: none;
        }

        .logout-form {
            margin: 0;
            padding: 0;
        }
        
        .logout-form button {
            width: 100%;
            background: none;
            border: none;
            font-family: inherit;
            font-size: inherit;
            text-align: left;
            cursor: pointer;
        }

        /* Layout principal */
        .main-container {
            flex: 1;
            padding: var(--space-lg);
            width: 100%;
            max-width: 1440px;
            margin: 0 auto;
        }

        /* Overlay */
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: var(--z-modal);
            opacity: 0;
            visibility: hidden;
            transition: var(--transition);
            pointer-events: none; /* Permite clicar através do overlay quando invisível */
        }

        .overlay.active {
            opacity: 1;
            visibility: visible;
            pointer-events: auto; /* Ativa os eventos de clique apenas quando o overlay está visível */
        }

        /* Responsividade */
        @media (max-width: 768px) {
            .main-container {
                padding: var(--space-md);
            }
        }

        @media (min-width: 992px) {
            .menu-button {
                display: flex; /* Mantém o botão visível em todos os tamanhos de tela */
            }
            
            .main-wrapper {
                display: flex;
            }
            
            .sidebar.active {
                transform: translateX(0);
            }
            
            /* Remove margin-left para o container principal */
            .main-container {
                margin-left: 0;
                width: 100%;
            }
        }

        /* Utilitários */
        .visually-hidden {
            position: absolute;
            width: 1px;
            height: 1px;
            padding: 0;
            margin: -1px;
            overflow: hidden;
            clip: rect(0, 0, 0, 0);
            white-space: nowrap;
            border-width: 0;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="header-left">
            <button type="button" class="menu-button" id="menu-toggle" aria-label="Abrir menu">
                <i class="fas fa-bars"></i>
            </button>
        </div>
        <div class="header-right">
            <img src="./img/logo.png" alt="Logo da empresa" class="logo">
        </div>
    </header>

    <!-- Overlay para quando o menu estiver aberto em telas menores -->
    <div class="overlay" id="overlay"></div>

    <div class="main-wrapper">
        <!-- Sidebar/Menu -->
        <aside class="sidebar" id="sidebar">
            <div class="sidebar-header">
                <h2 class="sidebar-title">Menu</h2>
                <button type="button" class="close-button" id="close-menu" aria-label="Fechar menu">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <ul class="sidebar-menu">
                <li class="sidebar-item">
                    <a href="/home" class="sidebar-link active">
                        <i class="fas fa-home"></i>
                        <span>Menu Principal</span>
                    </a>
                </li>
                <!--
                <li class="sidebar-item">
                    <a href="/dashboard" class="sidebar-link">
                        <i class="fas fa-chart-line"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="/relatorios" class="sidebar-link">
                        <i class="fas fa-file-alt"></i>
                        <span>Relatórios</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="/configuracoes" class="sidebar-link">
                        <i class="fas fa-cog"></i>
                        <span>Configurações</span>
                    </a>
                </li>-->
                <li class="sidebar-divider"></li>
                <li class="sidebar-item">
                    <form action="/logout" method="post" id="logout-form" class="logout-form">
                        @csrf
                        <button type="submit" class="sidebar-link">
                            <i class="fas fa-sign-out-alt"></i>
                            <span>Sair do Sistema</span>
                        </button>
                    </form>
                </li>
            </ul>
        </aside>

        <!-- Conteúdo principal -->
        <main class="main-container">
            @yield('conteudo')
        </main>
    </div>

    <script>
        // Seleção de elementos DOM
        const menuToggle = document.getElementById('menu-toggle');
        const closeMenu = document.getElementById('close-menu');
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('overlay');

        // Função para abrir o menu
        function openMenu() {
            sidebar.classList.add('active');
            overlay.classList.add('active');
        }

        // Função para fechar o menu
        function closeMenuFn() {
            sidebar.classList.remove('active');
            overlay.classList.remove('active');
        }

        // Event listeners
        menuToggle.addEventListener('click', openMenu);
        closeMenu.addEventListener('click', closeMenuFn);
        overlay.addEventListener('click', closeMenuFn);

        // Fechar menu com a tecla ESC
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape' && sidebar.classList.contains('active')) {
                closeMenuFn();
            }
        });

        // Inicialização - certifica-se de que o menu começa fechado
        document.addEventListener('DOMContentLoaded', function() {
            // Garantir que o menu começa fechado em todos os tamanhos de tela
            sidebar.classList.remove('active');
            overlay.classList.remove('active');
        });
    </script>
</body>
</html>