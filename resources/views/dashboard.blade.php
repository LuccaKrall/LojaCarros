<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #ecf0f1;
            margin: 0;
            padding: 0;
        }

        /* Navbar */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #2c3e50;
            color: #fff;
            padding: 18px 40px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .navbar-title { 
            font-size: 1.6em; 
            font-weight: 600; 
        }
        .navbar-actions { 
            display: flex; 
            gap: 15px; 
            align-items: center; 
        }
        
        /* ADICIONADO AQUI */
        .welcome-message {
            font-size: 1.1em;
            font-weight: 500;
            color: #ecf0f1; /* Um branco um pouco mais suave */
        }
        
        /* Estilos de Botão (Simplificado) */
        .btn {
            border: none;
            padding: 10px 20px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 0.9em;
            font-weight: 600;
            text-decoration: none;
            color: #fff;
            text-align: center;
        }
        .btn-primary { 
            background: #3498db; 
        }
        .btn-primary:hover { 
            background: #2980b9; 
        }
        .btn-logout {
            background: #e74c3c;
        }
        .btn-logout:hover {
            background: #c0392b;
        }

        /* Conteúdo Principal */
        .container {
            max-width: 1100px;
            margin: 50px auto;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0,0,0,0.1);
            padding: 40px;
        }
        
        /* Cards de Resumo (Simplificado, sem hover) */
        .cards {
            display: flex;
            gap: 30px;
            flex-wrap: wrap;
            justify-content: space-around;
            margin-bottom: 40px;
        }
        .card {
            flex: 1 1 250px;
            background: #ffffff;
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 30px;
            text-align: center;
        }
        .card h2 { 
            margin: 0 0 8px 0; 
            font-size: 2.5em; 
            color: #3498db; 
        }
        .card p { 
            margin: 0; 
            color: #7f8c8d; 
            font-size: 1.1em; 
            font-weight: 500; 
        }
        
        /* Tabela de Carros */
        .car-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 30px;
        }
        .car-table th, .car-table td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
            font-size: 0.95em;
            vertical-align: middle;
        }
        .car-table th {
            background-color: #3498db;
            color: white;
            font-weight: 600;
        }
        .car-table tr:nth-child(even) { 
            background-color: #f7f7f7; 
        }
        
        /* Classes específicas para colunas (Mais fácil que nth-child) */
        .col-foto {
            width: 100px;
            text-align: center;
        }
        .col-acoes {
            text-align: center;
        }
        
        /* Foto do carro na tabela */
        .car-photo {
            width: 80px;
            height: auto;
            border-radius: 4px;
        }

        /* Botões de Ação na Tabela */
        .action-buttons {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 8px;
        }
        
        .btn-alterar {
            background-color: #f39c12; /* Laranja/Amarelo */
            padding: 5px 10px;
            font-size: 0.85em;
            display: inline-block;
            white-space: nowrap;
        }
        
        .btn-deletar {
            background-color: #e74c3c; /* Vermelho */
            padding: 5px 10px;
            font-size: 0.85em;
        }

        /* Responsividade */
        @media (max-width: 768px) {
            .navbar { 
                flex-direction: column; 
                gap: 15px; 
            }
            .cards { 
                flex-direction: column; 
            }
        }
    </style>
</head>
<body>
    <div class="navbar">
        <div class="navbar-title">Dashboard Loja de Carros</div>
        
        <div class="navbar-actions">
            
            <span class="welcome-message">
                Olá, {{ auth()->user()->name }}
            </span>
            
            <a href="{{ route('carros.create') }}" class="btn btn-primary">
                + Novo Carro
            </a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-logout">Sair</button>
            </form>
        </div>
    </div>
    
    <div class="container">
        <h1>Visão Geral da Loja</h1>
        <hr style="border: 0; height: 1px; background: #ddd; margin: 20px 0;">
        
        <div class="cards">
            <div class="card">
                <h2>{{ count($carros) }}</h2>
                <p>Carros cadastrados</p>
            </div>
            <div class="card">
                <h2>35</h2>
                <p>Vendas este mês</p>
            </div>
            <div class="card">
                <h2>8</h2>
                <p>Novos clientes</p>
            </div>
        </div>
        
        <br>
        <h2>Estoque Atual de Veículos</h2>
        <hr style="border: 0; height: 1px; background: #ddd; margin: 20px 0;">
        
        @if (count($carros) > 0)
        <table class="car-table">
            <thead>
                <tr>
                    <th>Marca</th>
                    <th class="col-foto">Foto</th>
                    <th>Modelo/Cor</th>
                    <th>Ano</th>
                    <th>KM Atual</th>
                    <th>Valor</th>
                    <th class="col-acoes">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($carros as $carro)
                <tr>
                    <td>{{ $carro->marca }}</td>
                    
                    <td class="col-foto">
                        
                        @if ($carro->imagem_1_url)
                            <img src="{{ $carro->imagem_1_url }}" alt="Foto de {{ $carro->modelo }}" class="car-photo">
                        @else
                            Sem Foto
                        @endif
                    </td>
                    
                    <td>{{ $carro->modelo }} ({{ $carro->cor }})</td>
                    <td>{{ $carro->ano_fabricacao }}</td>
                    <td>{{ $carro->quilometragem_atual }} km</td>
                    <td>R$ {{ $carro->valor_total }}</td>
                    
                    <td class="col-acoes">
                        <div class="action-buttons">
                            <a href="{{ route('carros.edit', $carro->id) }}" 
                               class="btn btn-alterar">
                                Alterar
                            </a>
                            
                            <form action="{{ route('carros.destroy', $carro->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                
                                <button type="submit" 
                                        class="btn btn-deletar"
                                        onclick="return confirm('Tem certeza que deseja excluir {{ $carro->modelo }}?');">
                                    Deletar
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
            <p>Nenhum carro encontrado no estoque. <a href="{{ route('carros.create') }}">Cadastre o primeiro!</a></p>
        @endif
        
    </div>
</body>
</html>