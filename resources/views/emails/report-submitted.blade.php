<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report Baru - KosKu</title>
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
        
        /* Report Details */
        .report-details {
            background-color: #f9f9f9;
            border-radius: 8px;
            padding: 20px;
            margin: 25px 0;
            border-left: 4px solid #222;
        }
        
        .field {
            margin-bottom: 15px;
        }
        
        .field label {
            font-weight: 600;
            color: #222;
            display: block;
            margin-bottom: 5px;
            font-size: 14px;
        }
        
        .field-value {
            background-color: white;
            padding: 12px;
            border-radius: 5px;
            border-left: 3px solid #222;            color: #555;
            font-size: 14px;
            word-wrap: break-word;
        }
        
        .message-content {
            background-color: white;
            padding: 15px;
            border-radius: 5px;
            border: 1px solid #ddd;
            white-space: pre-wrap;
            color: #555;
            font-size: 14px;
        }
        
        .priority-high {
            border-left-color: #dc3545;
        }
        
        .priority-medium {
            border-left-color: #ffc107;
        }
        
        .priority-low {
            border-left-color: #28a745;
        }
        
        .status-badge {
            background-color: #ffc107;
            color: #212529;
            padding: 4px 12px;
            border-radius: 15px;
            font-size: 12px;
            font-weight: 600;
            margin-left: 10px;
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
        
        .footer-links {
            margin-bottom: 15px;
        }
        
        .footer-links a {
            color: #555;
            text-decoration: none;
            margin: 0 8px;
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
            
            .report-details {
                background-color: #333 !important;
                border-left-color: #555 !important;
            }
            
            .field label {
                color: #f0f0f0 !important;
            }
            
            .field-value, .message-content {
                background-color: #444 !important;
                color: #ddd !important;
                border-left-color: #555 !important;
            }
            
            .footer {
                background-color: #1e1e1e !important;
                color: #999 !important;
                border-top-color: #333 !important;
            }
            
            .footer-links a {
                color: #aaa !important;
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
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" style="fill: #dc3545;">
                        <path d="M12 2C13.1 2 14 2.9 14 4C14 5.1 13.1 6 12 6C10.9 6 10 5.1 10 4C10 2.9 10.9 2 12 2ZM21 9V7L15 1H5C3.89 1 3 1.89 3 3V21C3 22.11 3.89 23 5 23H19C20.11 23 21 22.11 21 21V9M19 21H5V3H13V9H19Z"/>
                    </svg>
                </div>
            </div>
            
            <h2 class="greeting">Report Baru Diterima</h2>
            
            <p class="message">
                Sebuah laporan baru telah diterima dan memerlukan perhatian admin.
            </p>

            <div class="report-details">
                <div class="field">
                    <label>ID Report:</label>
                    <div class="field-value">
                        #{{ $report->id }} <span class="status-badge">{{ strtoupper($report->status) }}</span>
                    </div>
                </div>

                <div class="field">
                    <label>Dilaporkan oleh:</label>
                    <div class="field-value">
                        {{ $report->name }} ({{ $report->email }})
                    </div>
                </div>

                <div class="field">
                    <label>Kategori:</label>                    <div class="field-value 
                        @if($report->category === 'Bug Report') priority-high
                        @elseif($report->category === 'Feature Request') priority-medium
                        @else priority-low
                        @endif">
                        {{ $report->category }}
                    </div>
                </div>
                
                <div class="field">
                    <label>Tanggal Laporan:</label>
                    <div class="field-value">
                        {{ \Carbon\Carbon::parse($report->created_at ?? now())->format('l, j F Y \p\u\k\u\l H:i') }}
                    </div>
                </div>

                <div class="field">
                    <label>Pesan:</label>
                    <div class="message-content">{{ $report->message }}</div>
                </div>
            </div>
            
            <div class="divider"></div>
            
            <p class="message" style="text-align: center; color: #999; font-size: 14px;">
                Email ini dikirim secara otomatis ketika laporan baru diterima.<br>
                Silakan gunakan dashboard admin untuk merespons laporan ini.
            </p>
        </div>
        
        <div class="footer">
            <div class="logo">KosKu</div>
            <div>Panel Admin - Sistem Laporan</div>
            <div class="footer-links">
                <a href="#">Dashboard</a> • 
                <a href="#">Bantuan</a> • 
                <a href="#">Kontak</a>
            </div>
            <div>© {{ date('Y') }} KosKu. Semua hak dilindungi.</div>
        </div>
    </div>
</body>
</html>
