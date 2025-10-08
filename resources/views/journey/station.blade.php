@extends('layouts.app')

@section('title', $station['title'])

@section('content')
<div class="container py-3 py-md-4 station-content">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6">

            <!-- Cabeçalho com Progresso -->
            <div class="d-flex flex-column flex-sm-row justify-content-between align-items-center mb-3 mb-md-4"
                 data-aos="fade-down">
                <h1 class="h3 h2-md text-gold title-glow text-center text-sm-start">{{ $station['title'] }}</h1>
                <span class="badge bg-primary fs-6 mt-2 mt-sm-0 glow-animation">
                    Estação {{ $stationNumber }} de {{ $totalStations }}
                </span>
            </div>

            <!-- Barra de Progresso Animada -->
            <div class="progress-journey mb-3 mb-md-4" data-aos="fade-right">
                <div class="progress-bar"
                     style="width: {{ ($stationNumber / $totalStations) * 100 }}%">
                </div>
            </div>

            <!-- Card da Estação -->
            <div class="station-card"
                 data-aos="zoom-in"
                 data-aos-delay="300">

                <!-- Conteúdo Principal -->
                <div class="text-center mb-3 mb-md-4" data-aos="fade-up" data-aos-delay="500">
                    <p class="fs-6 fs-md-5">{{ $station['content'] }}</p>
                </div>

                <!-- Versículo -->
                @if(isset($station['verse']))
                <div class="glass-effect rounded-3 p-3 p-md-4 mb-3 mb-md-4 scripture-text"
                     data-aos="fade-up"
                     data-aos-delay="600">
                    <p class="fst-italic mb-0 fs-6 fs-md-5">{{ $station['verse'] }}</p>
                </div>
                @endif

                <!-- Vídeo local após o versículo -->
                @if(isset($station['video_file']))
                <div class="glass-effect rounded-3 p-3 p-md-4 mb-3 mb-md-4"
                     data-aos="fade-up"
                     data-aos-delay="650">
                    <h4 class="h6 h5-md mb-2 mb-md-3 text-gold text-center">🎥 Assista ao Vídeo</h4>
                    <div class="ratio ratio-16x9">
                        <video controls preload="metadata" class="w-100 h-100" style="object-fit: contain; background: #000; border-radius: 8px;">
                            <source src="{{ asset('video/' . $station['video_file']) }}" type="video/mp4">
                            Seu navegador não suporta o elemento de vídeo.
                        </video>
                    </div>
                </div>
                @endif

                <!-- Pergunta Interativa -->
                <div class="glass-effect rounded-3 p-3 p-md-4 mb-3 mb-md-4"
                     data-aos="fade-up"
                     data-aos-delay="700">
                    <h4 class="h6 h5-md mb-2 mb-md-3 text-gold text-center">{{ $station['question'] }}</h4>

                    <div class="row g-2">
                        @foreach($station['options'] as $index => $option)
                        <div class="col-12"
                             data-aos="fade-up"
                             data-aos-delay="{{ 800 + ($index * 100) }}">
                            <button class="btn btn-outline-light w-100 text-start py-2 py-md-3 option-btn"
                                    onclick="selectOption(this, {{ $stationNumber }})"
                                    data-option="{{ $index }}">
                                {{ $option }}
                            </button>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Navegação -->
                <div class="d-flex flex-column flex-md-row justify-content-between gap-2"
                     data-aos="fade-up"
                     data-aos-delay="1200">

                    <!-- Botão Voltar -->
                    @if($stationNumber > 1)
                    <a href="{{ route('station.show', $stationNumber - 1) }}"
                       class="btn btn-outline-secondary w-100">
                        ← Estação Anterior
                    </a>
                    @else
                    <a href="{{ route('journey.start') }}"
                       class="btn btn-outline-secondary w-100">
                        ← Início da Jornada
                    </a>
                    @endif

                    <!-- Botão Avançar ou Finalizar -->
                    @if($stationNumber < $totalStations)
                    <a href="{{ route('station.show', $stationNumber + 1) }}"
                       class="btn btn-journey w-100"
                       id="nextBtn"
                       style="display: none;"
                       onclick="animateTransition(this.href)">
                        Próxima Estação →
                    </a>
                    @else
                    <a href="{{ route('journey.final') }}"
                    class="btn btn-success w-100"
                    id="prayerBtn"
                    style="display: none;">
                        🙏 Finalizar Jornada
                    </a>
                    @endif
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Modal de Oração Final -->
<div class="modal fade" id="prayerModal" tabindex="-1" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content glass-effect border-0 text-white">
            <div class="modal-header border-0">
                <h5 class="modal-title text-gold">🙏 Pedido de Oração</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p class="mb-3">Parabéns por completar esta jornada! Como podemos orar por você?</p>
                <textarea class="form-control bg-dark text-white border-0 rounded-3"
                          rows="4"
                          placeholder="Escreva seu pedido de oração (mínimo 5 caracteres)..."
                          id="prayerText"></textarea>
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Depois</button>
                <button type="button" class="btn btn-journey" onclick="submitPrayer()">Enviar Oração</button>
            </div>
        </div>
    </div>
