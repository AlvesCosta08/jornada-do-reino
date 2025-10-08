@extends('layouts.app')

@section('title', 'Jornada do Reino - Descubra Seu Propósito')

@section('content')
<div class="container-fluid min-vh-100 d-flex align-items-center position-relative overflow-hidden">
    <!-- Efeito de fundo -->
    <div class="particles-bg position-absolute w-100 h-100" style="
        background: radial-gradient(ellipse at center, rgba(108,92,231,0.1) 0%, transparent 70%);
        z-index: -1;
    "></div>

    <div class="row w-100 justify-content-center">
        <div class="col-12 col-md-9 col-lg-7 text-center">

            <!-- Cabeçalho Principal -->
            <div class="mb-4 mb-md-5" data-aos="fade-down">
                <h1 class="display-2 display-md-1 fw-bold text-gold title-glow mb-3">
                    <i class="fas fa-church me-2"></i>
                    Jornada do Reino
                </h1>
                <p class="lead fs-4 fs-md-3 opacity-90" data-aos="fade-up" data-aos-delay="200">
                    Descubra o propósito eterno da sua vida
                </p>
            </div>

            <!-- Card de Chamada Principal -->
            <div class="glass-effect rounded-5 p-4 p-md-5 mb-4 mb-md-5"
                 data-aos="zoom-in"
                 data-aos-delay="300"
                 style="position: relative; overflow: hidden;">

                <p class="fs-5 fs-md-4 fst-italic mb-3 mb-md-4 typewriter"
                   data-aos="fade-up"
                   data-aos-delay="500">
                   "Você já se perguntou qual é o sentido de tudo?"
                </p>

                <a href="{{ route('journey.start') }}"
                   class="btn btn-journey btn-lg fs-5 fs-md-4 px-4 px-md-5 py-2 py-md-3 mb-3 float-animation"
                   data-aos="fade-up"
                   data-aos-delay="700"
                   style="transform: translateY(0); transition: transform 0.3s;">
                   <i class="fas fa-rocket me-2"></i>
                   Começar Minha Jornada
                </a>

                <div class="mt-2 mt-md-3" data-aos="fade-up" data-aos-delay="900">
                    <small class="text-muted d-block">Experiência gratuita • Encontro pessoal com Deus</small>
                    <small class="text-warning d-block mt-1">✨ Transformação garantida</small>
                </div>
            </div>

            <!-- Características da Jornada -->
            <div class="row g-3 g-md-4 mt-3 mt-md-4">

                <!-- Característica 1 -->
                <div class="col-12 col-md-4"
                     data-aos="fade-right"
                     data-aos-delay="100">
                    <div class="glass-effect rounded-4 p-3 p-md-4 h-100 interactive-card hover-lift"
                         style="cursor: pointer; transition: transform 0.3s ease;">
                        <div class="fs-1 mb-2 mb-md-3 float-animation">
                            <i class="fas fa-compass text-gold"></i>
                        </div>
                        <h5 class="fw-bold mb-2 fs-6 fs-md-5">Navegação Guiada</h5>
                        <p class="small opacity-75 mb-0">Passo a passo por estações transformadoras</p>
                    </div>
                </div>

                <!-- Característica 2 -->
                <div class="col-12 col-md-4"
                     data-aos="fade-up"
                     data-aos-delay="200">
                    <div class="glass-effect rounded-4 p-3 p-md-4 h-100 interactive-card hover-lift"
                         style="cursor: pointer; transition: transform 0.3s ease;">
                        <div class="fs-1 mb-2 mb-md-3 float-animation" style="animation-delay: 0.3s;">
                            <i class="fas fa-heart text-danger"></i>
                        </div>
                        <h5 class="fw-bold mb-2 fs-6 fs-md-5">Encontro Pessoal</h5>
                        <p class="small opacity-75 mb-0">Experiência profunda com Deus</p>
                    </div>
                </div>

                <!-- Característica 3 -->
                <div class="col-12 col-md-4"
                     data-aos="fade-left"
                     data-aos-delay="300">
                    <div class="glass-effect rounded-4 p-3 p-md-4 h-100 interactive-card hover-lift"
                         style="cursor: pointer; transition: transform 0.3s ease;">
                        <div class="fs-1 mb-2 mb-md-3 float-animation" style="animation-delay: 0.6s;">
                            <i class="fas fa-bullseye text-success"></i>
                        </div>
                        <h5 class="fw-bold mb-2 fs-6 fs-md-5">Propósito Eterno</h5>
                        <p class="small opacity-75 mb-0">Descubra o verdadeiro sentido da vida</p>
                    </div>
                </div>

            </div>

            <!-- Depoimentos (opcional) -->
            <div class="mt-5" data-aos="fade-up" data-aos-delay="400">
                <h4 class="text-gold mb-3 fs-5 fs-md-4">💬 O que dizem sobre a Jornada</h4>
                <div class="row justify-content-center">
                    <div class="col-12 col-md-10">
                        <div class="glass-effect rounded-3 p-3 p-md-4">
                            <p class="fst-italic mb-2 fs-6 fs-md-5">"Minha vida mudou completamente. Obrigado por me mostrar o caminho."</p>
                            <small class="text-muted">— Ana, participante da Jornada</small>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

