<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Email - KosKu</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
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
            color: #222;
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
            background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7));
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
        
        .verification-container {
            flex: 1;
            padding: 48px;
            background: #fff;
            position: relative;
        }        .verification-icon {
            width: 90px;
            height: 90px;
            background: #fff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 24px auto;
            transition: all 0.3s ease;
            position: relative;
            box-shadow: 0 8px 16px rgba(255,255,255,0.1);
            border: 2px solid rgba(255,255,255,0.2);
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% {
                box-shadow: 0 0 0 0 rgba(255, 255, 255, 0.4);
            }
            70% {
                box-shadow: 0 0 0 10px rgba(255, 255, 255, 0);
            }
            100% {
                box-shadow: 0 0 0 0 rgba(255, 255, 255, 0);
            }
        }

        .verification-icon i {
            font-size: 2.5rem;
            color: #222;
            animation: iconFloat 4s ease-in-out infinite;
        }
        
        @keyframes iconFloat {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-6px); }
        }        .verification-title {
            font-size: 1.8rem;
            font-weight: 700;
            color: #222;
            margin-bottom: 24px;
            text-align: center;
        }

        .verification-text {
            font-size: 0.95rem;
            color: #666;
            line-height: 1.6;
            margin-bottom: 24px;
            text-align: center;
        }        .user-email {
            font-weight: 500;
            color: #333;
            display: block;
            width: 100%;
            background-color: #f8f9fa;
            padding: 12px 16px;
            border-radius: 8px;
            margin: 15px 0;
            border: 1px solid #ddd;
            letter-spacing: 0.3px;
            text-align: center;
            font-size: 0.95rem;
        }.btn-resend {
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
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .btn-resend:hover {
            background: #000;
            transform: translateY(-2px);
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        .btn-logout {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 4px;
            color: #666;
            background: transparent;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 10px 16px;
            font-size: 0.9rem;
            transition: all 0.2s;
            cursor: pointer;
            width: 100%;
        }

        .btn-logout:hover {
            color: #222;
            border-color: #222;
        }        .success-message {
            background: #eef8f0;
            color: #166534;
            padding: 14px 16px;
            border-radius: 8px;
            margin-bottom: 24px;
            border: 1px solid #dcfce7;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .success-message i {
            font-size: 1.1rem;
            color: #16a34a;
        }

        .email-icon {
            font-size: 3rem;
            color: #222;
            margin-bottom: 20px;
        }

        .divider {
            height: 1px;
            background-color: #ddd;
            margin: 20px 0;
        }
        
        @media (max-width: 768px) {
            .container {
                flex-direction: column;
                max-width: 500px;
            }
            
            .welcome-side {
                padding: 30px;
            }
            
            .verification-container {
                padding: 30px;
            }
        }@media (prefers-color-scheme: dark) {
            body {
                background: #121212;
                color: #EDEDEC;
            }
            
            .container {
                background: #1e1e1e;
                box-shadow: 0 4px 20px rgba(0,0,0,0.2);
            }
            
            .verification-container {
                background: #1e1e1e;
                color: #EDEDEC;
            }
            
            .verification-logo h2 {
                color: #EDEDEC;
            }
            
            .verification-logo h2:after {
                background-color: #EDEDEC;
            }            .verification-title {
                color: #EDEDEC;
            }
            
            .welcome-side {
                background: #111;
            }

            .verification-icon {
                background: rgba(255,255,255,0.1);
                border-color: rgba(255,255,255,0.05);
            }

            .verification-icon i {
                color: #EDEDEC;
            }

            .user-email {
                color: #EDEDEC;
                background-color: #111;
                border-color: #333;
            }

            .btn-resend {
                background: #EDEDEC;
                color: #111;
            }

            .btn-resend:hover {
                background: #fff;
            }

            .btn-logout {
                color: #A1A09A;
                border-color: #333;
            }

            .btn-logout:hover {
                color: #EDEDEC;
                border-color: #EDEDEC;
            }

            .success-message {
                background: rgba(22, 101, 52, 0.2);
                color: #4ade80;
                border-color: rgba(22, 101, 52, 0.3);
            }

            .divider {
                background-color: #333;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="welcome-side">
            <div class="welcome-content">
                <h1>KosKu</h1>
                <p>Aplikasi pencarian kos terbaik untuk kebutuhan hunian Anda. Temukan kos yang nyaman dan sesuai dengan kebutuhan Anda bersama KosKu.</p>
                <div class="verification-icon">
                    <i class="fas fa-envelope-open-text"></i>
                </div>
            </div>
        </div>
        
        <div class="verification-container">
            <h1 class="verification-title">Verifikasi Email Anda</h1>
          @if (session('status'))
            <div class="success-message">
                <i class="fas fa-check-circle"></i>
                {{ session('status') }}
            </div>
        @endif

        @if (session('message'))
            <div class="success-message">
                <i class="fas fa-check-circle"></i>
                {{ session('message') }}
            </div>
        @endif
        
        <p class="verification-text">
            Kami telah mengirimkan link verifikasi ke alamat email Anda:
        </p>
        
        <div class="user-email">
            <i class="fas fa-at"></i> {{ auth()->user()->email }}
        </div>
        
        <p class="verification-text">
            Silakan periksa kotak masuk email Anda dan klik link verifikasi untuk melanjutkan.
            Jika Anda tidak menerima email, silakan periksa folder spam atau klik tombol di bawah untuk mengirim ulang.
        </p>
        
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button type="submit" class="btn-resend">
                <i class="fas fa-paper-plane"></i> Kirim Ulang Email Verifikasi
            </button>
        </form>
        
        <div class="divider"></div>
        
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn-logout">
                <i class="fas fa-sign-out-alt"></i> Keluar dan masuk dengan email lain
            </button>        </form>
        </div>
    </div>
</body>
</html>