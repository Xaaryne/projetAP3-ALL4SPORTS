<?php
namespace App\Controller;

use App\Repository\LISTESPORTSRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
class AccueilController extends AbstractController
{
    #[Route('/accueil', name: 'app_accueil')]
    public function index(LISTESPORTSRepository $listesportrepository): Response
    {
        $listesports = $listesportrepository->findAll();
        return $this->render('accueil/index.html.twig', [
            'controller_name' => 'AccueilController',
            'listesports' => $listesports,
        ]);
    }
}