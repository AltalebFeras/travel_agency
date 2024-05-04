<?php

namespace App\Controller\Api;
use App\Entity\Trip;
use App\Repository\TripRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

use Symfony\Component\Routing\Attribute\Route;

#[Route('/api/trip', name: 'api_trip_')]

class TripsController extends AbstractController
{
   
    #[Route('s', name: 'index', methods: ['GET'])]
    public function index(TripRepository $tripRepository): Response
    {
        $trips = $tripRepository->findAll();
        return $this->json($trips, context: ['groups' => 'api_trip_index']);
    }
    #[Route('/{id}', name: 'show', methods: ['GET'])]
    public function show(Trip $trip): Response
    {
        return $this->json($trip, context: ['groups' => ['api_trip_index', 'api_trip_show']]);
    }
}
