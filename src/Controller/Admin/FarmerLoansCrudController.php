<?php

namespace App\Controller\Admin;

use App\Entity\FarmerLoans;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class FarmerLoansCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return FarmerLoans::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            AssociationField::new('mayani_loan_product_id'),
            TextField::new('loan_description'),
            MoneyField::new('loan_debt')->setCurrency('PHP')->setCustomOption('storedAsCents', false),
            MoneyField::new('monthly_fee')->setCurrency('PHP')->setCustomOption('storedAsCents', false),
            ChoiceField::new('status')->setChoices([
                'Active'=>'Active',
                'Disabled'=>'Disabled',
                'Delayed'=>'Delayed',
                'Completed'=>'Completed',
                'Other'=>'Other',
            ])->hideOnIndex(),
            DateField::new('date_of_approval'),
            DateField::new('time_to_pay'),
            
        ];
    }
    
}
