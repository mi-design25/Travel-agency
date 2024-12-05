<?php
namespace App\Controller;

use App\Entity\Hotel;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HotelController extends AbstractController
{
    #[Route('/', name: 'add_hotel', methods: ['POST'])]
public function addHotel(Request $request, EntityManagerInterface $entityManager): Response
{
    // Récupérer les données du formulaire
    $name = $request->request->get('name');
    $price = $request->request->get('price');
    $type = $request->request->get('type');
    $area = $request->request->get('area');
    $beds = $request->request->get('beds');
    $baths = $request->request->get('baths');
    $garages = $request->request->get('garages');
    $image = $request->request->get('image'); // Si vous gérez les images

    // Vérifier si les données sont correctes
    if (!$name || !$price || !$type) {
        return $this->json(['error' => 'Missing required fields'], 400);
    }

    // Créer et remplir une nouvelle entité Hotel
    $hotel = new Hotel();
    $hotel->setName($name);
    $hotel->setPrice($price);
    $hotel->setType($type);
    $hotel->setArea($area);
    $hotel->setBeds((int)$beds);
    $hotel->setBaths((int)$baths);
    $hotel->setGarages((int)$garages);
    $hotel->setImage($image); // Facultatif, à adapter selon votre gestion des images

    // Persister et sauvegarder dans la base de données
    $entityManager->persist($hotel);
    $entityManager->flush();

    return $this->json(['success' => 'Hotel added successfully!']);
}

}