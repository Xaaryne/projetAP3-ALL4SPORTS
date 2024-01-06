<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\PRODUITRepository;

class PanierController extends AbstractController
{
    #[Route('/panier', name: 'app_panier')]
    public function index(Request $request,PRODUITRepository $produitrepository): Response
    {
        $produit = $produitrepository->findAll();
        $quantite = $_POST['quantite'];
        $produitid = $_POST['produitid'];
        return $this->render('panier/index.html.twig', [
            'controller_name' => 'PanierController',
            'quantite' => $quantite,
            'produit' => $produit,
            'produitid' => $produitid,
        ]);
    }
}
