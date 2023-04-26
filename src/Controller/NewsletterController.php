<?php

namespace App\Controller;

use App\Entity\Newsletter;
use App\Form\NewsletterType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NewsletterController extends AbstractController
{
    #[Route('/newsletter/subscribe', name: 'newsletter_subscribe')]
    public function subscribe(Request $request): Response
    {
        $newsletter = new Newsletter();
        $form = $this->createForm(NewsletterType::class, $newsletter);

        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            header('location:http://127.0.0.1:8000/newsletter/email');
            exit;
        }

        return $this->renderForm('newsletter/subscribe.html.twig', [
            'form' => $form,
        ]);
    }

    #[Route('/newsletter/subscribe/validate', name: 'newsletter_valide')]
    public function validate(EntityManagerInterface $em): Response
    {
        // $newsletter = new Newsletter();
        // $em->persist($newsletter);
        // $em->flush();

        return $this->renderForm('validation/validation.html.twig');
    }
}
