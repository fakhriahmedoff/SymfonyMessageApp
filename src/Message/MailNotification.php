<?php

namespace App\Message;

use Symfony\Component\Mailer\MailerInterface;

class MailNotification
{

    private string $email;
    public MailerInterface $mailer;

    public function __construct(MailerInterface $mailer, $email)
    {
        $this->mailer = $mailer;
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getEmail() : string
    {
        return $this->email;
    }

}