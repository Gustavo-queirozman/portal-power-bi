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
    <title>Solicitar Cadastro</title>     
    @vite(['resources/css/register.css'])
    <style>
        /* Estilos para a seção de resultado */
        .result-section {
            margin-top: 20px;
            padding: 15px;
            border-radius: 8px;
            display: none;
            animation: fadeIn 0.5s;
        }
        
        .result-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        
        .result-error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        
        .result-section i {
            margin-right: 8px;
        }
        
        /* Mostrar a seção de resultado quando necessário */
        .result-section.show {
            display: block;
        }
        
        /* Indicador de carregamento */
        .loading {
            display: none;
            text-align: center;
            margin-top: 15px;
        }
        
        .loading i {
            animation: spin 1s infinite linear;
        }
        
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        
        /* Estilos para campos com erro */
        .input-error {
            border: 1px solid #dc3545 !important;
        }
        
        .error-message {
            color: #dc3545;
            font-size: 0.85rem;
            margin-top: 5px;
            display: none;
        }
    </style>
</head> 
<body>     
    <!-- Header -->     
    <header class="header">         
        <img src="./img/logo.png" alt="Logo da empresa" class="logo">     
    </header>      
    
    <div class="register-container">         
        <!-- Imagem lateral (visível apenas em telas maiores) -->         
        <div class="register-image"></div>          
        
        <!-- Formulário de cadastro -->         
        <div class="register-form-container">             
            <div class="register-form">                 
                <h1 class="register-form-title">Solicitar Cadastro</h1>                 
                <p class="register-form-subtitle">Preencha o formulário abaixo para solicitar acesso ao sistema</p>
                
                <!-- Seção de resultado (inicialmente oculta) -->
                <div id="result-success" class="result-section result-success">
                    <i class="fas fa-check-circle"></i>
                    <span id="success-message"></span>
                </div>
                
                <div id="result-error" class="result-section result-error">
                    <i class="fas fa-exclamation-circle"></i>
                    <div id="error-messages"></div>
                </div>
                
                <!-- Indicador de carregamento -->
                <div class="loading" id="loading">
                    <i class="fas fa-spinner"></i> Processando...
                </div>
                                  
                <form id="register-form" action="{{ route('register') }}" method="post">                     
                    @csrf                     
                    <div class="form-group">                         
                        <label for="name" class="form-label">Nome Completo</label>                         
                        <input type="text" id="name" name="name" class="form-control"
                               value="{{ old('name') }}"
                               placeholder="Digite seu nome completo" required />
                        <div class="error-message" id="name-error"></div>                       
                    </div>                      
                    
                    <div class="form-group">                         
                        <label for="username" class="form-label">Nome de Usuário</label>                         
                        <input type="text" id="username" name="username" class="form-control"
                               value="{{ old('username') }}"                               
                               placeholder="Digite um nome de usuário" required />
                        <div class="error-message" id="username-error"></div>                       
                    </div>                      
                    
                    <div class="form-group">                         
                        <label for="email" class="form-label">E-mail</label>                         
                        <input type="email" id="email" name="email" class="form-control"
                               value="{{ old('email') }}"                               
                               placeholder="Digite seu e-mail" required />
                        <div class="error-message" id="email-error"></div>                       
                    </div>                      
                    
                    <div class="form-actions">                         
                        <button type="submit" class="btn btn-primary" id="submit-btn">                             
                            <i class="fas fa-user-plus"></i> Solicitar Cadastro                         
                        </button>                     
                    </div>                                          
                    
                    <div class="footer-links">                         
                        <a href="/login">                             
                            <i class="fas fa-sign-in-alt"></i> Acessar minha conta                         
                        </a>                         
                        <a href="/forgot-password">                             
                            <i class="fas fa-lock-open"></i> Esqueci minha senha                         
                        </a>                     
                    </div>                 
                </form>             
            </div>         
        </div>     
    </div>      
    
    <footer class="footer">         
        <p>&copy; 2025 - Todos os direitos reservados</p>     
    </footer>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            // Função para submeter o formulário via AJAX
            $("#register-form").on('submit', function(e) {
                e.preventDefault();
                
                // Resetar quaisquer mensagens de erro anteriores
                resetFormErrors();
                
                // Mostrar o indicador de carregamento
                $("#loading").show();
                
                // Ocultar mensagens de resultado anteriores
                $("#result-success").removeClass('show');
                $("#result-error").removeClass('show');
                
                // Coletar dados do formulário
                const formData = $(this).serialize();
                
                // Enviar requisição AJAX
                $.ajax({
                    url: $(this).attr('action'),
                    type: 'POST',
                    data: formData,
                    dataType: 'json',
                    success: function(response) {
                        // Esconder o indicador de carregamento
                        $("#loading").hide();
                        
                        // Mostrar mensagem de sucesso
                        $("#success-message").text(response.message || 'Cadastro solicitado com sucesso! Aguarde a confirmação por e-mail.');
                        $("#result-success").addClass('show');
                        
                        // Opcionalmente, limpar o formulário
                        if (response.status === 'success') {
                            $("#register-form")[0].reset();
                        }
                    },
                    error: function(xhr) {
                        // Esconder o indicador de carregamento
                        $("#loading").hide();
                        
                        // Processar resposta de erro
                        handleErrors(xhr);
                    }
                });
            });
            
            // Função para lidar com erros
            function handleErrors(xhr) {
                if (xhr.status === 422) { // Erro de validação
                    const errors = xhr.responseJSON.errors;
                    
                    // Limpar o container de mensagens de erro
                    $("#error-messages").empty();
                    
                    // Adicionar mensagens gerais de erro
                    if (xhr.responseJSON.message) {
                        $("#error-messages").append('<p>' + xhr.responseJSON.message + '</p>');
                    }
                    
                    // Processar cada erro individual
                    if (errors) {
                        Object.keys(errors).forEach(function(field) {
                            // Adicionar classe de erro ao campo
                            $("#" + field).addClass('input-error');
                            
                            // Mostrar mensagem de erro
                            $("#" + field + "-error").text(errors[field][0]).show();
                            
                            // Adicionar à lista geral de erros
                            $("#error-messages").append('<p>' + errors[field][0] + '</p>');
                        });
                    }
                    
                    // Mostrar a seção de erro
                    $("#result-error").addClass('show');
                } else { // Outro tipo de erro
                    $("#error-messages").html('<p>Ocorreu um erro ao processar sua solicitação. Por favor, tente novamente mais tarde.</p>');
                    $("#result-error").addClass('show');
                }
            }
            
            // Função para resetar erros
            function resetFormErrors() {
                $(".form-control").removeClass('input-error');
                $(".error-message").hide().text("");
                $("#error-messages").empty();
            }
            
            // Remover classe de erro ao editar campo
            $(".form-control").on('input', function() {
                $(this).removeClass('input-error');
                $("#" + $(this).attr('id') + "-error").hide();
            });
        });
    </script>
</body> 
</html>