<?php

namespace App\Controller\Admin;

use App\Entity\FarmerBalance;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class FarmerBalanceCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return FarmerBalance::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            AssociationField::new('farmer_id'),
            TextField::new('farmer_description'),
            MoneyField::new('total_debt')->setCurrency('PHP')->setCustomOption('storedAsCents', false),
            MoneyField::new('total_credit')->setCurrency('PHP')->setCustomOption('storedAsCents', false),
            MoneyField::new('total_monthly_fee')->setCurrency('PHP')->setCustomOption('storedAsCents', false),
        ];
    }
    
}