{{-- Botão flutuante inteligente --}}
@if(auth()->check())
    <a href="{{ route('admin.prayer-requests') }}"
       class="btn btn-sm btn-outline-light rounded-circle position-fixed pulse-animation"
       style="bottom: 20px; right: 20px; z-index: 1050; opacity: 0.85; backdrop-filter: blur(6px); border: 1px solid rgba(255,255,255,0.3); box-shadow: 0 4px 12px rgba(0,0,0,0.3); transition: all 0.3s;"
       title="Área Administrativa"
       data-bs-toggle="tooltip"
       data-bs-placement="left">
        <i class="fas fa-crown"></i>
    </a>
@else
    @php
        $loginUrl = route('login', [], false) ?: '/login';
    @endphp
    <a href="{{ $loginUrl }}"
       class="btn btn-sm btn-outline-light rounded-circle position-fixed pulse-animation"
       style="bottom: 20px; right: 20px; z-index: 1050; opacity: 0.85; backdrop-filter: blur(6px); border: 1px solid rgba(255,255,255,0.3); box-shadow: 0 4px 12px rgba(0,0,0,0.3); transition: all 0.3s;"
       title="Login Administrativo"
       data-bs-toggle="tooltip"
       data-bs-placement="left">
        <i class="fas fa-lock"></i>
    </a>
@endif

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    // Ativar tooltips do Bootstrap
    const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    tooltipTriggerList.forEach(function (tooltipTriggerEl) {
        if (typeof bootstrap !== 'undefined') {
            new bootstrap.Tooltip(tooltipTriggerEl);
        }
    });

    // Animação do título
    const title = document.querySelector('.title-glow');
    if (title) {
        setInterval(() => {
            title.classList.toggle('text-glow');
        }, 4000);
    }

    // Animação dos ícones flutuantes
    const icons = document.querySelectorAll('.float-animation');
    icons.forEach((icon, index) => {
        icon.style.animationDelay = `${index * 0.3}s`;
    });

    // Efeito hover nos cards
    const cards = document.querySelectorAll('.interactive-card');
    cards.forEach(card => {
        card.addEventListener('mouseenter', () => {
            card.classList.add('hover-lift');
            gsap.to(card, { y: -10, duration: 0.3, ease: "power2.out" });
        });
        card.addEventListener('mouseleave', () => {
            card.classList.remove('hover-lift');
            gsap.to(card, { y: 0, duration: 0.3, ease: "power2.out" });
        });
    });

    // Botão flutuante com pulsação
    const floatingBtn = document.querySelector('.pulse-animation');
    if (floatingBtn) {
        setInterval(() => {
            floatingBtn.classList.toggle('pulse');
        }, 2000);
    }
});
</script>
@endpush

<style>
.hover-lift {
    transform: translateY(-8px);
    box-shadow: 0 10px 25px rgba(108, 92, 231, 0.3) !important;
}

.pulse {
    animation: pulse 1.5s infinite;
}

@keyframes pulse {
    0% { transform: scale(1); }
    50% { transform: scale(1.05); }
    100% { transform: scale(1); }
}

/* Ajustes para telas pequenas */
@media (max-width: 575.98px) {
    .display-2 {
        font-size: 2.2rem !important;
    }

    .btn-journey.btn-lg {
        font-size: 1.1rem !important;
        padding: 0.7rem 1.2rem !important;
    }

    .glass-effect {
        padding: 1rem !important;
    }

    .interactive-card {
        padding: 0.8rem !important;
    }
}
</style>

@endsection
