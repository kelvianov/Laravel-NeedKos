<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Status Report - NeedKos</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f8f9fa;
        }
        .email-container {
            background-color: #ffffff;
            padding: 0;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            overflow: hidden;
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
        .header p {
            margin: 8px 0 0 0;
            opacity: 0.9;
            font-size: 16px;
        }
        .content {
            padding: 30px;
        }
        .status-update {
            background-color: #f8f9fa;
            border-radius: 8px;
            padding: 25px;
            margin: 20px 0;
            border-left: 4px solid #28a745;
        }
        .status-change {
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 20px 0;
            font-size: 16px;
            font-weight: 600;
        }
        .old-status, .new-status {
            padding: 8px 16px;
            border-radius: 20px;
            color: white;
            font-weight: 500;
        }
        .old-status {
            background-color: #6c757d;
        }
        .new-status.in_progress {
            background-color: #17a2b8;
        }
        .new-status.resolved {
            background-color: #28a745;
        }
        .new-status.closed {
            background-color: #6f42c1;
        }
        .arrow {
            margin: 0 15px;
            font-size: 18px;
            color: #28a745;
        }
        .report-details {
            background-color: #ffffff;
            border: 1px solid #dee2e6;
            border-radius: 8px;
            padding: 20px;
            margin: 20px 0;
        }
        .detail-row {
            display: flex;
            margin-bottom: 12px;
        }
        .detail-label {
            font-weight: 600;
            color: #495057;
            min-width: 120px;
        }
        .detail-value {
            color: #212529;
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
        .message-box {
            background-color: #e7f3ff;
            border-left: 4px solid #007bff;
            padding: 15px;
            margin: 20px 0;
            border-radius: 0 4px 4px 0;
        }
        .admin-signature {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #dee2e6;
            color: #6c757d;
            font-size: 14px;
        }
        .footer {
            background-color: #343a40;
            color: #adb5bd;
            padding: 20px 30px;
            text-align: center;
            font-size: 14px;
        }
        .footer a {
            color: #007bff;
            text-decoration: none;
        }
        .btn {
            display: inline-block;
            background-color: #007bff;
            color: white;
            padding: 12px 24px;
            text-decoration: none;
            border-radius: 6px;
            font-weight: 500;
            margin: 10px 0;
        }
        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <!-- Header -->
        <div class="header">
            <h1>📬 Update Status Report</h1>
            <p>Report ID: #{{ $report->id }}</p>
        </div>

        <!-- Content -->
        <div class="content">
            <!-- Status Update -->
            <div class="status-update">
                <h3 style="margin-top: 0; color: #28a745;">✅ Status Report Telah Diperbarui</h3>
                <p>Halo, <strong>{{ $report->name }}</strong>!</p>
                <p>Kami ingin menginformasikan bahwa status report Anda telah diperbarui oleh tim kami.</p>
                
                <div class="status-change">
                    <span class="old-status">{{ ucfirst(str_replace('_', ' ', $oldStatus)) }}</span>
                    <span class="arrow">→</span>
                    <span class="new-status {{ $newStatus }}">{{ ucfirst(str_replace('_', ' ', $newStatus)) }}</span>
                </div>
            </div>

            <!-- Report Details -->
            <div class="report-details">
                <h4 style="margin-top: 0; color: #495057;">📋 Detail Report</h4>
                
                <div class="detail-row">
                    <div class="detail-label">Subject:</div>
                    <div class="detail-value"><strong>{{ $report->subject }}</strong></div>
                </div>
                
                <div class="detail-row">
                    <div class="detail-label">Kategori:</div>
                    <div class="detail-value">{{ ucfirst($report->category) }}</div>
                </div>
                
                <div class="detail-row">
                    <div class="detail-label">Prioritas:</div>
                    <div class="detail-value">
                        <span class="priority-badge priority-{{ $report->priority }}">{{ ucfirst($report->priority) }}</span>
                    </div>
                </div>
                
                <div class="detail-row">
                    <div class="detail-label">Tanggal Submit:</div>
                    <div class="detail-value">{{ \Carbon\Carbon::parse($report->created_at ?? now())->format('d F Y, H:i') }}</div>
                </div>
            </div>

            <!-- Status Information -->
            @if($newStatus === 'in_progress')
                <div class="message-box">
                    <h4 style="margin-top: 0; color: #007bff;">🔄 Sedang Dalam Proses</h4>
                    <p>Tim kami telah mulai menangani report Anda. Kami akan segera menginvestigasi masalah ini dan memberikan solusi terbaik.</p>
                    <p><strong>Estimasi penyelesaian:</strong> 1-3 hari kerja</p>
                </div>
            @elseif($newStatus === 'resolved')
                <div class="message-box" style="background-color: #d4edda; border-color: #28a745;">
                    <h4 style="margin-top: 0; color: #28a745;">✅ Masalah Telah Diselesaikan</h4>
                    <p>Selamat! Report Anda telah berhasil diselesaikan oleh tim kami. Masalah yang Anda laporkan sudah ditangani dengan baik.</p>
                    <p>Jika Anda masih mengalami masalah yang sama atau memiliki pertanyaan, jangan ragu untuk menghubungi kami kembali.</p>
                </div>
            @elseif($newStatus === 'closed')
                <div class="message-box" style="background-color: #e2e3e5; border-color: #6f42c1;">
                    <h4 style="margin-top: 0; color: #6f42c1;">🔒 Case Ditutup</h4>
                    <p>Report ini telah ditutup. Terima kasih atas laporan yang Anda berikan, hal ini sangat membantu kami untuk terus meningkatkan layanan NeedKos.</p>
                </div>
            @endif

            <!-- Call to Action -->
            <div style="text-align: center; margin: 30px 0;">
                @if($newStatus === 'resolved')
                    <a href="mailto:admin@needkos.com?subject=Feedback Report ID #{{ $report->id }}" class="btn">
                        📝 Berikan Feedback
                    </a>
                @else
                    <a href="mailto:admin@needkos.com?subject=Question Report ID #{{ $report->id }}" class="btn">
                        💬 Hubungi Admin
                    </a>
                @endif
            </div>

            <!-- Admin Signature -->
            <div class="admin-signature">
                <p><strong>Best regards,</strong><br>
                {{ $adminName }}<br>
                NeedKos Support Team</p>
            </div>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p>Email ini dikirim otomatis oleh sistem NeedKos</p>
            <p>Jika Anda memiliki pertanyaan, silakan hubungi <a href="mailto:admin@needkos.com">admin@needkos.com</a></p>
            <p style="margin-top: 15px; font-size: 12px; color: #868e96;">
                Generated on {{ now()->format('Y-m-d H:i:s') }} | 
                NeedKos - Platform Kos Terpercaya
            </p>
        </div>
    </div>
</body>
</html>
