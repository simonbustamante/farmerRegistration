<?php

namespace App\Controller\Admin;

use App\Entity\Farm;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class FarmCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Farm::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('name'),
            AssociationField::new('location_id'),
            AssociationField::new('farmer_id'),
            AssociationField::new('groups')->onlyOnForms(),
            AssociationField::new('activity_id')->onlyOnForms(),
        ];
    }
    
}
