<?php

namespace App\Controller\Admin;

use App\Entity\PricePlanBenefit;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class PricePlanBenefitCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return PricePlanBenefit::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
