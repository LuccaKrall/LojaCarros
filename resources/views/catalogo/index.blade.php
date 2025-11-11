@extends('templates.header_footer')
@section('content')

<style>
    body { font-family: 'Arial', sans-serif; background-color: #f4f4f4; margin: 0; padding: 0; }
    .header { background-color: #2c3e50; color: white; padding: 20px; text-align: center; }
    .header h1 { margin: 0; font-size: 2.5em; }
    .car-grid { max-width: 1200px; margin: 40px auto; padding: 0 20px; display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 30px; }
    .car-card { background-color: white; border-radius: 8px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); overflow: hidden; transition: transform 0.3s; }
    .car-card:hover { transform: translateY(-5px); box-shadow: 0 8px 15px rgba(0,0,0,0.2); }
    .car-image-container { height: 200px; overflow: hidden; position: relative; }
    .car-image { width: 100%; height: 100%; object-fit: cover; }
    .car-info { padding: 20px; }
    .car-info h2 { font-size: 1.5em; margin-top: 0; color: #3498db; }
    .car-details p { margin: 5px 0; color: #555; font-size: 0.9em; }
    .car-details .value { font-size: 1.2em; font-weight: bold; color: #e74c3c; margin-top: 10px; }
    .btn-view-more { display: block; width: 100%; background-color: #2ecc71; color: white; text-align: center; padding: 10px; margin-top: 15px; border-radius: 4px; text-decoration: none; font-weight: bold; }
    .btn-view-more:hover { background-color: #27ae60; }
</style>

<div class="header">
    <h1>Nosso Catálogo de Veículos</h1>
</div>

<div class="car-grid">
    
    @if (count($carros) > 0)
        @foreach ($carros as $carro)
        <div class="car-card">
            <div class="car-image-container">
            
                @if ($carro->imagem_1_url)
                    <img src="{{ $carro->imagem_1_url }}" alt="{{ $carro->modelo }}" class="car-image">
                @else
                    <div style="background:#eee; height:100%; display:flex; align-items:center; justify-content:center; color:#999;">Imagem Não Disponível</div>
                @endif
            </div>
            <div class="car-info">
                <h2>{{ $carro->marca }} {{ $carro->modelo }}</h2>
                <div class="car-details">
                    <p>Ano: {{ $carro->ano_fabricacao }}</p>
                    <p>KM: {{ number_format($carro->quilometragem_atual, 0, ',', '.') }}</p>
                    <p class="value">R$ {{ number_format($carro->valor_total, 2, ',', '.') }}</p>
                </div>
                
                <a href="{{ route('catalogo.show', $carro->id) }}" class="btn-view-more">Ver Mais Detalhes</a>
            </div>
        </div>
        @endforeach
    @else
        <p style="grid-column: 1 / -1; text-align: center; padding: 50px;">Nenhum veículo disponível no catálogo no momento.</p>
    @endif
    
</div>
@endsection