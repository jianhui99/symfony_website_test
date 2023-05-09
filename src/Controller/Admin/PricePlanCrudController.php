<?php

namespace App\Controller\Admin;

use App\Entity\PricePlan;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use App\Form\PricePlanBenefitType;


class PricePlanCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return PricePlan::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name'),
            IntegerField::new('price'),
            CollectionField::new('benefits')
                ->setEntryType(PricePlanBenefitType::class)
                ->onlyOnForms(),
        ];
    }
}
