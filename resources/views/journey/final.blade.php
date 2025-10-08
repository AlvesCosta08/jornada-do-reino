@extends('layouts.app')

@section('title', 'O Encontro')

@section('content')
<div class="container-fluid d-flex flex-column align-items-center justify-content-center min-vh-100 px-3 px-md-4">
    <div id="light-beam" class="position-absolute rounded-circle" style="
        width: 250px;
        height: 250px;
        background: radial-gradient(circle, rgba(108,92,231,0.4) 0%, transparent 70%);
        filter: blur(50px);
        z-index: -1;
        opacity: 0;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    "></div>

    <h1 class="display-6 display-md-5 display-lg-4 fw-bold text-center title-glow mb-3 mb-md-4">
        O Encontro
    </h1>

    <div class="text-center mt-3 mt-md-4" style="max-width: 650px; width: 100%;">
        <div class="glass-effect rounded-3 p-3 p-md-4">
            <h4 class="h6 h5-md mb-2 mb-md-3 text-gold">🎥 Assista ao Momento Final</h4>
            <div class="ratio ratio-16x9">
                <video controls preload="metadata" class="w-100 h-100" style="object-fit: contain; background: #000; border-radius: 8px;">
                    <source src="{{ asset('video/encontro-final.mp4') }}" type="video/mp4">
                    Seu navegador não suporta o elemento de vídeo.
                </video>
            </div>
        </div>
    </div>

    <div id="buttons" class="mt-4 mt-md-5 w-100" style="opacity: 0; max-width: 500px;">
        <div class="d-flex flex-column flex-md-row justify-content-center gap-3">
            <button class="btn btn-outline-light btn-lg px-4 py-2 w-100" onclick="accept()">
                Sim, Senhor. Eu quero.
            </button>
            <button class="btn btn-outline-light btn-lg px-4 py-2 w-100" onclick="later()">
                Preciso de mais tempo.
            </button>
        </div>
    </div>

    <div id="confirmation" class="text-center mt-4 mt-md-5" style="display: none; max-width: 600px; width: 100%;">
        <p class="lead text-warning fs-4 fs-md-3">✨ Seu "sim" ecoou nos céus.</p>
        <p class="fs-6 fs-md-5">Você não está mais sozinho.</p>
        <div class="mt-4 d-flex flex-column flex-md-row justify-content-center gap-3">
            <a href="{{ route('prayer.request') }}" class="btn btn-light text-dark btn-lg w-100">
                Pedir oração
            </a>
            <a href="https://wa.me/seunumero" target="_blank" class="btn btn-outline-light btn-lg w-100">
                Conversar com alguém
            </a>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const bgMusic = document.getElementById('bgMusic');
    if (bgMusic) {
        window.originalAudio = bgMusic.querySelector('source').src;
        const hopeAudio = "{{ asset('audio/hope-theme.mp4') }}".replace('.mp4', '.mp3'); // fallback
        bgMusic.querySelector('source').src = "{{ asset('audio/hope-theme.mp3') }}";
        bgMusic.load();
        setTimeout(() => {
            bgMusic.volume = 0.15;
            bgMusic.play().catch(e => console.log("Áudio bloqueado até interação"));
        }, 1000);
    }

    gsap.to('#light-beam', { opacity: 0.7, duration: 3, ease: "power1.inOut" });

    function showMessage(id) {
        const el = document.getElementById(id);
        el.style.display = 'block';
        gsap.to(el, { opacity: 1, y: 0, duration: 1.2 });
    }

    setTimeout(() => showMessage('message1'), 1000);
    setTimeout(() => showMessage('message2'), 5000);
    setTimeout(() => {
        showMessage('message3');
        gsap.to('#buttons', { opacity: 1, duration: 1 });
    }, 9000);
});

function accept() {
    document.getElementById('buttons').style.display = 'none';
    document.getElementById('confirmation').style.display = 'block';

    const bgMusic = document.getElementById('bgMusic');
    if (bgMusic) {
        gsap.to(bgMusic, { volume: 0.4, duration: 4 });
    }

    gsap.to('#light-beam', {
        opacity: 1,
        scale: 2,
        duration: 4,
        ease: "power2.out"
    });

    gsap.from('#confirmation', { opacity: 0, y: 30, duration: 1.5 });
}

function later() {
    if (confirm("Tudo bem. Mas saiba que Eu estarei aqui, sempre.\n\nQuer voltar para o início?")) {
        const bgMusic = document.getElementById('bgMusic');
        if (bgMusic && window.originalAudio) {
            bgMusic.querySelector('source').src = window.originalAudio;
            bgMusic.load();
        }
        window.location.href = "{{ url('/') }}";
    }
}
</script>

<style>
/* Ajustes extras para telas muito pequenas */
@media (max-width: 575.98px) {
    #light-beam {
        width: 200px !important;
        height: 200px !important;
        filter: blur(40px) !important;
    }

    .display-6 {
        font-size: 1.8rem !important;
    }

    .fs-6 {
        font-size: 1rem !important;
        line-height: 1.5 !important;
    }

    .btn-lg {
        font-size: 1rem !important;
        padding: 0.6rem 1rem !important;
    }
}
</style>
@endsection
