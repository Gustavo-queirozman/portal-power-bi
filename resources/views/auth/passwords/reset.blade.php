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
    @vite(['resources/css/reset.css'])
    <title>Redefinir Senha</title>
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="header-container">
            <img src="{{asset('./img/logo.png')}}" alt="Logo da empresa" class="logo">
        </div>
    </header>

    <div class="container">
        <div class="row">
            <div class="password-card">
                <!-- Progresso da jornada do usuário -->
                <div class="password-progress">
                    <div class="progress-step completed">
                        <div class="step-icon"><i class="fas fa-envelope"></i></div>
                        <div class="step-label">Email enviado</div>
                    </div>
                    <div class="progress-line completed"></div>
                    <div class="progress-step active">
                        <div class="step-icon"><i class="fas fa-lock"></i></div>
                        <div class="step-label">Nova senha</div>
                    </div>
                    <div class="progress-line"></div>
                    <div class="progress-step">
                        <div class="step-icon"><i class="fas fa-check-circle"></i></div>
                        <div class="step-label">Concluído</div>
                    </div>
                </div>
                
                <div class="password-card-header">
                    <h2 class="password-title">Crie sua nova senha</h2>
                    <p class="password-subtitle">Escolha uma senha forte para proteger sua conta</p>
                </div>
                
                @if (session('status'))
                    <div class="alert-custom alert-success-custom">
                        <i class="fas fa-check-circle"></i>
                        <span>{{ session('status') }}</span>
                    </div>
                @endif
                
                <div class="password-card-body">
                    <form method="POST" action="{{ route('password.update') }}" id="passwordResetForm">
                        @csrf
                        
                        <!-- Token de redefinição de senha -->
                        <input type="hidden" name="token" value="{{ $token ?? '' }}">
                        
                        <!-- Campo de email (oculto) -->
                        <input type="hidden" name="email" value="{{ $email ?? old('email') ?? '' }}">
                        
                        <div class="password-form-group">
                            <label for="password" class="password-form-label">Nova Senha</label>
                            <div class="password-input-group">
                                <input id="password" type="password" class="password-form-control @error('password') is-invalid @enderror" name="password" required autofocus oninput="checkPasswordStrength()">
                                <button type="button" class="password-toggle" onclick="togglePasswordVisibility('password')">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                            
                            <!-- Indicador de força da senha -->
                            <div class="password-strength-meter">
                                <div class="strength-bar">
                                    <div class="strength-indicator" id="strengthIndicator"></div>
                                </div>
                                <div class="strength-text" id="strengthText">Força da senha</div>
                            </div>
                            
                            <!-- Checklist de requisitos -->
                            <div class="password-requirements">
                                <div class="requirement" id="req-length">
                                    <i class="fas fa-circle"></i> Mínimo de 8 caracteres
                                </div>
                                <div class="requirement" id="req-uppercase">
                                    <i class="fas fa-circle"></i> Letra maiúscula
                                </div>
                                <div class="requirement" id="req-lowercase">
                                    <i class="fas fa-circle"></i> Letra minúscula
                                </div>
                                <div class="requirement" id="req-number">
                                    <i class="fas fa-circle"></i> Número
                                </div>
                                <div class="requirement" id="req-special">
                                    <i class="fas fa-circle"></i> Caractere especial
                                </div>
                            </div>
                            
                            @error('password')
                                <div class="password-error-message">
                                    <i class="fas fa-exclamation-circle"></i>
                                    <span>{{ $message }}</span>
                                </div>
                            @enderror
                        </div>
                        
                        <div class="password-form-group">
                            <label for="password_confirmation" class="password-form-label">Confirme a Nova Senha</label>
                            <div class="password-input-group">
                                <input id="password_confirmation" type="password" class="password-form-control" name="password_confirmation" required oninput="checkPasswordMatch()">
                                <button type="button" class="password-toggle" onclick="togglePasswordVisibility('password_confirmation')">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                            <div class="password-match-indicator" id="passwordMatch"></div>
                        </div>
                        
                        <div class="password-form-actions">
                            <button type="submit" class="password-btn password-btn-primary" id="submitBtn" disabled>
                                <span>Redefinir Senha</span>
                                <i class="fas fa-arrow-right"></i>
                            </button>
                        </div>
                    </form>
                </div>
                
                <div class="password-card-footer">
                    <div class="password-help">
                        <i class="fas fa-question-circle"></i>
                        <span>Problemas para redefinir sua senha?</span>
                        <a href="#" class="password-help-link">Obter ajuda</a>
                    </div>
                    <a href="{{ route('login') }}" class="password-footer-link">
                        <i class="fas fa-arrow-left"></i> Voltar para login
                    </a>
                </div>
            </div>
        </div>
    </div>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Inicializa os verificadores
        checkPasswordStrength();
        checkPasswordMatch();
    });

    function togglePasswordVisibility(inputId) {
        const input = document.getElementById(inputId);
        const icon = event.currentTarget.querySelector('i');
        
        if (input.type === 'password') {
            input.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            input.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    }
    
    function checkPasswordStrength() {
        const password = document.getElementById('password').value;
        const indicator = document.getElementById('strengthIndicator');
        const strengthText = document.getElementById('strengthText');
        
        // Requisitos
        const reqLength = document.getElementById('req-length');
        const reqUppercase = document.getElementById('req-uppercase');
        const reqLowercase = document.getElementById('req-lowercase');
        const reqNumber = document.getElementById('req-number');
        const reqSpecial = document.getElementById('req-special');
        
        // Verifica requisitos individuais
        const hasLength = password.length >= 8;
        const hasUppercase = /[A-Z]/.test(password);
        const hasLowercase = /[a-z]/.test(password);
        const hasNumber = /[0-9]/.test(password);
        const hasSpecial = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/.test(password);
        
        // Atualiza classes para requisitos
        updateRequirement(reqLength, hasLength);
        updateRequirement(reqUppercase, hasUppercase);
        updateRequirement(reqLowercase, hasLowercase);
        updateRequirement(reqNumber, hasNumber);
        updateRequirement(reqSpecial, hasSpecial);
        
        // Calcula força da senha
        let strength = 0;
        if (password.length > 0) {
            // Base no comprimento
            if (password.length >= 8) strength += 20;
            if (password.length >= 12) strength += 10;
            
            // Complexidade
            if (hasUppercase) strength += 20;
            if (hasLowercase) strength += 20;
            if (hasNumber) strength += 20;
            if (hasSpecial) strength += 20;
        }
        
        // Atualiza indicador visual
        indicator.style.width = strength + '%';
        
        // Define cor baseada na força
        if (strength < 40) {
            indicator.style.backgroundColor = '#FC8181'; // Vermelho
            strengthText.textContent = 'Fraca';
            strengthText.style.color = '#FC8181';
        } else if (strength < 70) {
            indicator.style.backgroundColor = '#F6AD55'; // Laranja
            strengthText.textContent = 'Média';
            strengthText.style.color = '#F6AD55';
        } else {
            indicator.style.backgroundColor = '#68D391'; // Verde
            strengthText.textContent = 'Forte';
            strengthText.style.color = '#68D391';
        }
        
        validateForm();
    }
    
    function updateRequirement(element, isValid) {
        if (isValid) {
            element.classList.add('met');
            element.querySelector('i').classList.remove('fa-circle');
            element.querySelector('i').classList.add('fa-check-circle');
        } else {
            element.classList.remove('met');
            element.querySelector('i').classList.remove('fa-check-circle');
            element.querySelector('i').classList.add('fa-circle');
        }
    }
    
    function checkPasswordMatch() {
        const password = document.getElementById('password').value;
        const confirmPassword = document.getElementById('password_confirmation').value;
        const matchIndicator = document.getElementById('passwordMatch');
        
        if (confirmPassword.length === 0) {
            matchIndicator.textContent = '';
            matchIndicator.className = 'password-match-indicator';
        } else if (password === confirmPassword) {
            matchIndicator.textContent = '✓ Senhas conferem';
            matchIndicator.className = 'password-match-indicator match-success';
        } else {
            matchIndicator.textContent = '✗ Senhas não conferem';
            matchIndicator.className = 'password-match-indicator match-error';
        }
        
        validateForm();
    }
    
    function validateForm() {
        const password = document.getElementById('password').value;
        const confirmPassword = document.getElementById('password_confirmation').value;
        const submitBtn = document.getElementById('submitBtn');
        
        // Verifica requisitos mínimos
        const hasLength = password.length >= 8;
        const hasUppercase = /[A-Z]/.test(password);
        const hasLowercase = /[a-z]/.test(password);
        const hasNumber = /[0-9]/.test(password);
        const hasSpecial = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/.test(password);
        
        // Senhas conferem
        const passwordsMatch = password === confirmPassword && confirmPassword.length > 0;
        
        // Habilita/desabilita botão
        if (hasLength && hasUppercase && hasLowercase && hasNumber && hasSpecial && passwordsMatch) {
            submitBtn.disabled = false;
        } else {
            submitBtn.disabled = true;
        }
    }
    
    // Adiciona feedback visual durante o envio
    document.getElementById('passwordResetForm').addEventListener('submit', function(e) {
        const submitBtn = document.getElementById('submitBtn');
        submitBtn.innerHTML = '<i class="fas fa-circle-notch fa-spin"></i> Processando...';
        submitBtn.disabled = true;
    });
</script>
</body>
</html>