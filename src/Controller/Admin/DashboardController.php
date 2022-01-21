<?php

namespace App\Controller\Admin;

use App\Entity\Activity;
use App\Entity\Farm;
use App\Entity\FarmerRegister;
use App\Entity\FarmInventory;
use App\Entity\Group;
use App\Entity\InventoryUpdate;
use App\Entity\Location;
use App\Entity\Product;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        //return parent::index();
        $routeBuilder = $this->get(AdminUrlGenerator::class);

        return $this->redirect($routeBuilder->setController(FarmerRegisterCrudController::class)->generateUrl());

    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Farmers Registration');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Farmers Register', 'fas fa-list', FarmerRegister::class);
        yield MenuItem::linkToCrud('Group', 'fas fa-list', Group::class);
        yield MenuItem::linkToCrud('Location', 'fas fa-list', Location::class);
        yield MenuItem::linkToCrud('Farm', 'fas fa-list', Farm::class);
        yield MenuItem::linkToCrud('Activity', 'fas fa-list', Activity::class);
        yield MenuItem::linkToCrud('Product', 'fas fa-list', Product::class);
        yield MenuItem::linkToCrud('Farm Inventory', 'fas fa-list', FarmInventory::class);
        yield MenuItem::linkToCrud('Inventory Update', 'fas fa-list', InventoryUpdate::class);
        yield MenuItem::linkToCrud('Farmers Register', 'fas fa-list', FarmerRegister::class);
        yield MenuItem::linkToCrud('Farmers Register', 'fas fa-list', FarmerRegister::class);
        yield MenuItem::linkToCrud('Farmers Register', 'fas fa-list', FarmerRegister::class);
    }
}
