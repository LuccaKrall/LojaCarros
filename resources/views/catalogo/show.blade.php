@extends('templates.header_footer')
@section('content')

<style>
    /* O style foi movido para dentro da section para funcionar corretamente */
    body { font-family: 'Arial', sans-serif; background-color: #f4f4f4; margin: 0; padding: 0; }
    .header { background-color: #2c3e50; color: white; padding: 20px; text-align: center; }
    .details-container { max-width: 1000px; margin: 40px auto; padding: 30px; background: white; border-radius: 8px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); }
    .gallery { display: flex; gap: 10px; overflow-x: auto; padding-bottom: 10px; margin-bottom: 20px; }
    .gallery img { height: 150px; width: auto; object-fit: cover; border-radius: 6px; }
    .main-title { color: #3498db; border-bottom: 2px solid #ddd; padding-bottom: 10px; margin-bottom: 20px; }
    .spec-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 30px; }
    .spec-grid div { padding: 10px; border-bottom: 1px dotted #ddd; }
    .spec-grid strong { color: #555; display: block; margin-bottom: 5px; }
    .price { font-size: 2.5em; color: #e74c3c; font-weight: bold; text-align: right; margin-top: 20px; }
    .description-box { border: 1px solid #ddd; padding: 15px; border-radius: 6px; background: #f9f9f9; white-space: pre-wrap; }
    .btn-back { display: inline-block; background-color: #95a5a6; color: white; padding: 10px 15px; border-radius: 4px; text-decoration: none; margin-top: 20px; }
</style>

<div class="header">
    <h1>Modelo: {{ $carro->marca }} {{ $carro->modelo }}</h1>
</div>

<div class="details-container">
    
    <h2 class="main-title">{{ $carro->marca }} {{ $carro->modelo }} ({{ $carro->cor }})</h2>

    <h3>Galeria de Fotos</h3>
    
    <div class="gallery">
        @if ($carro->imagem_1_url)
            <img src="{{ $carro->imagem_1_url }}" alt="Imagem 1" title="{{ $carro->modelo }}">
        @endif
        
        @if ($carro->imagem_2_url)
            <img src="{{ $carro->imagem_2_url }}" alt="Imagem 2" title="{{ $carro->modelo }}">
        @endif
        
        @if ($carro->imagem_3_url)
            <img src="{{ $carro->imagem_3_url }}" alt="Imagem 3" title="{{ $carro->modelo }}">
        @endif

        @if (!$carro->imagem_1_url && !$carro->imagem_2_url && !$carro->imagem_3_url)
            <p>Nenhuma imagem disponível.</p>
        @endif
    </div>

    <div class="spec-grid">
            <div><strong>Ano de Fabricação:</strong> {{ $carro->ano_fabricacao }}</div>
            <div><strong>Quilometragem:</strong> {{ number_format($carro->quilometragem_atual, 0, ',', '.') }} km</div>
            <div><strong>Cor:</strong> {{ $carro->cor }}</div>
            <div><strong>Marca:</strong> {{ $carro->marca }}</div>
        </div>

        <h3>Descrição / Detalhes</h3>
        <div class="description-box">
            @if ($carro->detalhes)
                {{ $carro->detalhes }}
            @else
                Nenhuma descrição detalhada fornecida para este veículo.
            @endif
        </div>

        <div class="price">
            Valor Total: R$ {{ number_format($carro->valor_total, 2, ',', '.') }}
        </div>
        
        <a href="{{ route('catalogo.index') }}" class="btn-back">← Voltar ao Catálogo</a>

    </div>
@endsection