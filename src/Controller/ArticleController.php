<?php

namespace App\Controller;

use App\Repository\PRODUITRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class ArticleController extends AbstractController
{
    #[Route('/article/{id}', name: 'app_article')]
    public function index(int $id,Request $Request,PRODUITRepository $produitrepository): Response
    {
        $produit = $produitrepository->findAll();
        $CurrentUrl = $Request->getSchemeAndHttpHost() . $Request->getRequestUri();
        return $this->render('article/index.html.twig', [
            'controller_name' => 'ArticleController',
            'id' => $id,
            'produit' => $produit,
        ]);
    }
}
