@extends('layouts.app')

@section('title', 'Jornada do Reino - Descubra Seu Propósito')

@section('content')
<div class="position-relative min-vh-100 d-flex align-items-center justify-content-center overflow-hidden">
    <!-- Vídeo de Fundo -->
    <div class="video-bg position-absolute top-0 start-0 w-100 h-100">
        <video class="w-100 h-100 object-fit-cover" autoplay muted loop>
            <source src="https://assets.mixkit.co/videos/preview/mixkit-forest-path-under-the-trees-3972-large.mp" type="video/mp4">
            Seu navegador não suporta vídeos.
        </video>
        <!-- Overlay escuro -->
        <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark opacity-75"></div>
    </div>

    <!-- Conteúdo Central -->
    <div class="container text-center text-white z-index-10 position-relative" data-aos="fade-up">
        <h1 class="display-4 display-md-3 fw-bold mb-4">
            Você já se perguntou <span class="text-gold">qual é o verdadeiro sentido da sua vida?</span>
        </h1>
        <p class="lead fs-5 fs-md-4 mb-4">
            A <strong>Jornada do Reino</strong> vai te levar a um encontro profundo com o propósito eterno de sua existência.
        </p>

        <a href="{{ route('journey.start') }}" class="btn btn-journey btn-lg px-5 py-3 fs-5 fw-bold text-white shadow-lg mt-3">
            <i class="fas fa-rocket me-2"></i> Começar Minha Jornada
        </a>

        <div class="mt-4">
            <small class="text-light d-block">
                ✅ Experiência gratuita • ✅ Transformação garantida
            </small>
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
    // Ativar tooltips
    const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    tooltipTriggerList.forEach(function (tooltipTriggerEl) {
        new bootstrap.Tooltip(tooltipTriggerEl);
    });
});
</script>
@endpush

<style>
    .text-gold { color: #d4af37 !important; }
    .btn-journey {
        background: linear-gradient(45deg, #d4af37, #b8860b);
        border: none;
        transition: all 0.3s ease;
    }
    .btn-journey:hover {
        background: linear-gradient(45deg, #b8860b, #d4af37);
        transform: translateY(-3px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
    }
    .pulse-animation {
        animation: pulse 2s infinite;
    }
    @keyframes pulse {
        0% { transform: scale(1); }
        50% { transform: scale(1.1); }
        100% { transform: scale(1); }
    }
    .z-index-10 { z-index: 10; }
</style>

@endsection
