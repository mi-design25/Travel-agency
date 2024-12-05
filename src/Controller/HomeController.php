<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Hotel;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\Security\Csrf\CsrfTokenManagerInterface;

class HomeController extends AbstractController
{
    private $csrfTokenManager;

    public function __construct(CsrfTokenManagerInterface $csrfTokenManager)
    {
        $this->csrfTokenManager = $csrfTokenManager;
    }

    #[Route('/', name: 'app_home')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        
    // Récupérer tous les hôtels
    $hotels = $entityManager->getRepository(Hotel::class)->findAll();

    // Générer un token CSRF
    $csrfToken = $this->csrfTokenManager->getToken('add-hotel')->getValue();

    // Renvoyer les données à la vue
    return $this->render('home/index.html.twig', [
        'hotels' => $hotels,
        'csrf_token' => $csrfToken,
    ]);
    }

    #[Route('/', name: 'property_single')]
    public function show(Hotel $hotel): Response
    {
        return $this->render('property/show.html.twig', [
            'hotel' => $hotel,
        ]);
    }

    #[Route('/add-hotel', name: 'add_hotel', methods: ['POST'])]
    public function addHotel(Request $request, EntityManagerInterface $entityManager, SluggerInterface $slugger): Response
    {
        $submittedToken = $request->request->get('_token');

        if (!$this->isCsrfTokenValid('add-hotel', $submittedToken)) {
            $this->addFlash('error', 'Invalid CSRF token.');
            return $this->redirectToRoute('app_home');
        }

        $hotel = new Hotel();

        // Validate the input
        $name = $request->request->get('name');
        $price = $request->request->get('price');
        $type = $request->request->get('type');
        $area = $request->request->get('area');
        $beds = (int)$request->request->get('beds');
        $baths = (int)$request->request->get('baths');
        $garages = (int)$request->request->get('garages');

        if (!$name || !$price || !$type || !$area) {
            $this->addFlash('error', 'All fields are required.');
            return $this->redirectToRoute('app_home');
        }

        // Handle file upload
        $imageFile = $request->files->get('image');
        if ($imageFile) {
            $originalFilename = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
            $safeFilename = $slugger->slug($originalFilename);
            $newFilename = $safeFilename.'-'.uniqid().'.'.$imageFile->guessExtension();

            try {
                $imageFile->move(
                    $this->getParameter('hotel_images_directory'),
                    $newFilename
                );
            } catch (FileException $e) {
                $this->addFlash('error', 'Failed to upload image.');
                return $this->redirectToRoute('app_home');
            }

            $hotel->setImage($newFilename);
        } else {
            $this->addFlash('error', 'Image is required.');
            return $this->redirectToRoute('app_home');
        }

        $hotel->setName($name)
              ->setPrice($price)
              ->setType($type)
              ->setArea($area)
              ->setBeds($beds)
              ->setBaths($baths)
              ->setGarages($garages);

        $entityManager->persist($hotel);
        $entityManager->flush();

        // Add a success message
        $this->addFlash('success', 'Hotel added successfully!');

        return $this->redirectToRoute('app_home');
    }
}