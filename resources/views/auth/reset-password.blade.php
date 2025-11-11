<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Reset Password</title>
</head>
<body>
    <form method="POST" action="/password/reset">
        <!-- Substitua pelos valores do seu backend -->
        <input type="hidden" name="_token" value="COLOQUE_AQUI_O_CSRF_TOKEN">
        <input type="hidden" name="token" value="COLOQUE_AQUI_O_TOKEN_DE_RESET">

        <!-- Email -->
        <div>
            <label for="email">Email</label><br>
            <input id="email" type="email" name="email" value="" required autofocus autocomplete="username">
            <div class="error" id="email-error" aria-live="polite"></div>
        </div>

        <!-- Password -->
        <div style="margin-top:1rem;">
            <label for="password">Password</label><br>
            <input id="password" type="password" name="password" required autocomplete="new-password">
            <div class="error" id="password-error" aria-live="polite"></div>
        </div>

        <!-- Confirm Password -->
        <div style="margin-top:1rem;">
            <label for="password_confirmation">Confirm Password</label><br>
            <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password">
            <div class="error" id="password_confirmation-error" aria-live="polite"></div>
        </div>

        <div style="margin-top:1rem;">
            <button type="submit">Reset Password</button>
        </div>
    </form>
</body>
</html>
