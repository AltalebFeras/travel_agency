<?php

namespace App\Controller\Api;

use App\Entity\Reservation;
use App\Entity\Trip;
use App\Entity\Status;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

#[Route('/api/reservation', name: 'api_reservation_')]
class ReservationController extends AbstractController
{
    #[Route('/new', name: "new", methods: ['POST'])]
    public function new(Request $request, EntityManagerInterface $em, SerializerInterface $serializer, ValidatorInterface $validator)
    {
        $requestData = json_decode($request->getContent(), true);

        $tripId = $requestData['trip']['id'];
        $trip = $em->getRepository(Trip::class)->find($tripId);
        if (!$trip) {
            return $this->json(['error' => 'Trip not found'], Response::HTTP_NOT_FOUND);
        }

        $statusId = $requestData['status']['id'];
        $status = $em->getRepository(Status::class)->find($statusId);
        if (!$status) {
            return $this->json(['error' => 'Status not found'], Response::HTTP_NOT_FOUND);
        }

        $reservation = $serializer->deserialize($request->getContent(), Reservation::class, 'json', ['groups' => 'api_reservation_new']);

        $reservation->setTrip($trip);
        $reservation->setStatus($status);

        $errors = $validator->validate($reservation);
        if (count($errors) > 0) {
            $errorMessages = [];
            foreach ($errors as $error) {
                $errorMessages[] = $error->getMessage();
            }
            return $this->json($errorMessages, Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $em->persist($reservation);
        $em->flush();

        return $this->json(null, Response::HTTP_CREATED);
    }
}
