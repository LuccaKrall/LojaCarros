<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Carro: {{ $carro->modelo }}</title>
    
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f6f8;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .form-card {
            background: #fff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
        }
        h1 {
            color: #2c3e50;
            margin-bottom: 25px;
            text-align: center;
            font-size: 1.8em;
            border-bottom: 2px solid #ddd;
            padding-bottom: 10px;
        }
        .alert-error-summary {
            background-color: #f8d7da; 
            color: #721c24; 
            border: 1px solid #f5c6cb;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
            list-style-type: none;
            padding-left: 20px;
        }
        .alert-error-summary ul { margin: 5px 0 0 0; padding-left: 20px; }
        .form-group { margin-bottom: 18px; }
        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 6px;
            color: #34495e;
            font-size: 0.95em;
        }
        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            transition: border-color 0.3s;
        }
        .form-group input:focus,
        .form-group textarea:focus { border-color: #3498db; outline: none; }
        .form-actions {
            margin-top: 30px;
            display: flex;
            justify-content: flex-end;
            gap: 10px;
        }
        .btn {
            padding: 10px 18px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: 600;
            text-decoration: none;
            text-align: center;
            transition: background-color 0.3s;
        }
        .btn-primary { background-color: #3498db; color: white; border: none; }
        .btn-primary:hover { background-color: #2980b9; }
        .btn-secondary { background-color: #ecf0f1; color: #34495e; border: 1px solid #bdc3c7; }
        .btn-secondary:hover { background-color: #dcdde1; }
        .alert-danger { color: #e74c3c; font-size: 0.85em; margin-top: 5px; }
        .image-inputs { border: 1px solid #ddd; padding: 15px; border-radius: 4px; margin-top: 15px; background-color: #f9f9f9; }
        .image-preview { margin-top: 10px; display: flex; gap: 10px; flex-wrap: wrap; }
        .image-preview img { width: 80px; height: 80px; object-fit: cover; border-radius: 4px; border: 1px solid #ddd; }
    </style>
</head>
<body>
    <div class="form-card">
        <h1>Alterar Carro: {{ $carro->modelo }}</h1>
        
        @if ($errors->any())
            <ul class="alert-error-summary">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        
        <form method="POST" action="{{ route('carros.update', $carro->id) }}">
            @csrf 
            @method('PUT') 

            <div class="form-group">
                <label for="marca">Marca:</label>
                <input type="text" id="marca" name="marca" 
                       value="{{ $carro->marca }}" required> 
            </div>
            
            <div class="form-group">
                <label for="modelo">Modelo:</label>
                <input type="text" id="modelo" name="modelo" 
                       value="{{ $carro->modelo }}" required> 
            </div>
            
            <div class="form-group">
                <label for="cor">Cor:</label>
                <input type="text" id="cor" name="cor" 
                       value="{{ $carro->cor }}" required> 
            </div>

            <div class="form-group">
                <label for="ano_fabricacao">Ano de Fabricação:</label>
                <input type="number" id="ano_fabricacao" name="ano_fabricacao" 
                       value="{{ $carro->ano_fabricacao }}" required>
            </div>

            <div class="form-group">
                <label for="quilometragem_atual">Quilometragem Atual (km):</label>
                <input type="number" id="quilometragem_atual" name="quilometragem_atual" 
                       value="{{ $carro->quilometragem_atual }}" required>
            </div>

            <div class="form-group">
                <label for="valor_total">Valor Total (R$):</label>
                <input type="number" id="valor_total" name="valor_total" 
                       value="{{ $carro->valor_total }}" step="0.01" required>
            </div>

            <div class="form-group">
                <label for="detalhes">Detalhes / Descrição:</label>
                <textarea id="detalhes" name="detalhes" rows="5">{{ $carro->detalhes }}</textarea>
            </div>

            <div class="image-inputs">
                <label style="color: #3498db; font-size: 1.1em; margin-bottom: 10px;">Links das Imagens (Máx. 3)</label>
                
                <div class="form-group">
                    <label for="imagem_1_url">Imagem 1 (Principal):</label>
                    <input type="url" id="imagem_1_url" name="imagem_1_url" value="{{ $carro->imagem_1_url }}">
                    @if ($carro->imagem_1_url)
                    <div class="image-preview"> <img src="{{ $carro->imagem_1_url }}" alt="Preview Imagem 1"> </div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="imagem_2_url">Imagem 2:</label>
                    <input type="url" id="imagem_2_url" name="imagem_2_url" value="{{ $carro->imagem_2_url }}">
                    @if ($carro->imagem_2_url)
                    <div class="image-preview"> <img src="{{ $carro->imagem_2_url }}" alt="Preview Imagem 2"> </div>
                    @endif
                </div>
                
                <div class="form-group" style="margin-bottom: 0;">
                    <label for="imagem_3_url">Imagem 3:</label>
                    <input type="url" id="imagem_3_url" name="imagem_3_url" value="{{ $carro->imagem_3_url }}">
                    @if ($carro->imagem_3_url)
                    <div class="image-preview"> <img src="{{ $carro->imagem_3_url }}" alt="Preview Imagem 3"> </div>
                    @endif
                </div>
            </div>

            <div class="form-actions">
                <a href="{{ route('dashboard') }}" class="btn btn-secondary">Cancelar</a>
                <button type="submit" class="btn btn-primary">Salvar Alterações</button>
            </div>
        </form>
    </div>
</body>
</html>