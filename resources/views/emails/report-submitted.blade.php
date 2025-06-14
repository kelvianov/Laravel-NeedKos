<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Report Submitted</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .email-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .header {
            background-color: #2c3e50;
            color: white;
            padding: 20px;
            text-align: center;
            border-radius: 10px 10px 0 0;
            margin: -30px -30px 30px -30px;
        }
        .report-details {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            margin: 20px 0;
        }
        .field {
            margin-bottom: 15px;
        }
        .field label {
            font-weight: bold;
            color: #2c3e50;
            display: block;
            margin-bottom: 5px;
        }
        .field-value {
            background-color: white;
            padding: 10px;
            border-radius: 5px;
            border-left: 4px solid #3498db;
        }
        .message-content {
            background-color: white;
            padding: 15px;
            border-radius: 5px;
            border: 1px solid #ddd;
            white-space: pre-wrap;
        }
        .priority-high {
            border-left-color: #e74c3c;
        }
        .priority-medium {
            border-left-color: #f39c12;
        }
        .priority-low {
            border-left-color: #27ae60;
        }
        .footer {
            text-align: center;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #eee;
            color: #666;
            font-size: 14px;
        }
        .btn {
            display: inline-block;
            padding: 12px 24px;
            background-color: #3498db;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin: 10px 0;
        }
        .status-badge {
            background-color: #f39c12;
            color: white;
            padding: 5px 10px;
            border-radius: 15px;
            font-size: 12px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            <h1>🚨 New Report Submitted</h1>
            <p>A new report has been submitted and requires attention</p>
        </div>

        <div class="report-details">
            <div class="field">
                <label>Report ID:</label>
                <div class="field-value">
                    #{{ $report->id }} <span class="status-badge">{{ strtoupper($report->status) }}</span>
                </div>
            </div>

            <div class="field">
                <label>Submitted By:</label>
                <div class="field-value">
                    {{ $report->name }} ({{ $report->email }})
                </div>
            </div>

            <div class="field">
                <label>Category:</label>
                <div class="field-value 
                    @if($report->category === 'Bug Report') priority-high
                    @elseif($report->category === 'Feature Request') priority-medium
                    @else priority-low
                    @endif">
                    {{ $report->category }}
                </div>
            </div>

            <div class="field">
                <label>Submitted Date:</label>
                <div class="field-value">
                    {{ $report->created_at->format('l, F j, Y \a\t g:i A') }}
                </div>
            </div>

            <div class="field">
                <label>Message:</label>
                <div class="message-content">{{ $report->message }}</div>
            </div>
        </div>

        <div style="text-align: center; margin: 30px 0;">
            <a href="{{ url('/admin/reports/' . $report->id) }}" class="btn">
                📋 View in Dashboard
            </a>
        </div>

        <div class="footer">
            <p><strong>KosKu Admin Panel</strong></p>
            <p>This email was sent automatically when a new report was submitted.</p>
            <p>Please do not reply to this email. Use the dashboard to respond to the report.</p>
            <hr style="border: none; border-top: 1px solid #eee; margin: 20px 0;">
            <p style="font-size: 12px; color: #999;">
                Generated on {{ now()->format('Y-m-d H:i:s') }} | 
                Report submission system by KosKu
            </p>
        </div>
    </div>
</body>
</html>
