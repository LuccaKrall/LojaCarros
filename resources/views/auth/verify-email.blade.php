<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Verify Email</title>
    <style>
        body { font-family: system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial; background:#f9fafb; color:#111827; margin:0; padding:2rem; }
        .card { max-width:640px; margin:2rem auto; background:white; border-radius:8px; padding:1.5rem; box-shadow:0 1px 2px rgba(0,0,0,0.05); }
        .muted { color:#6b7280; font-size:0.95rem; margin-bottom:1rem; }
        .success { color:#065f46; background:#d1fae5; padding:0.75rem 1rem; border-radius:6px; margin-bottom:1rem; }
        .actions { display:flex; gap:1rem; align-items:center; margin-top:1rem; }
        .btn { padding:0.5rem 0.9rem; border-radius:6px; border:0; cursor:pointer; font-weight:600; }
        .btn-primary { background:#4f46e5; color:white; }
        .btn-link { background:transparent; color:#374151; text-decoration:underline; padding:0; font-weight:500; }
        form { margin:0; }
    </style>
</head>
<body>
    <main class="card" role="main" aria-labelledby="verify-heading">
        <h1 id="verify-heading" style="font-size:1.125rem; margin:0 0 0.5rem 0;">Verify your email</h1>

        <p class="muted">
            Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you another.
        </p>

        <!-- If a new verification link was sent, show this block (server-side) -->
        <!--
        <div class="success">
            A new verification link has been sent to the email address you provided during registration.
        </div>
        -->

        <div class="actions">
            <form method="post" action="/verification/send">
                <!-- Em ambiente dinâmico inclua aqui o token CSRF -->
                <input type="hidden" name="_token" value="<!-- CSRF_TOKEN -->" />
                <button type="submit" class="btn btn-primary">Resend Verification Email</button>
            </form>

            <form method="post" action="/logout">
                <!-- Em ambiente dinâmico inclua aqui o token CSRF -->
                <input type="hidden" name="_token" value="<!-- CSRF_TOKEN -->" />
                <button type="submit" class="btn btn-link">Log Out</button>
            </form>
        </div>
    </main>
</body>
</html>
