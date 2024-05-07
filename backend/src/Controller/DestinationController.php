<?php

namespace App\Controller;

use App\Entity\Destination;
use App\Form\DestinationType;
use App\Repository\DestinationRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted("ROLE_EDITOR")]
#[Route('/destination' , name: 'app_destination_')]
class DestinationController extends AbstractController
{
    #[Route('s', name: 'index', methods: ['GET'])]
    public function index(DestinationRepository $destinationRepository): Response
    {
        return $this->render('destination/index.html.twig', [
            'destinations' => $destinationRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $destination = new Destination();
        $form = $this->createForm(DestinationType::class, $destination);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($destination);
            $entityManager->flush();
            $this->addFlash('successD', 'The destination has been added successfully');
            return $this->redirectToRoute('app_destination_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('destination/new.html.twig', [
            'destination' => $destination,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'show', methods: ['GET'])]
    public function show(Destination $destination): Response
    {
        return $this->render('destination/show.html.twig', [
            'destination' => $destination,
        ]);
    }

    #[Route('/{id}/edit', name: 'edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Destination $destination, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(DestinationType::class, $destination);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();
            $this->addFlash('successD', 'The destination has been edited successfully');
            return $this->redirectToRoute('app_destination_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('destination/edit.html.twig', [
            'destination' => $destination,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'delete', methods: ['POST'])]
    #[Route('/{id}', name: 'delete', methods: ['POST'])]
public function delete(Request $request, Destination $destination, EntityManagerInterface $entityManager): Response
{
    $submittedToken = $request->request->get('_token');

    if ($this->isCsrfTokenValid('delete'.$destination->getId(), $submittedToken)) {
        try {
            $entityManager->remove($destination);
            $entityManager->flush();
            $this->addFlash('successD', 'The destination has been deleted successfully');
        } catch (\Exception $e) {
            $this->addFlash('errorD', 'Unable to delete the destination. It is associated with a valid trip.');
        }
    } else {
        $this->addFlash('errorD', 'Invalid CSRF token.');
    }

    return $this->redirectToRoute('app_destination_index');
}

}
