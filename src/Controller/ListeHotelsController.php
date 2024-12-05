<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ListeHotelsController extends AbstractController
{
    #[Route('/liste/hotels', name: 'app_liste_hotels')]
    public function index(): Response
    {
        return $this->render('liste_hotels/index.html.twig', [
            'controller_name' => 'ListeHotelsController',
        ]);
    }
}
