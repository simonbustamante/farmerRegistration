<?php

namespace App\Controller\Admin;

use App\Entity\MayaniLoanProducts;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class MayaniLoanProductsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return MayaniLoanProducts::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('name'),
            TextField::new('description'),
            NumberField::new('loan_interest'),
        
        ];
    }
    
}
