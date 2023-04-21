<?php

namespace App\Controller;

use App\Entity\Article;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{
    #[Route('/article/{id}', name: 'article_content')]
    public function item(Article $article): Response
    {
        return $this->render('article/index.html.twig', [
            'article' => $article
        ]); 
    }
}
