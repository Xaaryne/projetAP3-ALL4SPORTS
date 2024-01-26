<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CLIENTRepository;

class ConnexionController extends AbstractController
{
    #[Route('/connexion', name: 'app_connexion')]
    public function index(): Response
    {
        return $this->render('connexion/index.html.twig', [
            'controller_name' => 'ConnexionController',
        ]);
    }

    #[Route('/connexionclient', name: 'app_connexionclient')]
    public function connection(CLIENTRepository $clientrepository): Response
    {

    $password = $_POST['password'];
    $email = $_POST['email'];
    $clients = $clientrepository->findAll();
    $connection = false;

    foreach($client as $clients){
        if ($client.email == $email){
            if ($client.password == $password){
                $connection = true;
            }
        }
    }


    return $this->render('connexion/connexion.html.twig', [
        'controller_name' => 'ConnexionController',
        'connection' => $connection,
    ]);
}
}

