<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login - KosKu</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: #f8f9fa;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .container {
            width: 100%;
            max-width: 900px;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
            overflow: hidden;
            display: flex;
        }

        .welcome-side {
            flex: 1;
            background: #222;
            padding: 48px;
            color: #fff;
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        .welcome-side::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('../images/modern-room.jpg');
            background-size: cover;
            background-position: center;
            z-index: 1;
        }

        .welcome-content {
            position: relative;
            z-index: 2;
        }

        .welcome-side h1 {
            font-size: 2.4rem;
            font-weight: 700;
            margin-bottom: 16px;
        }

        .welcome-side p {
            font-size: 1.1rem;
            opacity: 0.9;
            line-height: 1.6;
            margin-bottom: 24px;
        }

        .auth-side {
            flex: 1;
            padding: 48px;
            background: #fff;
        }

        .auth-side h2 {
            font-size: 1.8rem;
            color: #222;
            margin-bottom: 32px;
            text-align: center;
        }

        .form-group {
            margin-bottom: 24px;
        }

        .form-label {
            display: block;
            font-size: 0.9rem;
            font-weight: 500;
            color: #555;
            margin-bottom: 8px;
        }

        .form-input {
            width: 100%;
            padding: 12px 16px;
            font-size: 1rem;
            border: 1px solid #ddd;
            border-radius: 8px;
            transition: all 0.2s;
        }

        .form-input:focus {
            outline: none;
            border-color: #222;
        }

        .remember-forgot {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
            font-size: 0.9rem;
        }

        .remember-forgot label {
            color: #555;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .remember-forgot input[type="checkbox"] {
            width: 16px;
            height: 16px;
        }

        .remember-forgot a {
            color: #222;
            text-decoration: none;
            font-weight: 500;
        }

        .remember-forgot a:hover {
            text-decoration: underline;
        }

        .btn-login {
            width: 100%;
            padding: 14px;
            background: #222;
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s;
            margin-bottom: 24px;
        }

        .btn-login:hover {
            background: #000;
            transform: translateY(-2px);
        }

        .auth-links {
            margin-top: 24px;
            text-align: center;
            font-size: 0.9rem;
            color: #666;
        }

        .auth-links a {
            color: #222;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.2s;
        }

        .auth-links a:hover {
            color: #000;
        }

        .error-message {
            background: #fef2f2;
            border-left: 4px solid #dc2626;
            padding: 12px 16px;
            margin-bottom: 20px;
            color: #991b1b;
            border-radius: 8px;
            font-size: 0.9rem;
        }

        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            }

            .welcome-side {
                padding: 32px;
            }

            .welcome-side h1 {
                font-size: 2rem;
            }

            .auth-side {
                padding: 32px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="welcome-side">
            <div class="welcome-content">
                <h1>Welcome to KosKu</h1>
                <p>Find your perfect stay with our curated selection of premium accommodations. Login to access exclusive deals and personalized recommendations.</p>
            </div>
        </div>

        <div class="auth-side">
            <h2>Sign In</h2>

            @if(session('error'))
                <div class="error-message">{{ session('error') }}</div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <label class="form-label">Email Address</label>
                    <input type="email" name="email" class="form-input" value="{{ old('email') }}" required autofocus>
                    @error('email')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-input" required>
                    @error('password')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="remember-forgot">
                    <label><input type="checkbox" name="remember"> Remember me</label>
                    <a href="#">Forgot password?</a>
                </div>

                <button type="submit" class="btn-login">Sign In</button>
            </form>

            <div class="auth-links">
                Don't have an account? <a href="{{ route('register') }}">Sign Up</a>
            </div>
        </div>
    </div>
</body>
</html>