<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

use Symfony\Component\Security\Http\Attribute\IsGranted;


// #[IsGranted("ROLE_ADMIN")]
#[Route('/user', name: 'app_user_')]

class UserController extends AbstractController
{
    #[Route('s', name: 'index', methods: ['GET'])]
    public function index(UserRepository $userRepository): Response
    {
        return $this->render('user/index.html.twig', [
            'users' => $userRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'new', methods: ['GET', 'POST'])]
    public function new(Request $request,  EntityManagerInterface $entityManager, UserPasswordHasherInterface $userPasswordHasher): Response
    {

        // Check if the logged-in user is an editor and if they are trying to edit their own account
        if ($this->isGranted('ROLE_EDITOR') && !$this->isGranted('ROLE_ADMIN') ) {
            $this->addFlash('errorUser', 'You are not allowed to create users ONLY ADMINS.');
            return $this->redirectToRoute('app_user_index');
        }
       

        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            if ($form->get('password')->getData()) {
                // encode the plain password
                $user->setPassword(
                    $userPasswordHasher->hashPassword(
                        $user,
                        $form->get('password')->getData()
                    )
                );
                $entityManager->persist($user);
                $entityManager->flush();
                $this->addFlash('successUser', 'The user has been added successfully');
                return $this->redirectToRoute('app_user_index', [], Response::HTTP_SEE_OTHER);
            }
        }

        return $this->render('user/new.html.twig', [
            'user' => $user,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'show', methods: ['GET'])]
    public function show(User $user): Response
    {
        return $this->render('user/show.html.twig', [
            'user' => $user,
        ]);
    }

    #[Route('/{id}/edit', name: 'edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, User $user, EntityManagerInterface $entityManager, UserPasswordHasherInterface $userPasswordHasher): Response
    {
        $currentUser = $this->getUser();

        // Check if the logged-in user is an editor and if they are trying to edit their own account
        if ($this->isGranted('ROLE_EDITOR') && !$this->isGranted('ROLE_ADMIN') && $currentUser !== $user) {
            $this->addFlash('errorUser', 'You are not allowed to edit this user.');
            return $this->redirectToRoute('app_user_index');
        }
       
        
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            if ($form->get('password')->getData()) {
                // encode the plain password
                $user->setPassword(
                    $userPasswordHasher->hashPassword(
                        $user,
                        $form->get('password')->getData()
                    )
                );


                $entityManager->flush();
                $this->addFlash('successUser', 'The user has been edited successfully');
                return $this->redirectToRoute('app_user_index', [], Response::HTTP_SEE_OTHER);
            }
        }

        return $this->render('user/edit.html.twig', [
            'user' => $user,
            'form' => $form,
        ]);
    }
    
        private $tokenStorage;
    
        public function __construct(TokenStorageInterface $tokenStorage)
        {
            $this->tokenStorage = $tokenStorage;
        }
    
        #[Route('/{id}', name: 'delete', methods: ['POST'])]
        public function delete(Request $request, User $user, EntityManagerInterface $entityManager): Response
        {
            $currentUser = $this->getUser();

            // Check if the logged-in user is an editor and if they are trying to edit their own account
            if ($this->isGranted('ROLE_EDITOR') && !$this->isGranted('ROLE_ADMIN') && $currentUser !== $user) {
                $this->addFlash('errorUser', 'You are not allowed to delete this user.');
                return $this->redirectToRoute('app_user_index');
            }

            $submittedToken = $request->request->get('_token');
    
            if ($this->isCsrfTokenValid('delete' . $user->getId(), $submittedToken)) {
                if ($user === $this->getUser()) {
                    try {
                        $entityManager->remove($user);
                        $entityManager->flush();
                        $this->tokenStorage->setToken(null);
                        $request->getSession()->invalidate();
                        $this->addFlash('successUserD', 'Your account has been deleted successfully.');
                        return $this->redirectToRoute('app_login');
                    } catch (\Exception $e) {
                        $this->addFlash('errorUserD', 'An error occurred while deleting your account.');
                        return $this->redirectToRoute('app_user_index');
                    }
                } else {
                    try {
                        $entityManager->remove($user);
                        $entityManager->flush();
                        $this->addFlash('successUser', 'The user has been deleted successfully');
                    } catch (\Exception $e) {
                        $this->addFlash('errorUser', 'Unable to delete this user, because he created a valid trip.');
                    }
                }
            } else {
                $this->addFlash('errorUser', 'Invalid CSRF token.');
            }
    
            return $this->redirectToRoute('app_user_index');
        }
    }
    