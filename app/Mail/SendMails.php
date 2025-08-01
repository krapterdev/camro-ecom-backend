<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailables\Address;


class SendMails extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    /**
     * Create a new message instance.
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Define the envelope (subject, sender, etc.)
     */


    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->data['subject'] ?? 'No Subject',
            from: new Address(
                $this->data['email'] ?? 'noreply@gmgcart.in',
                $this->data['name'] ?? 'GMGCart'
            )
        );
    }

    public function content(): Content
    {
        $html = "
        <h2>Hello {$this->data['name']}</h2>
        <p><strong>Phone:</strong> {$this->data['phone']}</p>
        <p><strong>Message:</strong> {$this->data['message']}</p>
    ";

        return new Content(html: $html);
    }

    /**
     * Define the content (HTML or plain text)
     */
    // public function content(): Content
    // {
    //     $html = <<<HTML
    // <div style="font-family: Arial; padding: 20px;">
    //     <h2>Hello {$this->data['name']}</h2>
    //     <p><strong>Phone:</strong> {$this->data['phone']}</p>
    //     <p><strong>Message:</strong> {$this->data['message']}</p>
    // </div>
    // HTML;

    //     return new Content(html: $html);
    // }


    /**
     * Attach files if needed
     */
    // public function attachments(): array
    // {
    //     return isset($this->data['filePath'])
    //         ? [Attachment::fromPath($this->data['filePath'])]
    //         : [];
    // }
}
