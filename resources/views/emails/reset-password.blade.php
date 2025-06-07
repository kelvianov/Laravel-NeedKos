<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password - KosKu</title>
    <style>
        /* Reset CSS */
        body, html {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f8f9fa;
        }
        
        /* Container */
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0,0,0,0.05);
            margin-top: 30px;
            margin-bottom: 30px;
        }
        
        /* Header */        .header {
            background: linear-gradient(135deg, #222 0%, #444 100%);
            color: white;
            padding: 30px;
            text-align: center;
        }
        
        .header h1 {
            margin: 0;
            font-size: 28px;
            font-weight: 700;
            letter-spacing: -0.5px;
        }
        
        /* Content */
        .content {
            padding: 30px;
        }
        
        .greeting {
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 20px;
            color: #222;
        }
        
        .message {
            margin-bottom: 25px;
            color: #555;
            font-size: 16px;
        }
        
        /* Button */        .reset-button {
            display: block;
            background: linear-gradient(to right, #222, #444);
            color: white;
            text-decoration: none;
            padding: 14px 20px;
            border-radius: 6px;
            text-align: center;
            font-weight: 600;
            font-size: 16px;
            margin: 30px 0;
            transition: all 0.3s ease;
        }
        
        .reset-button:hover {
            background: linear-gradient(to right, #000, #333);
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            transform: translateY(-2px);
        }
        
        /* Link Fallback */
        .link-fallback {
            margin-top: 20px;
            margin-bottom: 25px;
            color: #777;
            font-size: 14px;
        }
        
        .link-url {
            word-break: break-all;
            color: #222;
        }
        
        /* Footer */
        .footer {
            background-color: #f8f8f8;
            padding: 20px;
            text-align: center;
            font-size: 14px;
            color: #777;
            border-top: 1px solid #eee;
        }
        
        .logo {
            margin-bottom: 15px;
            font-size: 20px;
            font-weight: 700;
            color: #222;
        }
        
        .note {
            margin-top: 20px;
            font-size: 13px;
            color: #999;
        }
        
        .divider {
            height: 1px;
            background-color: #eee;
            margin: 25px 0;
        }
        
        /* Icon */
        .icon-container {
            text-align: center;
            margin: 20px 0;
        }
        
        .icon {
            width: 70px;
            height: 70px;
            background-color: #f0f4ff;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 15px;
        }
        
        .icon svg {
            width: 35px;
            height: 35px;
            fill: #222;
        }
          /* Responsive */
        @media only screen and (max-width: 600px) {
            .container {
                width: 100%;
                border-radius: 0;
                margin-top: 0;
                margin-bottom: 0;
            }
            
            .header, .content, .footer {
                padding: 20px;
            }
        }
        
        /* Dark Mode Support */
        @media (prefers-color-scheme: dark) {
            body, html {
                background-color: #1a1a1a !important;
            }
            
            .container {
                background-color: #222 !important;
                box-shadow: 0 4px 10px rgba(255,255,255,0.05) !important;
            }
            
            .header {
                background: linear-gradient(135deg, #333 0%, #111 100%) !important;
            }
            
            .greeting, .logo {
                color: #f0f0f0 !important;
            }
            
            .message {
                color: #ddd !important;
            }
            
            .reset-button {
                background: linear-gradient(to right, #444, #222) !important;
            }
            
            .link-fallback {
                color: #ccc !important;
            }
            
            .link-url {
                color: #5f9cff !important;
            }
            
            .footer {
                background-color: #1e1e1e !important;
                color: #999 !important;
                border-top-color: #333 !important;
            }
            
            .note {
                color: #999 !important;
            }
            
            .divider {
                background-color: #444 !important;
            }
            
            .icon {
                background-color: #333 !important;
            }
            
            .icon svg {
                fill: #ddd !important;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>KosKu</h1>
        </div>
        
        <div class="content">
            <div class="icon-container">
                <div class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M18 8h-1V6c0-2.76-2.24-5-5-5S7 3.24 7 6v2H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2zm-6 9c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2zm3.1-9H8.9V6c0-1.71 1.39-3.1 3.1-3.1 1.71 0 3.1 1.39 3.1 3.1v2z"/>
                    </svg>
                </div>
            </div>
              <div class="greeting">Halo {{ $name ?? 'Pengguna' }}!</div>
            
            <div class="message">
                Anda menerima email ini karena kami menerima permintaan reset password untuk akun Anda di KosKu. Silakan klik tombol di bawah ini untuk melanjutkan proses reset password.
            </div>
            
            <a href="{{ $url }}" class="reset-button">Reset Password</a>
            
            <div class="link-fallback">
                Jika tombol di atas tidak berfungsi, silakan salin dan tempel URL berikut ke browser Anda:
                <br><br>
                <a href="{{ $url }}" class="link-url">{{ $url }}</a>
            </div>
            
            <div class="divider"></div>
            
            <div class="note">
                Jika Anda tidak melakukan permintaan reset password, abaikan email ini.<br>
                Link reset password ini akan kadaluarsa dalam 60 menit.
            </div>
        </div>
        
        <div class="footer">
            <div class="logo">KosKu</div>
            <div>Aplikasi pencarian kos terbaik untuk kebutuhan hunian Anda</div>
            <div class="note">&copy; {{ date('Y') }} KosKu. Semua hak dilindungi.</div>
        </div>
    </div>
</body>
</html>
