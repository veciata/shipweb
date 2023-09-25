<?php

namespace App\Controller\Admin;


use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use App\Entity\USer;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class USerCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return USer::class;
    }
    public function configureCrud(Crud $crud): Crud
    {
        return $crud->setDefaultSort(['id' => 'DESC']);
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
