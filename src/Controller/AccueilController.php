<?php
namespace App\Controller;

use App\Repository\PHOTOSACCUEILRepository;
use App\Repository\LISTESPORTRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
class AccueilController extends AbstractController
{
    #[Route('/accueil', name: 'app_accueil')]
    public function index(LISTESPORTRepository $listesportrepository,PHOTOSACCUEILRepository $photoaccueilrespository): Response
    {
        $listesport = $listesportrepository->findAll();
        $photosaccueil = $photoaccueilrespository->findAll();
        return $this->render('accueil/index.html.twig', [
            'controller_name' => 'AccueilController',
            'listesport' => $listesport,
            'photosaccueil' => $photosaccueil,
        ]);
    }
}