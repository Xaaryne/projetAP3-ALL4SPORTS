<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategorieListController extends AbstractController
{
    #[Route('/categorieList/{id}', name: 'app_categorieList')]
    public function index(int $id): Response
    {

        return $this->render('categorieList/index.html.twig', [
            'controller_name' => 'CategorieListController',
            'id' => $id

 
        ]);
    }
}
