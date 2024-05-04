<?php

namespace App\Controller\Api;

use App\Entity\Category;
use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\SerializerInterface;

#[Route('/api/category', name: 'api_category_')]

class CategoryController extends AbstractController
{
    #[Route('s', name: 'index', methods: ['GET'])]
    public function index(CategoryRepository $categoryRepository,  SerializerInterface $serializer): Response
    {
        $category = $categoryRepository->findAll();
        return $this->json($category, context: ['groups' => 'api_category_index']);
    }

    #[Route('/{id}', name: 'show' , methods: ['GET'])]
    public function show(Category $category ,  SerializerInterface $serializer  ): Response
    {
        return $this->json($category, context: ['groups' => ['api_category_index', 'api_category_show']]);
    }
}
