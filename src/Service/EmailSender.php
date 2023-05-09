<?php

declare(strict_types=1);

namespace App\Service;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use App\Form\ContactUsFormType;

class EmailSender
{
    private MailerInterface $mailer;

    public function __construct(MailerInterface $mailer) 
    {
        $this->mailer = $mailer;
    }

    public function sendContactUsForm(ContactUsFormType $contactForm): void
    {
        $email = (new TemplatedEmail())
            ->to('jianhui5939@gmail.com')
            ->from('contactus@gmail.com')
            ->subject('Contact Us Form')
            ->htmlTemplate('emails/contact_us.html.twig')
            ->context([
                'name' => $contactForm->name,
                'customer_email' => $contactForm->email,
                'subject' => $contactForm->subject,
                'message' => $contactForm->message,
            ]);

        $this->mailer->send($email);
    }
}