<?php

namespace App\Mail;

use App\Models\Report;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ReportStatusUpdate extends Mailable
{
    use Queueable;

    public $reportData;
    public $oldStatus;
    public $newStatus;
    public $adminName;

    /**
     * Create a new message instance.
     */
    public function __construct(Report $report, string $oldStatus, string $newStatus, ?string $adminName = null)
    {
        // Convert model to array to avoid serialization issues
        $this->reportData = $report->toArray();
        $this->reportData['id'] = $report->id;
        $this->oldStatus = $oldStatus;
        $this->newStatus = $newStatus;
        $this->adminName = $adminName ?: 'Admin NeedKos';
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        $statusText = match($this->newStatus) {
            'in_progress' => 'Sedang Ditangani',
            'resolved' => 'Telah Diselesaikan',
            'closed' => 'Ditutup',
            default => 'Diperbarui'
        };

        return new Envelope(
            subject: "Update Report: {$statusText} - {$this->reportData['subject']}",
            replyTo: ['admin@needkos.com'],
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.report-status-update',
            with: [
                'report' => (object) $this->reportData,
                'oldStatus' => $this->oldStatus,
                'newStatus' => $this->newStatus,
                'adminName' => $this->adminName
            ]
        );
    }
}
