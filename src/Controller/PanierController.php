<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\PRODUITRepository;
use App\Repository\COMMANDESRepository;
use App\Entity\PANIER;
use App\Entity\PRODUIT;
use App\Entity\COMMANDES;
use Doctrine\ORM\EntityManagerInterface;
use Datetime;

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
    /*Fonction permettant d'ajouter une commande 
    Celle ci crée une entrée pour l'entité COMMANDE et PANIER puis met à jour la base de donnée 
    étant donné que l'utilisateur n'a pas été mis en place on créer une entrée panier avec la commande*/
    #[Route('/createcommande', name:'app_createcommande')]
    public function createcommande(Request $request,EntityManagerInterface $entityManager,PRODUITRepository $produitrepository): Response 
    {
//Récupération des infos importante comme la quantité ou le produit 
        $produits = $produitrepository->findAll();
        $quantite = $_POST['quantite'];
        $produitid = $_POST['produitid'];

        $produit = $entityManager->getRepository(PRODUIT::class)->find($produitid);
        $produitprix = $produit->getPrix();
        $currentdatetime = new DateTime();
//Création du panier
        $newpanier = new PANIER();
        $newpanier ->setQuantite($quantite);
        $newpanier ->setProduit($produit);


//Création de la commande s
        $newcommande = new COMMANDES();
        $newcommande -> setEtat("En cours de confirmation");
        $newcommande -> setPrixtotal($produitprix * $quantite);
        $newcommande -> setDate($currentdatetime);
        $entityManager->persist($newcommande);
        $entityManager->flush();

        
        $newpanier ->setCommandes($newcommande);

        $entityManager->persist($newpanier);


        $entityManager->flush();

        $quantite = null;
        $produitid = null;


        return $this->render('panier/index.html.twig', [
            'controller_name' => 'PanierController',
            'quantite' => $quantite,
            'produit' => $produit,
            'produitid' => $produitid,
        ]);
    } 
}
