<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;


class SendMails extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $subjectLine;
    public $viewPath;

    public function __construct($data, $subjectLine, $viewPath)
    {
        $this->data = $data;
        $this->subjectLine = $subjectLine;
        $this->viewPath = $viewPath;
    }

    public function build()
    {
        // Optional: Determine dynamic variable name
        $varName = $this->getDataVarName($this->viewPath);

        return $this->subject($this->subjectLine)
            ->view($this->viewPath)
            ->with([$varName => $this->data]);
    }

    protected function getDataVarName($viewPath)
    {
        $parts = explode('.', $viewPath);
        return end($parts) . 'Data';
    }
}
