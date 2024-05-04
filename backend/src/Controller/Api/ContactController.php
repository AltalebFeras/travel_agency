<?php

namespace App\Controller\Api;

use App\Entity\Contact;
use App\Entity\Status;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

#[Route('/api/contact', name: 'api_contact_')]
class ContactController extends AbstractController
{
    #[Route('/new', name: 'new', methods: ['POST'])]
    public function newContact(Request $request, EntityManagerInterface $em, SerializerInterface $serializer, ValidatorInterface $validator): Response
    {
        $requestData = json_decode($request->getContent(), true);

        $statusId = $requestData['status']['id'];
        $status = $em->getRepository(Status::class)->find($statusId);
        if (!$status) {
            return $this->json(['error' => 'Status not found'], Response::HTTP_NOT_FOUND);
        }

        $contact = $serializer->deserialize($request->getContent(), Contact::class, 'json', ['groups' => 'api_contact_new']);

        $contact->setStatus($status);

        $errors = $validator->validate($contact);
        if (count($errors) > 0) {
            $errorMessages = [];
            foreach ($errors as $error) {
                $errorMessages[] = $error->getMessage();
            }
            return $this->json($errorMessages, Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $em->persist($contact);
        $em->flush();

        return $this->json(null, Response::HTTP_CREATED);
    }
}
