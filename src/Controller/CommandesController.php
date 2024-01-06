<?php

namespace App\Controller;

use App\Repository\LISTESPORTRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CommandesController extends AbstractController
{
    #[Route('/Commandes', name: 'app_commandes')]
    public function index(): Response
    {
        return $this->render('Commandes/index.html.twig', [
            'controller_name' => 'CommandesController',

        ]);
    }
}
