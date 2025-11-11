<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AutoMasters - Loja de Carros</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }

        body {
            background-color: #f5f5f5;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .header {
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            color: white;
            padding: 1rem 0;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
        }

        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .logo h1 {
            font-size: 1.8rem;
            font-weight: bold;
        }

        .logo-icon {
            font-size: 2rem;
        }

        .nav-menu {
            display: flex;
            list-style: none;
            gap: 2rem;
        }

        .nav-menu a {
            color: white;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
            padding: 0.5rem 1rem;
            border-radius: 5px;
        }

        .nav-menu a:hover {
            background-color: rgba(255,255,255,0.1);
        }

        .header-actions {
            display: flex;
            gap: 1rem;
            align-items: center;
        }

        .search-bar {
            display: flex;
            background: white;
            border-radius: 25px;
            overflow: hidden;
            padding: 0.3rem;
        }

        .search-bar input {
            border: none;
            padding: 0.5rem 1rem;
            outline: none;
            width: 200px;
        }

        .search-bar button {
            background: #ff6b35;
            border: none;
            color: white;
            padding: 0.5rem 1rem;
            cursor: pointer;
            border-radius: 20px;
            transition: background 0.3s ease;
        }

        .search-bar button:hover {
            background: #e55a2b;
        }

        .auth-buttons {
            display: flex;
            gap: 0.5rem;
        }

        .auth-buttons button {
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .login-btn {
            background: transparent;
            color: white;
            border: 2px solid white !important;
        }

        .register-btn {
            background: #ff6b35;
            color: white;
        }

        .auth-buttons button:hover {
            transform: translateY(-2px);
        }

        .main-content {
            flex: 1;
            padding: 2rem 0;
        }

        .footer {
            background: #2c3e50;
            color: white;
            padding: 3rem 0 1rem;
            margin-top: auto;
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-bottom: 2rem;
        }

        .footer-section h3 {
            color: #ff6b35;
            margin-bottom: 1rem;
            font-size: 1.2rem;
        }

        .footer-section ul {
            list-style: none;
        }

        .footer-section ul li {
            margin-bottom: 0.5rem;
        }

        .footer-section a {
            color: #ecf0f1;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-section a:hover {
            color: #ff6b35;
        }

        .contact-info {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .contact-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .social-links {
            display: flex;
            gap: 1rem;
            margin-top: 1rem;
        }

        .social-links a {
            display: inline-block;
            width: 40px;
            height: 40px;
            background: #34495e;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background 0.3s ease;
        }

        .social-links a:hover {
            background: #ff6b35;
        }

        .footer-bottom {
            text-align: center;
            padding-top: 2rem;
            border-top: 1px solid #34495e;
            color: #bdc3c7;
        }

        .mobile-menu-btn {
            display: none;
            background: none;
            border: none;
            color: white;
            font-size: 1.5rem;
            cursor: pointer;
        }

        @media (max-width: 768px) {
            .nav-menu {
                display: none;
                flex-direction: column;
                width: 100%;
                margin-top: 1rem;
            }

            .nav-menu.active {
                display: flex;
            }

            .mobile-menu-btn {
                display: block;
            }

            .header-content {
                flex-direction: column;
                align-items: flex-start;
            }

            .header-actions {
                width: 100%;
                justify-content: space-between;
                margin-top: 1rem;
            }

            .search-bar input {
                width: 150px;
            }
        }

        .auth-buttons a {
    text-decoration: none;
    color: white; 
    padding: 8px 12px;
    border-radius: 4px;
    display: inline-block; 
}

.login-btn {
    border: 1px solid white; 
    background-color: transparent;
}

.register-btn {
    background-color: #FFA500;
    border: 1px solid #FFA500;
}

.auth-buttons a:hover {
    opacity: 0.8;
}
    </style>
</head>
<body>
    <header class="header">
        <div class="container">
            <div class="header-content">
                <div class="logo">
                    <div class="logo-icon">🚗</div>
                    <h1>AutoMasters</h1>
                </div>

                <button class="mobile-menu-btn">☰</button>

                <nav>
                    <ul class="nav-menu">
                        <li><a href="#">Início</a></li>
                        <li><a href="#">Carros</a></li>
                        <li><a href="#">Sobre Nós</a></li>
                        <li><a href="#">Contato</a></li>
                    </ul>
                </nav>

                <div class="header-actions">
                    <div class="auth-buttons">
                        <a href="/login" class="login-btn">Login</a>
                        <a href="/register" class="register-btn">Cadastrar</a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main class="main-content">
        <div class="container">
            <!-- Conteúdo será inserido aqui -->
            <div style="text-align: center; padding: 4rem 0; color: #666;">
                @yield('content')
            </div>
        </div>
    </main>

    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h3>AutoMasters</h3>
                    <p>Há mais de 15 anos no mercado automotivo, oferecemos os melhores veículos com qualidade e garantia.</p>
                    <div class="social-links">
                        <a href="#">📘</a>
                        <a href="#">📷</a>
                        <a href="#">🐦</a>
                        <a href="#">📺</a>
                    </div>
                </div>

       

                <div class="footer-section">
                    <h3>Contato</h3>
                    <div class="contact-info">
                        <div class="contact-item">
                            <span>📍</span>
                            <span>Av. Automóvel, 1234 - Centro</span>
                        </div>
                        <div class="contact-item">
                            <span>📞</span>
                            <span>(11) 9999-9999</span>
                        </div>
                        <div class="contact-item">
                            <span>✉️</span>
                            <span>contato@automasters.com</span>
                        </div>
                        <div class="contact-item">
                            <span>🕒</span>
                            <span>Seg - Sex: 8h às 18h</span>
                        </div>
                    </div>
                </div>

                <div class="footer-section">
                    <h3>Newsletter</h3>
                    <p>Cadastre-se para receber ofertas exclusivas</p>
                </div>
            </div>

            <div class="footer-bottom">
                <p>&copy; 2024 AutoMasters - Todos os direitos reservados. CNPJ: 12.345.678/0001-90</p>
            </div>
        </div>
    </footer>

    <script>
        document.querySelector('.mobile-menu-btn').addEventListener('click', function() {
            document.querySelector('.nav-menu').classList.toggle('active');
        });

        document.querySelectorAll('.auth-buttons button').forEach(button => {
            button.addEventListener('click', function() {
                alert('Redirecionando para área de autenticação...');
            });
        });

        document.querySelector('.search-bar button').addEventListener('click', function() {
            const searchTerm = document.querySelector('.search-bar input').value;
            if (searchTerm) {
                alert(`Buscando por: ${searchTerm}`);
            }
        });
    </script>
</body>
</html>