<?php

namespace App\Controller\Admin;

use App\Entity\Loans;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class LoansCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Loans::class;
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
