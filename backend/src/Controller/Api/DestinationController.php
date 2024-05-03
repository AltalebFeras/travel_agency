<?php

namespace App\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class DestinationController extends AbstractController
{
    #[Route('/api/destination', name: 'app_api_destination')]
    public function index(): Response
    {
        return $this->render('api/destination/index.html.twig', [
            'controller_name' => 'DestinationController',
        ]);
    }
}
