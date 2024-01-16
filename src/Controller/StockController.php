<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\LIEUDISPONIBILITERepository;
use App\Repository\MAGASINRepository;
use App\Repository\LIEUSTOCKAGERepository;
use App\Repository\ENTREPOTRepository;

class StockController extends AbstractController
{
    #[Route('/stock/{id}', name: 'app_stock')]
    public function index(int $id,Request $Request,LIEUDISPONIBILITERepository $lieudisponibiliterepository,MAGASINRepository $magasinrepository,LIEUSTOCKAGERepository $lieustockagerepository,ENTREPOTRepository $entrepotrepository): Response
    {
        $lieudisponibilite = $lieudisponibiliterepository ->findAll();
        $magasin = $magasinrepository -> findAll();
        $lieustockage = $lieustockagerepository -> findAll();
        $entrepot = $entrepotrepository -> findAll();

        $CurrentUrl = $Request->getSchemeAndHttpHost() . $Request->getRequestUri();
        return $this->render('stock/index.html.twig', [
            'controller_name' => 'StockController',
            'id' => $id,
            'lieudisponibilite' => $lieudisponibilite,
            'magasin' => $magasin,
            'lieustockage' => $lieustockage,
            'entrepot' => $entrepot,
        ]);
    }
}
