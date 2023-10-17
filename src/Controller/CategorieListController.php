<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategorieListController extends AbstractController
{
    #[Route('/categorie/list', name: 'app_categorie_list')]
    public function index(): Response
    {
        return $this->render('categorie_list/index.html.twig', [
            'controller_name' => 'CategorieListController',
        ]);
    }
}
