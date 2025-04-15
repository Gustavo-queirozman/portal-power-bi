@extends('layouts.sidebar')
@section('title', 'Dashboard')
@section('conteudo')
<div class="dashboard">
    <header class="dashboard-header">
        <h1>Visão Geral</h1>
        <div class="dashboard-meta">
            <span class="update-badge">Última atualização: 07/05/2023</span>
        </div>
     
        @vite(['resources/css/home.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap">
    </header>
    
    <main class="dashboard-modules">
        <!-- Módulo de Faturamento -->
        <div class="module-card faturamento">
            <div class="module-header">
                <div class="module-icon">
                    <i class="fas fa-chart-line"></i>
                </div>
                <div class="module-title">
                    <h2>Faturamento</h2>
                    <span class="module-subtitle">Análise e relatórios</span>
                </div>
                <div class="module-actions">
                    <button class="action-toggle" aria-label="Expandir módulo">
                        <i class="fas fa-chevron-down"></i>
                    </button>
                </div>
            </div>
            
            <div class="module-content">
                <div class="content-row">
                    <div class="info-tag"><i class="fas fa-database"></i> Fonte</div>
                    <div class="info-value">Caderno 2.0</div>
                </div>
                <div class="content-row">
                    <div class="info-tag"><i class="fas fa-calendar-check"></i> Dados até</div>
                    <div class="info-value">Março/2023</div>
                </div>
                <div class="content-row">
                    <div class="info-tag"><i class="fas fa-server"></i> Sistema</div>
                    <div class="info-value">Sala de situação</div>
                </div>
            </div>
            
            <div class="module-actions-panel">
                <form action="/dashboard" method="post">
                    @csrf
                    <input type="hidden" name="setor" value="faturamento">
                    <input type="hidden" name="versao" value="nova">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-chart-bar"></i> 
                        <span>Novo Painel</span>
                    </button>
                </form>

                <form action="/dashboard" method="post">
                    @csrf
                    <input type="hidden" name="setor" value="faturamento">
                    <input type="hidden" name="versao" value="anterior">
                    <button type="submit" class="btn btn-secondary">
                        <i class="fas fa-history"></i> 
                        <span>Versão Anterior</span>
                    </button>
                </form>
            </div>
        </div>

        <!-- Módulo de Vendas -->
        <div class="module-card vendas">
            <div class="module-header">
                <div class="module-icon">
                    <i class="fas fa-shopping-cart"></i>
                </div>
                <div class="module-title">
                    <h2>Vendas</h2>
                    <span class="module-subtitle">Análise e relatórios</span>
                </div>
                <div class="module-actions">
                    <button class="action-toggle" aria-label="Expandir módulo">
                        <i class="fas fa-chevron-down"></i>
                    </button>
                </div>
            </div>
            
            <div class="module-content">
                <div class="content-row">
                    <div class="info-tag"><i class="fas fa-database"></i> Fonte</div>
                    <div class="info-value">Caderno 2.0</div>
                </div>
                <div class="content-row">
                    <div class="info-tag"><i class="fas fa-calendar-check"></i> Dados até</div>
                    <div class="info-value">Março/2023</div>
                </div>
                <div class="content-row">
                    <div class="info-tag"><i class="fas fa-server"></i> Sistema</div>
                    <div class="info-value">Sala de situação</div>
                </div>
            </div>
            
            <div class="module-actions-panel">
                <form action="/dashboard" method="post">
                    @csrf
                    <input type="hidden" name="setor" value="venda">
                    <input type="hidden" name="versao" value="nova">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-chart-bar"></i> 
                        <span>Novo Painel</span>
                    </button>
                </form>

                <form action="/dashboard" method="post">
                    @csrf
                    <input type="hidden" name="setor" value="venda">
                    <input type="hidden" name="versao" value="anterior">
                    <button type="submit" class="btn btn-secondary">
                        <i class="fas fa-history"></i> 
                        <span>Versão Anterior</span>
                    </button>
                </form>
            </div>
        </div>
    </main>
</div>
@endsection

<!-- Adicionar links de fontes e bibliotecas -->
@push('styles')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap">
@endpush

@push('scripts')
@vite(['resources/js/app.js'])
<script>
    // Adicionar depois o código JavaScript para interatividade
    document.addEventListener('DOMContentLoaded', function() {
        // Toggle para expandir/contrair módulos
        const toggleButtons = document.querySelectorAll('.action-toggle');
        
        toggleButtons.forEach(button => {
            button.addEventListener('click', function() {
                const moduleCard = this.closest('.module-card');
                const moduleContent = moduleCard.querySelector('.module-content');
                
                moduleContent.classList.toggle('collapsed');
                
                // Alterar ícone
                const icon = this.querySelector('i');
                if (moduleContent.classList.contains('collapsed')) {
                    icon.classList.remove('fa-chevron-down');
                    icon.classList.add('fa-chevron-up');
                } else {
                    icon.classList.remove('fa-chevron-up');
                    icon.classList.add('fa-chevron-down');
                }
            });
        });
    });
</script>
@endpush