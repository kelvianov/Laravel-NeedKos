<?php

namespace App\Mail;

use App\Models\Report;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ReportSubmitted extends Mailable
{
    use Queueable;

    public $reportData;
    public $isUserConfirmation;

    /**
     * Create a new message instance.
     */
    public function __construct(Report $report, bool $isUserConfirmation = false)
    {
        // Convert model to array to avoid serialization issues
        $this->reportData = $report->toArray();
        $this->reportData['id'] = $report->id;
        $this->isUserConfirmation = $isUserConfirmation;
        $this->isUserConfirmation = $isUserConfirmation;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        $subject = $this->isUserConfirmation 
            ? 'Konfirmasi - Report Anda Telah Diterima'
            : 'New Report Submitted - ' . $this->reportData['category'];

        return new Envelope(
            subject: $subject,
            replyTo: [$this->reportData['email']],
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        $view = $this->isUserConfirmation 
            ? 'emails.report-confirmation'
            : 'emails.report-submitted';

        return new Content(
            view: $view,
            with: [
                'report' => (object) $this->reportData,
                'isUserConfirmation' => $this->isUserConfirmation
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
