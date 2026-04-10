<?php

namespace App\Console\Commands;

use App\Mail\GuiMail;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

#[Signature('app:test-mail')]
#[Description('Test mail sending functionality')]
class TestMail extends Command
{
    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Testing mailgun mailer...');
        
        try {
            Mail::send(new GuiMail());
            $this->info('Mail sent successfully!');
        } catch (\Exception $e) {
            $this->error('Error sending mail: ' . $e->getMessage());
        }
    }
}
