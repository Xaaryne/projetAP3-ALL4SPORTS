<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\CLIENT;
use App\Repository\CLIENTRepository;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;

class InscriptionController extends AbstractController
{
    #[Route('/inscription', name: 'app_inscription')]
    public function index(): Response
    {
        return $this->render('inscription/index.html.twig', [
            'controller_name' => 'InscriptionController',
        ]);
    }

    #[Route('/createutilisateur', name: 'app_createutilisateur')]
    public function createutilisateur(Request $request,EntityManagerInterface $entityManager,CLIENTRepository $clientrepository): Response
    {

//Récupération du form de la page d'inscription 

        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $password = $_POST['password'];
        $email = $_POST['email'];

//Création du nouveau utilisateur
        $newutilisateur = new CLIENT();
        $newutilisateur -> setNom($nom);
        $newutilisateur -> setPrenom($nom);
        $newutilisateur -> setEmail($email);
        $newutilisateur -> setPassword($password);
        $newutilisateur -> setRoles(0);
        $newutilisateur -> setNbenfants(0);

        $clients = $clientrepository->findAll();
        $code = codeUtilisateur();
        $newutilisateur -> setCode($code);

//Mise à jour de la bdd
        $entityManager->persist($newutilisateur);
        $entityManager->flush();

        return $this->render('inscription/postInscription.html.twig', [
            'controller_name' => 'InscriptionController',
        ]);
    }

    /*Une fonction qui permet de créer un code client*/ 
    public function codeUtilisateur(){
        $random =  mt_rand(10000000, 99999999);
        $code = "CLI" . $random;

        return $code;
    }
}
