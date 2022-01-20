<?php

namespace App\Controller\Admin;

use App\Entity\MayaniLoanProducts;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class MayaniLoanProductsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return MayaniLoanProducts::class;
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
