<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class StockController extends AbstractController
{
    #[Route('/stock/{id}', name: 'app_stock')]
    public function index(int $id,Request $Request): Response
    {
        $CurrentUrl = $Request->getSchemeAndHttpHost() . $Request->getRequestUri();
        return $this->render('stock/index.html.twig', [
            'controller_name' => 'StockController',
            'id' => $id,
        ]);
    }
}
