<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Confirm Password</title>
    <!-- Adicione seu CSS/Tailwind aqui, se desejar -->
</head>
<body>
    <main>
        <div class="mb-4 text-sm text-gray-600">
            This is a secure area of the application. Please confirm your password before continuing.
        </div>

        <form method="POST" action="/password/confirm">
            <!-- Substitua o valor abaixo pelo token CSRF gerado pelo servidor -->
            <input type="hidden" name="_token" value="REPLACE_WITH_CSRF_TOKEN" />

            <!-- Password -->
            <div>
                <label for="password">Password</label>

                <input
                    id="password"
                    class="block mt-1 w-full"
                    type="password"
                    name="password"
                    required
                    autocomplete="current-password"
                />

                <!-- Espaço para exibir erros do lado do servidor (substituir dinamicamente) -->
                <div class="mt-2 text-red-600" id="password-error"><!-- password error messages --></div>
            </div>

            <div class="flex justify-end mt-4">
                <button type="submit" class="primary-button">Confirm</button>
            </div>
        </form>
    </main>
</body>
</html>
