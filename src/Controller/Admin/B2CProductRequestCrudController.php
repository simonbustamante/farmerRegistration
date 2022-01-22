<?php

namespace App\Controller\Admin;

use App\Entity\B2CProductRequest;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class B2CProductRequestCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return B2CProductRequest::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            AssociationField::new('mayani_inventory_id'),
            TextField::new('description'),
            NumberField::new('quantity_kg'),
            MoneyField::new('total_debt')->setCurrency('PHP')->setCustomOption('storedAsCents', false),
        ];
    }
    
}
