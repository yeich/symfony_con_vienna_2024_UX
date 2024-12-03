<?php

namespace App\Controller;

use App\Entity\Product;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/products', name: 'app_products_')]
class ProductsController extends AbstractController
{
    #[Route('/overview', name: 'overview')]
    public function index(ProductRepository $productRepository): Response
    {
        return $this->render('products/overview.html.twig', [
            'products' => $productRepository->all(),
        ]);
    }
}
