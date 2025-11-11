<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Register</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: linear-gradient(45deg, #667eea, #764ba2);
        }

        .container {
            position: relative;
            width: 850px;
            height: 550px;
            background: #fff;
            border-radius: 30px;
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.2);
            overflow: hidden;
        }

        .form-container {
            position: absolute;
            width: 50%;
            height: 100%;
            display: flex;
            align-items: center;
            transition: all 0.6s ease-in-out;
        }

        .login-form {
            left: 0;
            z-index: 2;
        }

        .register-form {
            left: 0;
            z-index: 1;
            opacity: 0;
        }

        form {
            padding: 0 50px;
            width: 100%;
        }

        h1 {
            font-size: 32px;
            color: #333;
            margin-bottom: 20px;
            text-align: center;
        }

        input {
            width: 100%;
            padding: 15px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        input:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 10px rgba(102, 126, 234, 0.2);
        }

        button {
            width: 100%;
            padding: 15px;
            background: linear-gradient(45deg, #667eea, #764ba2);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 10px;
        }

        button:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }

        .toggle-container {
            position: absolute;
            top: 0;
            left: 50%;
            width: 50%;
            height: 100%;
            overflow: hidden;
            transition: all 0.6s ease-in-out;
            z-index: 100;
        }

        .toggle {
            position: relative;
            height: 100%;
            background: linear-gradient(45deg, #764ba2, #667eea);
            color: white;
            left: -100%;
            width: 200%;
            transition: all 0.6s ease-in-out;
        }

        .toggle-panel {
            position: absolute;
            width: 50%;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 0 30px;
            text-align: center;
            top: 0;
            transition: all 0.6s ease-in-out;
        }

        .toggle-left {
            left: 0;
            transform: translateX(-200%);
        }

        .toggle-right {
            right: 0;
            transform: translateX(0);
        }

        .toggle-panel h1 {
            color: white;
            margin-bottom: 20px;
        }

        .toggle-panel p {
            margin-bottom: 25px;
            font-size: 16px;
        }

        .hidden {
            display: none;
        }

        .toggle-btn {
            background: transparent;
            border: 2px solid white;
            color: white;
            padding: 12px 45px;
            border-radius: 25px;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .toggle-btn:hover {
            background: white;
            color: #667eea;
            transform: translateY(-2px);
        }

        .container.active .login-form {
            transform: translateX(100%);
            opacity: 0;
        }

        .container.active .register-form {
            transform: translateX(100%);
            opacity: 1;
            z-index: 5;
        }

        .container.active .toggle-container {
            transform: translateX(-100%);
        }

        .container.active .toggle {
            transform: translateX(50%);
        }

        .container.active .toggle-left {
            transform: translateX(0);
        }

        .container.active .toggle-right {
            transform: translateX(200%);
        }
    </style>
</head>
<body>
    <div class="container" id="container">
        <div class="form-container login-form">
         <form method="POST" action="{{ route('login.store') }}" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                @csrf
                <h1>Login</h1>
                <input type="email" name="email" placeholder="Email" required autofocus autocomplete="username">
                <input type="password" name="password" placeholder="Password" required autocomplete="current-password">
                <button type="submit">Log in</button>
            </form>
        </div>
        
        <div class="form-container register-form">
             <form method="POST" action="{{ route('register.store') }}">
                @csrf
                <h1>Create Account</h1>
                <input type="text" name="name" placeholder="Name" required autocomplete="name">
                <input type="email" name="email" placeholder="Email" required autocomplete="username">
                <input type="password" name="password" placeholder="Password" required autocomplete="new-password">
                <input type="password" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password">
                <button type="submit">Sign up</button>
            </form>
        </div>

        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Welcome Back!</h1>
                    <p>Enter your personal details to use all of site features</p>
                    <button class="toggle-btn" id="login">Sign In</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Hello, Friend!</h1>
                    <p>Register with your personal details to use all of site features</p>
                    <button class="toggle-btn" id="register">Sign Up</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        const container = document.getElementById('container');
        const registerBtn = document.getElementById('register');
        const loginBtn = document.getElementById('login');

        registerBtn.addEventListener('click', () => {
            container.classList.add('active');
        });

        loginBtn.addEventListener('click', () => {
            container.classList.remove('active');
        });
    </script>
</body>
</html>