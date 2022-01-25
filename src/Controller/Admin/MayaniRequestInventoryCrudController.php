<?php

namespace App\Controller\Admin;

use App\Entity\MayaniRequestInventory;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class MayaniRequestInventoryCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return MayaniRequestInventory::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('description'),
            AssociationField::new('mayani_product_inventory_id'),
            NumberField::new('quantity_kg'),
            MoneyField::new('debt')->setCurrency('PHP')->setCustomOption('storedAsCents', false),
            DateField::new('date'),
            AssociationField::new('farm_inventory_id'),
        ];
    }
    
}
