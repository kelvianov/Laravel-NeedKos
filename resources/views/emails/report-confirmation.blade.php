<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Report - KosKu</title>
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
        
        /* Report Details Box */
        .report-details {
            background-color: #f9f9f9;
            border-radius: 8px;
            padding: 20px;
            margin: 25px 0;
            border-left: 4px solid #222;
        }
        
        .detail-row {
            margin-bottom: 12px;
        }
        
        .detail-label {
            font-weight: 600;
            color: #222;
            display: inline-block;
            min-width: 120px;
        }
        
        .detail-value {
            color: #555;
        }
        
        .priority-badge {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 12px;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
        }
        
        .priority-high {
            background-color: #dc3545;
            color: white;
        }
        
        .priority-medium {
            background-color: #ffc107;
            color: #212529;
        }
        
        .priority-low {
            background-color: #28a745;
            color: white;
        }
        
        /* Button */
        .action-button {
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
        
        .action-button:hover {
            background: linear-gradient(to right, #000, #333);
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            transform: translateY(-2px);
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
            
            .action-button {
                background: linear-gradient(to right, #444, #222) !important;
            }
            
            .report-details {
                background-color: #333 !important;
                color: #ccc !important;
                border-left-color: #555 !important;
            }
            
            .detail-label {
                color: #f0f0f0 !important;
            }
            
            .detail-value {
                color: #ddd !important;
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
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" style="fill: #28a745;">
                        <path d="M12 2C13.1 2 14 2.9 14 4C14 5.1 13.1 6 12 6C10.9 6 10 5.1 10 4C10 2.9 10.9 2 12 2ZM21 9V7L15 1H5C3.89 1 3 1.89 3 3V21C3 22.11 3.89 23 5 23H19C20.11 23 21 22.11 21 21V9M19 21H5V3H13V9H19Z"/>
                    </svg>
                </div>
            </div>
            
            <h2 class="greeting">Report Anda Telah Diterima</h2>
            
            <p class="message">
                Halo <strong>{{ $report->name ?? 'User' }}</strong>,<br><br>
                Terima kasih telah mengirimkan report ke KosKu. Laporan Anda telah berhasil diterima dan akan segera ditinjau oleh tim kami.
            </p>
            
            <div class="report-details">
                <h3 style="margin-top: 0; color: #222; font-size: 16px;">📋 Detail Report Anda</h3>
                
                <div class="detail-row">
                    <span class="detail-label">Report ID:</span>
                    <span class="detail-value"><strong>#{{ $report->id ?? 'REP-' . rand(1000,9999) }}</strong></span>
                </div>
                
                @if($report->subject ?? null)
                <div class="detail-row">
                    <span class="detail-label">Subject:</span>
                    <span class="detail-value"><strong>{{ $report->subject }}</strong></span>
                </div>
                @endif
                
                <div class="detail-row">
                    <span class="detail-label">Kategori:</span>
                    <span class="detail-value">{{ ucfirst($report->category ?? 'General') }}</span>
                </div>
                
                @if($report->priority ?? null)
                <div class="detail-row">
                    <span class="detail-label">Prioritas:</span>
                    <span class="detail-value">
                        <span class="priority-badge priority-{{ $report->priority }}">{{ ucfirst($report->priority) }}</span>
                    </span>
                </div>
                @endif
                
                <div class="detail-row">
                    <span class="detail-label">Tanggal Submit:</span>
                    <span class="detail-value">{{ \Carbon\Carbon::parse($report->created_at ?? now())->format('d F Y, H:i') }}</span>
                </div>
            </div>
            
            <p class="message">
                Tim kami akan meninjau laporan Anda dan menghubungi Anda dalam waktu <strong>1-3 hari kerja</strong>. Anda akan menerima email update ketika status report berubah.
            </p>
            
            <a href="mailto:admin@needkos.com?subject=Question Report ID #{{ $report->id ?? 'REP-' . rand(1000,9999) }}" class="action-button">
                💬 Hubungi Support
            </a>
            
            <div class="divider"></div>
            
            <p style="font-size: 14px; color: #666; text-align: center;">
                Jika Anda tidak mengirimkan report ini, silakan abaikan email ini atau hubungi kami segera.
            </p>
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
