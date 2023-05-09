<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

use App\Entity\PricePlan;
use App\Entity\PricePlanFeature;


class PriceController extends AbstractController
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/price', name: 'app_price')]
    public function index(): Response
    {
        $pricePlans = $this->entityManager->getRepository(PricePlan::class)->findAll();

        $pricePlanFeatures = $this->entityManager->getRepository(PricePlanFeature::class)->findAll();

        return $this->render('price/index.html.twig', [
            'price_plans' => $pricePlans,
            'features' => $pricePlanFeatures,
        ]);
    }
}
