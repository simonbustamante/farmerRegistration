<?php

namespace App\Controller\Admin;

use App\Entity\B2CProductRequest;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class B2CProductRequestCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return B2CProductRequest::class;
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
