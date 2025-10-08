@extends('layouts.app')

@section('title', 'Início da Jornada')

@section('content')
<div class="container py-4 py-md-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6 text-center">

            <!-- Card Principal -->
            <div class="station-card" data-aos="zoom-in">
                <h1 class="display-6 display-md-5 display-lg-4 text-gold mb-3 mb-md-4 title-glow">
                    Bem-vindo à Jornada
                </h1>

                <p class="fs-6 fs-md-5 mb-3 mb-md-4" data-aos="fade-up" data-aos-delay="200">
                    Você está prestes a embarcar em uma experiência transformadora que pode mudar sua vida para sempre.
                </p>

                <!-- Versículo -->
                <div class="glass-effect rounded-3 p-3 p-md-4 mb-3 mb-md-4"
                     data-aos="fade-up"
                     data-aos-delay="400">
                    <p class="fst-italic fs-6 fs-md-5 mb-2">"Eis que estou à porta e bato. Se alguém ouvir a minha voz e abrir a porta, entrarei e cearei com ele, e ele comigo."</p>
                    <p class="fw-bold text-gold mt-2 fs-6 fs-md-5">Apocalipse 3:20</p>
                </div>

                <p class="mb-3 mb-md-4 fs-6 fs-md-5" data-aos="fade-up" data-aos-delay="600">
                    Está pronto para descobrir o propósito que Deus tem para sua vida?
                </p>

                <!-- Botão de Início -->
                <a href="{{ route('station.show', 1) }}"
                   class="btn btn-journey btn-lg w-100 w-md-auto fs-6 fs-md-5 px-4 px-md-5 py-2 py-md-3 float-animation"
                   data-aos="fade-up"
                   data-aos-delay="800">
                   Sim, Quero Começar! 🙏
                </a>
            </div>

            <!-- Voltar -->
            <div class="mt-4" data-aos="fade-up" data-aos-delay="1000">
                <a href="{{ route('home') }}" class="btn btn-outline-light w-100 w-md-auto">
                    ← Voltar para o Início
                </a>
            </div>

        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const title = document.querySelector('.title-glow');
    if (title) {
        setInterval(() => {
            title.classList.toggle('text-glow');
        }, 3000);
    }
});
</script>

<style>
/* Garantir que o botão não fique muito largo em mobile */
@media (max-width: 767.98px) {
    .btn-journey.btn-lg {
        font-size: 1.1rem !important;
        padding: 0.6rem 1.2rem !important;
    }
}
</style>
@endsection
