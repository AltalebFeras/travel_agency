<?php

namespace App\Controller;

use App\Entity\ReplyToConatctRequest;
use App\Form\ReplyToConatctRequestType;
use App\Repository\ReplyToConatctRequestRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted("ROLE_EDITOR")]
#[Route('/reply_to_conatct_request', name: 'app_reply_to_conatct_request_')]
class ReplyToConatctRequestController extends AbstractController
{
    public function __construct(private MailerInterface $mailer)
    {
    }
    #[Route('s', name: 'index', methods: ['GET'])]
    public function index(ReplyToConatctRequestRepository $replyToConatctRequestRepository): Response
    {
        return $this->render('reply_to_conatct_request/index.html.twig', [
            'reply_to_conatct_requests' => $replyToConatctRequestRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $replyToConatctRequest = new ReplyToConatctRequest();
        $form = $this->createForm(ReplyToConatctRequestType::class, $replyToConatctRequest);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($replyToConatctRequest);
            $entityManager->flush();
            $this->sendReplyToContact($replyToConatctRequest);

            return $this->redirectToRoute('app_reply_to_conatct_request_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('reply_to_conatct_request/new.html.twig', [
            'reply_to_conatct_request' => $replyToConatctRequest,
            'form' => $form,
        ]);
    }
    private function sendReplyToContact(ReplyToConatctRequest $replyToConatctRequest): void
{
    $contact = $replyToConatctRequest->getContact();
    $email = (new Email())
        ->from('emailContact@ferasTA.com')
        ->to($contact->getEmail())
        ->subject('New reply to your contact request')
        ->html($this->renderView(
            'reply_to_conatct_request/replyToContact.html.twig',
            ['contact' => $contact, 'replyToConatctRequest' => $replyToConatctRequest]
        ));

    $this->mailer->send($email);
}

  

    #[Route('/{id}/edit', name: 'edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ReplyToConatctRequest $replyToConatctRequest, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ReplyToConatctRequestType::class, $replyToConatctRequest);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();
            $this->sendReplyToContact($replyToConatctRequest);

            return $this->redirectToRoute('app_reply_to_conatct_request_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('reply_to_conatct_request/edit.html.twig', [
            'reply_to_conatct_request' => $replyToConatctRequest,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'delete', methods: ['POST'])]
    public function delete(Request $request, ReplyToConatctRequest $replyToConatctRequest, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$replyToConatctRequest->getId(), $request->getPayload()->get('_token'))) {
            $entityManager->remove($replyToConatctRequest);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_reply_to_conatct_request_index', [], Response::HTTP_SEE_OTHER);
    }
}
