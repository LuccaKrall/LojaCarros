<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Novo Carro</title>
    
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
        .form-group {
            margin-bottom: 18px;
        }
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
        .form-group textarea:focus {
            border-color: #3498db;
            outline: none;
        }
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
        .btn-primary {
            background-color: #3498db;
            color: white;
            border: none;
        }
        .btn-primary:hover {
            background-color: #2980b9;
        }
        .btn-secondary {
            background-color: #ecf0f1;
            color: #34495e;
            border: 1px solid #bdc3c7;
        }
        .btn-secondary:hover {
            background-color: #dcdde1;
        }
        .alert-danger { 
            color: #e74c3c; 
            font-size: 0.85em; 
            margin-top: 5px; 
        }
    </style>
</head>
<body>
    <div class="form-card">
        <h1>Cadastrar Novo Carro</h1>
        
        <form method="POST" action="{{ route('carros.store') }}">
            @csrf 

            {{-- Linha 1: Marca, Modelo, Cor --}}
            <div style="display: flex; gap: 20px;">
                <div class="form-group" style="flex: 1;">
                    <label for="marca">Marca:</label>
                    <input type="text" id="marca" name="marca" value="{{ old('marca') }}" required>
                    @error('marca')
                        <div class="alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="form-group" style="flex: 1;">
                    <label for="modelo">Modelo:</label>
                    <input type="text" id="modelo" name="modelo" value="{{ old('modelo') }}" required>
                    @error('modelo')
                        <div class="alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="form-group" style="width: 150px;">
                    <label for="cor">Cor:</label>
                    <input type="text" id="cor" name="cor" value="{{ old('cor') }}" required>
                    @error('cor')
                        <div class="alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            {{-- Linha 2: Ano, KM, Valor --}}
            <div style="display: flex; gap: 20px;">
                <div class="form-group" style="flex: 1;">
                    <label for="ano_fabricacao">Ano de Fabricação:</label>
                    <input type="number" id="ano_fabricacao" name="ano_fabricacao" value="{{ old('ano_fabricacao') }}" required min="1900" max="{{ date('Y') }}">
                    @error('ano_fabricacao')
                        <div class="alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group" style="flex: 1;">
                    <label for="quilometragem_atual">Quilometragem Atual (km):</label>
                    <input type="number" id="quilometragem_atual" name="quilometragem_atual" value="{{ old('quilometragem_atual') }}" required min="0">
                    @error('quilometragem_atual')
                        <div class="alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group" style="flex: 1;">
                    <label for="valor_total">Valor Total (R$):</label>
                    <input type="number" id="valor_total" name="valor_total" value="{{ old('valor_total') }}" step="0.01" required min="0">
                    @error('valor_total')
                        <div class="alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            {{-- Linha 3: Foto Principal (Link) --}}
            <div class="form-group">
                <label for="foto_principal_url">Link da Foto Principal:</label>
                <input type="url" id="foto_principal_url" name="foto_principal_url" value="{{ old('foto_principal_url') }}">
                @error('foto_principal_url')
                    <div class="alert-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- Linha 4: Detalhes (Descrição) --}}
            <div class="form-group">
                <label for="detalhes">Detalhes / Descrição:</label>
                <textarea id="detalhes" name="detalhes" rows="5">{{ old('detalhes') }}</textarea>
                @error('detalhes')
                    <div class="alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-actions">
                <a href="{{ route('dashboard') }}" class="btn btn-secondary">Cancelar</a>
                <button type="submit" class="btn btn-primary">Cadastrar Carro</button>
            </div>
        </form>
    </div>
</body>
</html>