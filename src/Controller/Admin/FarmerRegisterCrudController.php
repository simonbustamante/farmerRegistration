<?php

namespace App\Controller\Admin;

use App\Entity\FarmerRegister;
use App\Entity\Group;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CountryField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TelephoneField;

class FarmerRegisterCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return FarmerRegister::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('name'),
            TextField::new('middle_name'),
            TextField::new('surname'),
            ImageField::new('picture'),
            AssociationField::new('groups'),
            ChoiceField::new('sex')->setChoices([
                'Masculine'=>'Masculine',
                'Femenine'=>'Femenine',
                'Other'=>'Other'
            ])->hideOnIndex(),
            TextField::new('home_address')->hideOnIndex(),
            TelephoneField::new('contact_number')->hideOnIndex(),
            DateField::new('date_of_birth')->hideOnIndex(),
            TextField::new('place_of_birth')->hideOnIndex(),
            CountryField::new('country_of_birth'),
            TextField::new('religion')->hideOnIndex(),
            ChoiceField::new('civil_status')->setChoices([
                'Single'=>'Single',
                'Married'=>'Married',
                'Divorced'=>'Divorced',
                'Widowed'=>'Widowed',
                'Other'=>'Other'
            ])->hideOnIndex(),
            TextField::new('spouse_name')->hideOnIndex(),
            ChoiceField::new('highest_education')->setChoices([
                'None'=>'None',
                'Basic - Primary'=>'Basic - Primary',
                'Secundary - High School'=>'Secundary - High School',
                'University' => 'University',
                'Master Degree' => 'Master Degree',
                'Other High Degree' => 'Other High Degree',
                'Other' => 'Other'
            ])->hideOnIndex(),
            TextField::new('government_id'),
            TextField::new('mayani_id'),
            ImageField::new('right_index')->setUploadDir('public/farmers_right_index')->hideOnIndex(),
            ImageField::new('left_index')->setUploadDir('public/farmers_left_index')->hideOnIndex(),
            ImageField::new('right_thumb')->setUploadDir('public/farmers_right_thumb')->hideOnIndex(),
            ImageField::new('left_thumb')->setUploadDir('public/farmers_left_thumb')->hideOnIndex(),
        ];
    }
    
}
