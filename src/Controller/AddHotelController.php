<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AddHotelController extends AbstractController
{
    #[Route('/add/hotel', name: 'app_add_hotel')]
    public function index(): Response
    {
        return $this->render('add_hotel/index.html.twig', [
            'controller_name' => 'AddHotelController',
        ]);
    }
}
