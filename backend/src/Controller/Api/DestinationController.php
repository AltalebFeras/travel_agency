<?php
// DestinationController.php
namespace App\Controller\Api;

use App\Entity\Destination;
use App\Repository\DestinationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\SerializerInterface;

#[Route('/api/destination', name: 'api_destination_')]
class DestinationController extends AbstractController
{
    #[Route('s', name: 'index', methods: ['GET'])]
    public function index(DestinationRepository $destinationRepository, SerializerInterface $serializer): Response
    {
        $destinations = $destinationRepository->findAll();
        return $this->json($destinations, context: ['groups' => 'api_destination_index']);
    }

    #[Route('/{id}', name: 'show', methods: ['GET'])]
    public function show(Destination $destination, SerializerInterface $serializer): Response
    {
        return $this->json($destination, context: ['groups' => ['api_destination_index', 'api_destination_show']]);
    }
}

