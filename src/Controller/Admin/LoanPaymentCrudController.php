<?php

namespace App\Controller\Admin;

use App\Entity\LoanPayment;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;

class LoanPaymentCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return LoanPayment::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            AssociationField::new('farmer_balance_id'),
            AssociationField::new('loan_id'),
            DateTimeField::new('date'),
            MoneyField::new('quantity_paid')->setCurrency('PHP')->setCustomOption('storedAsCents', false),
        ];
    }
    
}
