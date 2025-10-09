@extends('layouts.app')

@section('title', 'Jornada do Reino - Descubra Seu Propósito')

@section('content')
<div class="container-fluid min-vh-100 d-flex flex-column justify-content-center position-relative overflow-hidden p-3 p-md-0">
    <!-- Fundo com gradiente -->
    <div class="particles-bg position-absolute w-100 h-100" style="
        background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
        z-index: -1;
    "></div>

    <div class="row justify-content-center align-items-center w-100">
        <div class="col-12 col-lg-8 text-center">

            <!-- Título Principal -->
            <div class="mb-4" data-aos="fade-up">
                <h1 class="display-5 display-md-4 display-lg-3 fw-bold text-white">
                    Você está pronto para <span class="text-gold">descobrir seu propósito eterno?</span>
                </h1>
                <p class="lead fs-6 fs-md-5 text-light mt-3">
                    A <strong>Jornada do Reino</strong> é uma experiência transformadora que te leva a um encontro profundo com Deus.
                </p>
            </div>

            <!-- Jornada Visual -->
            <div class="journey-path mb-5" data-aos="zoom-in-up">
                <div class="d-flex flex-nowrap justify-content-center align-items-center gap-2 gap-md-3">
                    <div class="journey-step text-center mx-1">
                        <div class="step-icon bg-gold text-white rounded-circle d-flex align-items-center justify-content-center mx-auto mb-2">
                            <i class="fas fa-pray"></i>
                        </div>
                        <small class="text-light d-block">Chamado</small>
                    </div>
                    <div class="journey-arrow text-light mx-1"><i class="fas fa-arrow-right"></i></div>
                    <div class="journey-step text-center mx-1">
                        <div class="step-icon bg-primary text-white rounded-circle d-flex align-items-center justify-content-center mx-auto mb-2">
                            <i class="fas fa-heart"></i>
                        </div>
                        <small class="text-light d-block">Encontro</small>
                    </div>
                    <div class="journey-arrow text-light mx-1"><i class="fas fa-arrow-right"></i></div>
                    <div class="journey-step text-center mx-1">
                        <div class="step-icon bg-success text-white rounded-circle d-flex align-items-center justify-content-center mx-auto mb-2">
                            <i class="fas fa-star"></i>
                        </div>
                        <small class="text-light d-block">Transformação</small>
                    </div>
                </div>
            </div>

            <!-- Card Principal -->
            <div class="glass-effect rounded-4 p-4 mb-4" data-aos="fade-up" data-aos-delay="300">
                <p class="fs-6 fst-italic text-white mb-3">
                    “Toda grande jornada começa com um único passo... o seu está aqui.”
                </p>

                <a href="{{ route('journey.start') }}" class="btn btn-journey btn-lg w-100 py-3 fs-5 fw-bold text-white shadow-lg">
                    <i class="fas fa-rocket me-2"></i> Iniciar Minha Jornada
                </a>

                <div class="mt-3">
                    <small class="text-light d-block">
                        ✅ 100% gratuito • ✅ Encontro pessoal com Deus • ✨ Transformação garantida
                    </small>
                </div>
            </div>

            <!-- Testemunhos -->
            <div class="mt-4" data-aos="fade-up" data-aos-delay="500">
                <h4 class="text-gold mb-4 fs-5">💬 Depoimentos de Transformação</h4>
                <div class="row g-3">
                    <div class="col-12 col-md-6">
                        <div class="card bg-transparent border-light rounded-4 p-3 text-start">
                            <div class="d-flex align-items-center mb-2">
                                <img src="https://via.placeholder.com/40" alt="Ana" class="rounded-circle me-2">
                                <div>
                                    <h6 class="text-white mb-0">Ana Silva</h6>
                                    <small class="text-muted">São Paulo, SP</small>
                                </div>
                            </div>
                            <p class="text-light fst-italic mb-0">“Minha vida mudou completamente. Recomendo a todos.”</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="card bg-transparent border-light rounded-4 p-3 text-start">
                            <div class="d-flex align-items-center mb-2">
                                <img src="https://via.placeholder.com/40" alt="Pedro" class="rounded-circle me-2">
                                <div>
                                    <h6 class="text-white mb-0">Pedro Oliveira</h6>
                                    <small class="text-muted">Belo Horizonte, MG</small>
                                </div>
                            </div>
                            <p class="text-light fst-italic mb-0">“Foi um encontro real com Deus. Transformador.”</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

{{-- Botão Flutuante --}}
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
    const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    tooltipTriggerList.forEach(function (tooltipTriggerEl) {
        new bootstrap.Tooltip(tooltipTriggerEl);
    });
});
</script>
@endpush

<style>
    .bg-gold { background-color: #d4af37 !important; }
    .text-gold { color: #d4af37 !important; }
    .journey-step { opacity: 0.7; transition: all 0.3s ease; }
    .journey-step.active { opacity: 1; transform: scale(1.1); }
    .step-icon { width: 50px; height: 50px; font-size: 1.2rem; }
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

    /* Ajustes para mobile */
    @media (max-width: 576px) {
        .display-5 { font-size: 1.7rem; }
        .fs-6 { font-size: 0.9rem; }
        .journey-path { overflow-x: auto; }
        .d-flex.flex-nowrap { overflow-x: auto; }
        .btn-journey { font-size: 1.1rem; }
    }

    @media (max-width: 768px) {
        .glass-effect { padding: 1rem; }
        .step-icon { width: 45px; height: 45px; font-size: 1rem; }
    }
</style>

@endsection
