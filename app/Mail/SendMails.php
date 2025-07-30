<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;



class SendMails extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build()
    {
        return $this->subject($this->data['subject'])
            ->html(
                "<h1>Hello {$this->data['name']}</h1>
                         <p>{$this->data['message']}</p>"
            );
    }
}




// namespace App\Mail;

// use Illuminate\Bus\Queueable;
// use Illuminate\Contracts\Queue\ShouldQueue;
// use Illuminate\Mail\Mailable;
// use Illuminate\Mail\Mailables\Content;
// use Illuminate\Mail\Mailables\Envelope;
// use Illuminate\Queue\SerializesModels;



// class SendMails extends Mailable
// {
//     use Queueable, SerializesModels;

//     public $data;

//     public function __construct($data)
//     {
//         $this->data = $data;
//     }

//     public function envelope(): Envelope
//     {
//         return new Envelope(
//             subject: $this->data['subject'],
//         );
//     }
//     public function content(): Content
//     {
//         return new Content(
//             view: 'emails.sendMails',
//             with: [
//                 'name' => $this->data['name'],
//                 'message' => $this->data['message'],
//             ],
//         );
//     }
//     public function attachments(): array
//     {
//         return [];
//     }
//     public function build()
//     {
//         return $this->view('emails.sendMails');
//     }


//     public function render()
//     {
//         return $this->view('emails.sendMails');
//     }
// }


