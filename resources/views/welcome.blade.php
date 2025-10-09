@extends('layouts.app')

@section('title', 'Jornada do Reino - Descubra Seu Propósito')

@section('content')
<div class="container-fluid min-vh-100 d-flex align-items-center position-relative overflow-hidden">
    <!-- Fundo com partículas animadas -->
    <div class="particles-bg position-absolute w-100 h-100" style="
        background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
        z-index: -1;
    "></div>

    <div class="row w-100 justify-content-center">
        <div class="col-12 col-lg-8 text-center">

            <!-- Storytelling Intro -->
            <div class="mb-5" data-aos="fade-up">
                <h1 class="display-3 fw-bold text-white mb-4">
                    Você está pronto para <span class="text-gold">descobrir o propósito eterno da sua vida?</span>
                </h1>
                <p class="lead fs-4 text-light opacity-90">
                    A <strong>Jornada do Reino</strong> é uma experiência transformadora que te levará a um encontro profundo com Deus.
                </p>
            </div>

            <!-- Jornada Visual -->
            <div class="journey-path mb-5" data-aos="zoom-in-up">
                <div class="d-flex justify-content-between align-items-center flex-wrap">
                    <div class="journey-step text-center mx-2">
                        <div class="step-icon bg-gold text-white rounded-circle d-flex align-items-center justify-content-center mb-2">
                            <i class="fas fa-pray"></i>
                        </div>
                        <small class="text-light">Chamado</small>
                    </div>
                    <div class="journey-arrow text-light mx-1"><i class="fas fa-arrow-right"></i></div>
                    <div class="journey-step text-center mx-2">
                        <div class="step-icon bg-primary text-white rounded-circle d-flex align-items-center justify-content-center mb-2">
                            <i class="fas fa-heart"></i>
                        </div>
                        <small class="text-light">Encontro</small>
                    </div>
                    <div class="journey-arrow text-light mx-1"><i class="fas fa-arrow-right"></i></div>
                    <div class="journey-step text-center mx-2">
                        <div class="step-icon bg-success text-white rounded-circle d-flex align-items-center justify-content-center mb-2">
                            <i class="fas fa-star"></i>
                        </div>
                        <small class="text-light">Transformação</small>
                    </div>
                </div>
            </div>

            <!-- CTA Principal -->
            <div class="glass-effect rounded-5 p-4 p-md-5 mb-4" data-aos="fade-up" data-aos-delay="300">
                <p class="fs-5 fst-italic text-white mb-4 typewriter">
                    “Toda grande jornada começa com um único passo... o seu está aqui.”
                </p>

                <a href="{{ route('journey.start') }}" class="btn btn-journey btn-lg px-5 py-3 fs-5 fw-bold text-white shadow-lg">
                    <i class="fas fa-rocket me-2"></i> Iniciar Minha Jornada
                </a>

                <div class="mt-3">
                    <small class="text-light d-block">✅ 100% gratuito • ✅ Encontro pessoal com Deus • ✨ Transformação garantida</small>
                </div>
            </div>

            <!-- Testemunhos Reais -->
            <div class="mt-5" data-aos="fade-up" data-aos-delay="500">
                <h4 class="text-gold mb-4 fs-4">💬 Depoimentos de Transformação</h4>
                <div class="row g-4">
                    <div class="col-12 col-md-6">
                        <div class="card bg-transparent border-light rounded-4 p-4 text-start">
                            <div class="d-flex align-items-center mb-3">
                                <img src="https://via.placeholder.com/50" alt="Ana" class="rounded-circle me-3">
                                <div>
                                    <h6 class="text-white mb-0">Ana Silva</h6>
                                    <small class="text-muted">São Paulo, SP</small>
                                </div>
                            </div>
                            <p class="text-light fst-italic mb-0">“Minha vida mudou completamente. A Jornada me trouxe paz e direção.”</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="card bg-transparent border-light rounded-4 p-4 text-start">
                            <div class="d-flex align-items-center mb-3">
                                <img src="https://via.placeholder.com/50" alt="Pedro" class="rounded-circle me-3">
                                <div>
                                    <h6 class="text-white mb-0">Pedro Oliveira</h6>
                                    <small class="text-muted">Belo Horizonte, MG</small>
                                </div>
                            </div>
                            <p class="text-light fst-italic mb-0">“Foi um encontro real com Deus. Recomendo a todos que buscam sentido.”</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

{{-- Botão Flutuante com Animação --}}
@if(auth()->check())
    <a href="{{ route('admin.prayer-requests') }}" class="btn btn-sm btn-outline-light rounded-circle position-fixed pulse-animation" style="bottom: 20px; right: 20px; z-index: 1050;">
        <i class="fas fa-crown"></i>
    </a>
@else
    <a href="{{ route('login') }}" class="btn btn-sm btn-outline-light rounded-circle position-fixed pulse-animation" style="bottom: 20px; right: 20px; z-index: 1050;">
        <i class="fas fa-lock"></i>
    </a>
@endif

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    // Ativar tooltips
    const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    tooltipTriggerList.forEach(function (tooltipTriggerEl) {
        new bootstrap.Tooltip(tooltipTriggerEl);
    });

    // Animação de progresso visual
    const steps = document.querySelectorAll('.journey-step');
    steps.forEach((step, index) => {
        setTimeout(() => {
            step.classList.add('active');
        }, index * 300);
    });
});
</script>
@endpush

<style>
    .bg-gold { background-color: #d4af37 !important; }
    .text-gold { color: #d4af37 !important; }
    .journey-step { opacity: 0.5; transition: all 0.3s ease; }
    .journey-step.active { opacity: 1; transform: scale(1.1); }
    .step-icon { width: 60px; height: 60px; font-size: 1.5rem; }
    .glass-effect {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }
    .btn-journey {
        background: linear-gradient(45deg, #d4af37, #b8860b);
        border: none;
    }
    .btn-journey:hover {
        background: linear-gradient(45deg, #b8860b, #d4af37);
        transform: translateY(-3px);
    }
    .pulse-animation {
        animation: pulse 2s infinite;
    }
    @keyframes pulse {
        0% { transform: scale(1); }
        50% { transform: scale(1.1); }
        100% { transform: scale(1); }
    }
</style>

@endsection
