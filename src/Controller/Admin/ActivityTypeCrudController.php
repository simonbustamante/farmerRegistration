<?php

namespace App\Controller\Admin;

use App\Entity\ActivityType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ActivityTypeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ActivityType::class;
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
