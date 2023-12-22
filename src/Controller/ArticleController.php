<?php

namespace App\Controller;

use App\Repository\PRODUITRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{
    #[Route('/article/{id}', name: 'app_article')]
    public function index(PRODUITRepository $produitRepositary): Response
    {
        $produit = $produitRepositary->findAll();
        return $this->render('article/index.html.twig', [
            "produit" => $produit,
            'controller_name' => 'ArticleController',
        ]);
    }
}
