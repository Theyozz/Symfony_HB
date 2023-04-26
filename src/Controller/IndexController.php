<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    #[Route('/', name: 'app_index')]
    public function index(ArticleRepository $articleRepository): Response
    {
        $articles = $articleRepository->findAll();
        return $this->render('index/index.html.twig', [
            'articles' => $articles,
        ]);
    }

    #[Route('/newsletter/email')]
    public function sendEmail(MailerInterface $mailer): Response
    {
        $email = (new Email())
            ->from('theyozz@gmail.com')
            ->to()
            //->cc('cc@example.com')
            //->bcc('bcc@example.com')
            //->replyTo('fabien@example.com')
            //->priority(Email::PRIORITY_HIGH)
            ->subject('Validez votre mail')
            // ->text('Sending emails is fun again!')
            ->html("<a href=' http://127.0.0.1:8000/newsletter/subscribe/validate '>Cliquez ici pour validez votre email</a>");

        $mailer->send($email);

        return new Response('Vous avez reçu un mail de confirmation sur votre adresse mail');
    }
}
