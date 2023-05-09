<?php

namespace App\Controller\Admin;

use App\Entity\PricePlanFeature;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class PricePlanFeatureCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return PricePlanFeature::class;
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
