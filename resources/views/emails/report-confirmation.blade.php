<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Report - NeedKos</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            line-height: 1.6;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 30px;
            text-align: center;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
            font-weight: 600;
        }
        .content {
            padding: 30px;
        }
        .success-icon {
            text-align: center;
            margin-bottom: 20px;
        }
        .success-icon span {
            background-color: #28a745;
            color: white;
            border-radius: 50%;
            width: 60px;
            height: 60px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
        }
        .report-details {
            background-color: #f8f9fa;
            border-radius: 8px;
            padding: 20px;
            margin: 20px 0;
        }
        .detail-row {
            margin-bottom: 10px;
        }
        .detail-label {
            font-weight: 600;
            color: #333;
            margin-bottom: 5px;
        }
        .detail-value {
            color: #666;
        }
        .priority {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
        }
        .priority.low {
            background-color: #d4edda;
            color: #155724;
        }
        .priority.medium {
            background-color: #fff3cd;
            color: #856404;
        }
        .priority.high {
            background-color: #f8d7da;
            color: #721c24;
        }
        .footer {
            background-color: #f8f9fa;
            padding: 20px;
            text-align: center;
            color: #666;
            font-size: 14px;
        }
        .footer a {
            color: #667eea;
            text-decoration: none;
        }
        .next-steps {
            background-color: #e3f2fd;
            border-left: 4px solid #2196f3;
            padding: 15px;
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Konfirmasi Report Diterima</h1>
        </div>
        
        <div class="content">
            <div class="success-icon">
                <span>✓</span>
            </div>
            
            <h2 style="text-align: center; color: #333; margin-bottom: 20px;">
                Terima kasih, {{ $report->name }}!
            </h2>
            
            <p>Report Anda telah berhasil diterima dan akan segera ditinjau oleh tim kami. Berikut adalah detail report yang Anda kirimkan:</p>
            
            <div class="report-details">
                <div class="detail-row">
                    <div class="detail-label">Kategori:</div>
                    <div class="detail-value">{{ ucfirst($report->category) }}</div>
                </div>
                
                <div class="detail-row">
                    <div class="detail-label">Prioritas:</div>
                    <div class="detail-value">
                        <span class="priority {{ $report->priority }}">{{ ucfirst($report->priority) }}</span>
                    </div>
                </div>
                
                <div class="detail-row">
                    <div class="detail-label">Subjek:</div>
                    <div class="detail-value">{{ $report->subject }}</div>
                </div>
                
                <div class="detail-row">
                    <div class="detail-label">Tanggal Pengiriman:</div>
                    <div class="detail-value">{{ \Carbon\Carbon::parse($report->created_at ?? now())->format('d F Y, H:i') }}</div>
                </div>
            </div>
            
            <div class="next-steps">
                <h3 style="margin-top: 0; color: #1976d2;">Langkah Selanjutnya:</h3>
                <ul style="margin: 0; padding-left: 20px;">
                    <li>Tim kami akan meninjau report Anda dalam 1-2 hari kerja</li>
                    <li>Kami akan menghubungi Anda melalui email jika diperlukan informasi tambahan</li>
                    <li>Pembaruan status akan dikirimkan ke email Anda</li>
                </ul>
            </div>
            
            <p style="margin-top: 30px;">
                Jika Anda memiliki pertanyaan tambahan atau ingin menambahkan informasi terkait report ini, 
                silakan balas email ini atau hubungi kami di <a href="mailto:support@needkos.com">support@needkos.com</a>.
            </p>
        </div>
        
        <div class="footer">
            <p>
                Email ini dikirim secara otomatis oleh sistem NeedKos.<br>
                &copy; {{ date('Y') }} NeedKos. All rights reserved.
            </p>
        </div>
    </div>
</body>
</html>
