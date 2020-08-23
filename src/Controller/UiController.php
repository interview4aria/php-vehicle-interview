<?php

namespace App\Controller;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use App\Entity\Vehicle;

class UiController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        return $this->render('index.html.twig');
    }

    /**
     * @Route("/inquire", name="inquire", methods={"GET", "POST"})
     */
    public function inquire(Request $request)
    {
        $form = $this->createFormBuilder()
            ->add('name', TextType::class)
            ->add('email', EmailType::class)
            ->add('message', TextareaType::class)
            ->add('vehicle', EntityType::class, [
                'class' => Vehicle::class,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('v')
                        ->orderBy('v.name', 'ASC');
                },
            ])
            ->add('send', SubmitType::class)
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // data is an array with "name", "email", and "message" keys
            $data = $form->getData();
            // Application would email off inquiry to proper sales person
        }

        return $this->render('inquire.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/vehicle/create", name="create_vehicle", methods={"GET", "POST"})
     */
    public function createVehicle(Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $vehicle = new Vehicle();

        $form = $this->createFormBuilder($vehicle)
            ->add('name', TextType::class)
            ->add('description', TextareaType::class)
            ->add('color', TextType::class, [
                'required' => false
            ])
            ->add('price', NumberType::class, [
                'required' => false
            ])
            ->add('type', ChoiceType::class, [
                'choices' => [
                    'Boat' => 'boat',
                    'Car' => 'car',
                    'Plane' => 'plane',
                ]
            ])
            ->add('send', SubmitType::class)
            ->getForm();

            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                $vehicle = $form->getData();

                $entityManager->persist($vehicle);
                $entityManager->flush();

                return $this->render('create_success.html.twig');
            }

            return $this->render('create.html.twig', [
                'form' => $form->createView()
            ]);
    }
}