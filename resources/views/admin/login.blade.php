<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Kayutangan Heritage</title>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;0,700;1,400&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Cormorant Garamond', Georgia, serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #ffffff;
            position: relative;
            overflow: hidden;
        }

        /* Background decorative elements */
        body::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background:
                radial-gradient(ellipse at 20% 30%, rgba(196, 163, 102, 0.06) 0%, transparent 50%),
                radial-gradient(ellipse at 80% 70%, rgba(139, 115, 85, 0.06) 0%, transparent 50%);
            animation: bgFloat 8s ease-in-out infinite alternate;
        }

        @keyframes bgFloat {
            0% { transform: translate(0, 0) rotate(0deg); }
            100% { transform: translate(-20px, -15px) rotate(1deg); }
        }

        /* Decorative ornament lines */
        body::after {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background-image:
                repeating-linear-gradient(
                    45deg,
                    transparent,
                    transparent 60px,
                    rgba(196, 163, 102, 0.04) 60px,
                    rgba(196, 163, 102, 0.04) 61px
                );
            pointer-events: none;
        }

        .login-wrapper {
            position: relative;
            z-index: 10;
            width: 100%;
            max-width: 460px;
            padding: 20px;
        }

        /* Logo & branding di atas card */
        .brand-header {
            text-align: center;
            margin-bottom: 12px;
            animation: fadeDown 0.6s ease-out;
        }

        .brand-logo-circle {
            width: 90px;
            height: 90px;
            border-radius: 50%;
            overflow: hidden;
            margin: 0 auto 16px;
            border: 3px solid rgba(196, 163, 102, 0.6);
            box-shadow: 0 0 30px rgba(196, 163, 102, 0.3);
            transition: box-shadow 0.3s ease;
        }

        .brand-logo-circle:hover {
            box-shadow: 0 0 50px rgba(196, 163, 102, 0.5);
        }

        .brand-logo-circle img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .brand-title {
            font-family: 'Playfair Display', Georgia, serif;
            font-size: 1.4rem;
            font-weight: 700;
            color: #c4a366;
            letter-spacing: 3px;
            text-transform: uppercase;
        }

        .brand-subtitle {
            font-size: 0.85rem;
            color: rgba(196, 163, 102, 0.6);
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-top: 4px;
        }

        /* Card utama */
        .login-card {
            background: #ffffff;
            border: 1px solid rgba(196, 163, 102, 0.3);
            border-radius: 16px;
            padding: 36px 40px 32px;
            box-shadow:
                0 10px 40px rgba(139, 115, 85, 0.12),
                0 2px 8px rgba(139, 115, 85, 0.08);
            animation: fadeUp 0.7s ease-out;
        }

        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(30px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        @keyframes fadeDown {
            from { opacity: 0; transform: translateY(-20px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .card-title {
            font-family: 'Playfair Display', Georgia, serif;
            font-size: 1.7rem;
            font-weight: 700;
            color: #3d2c1a;
            text-align: center;
            margin-bottom: 12px;
            letter-spacing: 1px;
        }

        /* Decorative divider */
        .divider {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 18px;
        }

        .divider-line {
            flex: 1;
            height: 1px;
            background: linear-gradient(to right, transparent, rgba(139, 115, 85, 0.3), transparent);
        }

        .divider-icon {
            color: rgba(139, 115, 85, 0.4);
            font-size: 0.75rem;
            letter-spacing: 2px;
        }

        /* Alert error */
        .alert-error {
            background: rgba(200, 50, 50, 0.15);
            border: 1px solid rgba(200, 50, 50, 0.35);
            border-radius: 8px;
            padding: 12px 16px;
            margin-bottom: 20px;
            color: #f5a0a0;
            font-size: 0.9rem;
            animation: shake 0.4s ease;
        }

        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-6px); }
            75% { transform: translateX(6px); }
        }

        /* Form groups */
        .form-group {
            margin-bottom: 22px;
        }

        .form-label {
            display: block;
            font-size: 0.82rem;
            font-weight: 600;
            color: #8B7355;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            margin-bottom: 8px;
        }

        .input-wrapper {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: rgba(139, 115, 85, 0.5);
            font-size: 1rem;
            pointer-events: none;
            transition: color 0.3s;
        }

        .form-input {
            width: 100%;
            padding: 13px 14px 13px 42px;
            background: #faf9f7;
            border: 1px solid rgba(196, 163, 102, 0.35);
            border-radius: 8px;
            color: #3d2c1a;
            font-family: 'Cormorant Garamond', Georgia, serif;
            font-size: 1rem;
            transition: all 0.3s ease;
            outline: none;
        }

        .form-input::placeholder {
            color: rgba(61, 44, 26, 0.3);
        }

        .form-input:focus {
            border-color: rgba(196, 163, 102, 0.7);
            background: rgba(255, 255, 255, 0.1);
            box-shadow: 0 0 0 3px rgba(196, 163, 102, 0.12);
        }

        .form-input:focus + .input-icon,
        .input-wrapper:focus-within .input-icon {
            color: rgba(196, 163, 102, 0.9);
        }

        .form-input.is-error {
            border-color: rgba(200, 80, 80, 0.6);
        }

        .error-text {
            display: block;
            margin-top: 6px;
            font-size: 0.82rem;
            color: #f5a0a0;
        }

        /* Toggle password visibility */
        .toggle-password {
            position: absolute;
            right: 14px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: rgba(139, 115, 85, 0.5);
            cursor: pointer;
            font-size: 1rem;
            padding: 4px;
            transition: color 0.3s;
        }

        .toggle-password:hover {
            color: #8B7355;
        }

        /* Remember me */
        .remember-row {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 28px;
        }

        .remember-checkbox {
            width: 16px;
            height: 16px;
            accent-color: #c4a366;
            cursor: pointer;
        }

        .remember-label {
            font-size: 0.88rem;
            color: rgba(61, 44, 26, 0.55);
            cursor: pointer;
        }

        /* Submit button */
        .btn-login {
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, #c4a366 0%, #8B7355 100%);
            border: none;
            border-radius: 8px;
            color: #1a1008;
            font-family: 'Playfair Display', Georgia, serif;
            font-size: 1rem;
            font-weight: 700;
            letter-spacing: 2.5px;
            text-transform: uppercase;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .btn-login::before {
            content: '';
            position: absolute;
            top: 0; left: -100%;
            width: 100%; height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s ease;
        }

        .btn-login:hover::before {
            left: 100%;
        }

        .btn-login:hover {
            background: linear-gradient(135deg, #d4b376 0%, #9b8365 100%);
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(196, 163, 102, 0.35);
        }

        .btn-login:active {
            transform: translateY(0);
        }

        /* Back link */
        .back-link {
            text-align: center;
            margin-top: 24px;
        }

        .back-link a {
            color: rgba(139, 115, 85, 0.65);
            text-decoration: none;
            font-size: 0.88rem;
            letter-spacing: 0.5px;
            transition: color 0.3s;
        }

        .back-link a:hover {
            color: #8B7355;
        }

        .back-link a::before {
            content: '← ';
        }

        /* Responsive */
        @media (max-width: 480px) {
            .login-card {
                padding: 32px 24px 28px;
            }

            .card-title {
                font-size: 1.4rem;
            }
        }
    </style>
</head>
<body>
    <div class="login-wrapper">

        <!-- Brand Header -->
        <div class="brand-header">
            <div class="brand-logo-circle">
                <img src="{{ asset('images/kayutangan.jpg') }}" alt="Logo Kayutangan Heritage">
            </div>
            <div class="brand-title">Kayutangan Heritage</div>
            <div class="brand-subtitle">Kota Malang</div>
        </div>

        <!-- Login Card -->
        <div class="login-card">
            <h1 class="card-title">Admin Login</h1>

            <div class="divider">
                <span class="divider-line"></span>
                <span class="divider-icon">✦</span>
                <span class="divider-line"></span>
            </div>

            {{-- Alert error (hanya tampil jika ada error validasi) --}}
            @if ($errors->any() && !$errors->has('login_redirect'))
                <div class="alert-error">
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('admin.login.post') }}">
                @csrf

                {{-- Email --}}
                <div class="form-group">
                    <label class="form-label" for="email">Email</label>
                    <div class="input-wrapper">
                        <input
                            type="email"
                            id="email"
                            name="email"
                            class="form-input {{ $errors->has('email') ? 'is-error' : '' }}"
                            placeholder="admin@gmail.com"
                            value="{{ old('email') }}"
                            autocomplete="email"
                            required
                        >
                        <span class="input-icon">✉</span>
                    </div>
                </div>

                {{-- Password --}}
                <div class="form-group">
                    <label class="form-label" for="password">Password</label>
                    <div class="input-wrapper">
                        <input
                            type="password"
                            id="password"
                            name="password"
                            class="form-input"
                            placeholder="••••••••"
                            autocomplete="current-password"
                            required
                        >
                        <span class="input-icon">🔒</span>
                        <button type="button" class="toggle-password" onclick="togglePassword()" title="Tampilkan/Sembunyikan password">
                            <span id="eye-icon">👁</span>
                        </button>
                    </div>
                </div>

                {{-- Remember Me --}}
                <div class="remember-row">
                    <input type="checkbox" id="remember" name="remember" class="remember-checkbox">
                    <label for="remember" class="remember-label">Ingat saya</label>
                </div>

                <button type="submit" class="btn-login">Masuk</button>
            </form>

            <div class="back-link">
                <a href="{{ url('/') }}">Kembali ke Beranda</a>
            </div>
        </div>

    </div>

    <script>
        function togglePassword() {
            const input = document.getElementById('password');
            const icon  = document.getElementById('eye-icon');
            if (input.type === 'password') {
                input.type = 'text';
                icon.textContent = '🙈';
            } else {
                input.type = 'password';
                icon.textContent = '👁';
            }
        }
    </script>
</body>
</html>
