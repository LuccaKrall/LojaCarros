<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Dashboard')</title>
    <style>
        :root {
            --primary-color: #3498db; 
            --secondary-color: #2c3e50;
            --background-light: #ecf0f1; 
            --danger-color: #e74c3c;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: var(--background-light);
            margin: 0;
            padding: 0;
        }
        .navbar {
            display: flex; 
            justify-content: space-between;
            align-items: center;
            background: var(--secondary-color);
            color: #fff;
            padding: 18px 40px; 
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .navbar-title { font-size: 1.6em; font-weight: 600; }
        .navbar-actions { display: flex; gap: 15px; align-items: center; }
        /* Estilo base do botão */
        .btn { border: none; padding: 10px 20px; border-radius: 6px; cursor: pointer; font-size: 0.9em; font-weight: 600; text-decoration: none; color: #fff; text-align: center; transition: background 0.3s ease; }
        .btn-primary { background: var(--primary-color); }
        .btn-primary:hover { background: #2980b9; }
        .logout-form button { background: var(--danger-color); font-size: 0.9em; }
        .logout-form button:hover { background: #c0392b; }
        
        /* Estilo do Conteúdo Principal */
        .container {
            max-width: 1100px;
            margin: 50px auto;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0,0,0,0.1);
            padding: 40px;
        }
        /* Estilos adicionais para o conteúdo (Tabela, etc.) */
        /* --- ESTILOS DA TABELA DE CARROS --- */
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 12px; text-align: left; }
        th { background-color: var(--primary-color); color: white; }
        tr:nth-child(even) { background-color: #f2f2f2; }
        /* --- FIM ESTILOS DA TABELA --- */
        
        @media (max-width: 768px) {
            .navbar { flex-direction: column; gap: 15px; }
        }
    </style>
</head>
<body>
    <div class="navbar">
        <div class="navbar-title">Dashboard Loja de Carros</div>
        
        <div class="navbar-actions">
            <a href="{{ route('carros.create') }}" class="btn btn-primary"> 
                + Novo Carro
            </a>

            <form method="POST" action="{{ route('logout') }}" class="logout-form">
                @csrf
                <button type="submit" class="btn">Sair</button>
            </form>
        </div>
    </div>
    
    <div class="container">
        @yield('content')
    </div>
    
</body>
</html>