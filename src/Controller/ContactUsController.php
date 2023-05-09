<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\ContactUsFormType;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Psr\Log\LoggerInterface;
use App\Service\EmailSender;

class ContactUsController extends AbstractController
{
    #[Route('/contact-us', name: 'app_contact_us', methods: ['POST'])]
    public function index(Request $request, EmailSender $emailSender, LoggerInterface $logger): Response
    {
        $contactForm = $this->createForm(ContactUsFormType::class);
        $successMsg = null;

        $contactForm->handleRequest($request);

        if($contactForm->isSubmitted() && $contactForm->isValid()) {
            $contactFormData = $contactForm->getData();

            try{
                $emailSender->sendContactUsForm($contactFormData);
                $successMsg = "Your message has been sent!";
            } catch (TransportExceptionInterface $e) {
                $form->addError(new FormError('There was a problem sending your email'));
                $logger->error('Email sending failed: ' . $e->getMessage());
            }


        }

        return $this->render('widget/contact_us.html.twig', [
            'contact_form' => $contactForm->createView(),
            'success_msg' => $successMsg,
        ]);
    }
}
