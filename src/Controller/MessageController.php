<?php

namespace App\Controller;

use App\Message\MailNotification;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Annotation\Route;

class MessageController extends AbstractController
{
    #[Route('/email')]
    public function send(MessageBusInterface $bus, MailerInterface $mailer, Request $request): JsonResponse
    {
        $type = $request->request->get('type') == 'ten' ? 'ten' : 'one';
        $email = $request->request->get('email');

        $bus->dispatch(new MailNotification($mailer, $email));

        return $this->json([
            'status' => 'ok',
            'message' => 'message successfully sent'
        ]);
    }

}
