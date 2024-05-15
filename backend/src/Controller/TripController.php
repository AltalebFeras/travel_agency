<?php

namespace App\Controller;

use App\Entity\Trip;
use App\Form\TripType;
use App\Repository\TripRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

#[IsGranted("ROLE_EDITOR")]
#[Route('/trip', name: 'app_trip_')]
class TripController extends AbstractController
{
    #[Route('/new', name: 'new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager, UserInterface $user): Response
    {
        $trip = new Trip();

        $trip->setUser($user);

        $form = $this->createForm(TripType::class, $trip);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($trip);
            $entityManager->flush();
            $this->addFlash('success', 'The trip has been added successfully');
            return $this->redirectToRoute('app_trip_index');
        }

        return $this->render('trip/new.html.twig', [
            'trip' => $trip,
            'form' => $form,
        ]);
    }

    #[Route('s', name: 'index', methods: ['GET'])]
    public function index(TripRepository $tripRepository): Response
    {
        return $this->render('trip/index.html.twig', [
            'trips' => $tripRepository->findAll(),
        ]);
    }

    #[Route('/{id}', name: 'show', methods: ['GET'])]
    public function show(Trip $trip): Response
    {
        return $this->render('trip/show.html.twig', [
            'trip' => $trip,
        ]);
    }

    #[Route('/{id}/edit', name: 'edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Trip $trip, EntityManagerInterface $entityManager, UserInterface $user): Response
    {
        if ($this->isGranted('ROLE_EDITOR') && !$this->isGranted('ROLE_ADMIN')) {
            if ($trip->getUser() !== $user) {
                $this->addFlash('error', 'You are not allowed to edit this trip.');
                return $this->redirectToRoute('app_trip_index');
            }
        }
    
        $form = $this->createForm(TripType::class, $trip);
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();
            $this->addFlash('success', 'The trip has been edited successfully');
            return $this->redirectToRoute('app_trip_index');
        }
    
        return $this->render('trip/edit.html.twig', [
            'trip' => $trip,
            'form' => $form,
        ]);
    }
    
    #[Route('/{id}', name: 'delete', methods: ['POST'])]
    public function delete(Request $request, Trip $trip, EntityManagerInterface $entityManager, UserInterface $user): Response
    {
        if ($this->isGranted('ROLE_EDITOR') && !$this->isGranted('ROLE_ADMIN')) {
            if ($trip->getUser() !== $user) {
                $this->addFlash('error', 'You are not allowed to delete this trip.');
                return $this->redirectToRoute('app_trip_index');
            }
        }
    
        if ($this->isCsrfTokenValid('delete'.$trip->getId(), $request->request->get('_token'))) {
            $entityManager->remove($trip);
            $entityManager->flush();
            $this->addFlash('success', 'The trip has been deleted successfully');
        }
    
        return $this->redirectToRoute('app_trip_index');
    }
}
    