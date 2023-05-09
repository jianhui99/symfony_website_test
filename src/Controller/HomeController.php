<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\ContactUsFormType;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(Request $request): Response
    {
        $contactForm = $this->createForm(ContactUsFormType::class);

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'contact_form' => $contactForm->createView(),
            'success_msg' => $successMsg ?? null,
        ]);
    }
}
