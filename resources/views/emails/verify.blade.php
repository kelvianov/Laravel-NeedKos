<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Email - KosKu</title>
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
        
        /* Header */
        .header {
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
            font-size: 22px;
            font-weight: 600;
            margin-bottom: 20px;
            color: #222;
            text-align: center;
        }
        
        .message {
            margin-bottom: 25px;
            color: #555;
            font-size: 16px;
            line-height: 1.7;
        }
        
        /* Button */
        .verify-button {
            display: block;
            background: linear-gradient(to right, #222, #444);
            color: white !important;
            text-decoration: none;
            padding: 14px 20px;
            border-radius: 6px;
            text-align: center;
            font-weight: 600;
            font-size: 16px;
            margin: 35px 0;
            transition: all 0.3s ease;
        }
        
        .verify-button:hover {
            background: linear-gradient(to right, #000, #333);
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            transform: translateY(-2px);
        }
        
        /* Link Fallback */
        .link-fallback {
            margin: 30px 0;
            padding: 15px;
            background-color: #f9f9f9;
            border-radius: 8px;
            border-left: 4px solid #222;
            color: #666;
            font-size: 14px;
        }
        
        .link-url {
            word-break: break-all;
            color: #222;
            font-weight: 500;
            text-decoration: none;
        }
        
        /* Footer */
        .footer {
            background-color: #f8f8f8;
            padding: 25px;
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
        
        .expire-notice {
            margin-top: 25px;
            font-size: 13px;
            color: #999;
            font-style: italic;
        }
        
        .divider {
            height: 1px;
            background-color: #eee;
            margin: 25px 0;
        }
        
        /* Icon */
        .icon-container {
            text-align: center;
            margin: 20px 0 25px 0;
        }
        
        .icon {
            width: 80px;
            height: 80px;
            background-color: #f0f4ff;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 15px;
        }
        
        /* Footer links */
        .footer-links {
            margin-bottom: 15px;
        }
        
        .footer-links a {
            color: #555;
            text-decoration: none;
            margin: 0 8px;
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
            
            .verify-button {
                background: linear-gradient(to right, #444, #222) !important;
            }
            
            .link-fallback {
                background-color: #333 !important;
                color: #ccc !important;
                border-left-color: #555 !important;
            }
            
            .link-url {
                color: #5f9cff !important;
            }
            
            .footer {
                background-color: #1e1e1e !important;
                color: #999 !important;
                border-top-color: #333 !important;
            }
            
            .footer-links a {
                color: #aaa !important;
            }
            
            .expire-notice {
                color: #999 !important;
            }
            
            .icon {
                background-color: #333 !important;
            }
            
            .divider {
                background-color: #444 !important;
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
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" style="fill: #222;">
                        <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
                    </svg>
                </div>
            </div>
            
            <h2 class="greeting">Verifikasi Email Anda</h2>
            
            <p class="message">
                Halo {{ $name }},<br><br>
                Terima kasih telah mendaftar di KosKu. Untuk melengkapi proses pendaftaran dan mengaktifkan akun Anda, mohon verifikasi alamat email Anda dengan mengklik tombol di bawah ini.
            </p>
            
            <a href="{{ $url }}" class="verify-button">Verifikasi Email</a>
            
            <div class="link-fallback">
                Jika tombol di atas tidak berfungsi, silakan salin dan tempel link berikut ke browser Anda:<br><br>
                <a href="{{ $url }}" class="link-url">{{ $url }}</a>
            </div>
            
            <div class="divider"></div>
            
            <div class="expire-notice">
                Link verifikasi ini akan kadaluarsa dalam 60 menit.<br>
                Jika Anda tidak mendaftar di KosKu, silakan abaikan email ini.
            </div>
        </div>
        
        <div class="footer">
            <div class="logo">KosKu</div>
            <div>Aplikasi pencarian kos terbaik untuk kebutuhan hunian Anda</div>
            <div class="footer-links">
                <a href="#">Website</a> • 
                <a href="#">Bantuan</a> • 
                <a href="#">Kontak</a>
            </div>
            <div>© {{ date('Y') }} KosKu. Semua hak dilindungi.</div>
        </div>
    </div>
</body>
</html>
