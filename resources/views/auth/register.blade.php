<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Register - KosKu</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" />
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
            transform: scale(0.92);
            transform-origin: center center;
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
            background-color: #fff;
            transition: all 0.2s;
        }

        .btn-register {
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
        }

        .btn-register:hover {
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
        }        .auth-links a:hover {
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

            .welcome-side,
            .auth-side {
                padding: 32px;
            }

            .welcome-side h1 {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="welcome-side">
            <div class="welcome-content">
                <h1>Welcome to KosKu</h1>
                <p>Join our community and discover comfortable living spaces that match your lifestyle. Find your perfect accommodation today.</p>
            </div>
        </div>        <div class="auth-side">
            <h2>Create Account</h2>
            
            @if(session('error'))
                <div class="error-message">{{ session('error') }}</div>
            @endif
            
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group">
                    <label class="form-label">Full Name</label>
                    <input type="text" name="name" class="form-input" value="{{ old('name') }}" required>
                    @error('name')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Email Address</label>
                    <input type="email" name="email" class="form-input" value="{{ old('email') }}" required>
                    @error('email')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>                <div class="form-group">
                    <label class="form-label">Role</label>
                    <select id="role" name="role" class="form-input" required>
                        <option value="">Pilih Role</option>
                        <option value="tenant" {{ old('role') == 'tenant' ? 'selected' : '' }}>Penyewa Kos</option>
                        <option value="owner" {{ old('role') == 'owner' ? 'selected' : '' }}>Pemilik Kos</option>
                    </select>
                    @error('role')
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

                <div class="form-group">
                    <label class="form-label">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-input" required>
                    @error('password_confirmation')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn-register">Create Account</button>
            </form>

            <div class="auth-links">
                Already have an account? <a href="{{ route('login') }}">Sign In</a>
            </div>
        </div>
    </div>

    <!-- Choices.js -->
    <script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const element = document.getElementById('role');
            if (element) {
                new Choices(element, {
                    searchEnabled: false,
                    itemSelectText: '',
                    shouldSort: false
                });
            }
        });
    </script>
</body>
</html>
