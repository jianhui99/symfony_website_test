<?php

declare(strict_types=1);

namespace App\ValueObject;

class ContactUsForm
{
    public string $name, $email, $subject, $message;
}