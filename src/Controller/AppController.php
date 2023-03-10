<?php

namespace App\Controller;

use App\Repository\CategorysRepository;
use App\Repository\ProductsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
  public function categorys($id, Request $request, CategorysRepository $categorysRepository, ProductsRepository $productsRepository): Response
  {
    $categorys = $categorysRepository->find($id);
    if(!$categorys){
      throw $this->createNotFoundException('Categorys not found');
    }

    $sort = $request->query->get('sort', 'asc');

    $products = $productsRepository->findBy(
      ['category' => $categorys],
      ['price' => $sort === 'desc' ? 'desc' : 'asc']
    );

    return $this->render('app/categorys.html.twig', [
      'categorys' => $categorys,
      'products' => $products,
      'sort' => $sort
    ]);
  }

  #[Route('/products/{id}', name: 'app_products')]
  public function products($id, ProductsRepository $productsRepository): Response
  {
    $products = $productsRepository->find($id);
    if(!$products){
      throw $this->createNotFoundException('Products not found');
    }

    return $this->render('app/products.html.twig', [
      'products' => $products,
    ]);

  }

}
