<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class GuiMail extends Mailable
{
    use Queueable, SerializesModels;

    public function build()
    {
        return $this
            ->from('postmaster@your-mailgun-domain.com', 'Lab7 Sender')
            ->to('recipient@example.com')
            ->subject('Thư demo Lab7: gửi mail bằng Mailgun')
            ->attach(public_path('hinh1.jpg'))
            ->view('guimail');
    }
}
