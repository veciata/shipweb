<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use App\Entity\ShipmentEntity;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ShipmentEntityCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ShipmentEntity::class;
    }
}
