<?php

namespace App\Controller\Admin;

use App\Entity\MayaniProductInventory;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class MayaniProductInventoryCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return MayaniProductInventory::class;
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
