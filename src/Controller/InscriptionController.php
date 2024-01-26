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
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $password = $_POST['password'];
        $email = $_POST['email'];

        $newutilisateur = new CLIENT();
        $newutilisateur -> setNom($nom);
        $newutilisateur -> setPrenom($nom);
        $newutilisateur -> setEmail($email);
        $newutilisateur -> setPassword($password);
        $newutilisateur -> setRoles(0);
        $newutilisateur -> setCode("test");
        $newutilisateur -> setNbenfants(0);

        $entityManager->persist($newutilisateur);


        $entityManager->flush();

        return $this->render('inscription/postInscription.html.twig', [
            'controller_name' => 'InscriptionController',
        ]);
    }
}
