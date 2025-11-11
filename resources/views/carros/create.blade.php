@extends('templates.header_footer')

@section('content')

<div style="background-color: #f4f6f8; padding: 40px 20px; font-family: Arial, sans-serif;">
    
    <div style="background: #fff; padding: 40px; border-radius: 8px; max-width: 600px; margin: auto; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);">
        
        <h1 style="text-align: center; color: #2c3e50; border-bottom: 2px solid #ddd; padding-bottom: 10px;">
            Cadastrar Novo Carro
        </h1>
        
        @if ($errors->any())
            <ul style="background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; padding: 15px; border-radius: 5px; list-style-type: none;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <form method="POST" action="{{ route('carros.store') }}">
            @csrf 

            <label for="marca">Marca:</label><br>
            <input type="text" id="marca" name="marca" value="{{ old('marca') }}" required style="width: 100%; padding: 8px; box-sizing: border-box;">
            <br><br>

            <label for="modelo">Modelo:</label><br>
            <input type="text" id="modelo" name="modelo" value="{{ old('modelo') }}" required style="width: 100%; padding: 8px; box-sizing: border-box;">
            <br><br>

            <label for="cor">Cor:</label><br>
            <input type="text" id="cor" name="cor" value="{{ old('cor') }}" required style="width: 100%; padding: 8px; box-sizing: border-box;">
            <br><br>

            <label for="ano_fabricacao">Ano de Fabricação:</label><br>
            <input type="number" id="ano_fabricacao" name="ano_fabricacao" value="{{ old('ano_fabricacao') }}" required min="1900" max="{{ date('Y') }}" style="width: 100%; padding: 8px; box-sizing: border-box;">
            <br><br>

            <label for="quilometragem_atual">Quilometragem (km):</label><br>
            <input type="number" id="quilometragem_atual" name="quilometragem_atual" value="{{ old('quilometragem_atual') }}" required min="0" style="width: 100%; padding: 8px; box-sizing: border-box;">
            <br><br>

            <label for="valor_total">Valor Total (R$):</label><br>
            <input type="number" id="valor_total" name="valor_total" value="{{ old('valor_total') }}" step="0.01" required min="0" style="width: 100%; padding: 8px; box-sizing: border-box;">
            <br><br>
            
            <label for="detalhes">Detalhes / Descrição:</label><br>
            <textarea id="detalhes" name="detalhes" rows="5" style="width: 100%; padding: 8px; box-sizing: border-box;">{{ old('detalhes') }}</textarea>
            <br><br>

            <fieldset style="border: 1px solid #ddd; background-color: #f9f9f9; padding: 15px;">
                <legend style="color: #3498db; font-size: 1.1em; font-weight: bold;">
                    Links das Imagens (Máx. 3)
                </legend>
                
                <label for="imagem_1_url">Imagem 1 (Principal):</label><br>
                <input type="url" id="imagem_1_url" name="imagem_1_url" value="{{ old('imagem_1_url') }}" style="width: 100%; padding: 8px; box-sizing: border-box;">
                <br><br>

                <label for="imagem_2_url">Imagem 2:</label><br>
                <input type="url" id="imagem_2_url" name="imagem_2_url" value="{{ old('imagem_2_url') }}" style="width: 100%; padding: 8px; box-sizing: border-box;">
                <br><br>

                <label for="imagem_3_url">Imagem 3:</label><br>
                <input type="url" id="imagem_3_url" name="imagem_3_url" value="{{ old('imagem_3_url') }}" style="width: 100%; padding: 8px; box-sizing: border-box;">
            </fieldset>

            <br><br>

            <div style="text-align: right;">
                <a href="{{ route('dashboard') }}" style="padding: 10px 18px; border-radius: 5px; background-color: #ecf0f1; color: #34495e; border: 1px solid #bdc3c7; text-decoration: none;">
                    Voltar
                </a>
                
                <button type="submit" style="padding: 10px 18px; border-radius: 5px; background-color: #3498db; color: white; border: none; cursor: pointer;">
                    Cadastrar Carro
                </button>
            </div>
        </form>
    </div>
</div>
@endsection