<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Pawon Hepi</title>
    <!-- FontAwesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Base CSS for variables -->
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <style>
        body {
            background-color: var(--bg-main);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
            font-family: 'Inter', sans-serif;
        }
        .login-container {
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05), 0 2px 4px -1px rgba(0,0,0,0.03);
            display: flex;
            width: 800px;
            max-width: 90%;
            min-height: 420px;
            border: 1px solid var(--border-color);
        }
        .login-left {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px;
            border-right: 1px solid var(--border-color);
        }
        .login-placeholder-logo {
            text-align: center;
        }
        .login-placeholder-logo i {
            font-size: 80px;
            margin-bottom: 12px;
        }
        .login-placeholder-logo h1 {
            font-size: 32px;
            font-weight: 800;
            margin: 0;
            letter-spacing: -0.5px;
            font-family: serif;
        }
        .login-placeholder-logo p {
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 2px;
            margin: 8px 0 0;
        }
        .login-right {
            flex: 1;
            padding: 48px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .login-title {
            font-size: 18px;
            font-weight: 700;
            color: var(--bg-sidebar);
            margin: 0 0 8px;
            text-align: center;
        }
        .login-subtitle {
            font-size: 12px;
            color: var(--text-secondary);
            text-align: center;
            margin-bottom: 32px;
        }
        .form-group {
            margin-bottom: 16px;
        }
        .form-label {
            display: flex;
            justify-content: space-between;
            font-size: 11px;
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 8px;
        }
        .form-label a {
            color: var(--text-secondary);
            text-decoration: none;
            font-weight: 500;
        }
        .form-control-login {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid var(--border-color);
            border-radius: 6px;
            font-size: 13px;
            outline: none;
            transition: border-color 0.2s;
            box-sizing: border-box;
        }
        .form-control-login:focus {
            border-color: var(--bg-sidebar);
        }
        .password-input-container {
            position: relative;
        }
        .password-toggle {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-secondary);
            cursor: pointer;
            font-size: 12px;
        }
        .checkbox-group {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 24px;
        }
        .checkbox-group input {
            cursor: pointer;
            width: 14px;
            height: 14px;
            border: 1px solid var(--border-color);
            border-radius: 4px;
        }
        .checkbox-group label {
            font-size: 11px;
            color: var(--text-primary);
            cursor: pointer;
            font-weight: 500;
        }
        .btn-login {
            width: 100%;
            padding: 10px;
            background-color: var(--bg-sidebar);
            color: #fff;
            border: none;
            border-radius: 6px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.2s;
            box-sizing: border-box;
        }
        .btn-login:hover {
            background-color: #0d3b25;
        }
        .login-footer {
            margin-top: 24px;
            font-size: 11px;
            color: var(--text-secondary);
        }
    </style>
</head>
<body>

    <div class="login-container">
        <!-- Bagian Kiri: Logo Placeholder -->
        <div class="login-left">
            <div class="login-placeholder-logo" style="width: 100%; display: flex; justify-content: center; align-items: center;">
                <svg width="340" height="120" viewBox="0 0 340 120" xmlns="http://www.w3.org/2000/svg">
                    <g transform="translate(0, 15)">
                        <!-- Top Cap -->
                        <path d="M 35 35 L 65 10 L 95 35" fill="none" stroke="#b45309" stroke-width="4" stroke-linejoin="round"/>
                        <line x1="65" y1="10" x2="65" y2="-2" stroke="#b45309" stroke-width="4" stroke-linecap="round"/>
                        
                        <!-- Horizontal Swoosh -->
                        <path d="M 5 45 Q 60 30 110 40 Q 130 42 140 38" fill="none" stroke="#b45309" stroke-width="5" stroke-linecap="round"/>
                        
                        <!-- Leaves -->
                        <path d="M 30 75 Q 40 45 55 65 Q 40 90 30 75 Z" fill="#65a30d"/>
                        <path d="M 50 65 Q 65 35 75 60 Q 60 85 50 65 Z" fill="#84cc16"/>
                        
                        <!-- Flames -->
                        <path d="M 75 80 Q 85 45 90 70 Q 105 50 110 75 Q 95 100 75 80 Z" fill="#ea580c"/>
                        <path d="M 85 85 Q 90 65 95 75 Q 100 65 102 80 Q 95 95 85 85 Z" fill="#f59e0b"/>
                        
                        <!-- Bottom Bowl -->
                        <path d="M 15 75 Q 65 115 115 75" fill="none" stroke="#b45309" stroke-width="6" stroke-linecap="round"/>
                        
                        <!-- Bowl Details (Legs) -->
                        <circle cx="45" cy="94" r="5" fill="#b45309"/>
                        <circle cx="65" cy="100" r="5" fill="#b45309"/>
                        <circle cx="85" cy="94" r="5" fill="#b45309"/>
                    </g>
                    
                    <!-- Text -->
                    <text x="145" y="68" font-family="Georgia, serif" font-weight="900" font-size="38" fill="#1f2937">Pawon<tspan fill="#111827">Hepi</tspan></text>
                    <text x="160" y="88" font-family="'Inter', sans-serif" font-weight="700" font-size="9" letter-spacing="1.5" fill="#4b5563">MAKAN, MINUM DAN NYEMIL</text>
                </svg>
            </div>
        </div>

        <!-- Bagian Kanan: Form Login -->
        <div class="login-right">
            <h2 class="login-title">Pawon Hepi Backoffice & POS</h2>
            <p class="login-subtitle">Login ke akun Pawon Hepi Anda</p>

            <form action="/" method="GET">
                <div class="form-group">
                    <div class="form-label">
                        <label for="email">Email</label>
                    </div>
                    <input type="email" id="email" class="form-control-login" placeholder="m@contoh.com" required>
                </div>

                <div class="form-group">
                    <div class="form-label">
                        <label for="password">Password</label>
                        <a href="#">Lupa password?</a>
                    </div>
                    <div class="password-input-container">
                        <input type="password" id="password" class="form-control-login" placeholder="Password" required>
                        <i class="fa-regular fa-eye password-toggle"></i>
                    </div>
                </div>

                <div class="checkbox-group">
                    <input type="checkbox" id="remember">
                    <label for="remember">Ingat Saya</label>
                </div>

                <button type="submit" class="btn-login">Login</button>
            </form>
        </div>
    </div>

    <div class="login-footer">
        Powered by IT Solution
    </div>

</body>
</html>
