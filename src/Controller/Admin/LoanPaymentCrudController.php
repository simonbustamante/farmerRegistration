<?php

namespace App\Controller\Admin;

use App\Entity\LoanPayment;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class LoanPaymentCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return LoanPayment::class;
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
