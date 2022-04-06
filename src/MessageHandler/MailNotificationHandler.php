<?php

namespace App\MessageHandler;

use App\MailSender;
use App\Message\MailNotification;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;
use Symfony\Component\Mime\Email;

#[AsMessageHandler]
class MailNotificationHandler
{
    public function __invoke(MailNotification $message)
    {
        $email = (new Email())
            ->from('gamerpro1188@gmail.com')
            ->to($message->getEmail())
            ->subject('Fakhri Ahmadov test email')
            ->text($message->getEmail())
            ->html('email to ' . $message->getEmail());

        $message->mailer->send($email);


    }


}