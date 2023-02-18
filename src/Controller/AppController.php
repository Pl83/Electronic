<?php

namespace App\Controller;

use App\Repository\CategorysRepository;
use App\Repository\ProductsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AppController extends AbstractController
{
    #[Route('/', name: 'app_app')]
    public function index(CategorysRepository $categorysRepository): Response
    {
        return $this->render('app/index.html.twig', [
            'categorys' => $categorysRepository->findAll(),
        ]);
    }

    #[Route('/categorys/{id}', name: 'app_categorys')]
    public function categorys($id, CategorysRepository $categorysRepository, ProductsRepository $productsRepository): Response
    {
      $category = $categorysRepository->find($id);
      if(!$category){
        throw $this->createNotFoundException('Category not found');
      }

      $products = $productsRepository->findBy(['category' => $category]);

      return $this->render('app/categorys.html.twig', [
        'category' => $category,
        'products' => $products
      ]);
    }

}