</div>

<script>
// Sistema de Seleção de Opções
function selectOption(button, stationId) {
    document.querySelectorAll('.option-btn').forEach(btn => {
        btn.classList.remove('selected', 'btn-primary', 'animate__animated', 'animate__pulse');
        btn.classList.add('btn-outline-light');
    });

    button.classList.remove('btn-outline-light');
    button.classList.add('selected', 'btn-primary', 'animate__animated', 'animate__pulse');

    setTimeout(() => {
        button.classList.remove('animate__pulse');
    }, 1000);

    const nextBtn = document.getElementById('nextBtn');
    const prayerBtn = document.getElementById('prayerBtn');

    if (stationId < {{ $totalStations }} && nextBtn) {
        nextBtn.style.display = 'block';
        nextBtn.classList.add('animate__bounceIn');
    } else if (prayerBtn) {
        prayerBtn.style.display = 'block';
        prayerBtn.classList.add('animate__bounceIn');
    }
}

// Animação de Transição
function animateTransition(nextUrl) {
    const mainContent = document.querySelector('main');
    mainContent.style.opacity = '0';
    mainContent.style.transform = 'translateX(-100px)';
    mainContent.style.transition = 'all 0.8s ease-in-out';

    setTimeout(() => {
        window.location.href = nextUrl;
    }, 800);
    return false;
}

// ✅ Envio do Pedido de Oração via AJAX
function submitPrayer() {
    const prayerText = document.getElementById('prayerText').value.trim();
    const submitBtn = document.querySelector('.modal-footer .btn-journey');
    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

    if (prayerText.length < 5) {
        const textarea = document.getElementById('prayerText');
        textarea.classList.add('animate__animated', 'animate__headShake');
        setTimeout(() => textarea.classList.remove('animate__headShake'), 1000);
        return;
    }

    submitBtn.disabled = true;
    submitBtn.textContent = 'Enviando...';

    fetch("{{ route('prayer.store') }}", {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken
        },
        body: JSON.stringify({
            request: prayerText
        })
    })
    .then(response => {
        if (!response.ok) {
            return response.json().then(err => { throw new Error(err.message || 'Erro no envio'); });
        }
        return response.json();
    })
    .then(data => {
        const modal = document.querySelector('.modal-content');
        modal.classList.add('animate__animated', 'animate__tada');

        setTimeout(() => {
            bootstrap.Modal.getInstance(document.getElementById('prayerModal')).hide();
            alert('Obrigado! Sua oração foi enviada. Que Deus te abençoe! 🙏');
            window.location.href = "{{ route('home') }}";
        }, 1500);
    })
    .catch(error => {
        console.error('Erro:', error);
        alert(error.message || 'Ocorreu um erro. Por favor, tente novamente.');
        submitBtn.disabled = false;
        submitBtn.textContent = 'Enviar Oração';
    });
}

// Inicialização das Animações
document.addEventListener('DOMContentLoaded', function() {
    const stationContent = document.querySelector('.station-content');
    if (stationContent) {
        stationContent.style.opacity = '0';
        stationContent.style.transform = 'translateY(20px)';
        setTimeout(() => {
            stationContent.style.transition = 'all 0.8s ease-out';
            stationContent.style.opacity = '1';
            stationContent.style.transform = 'translateY(0)';
        }, 200);
    }

    const title = document.querySelector('.title-glow');
    if (title) {
        setInterval(() => {
            title.classList.toggle('text-glow');
        }, 3000);
    }
});
</script>

<style>
.scripture-text {
    font-family: 'Georgia', serif;
    line-height: 1.7;
    position: relative;
    border-left: 3px solid var(--dourado);
}

.station-content {
    perspective: 1000px;
}

.option-btn {
    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275) !important;
    font-size: 0.95rem;
}

.progress-journey {
    height: 6px;
    background-color: #2c2c2c;
    border-radius: 3px;
    overflow: hidden;
}

.progress-bar {
    height: 100%;
    background: linear-gradient(90deg, #d4af37, #f9d71c);
    transition: width 0.6s ease;
}

/* Ajustes para telas muito pequenas */
@media (max-width: 575.98px) {
    .title-glow {
        font-size: 1.4rem !important;
    }

    .btn {
        font-size: 0.9rem;
        padding: 8px 12px;
    }

    .option-btn {
        font-size: 0.9rem;
        padding: 8px 12px !important;
    }

    .progress-journey {
        height: 5px;
    }
}
</style>
@endsection
