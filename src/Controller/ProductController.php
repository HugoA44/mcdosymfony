<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;

class ProductController extends AbstractController
{
    /**
     * @Route("/products", name="product")
     */
    public function index(): Response
    {
        $products = $this->getDoctrine()->getRepository(Product::class)->findAll();

        return $this->render('product/index.html.twig', [
            'controller_name' => 'ProductController',
            'products' => $products
        ]);
    }

    /**
     * @Route("/products/{id}", name="product")
     */
    public function productDetails($id): Response
    {
        $product = $this->getDoctrine()->getRepository(Product::class)->find($id);
        // //Get ingredients of product
        $ingredients = $product->getIngredients();

        $nutritions = $product->getNutrition();

        return $this->render('product/details.html.twig', [
            'controller_name' => 'ProductController',
            'product' => $product,
            'ingredients' => $ingredients,
            'nutritions' => $nutritions
        ]);
    }

    /**
     * @Route("/products/type/{type}", name="product")
     */
    public function productsType($type): Response
    {
        $products = $this->getDoctrine()->getRepository(Product::class)->findByType($type);

        return $this->render('product/index.html.twig', [
            'controller_name' => 'ProductController',
            'products' => $products
        ]);
    }
}
