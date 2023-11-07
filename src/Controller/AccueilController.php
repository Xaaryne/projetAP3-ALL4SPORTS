<?php
namespace App\Controller;

use App\Repository\LISTESPORTRepository;
use App\Repository\PHOTOSRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
class AccueilController extends AbstractController
{
    #[Route('/accueil', name: 'app_accueil')]
    public function index(LISTESPORTRepository $listesportrepository,PHOTOSRepository $photosrepository): Response
    {
        $listesport = $listesportrepository->findAll();
        $photos = $photosrepository->findAll();
        return $this->render('accueil/index.html.twig', [
            'controller_name' => 'AccueilController',
            'listesport' => $listesport,
            'photos' => $photos,
        ]);
    }
}