<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Forgot Password</title>
    <style>
        body { font-family: Arial, sans-serif; background:#f8fafc; color:#111827; }
        .container { max-width:480px; margin:48px auto; padding:24px; background:white; border-radius:8px; box-shadow:0 2px 8px rgba(0,0,0,0.05); }
        label { display:block; font-weight:600; margin-bottom:6px; }
        input[type="email"] { width:100%; padding:10px; border:1px solid #d1d5db; border-radius:6px; }
        .help { margin-bottom:12px; color:#4b5563; }
        .error { color:#dc2626; margin-top:6px; }
        .actions { text-align:right; margin-top:18px; }
        button { background:#2563eb; color:white; border:none; padding:10px 16px; border-radius:6px; cursor:pointer; }
        button:active { transform:translateY(1px); }
    </style>
</head>
<body>
    <div class="container">
        <p class="help">
            Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.
        </p>

        <!-- Session status (populate via server or JS if needed) -->
        <div id="session-status" aria-live="polite"></div>

        <form method="POST" action="/password/email">
            <!-- If you use Laravel, replace the value below with the real CSRF token -->
            <input type="hidden" name="_token" value="PUT_CSRF_TOKEN_HERE">

            <div>
                <label for="email">Email</label>
                <input id="email" type="email" name="email" required autofocus />
                <!-- Validation errors (populate via server or JS) -->
                <div id="email-error" class="error" role="alert"></div>
            </div>

            <div class="actions">
                <button type="submit">Email Password Reset Link</button>
            </div>
        </form>
    </div>
</body>
</html>
