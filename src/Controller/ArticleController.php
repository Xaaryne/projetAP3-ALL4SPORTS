<?php

namespace App\Controller;

use App\Repository\PRODUITRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\PHOTOSPRODUITRepository;

class ArticleController extends AbstractController
{
    #[Route('/article/{id}', name: 'app_article')]
    public function index(int $id,Request $Request,PRODUITRepository $produitrepository,PHOTOSPRODUITRepository $photosproduitrepository): Response
    {
        $produit = $produitrepository->findAll();
        $photosproduit = $photosproduitrepository ->findAll();
        $CurrentUrl = $Request->getSchemeAndHttpHost() . $Request->getRequestUri();
        return $this->render('article/index.html.twig', [
            'controller_name' => 'ArticleController',
            'id' => $id,
            'produit' => $produit,
            'photos' => $photosproduit,
        ]);
    }
}
