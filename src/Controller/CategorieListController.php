<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\PRODUITRepository;

class CategorieListController extends AbstractController
{
    #[Route('/categorieList/{id}', name: 'app_categorieList')]
    public function index(int $id,Request $Request,PRODUITRepository $produitrepository): Response
    {
        $produit = $produitrepository->findAll();
        $CurrentUrl = $Request->getSchemeAndHttpHost() . $Request->getRequestUri();
        return $this->render('categorieList/index.html.twig', [
            'controller_name' => 'CategorieListController',
            'id' => $id,
            'produit' => $produit,


 
        ]);
    }
}
