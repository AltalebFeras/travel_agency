<?php

namespace App\Controller;

use App\Entity\ReplyToContactRequest;
use App\Form\ReplyToContactRequestType;
use App\Repository\ReplyToContactRequestRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted("ROLE_EDITOR")]
#[Route('/reply_to_contact_request', name: 'app_reply_to_contact_request_')]
class ReplyToContactRequestController extends AbstractController
{
    public function __construct(private MailerInterface $mailer)
    {
    }
    #[Route('s', name: 'index', methods: ['GET'])]
    public function index(ReplyToContactRequestRepository $replyToContactRequestRepository): Response
    {
        return $this->render('reply_to_contact_request/index.html.twig', [
            'reply_to_contact_requests' => $replyToContactRequestRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $replyToContactRequest = new ReplyToContactRequest();
        $form = $this->createForm(ReplyToContactRequestType::class, $replyToContactRequest);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($replyToContactRequest);
            $entityManager->flush();
            $this->sendReplyToContact($replyToContactRequest);

            return $this->redirectToRoute('app_reply_to_contact_request_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('reply_to_contact_request/new.html.twig', [
            'reply_to_contact_request' => $replyToContactRequest,
            'form' => $form,
        ]);
    }
    private function sendReplyToContact(ReplyToContactRequest $replyToContactRequest): void
{
    $contact = $replyToContactRequest->getContact();
    $email = (new Email())
        ->from('emailContact@ferasTA.com')
        ->to($contact->getEmail())
        ->subject('New reply to your contact request')
        ->html($this->renderView(
            'reply_to_contact_request/replyToContact.html.twig',
            ['contact' => $contact, 'replyToContactRequest' => $replyToContactRequest]
        ));

    $this->mailer->send($email);
}

  

    #[Route('/{id}/edit', name: 'edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ReplyToContactRequest $replyToContactRequest, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ReplyToContactRequestType::class, $replyToContactRequest);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();
            $this->sendReplyToContact($replyToContactRequest);

            return $this->redirectToRoute('app_reply_to_contact_request_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('reply_to_contact_request/edit.html.twig', [
            'reply_to_contact_request' => $replyToContactRequest,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'delete', methods: ['POST'])]
    public function delete(Request $request, ReplyToContactRequest $replyToContactRequest, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$replyToContactRequest->getId(), $request->getPayload()->get('_token'))) {
            $entityManager->remove($replyToContactRequest);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_reply_to_contact_request_index', [], Response::HTTP_SEE_OTHER);
    }
}
