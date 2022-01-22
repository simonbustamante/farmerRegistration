<?php

namespace App\Controller\Admin;

use App\Entity\MayaniProductInventory;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class MayaniProductInventoryCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return MayaniProductInventory::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('description'),
            NumberField::new('total_inventory_kg'),
            MoneyField::new('total_value')->setCurrency('PHP')->setCustomOption('storedAsCents', false),
        ];
    }
    
}
