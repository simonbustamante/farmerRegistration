<?php

namespace App\Controller\Admin;

use App\Entity\InventoryUpdate;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class InventoryUpdateCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return InventoryUpdate::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            AssociationField::new('inventory_id'),
            NumberField::new('quantity_kg'),
            MoneyField::new('credit')->setCurrency('PHP')->setCustomOption('storedAsCents', false),
            DateTimeField::new('date'),
        ];
    }
    
}
