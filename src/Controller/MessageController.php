<?php

namespace App\Controller;

use App\Message\MailNotification;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Annotation\Route;

class MessageController extends AbstractController
{
    #[Route('/email')]
    public function send(MessageBusInterface $bus)
    {
        $bus->dispatch(new MailNotification('Look! I created a message!'));
    }

}
