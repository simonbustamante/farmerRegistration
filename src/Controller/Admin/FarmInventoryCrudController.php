<?php

namespace App\Controller\Admin;

use App\Entity\FarmInventory;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class FarmInventoryCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return FarmInventory::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            AssociationField::new('product_id'),
            AssociationField::new('farm_id'),
            DateField::new('date'),
            MoneyField::new('total_price')->setCurrency('PHP')->setCustomOption('storedAsCents', false),
            NumberField::new('total_kg'),  
        ];
    }
    
}
