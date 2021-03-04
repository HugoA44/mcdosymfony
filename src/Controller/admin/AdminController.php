<?php

namespace App\Controller\admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Product;
use App\Entity\Ingredients;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


use Symfony\Component\HttpFoundation\Request;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        $products = $this->getDoctrine()->getRepository(Product::class)->findAll();

        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
            'products' => $products
        ]);
    }
    /**
     * @Route("/admin/addproduct", name="admin")
     */
    public function addproduct(EntityManagerInterface $entityManager, Request $request): Response
    {
        $product = new Product;

        // Création du formulaire
        $form = $this->createFormBuilder($product)
            ->add('name', TextType::class, array('required' => true))
            ->add('description', TextType::class, array('required' => true))
            ->add('image', FileType::class, array('required' => true))
            ->add('price', IntegerType::class, array('required' => true))
            ->add('type', ChoiceType::class, [
                'choices' => [
                    'Burger' => 'Burger',
                    'Drink' => 'Drink',
                    'Happy Meal' => 'Happy Meal',
                ]
            ])
            ->add('save', SubmitType::class, [
                'label' => 'Add',
                'attr' => ['class' => 'btn-full']

            ])
            ->getForm();

        //Récupération des données
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $file = $form->get('image')->getData();
            //Récupération des données
            $product = $form->getData();
            $product->setImage($file->getClientOriginalName());
            //Sauvegardes des données
            $entityManager->persist($product);
            //Execution de l'insertion des données
            $entityManager->flush();
            //Sauvegarde du fichier
            $file->move('assets/img/products', $file->getClientOriginalName());
        }


        return $this->render('admin/addproduct.html.twig', [
            'controller_name' => 'AdminController',
            'form' => $form->createView(),
            'action' => 'Add new product'
        ]);
    }

    /**
     * @Route("/admin/updateproduct/{id}", name="admin")
     */
    public function updateproduct(int $id, EntityManagerInterface $entityManager, Request $request): Response
    {
        //Récupération du manager de données
        $entityManager = $this->getDoctrine()->getManager();

        //Sélection d'une donnée par son id
        $product = $entityManager->getRepository(Product::class)->find($id);

        //Vérifictation si le produit existe bien
        if (!$product) {
            throw $this->createNotFoundException(
                'No product found for id ' . $id
            );
        }

        // Création du formulaire
        $form = $this->createFormBuilder($product)
            ->add('name', TextType::class, array('required' => true))
            ->add('description', TextType::class, array('required' => true))
            ->add('image', TextType::class, array('data_class' => null, 'required' => true))
            ->add('price', IntegerType::class, array('required' => true))
            ->add('type', ChoiceType::class, [
                'choices' => [
                    'Burger' => 'Burger',
                    'Drink' => 'Drink',
                    'Happy Meal' => 'Happy Meal',
                ]
            ])
            ->add('save', SubmitType::class, [
                'label' => 'Add',
                'attr' => ['class' => 'btn-full']

            ])
            ->getForm();

        //Récupération des données
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $file = $form->get('image')->getData();
            //Récupération des données
            $product = $form->getData();
            /*             $product->setImage($file->getClientOriginalName()); */
            //Sauvegardes des données
            $entityManager->persist($product);
            //Execution de l'insertion des données
            $entityManager->flush();
            //Sauvegarde du fichier
            /*             $file->move('assets/img/products', $file->getClientOriginalName()); */
        }


        return $this->render('admin/addproduct.html.twig', [
            'controller_name' => 'AdminController',
            'form' => $form->createView(),
            'action' => 'Add new product'
        ]);
    }

    /**
     * @Route("/admin/removeproduct/{id}", name="remove_product")
     */
    public function removeProduct(int $id): Response
    {
        //Récupération du manager de données
        $entityManager = $this->getDoctrine()->getManager();

        //Sélection d'une donnée par son id
        $product = $entityManager->getRepository(Product::class)->find($id);

        //Vérification si le produit existe bien
        if (!$product) {
            throw $this->createNotFoundException(
                'Pas de produit trouvé avec cet id :' . $id
            );
        }

        //Suppression de l'objet
        $entityManager->remove($product);

        //Exectution de la requête
        $entityManager->flush();

        //Redirection
        return $this->redirectToRoute('admin');
    }

    /**
     * @Route("/admin/addingredientinproduct/{id}", name="admin")
     */
    public function addIngredientInProduct(int $id, EntityManagerInterface $entityManager, Request $request): Response
    {
        //Sélection d'une donnée par son id
        $product = $this->getDoctrine()->getRepository(Product::class)->find($id);

        //Récupération du manager de données
        $entityManager = $this->getDoctrine()->getManager();


        //Vérifictation si le produit existe bien
        if (!$product) {
            throw $this->createNotFoundException(
                'No product found for id ' . $id
            );
        }

        // Création du formulaire
        $form = $this->createFormBuilder($product)
            ->add('ingredients', EntityType::class,
                [
                    'class' => Ingredients::class,
                    'choice_label' => "name",
                    'mapped' => false
                ],
                array('required' => true)
            )

            ->add('save', SubmitType::class, [
                'label' => 'Add ingredient',
                'attr' => ['class' => 'btn-full']

            ])
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $product->addIngredient($form->get("ingredients")->getData());

            $entityManager->flush();

            return $this->redirectToRoute('admin');

        }

        return $this->render('admin/addingredientinproduct.html.twig', [
            'controller_name' => 'AdminController',
            'form' => $form->createView(),
            'action' => 'Add new ingredient'
        ]);
    }


     /**
     * @Route("/admin/addingredient", name="admin")
     */
    public function addIngredient(EntityManagerInterface $entityManager, Request $request): Response
    {
        $ingredient = new Ingredients;

        // Création du formulaire
        $form = $this->createFormBuilder($ingredient)
            ->add('name', TextType::class, array('required' => true))
            ->add('image', FileType::class, array('required' => true))
            ->add('save', SubmitType::class, [
                'label' => 'Add',
                'attr' => ['class' => 'btn-full']

            ])
            ->getForm();

        //Récupération des données
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $file = $form->get('image')->getData();
            //Récupération des données
            $product = $form->getData();
            $product->setImage($file->getClientOriginalName());
            //Sauvegardes des données
            $entityManager->persist($product);
            //Execution de l'insertion des données
            $entityManager->flush();
            //Sauvegarde du fichier
            $file->move('assets/img/ingredients', $file->getClientOriginalName());

            return $this->redirectToRoute('admin');
        }


        return $this->render('admin/addingredient.html.twig', [
            'controller_name' => 'AdminController',
            'form' => $form->createView(),
            'action' => 'Add new ingredient'
        ]);
    }
}
