<?php

namespace App\Controller\Admin;

use App\Entity\Categorys;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CategorysCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Categorys::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('name'),
            ImageField::new('pictureUrl')
              ->setUploadDir('public/uploads/categorys')
              ->setBasePath('uploads/categorys')
              ->setUploadedFileNamePattern('[randomhash].[extension]')
        ];
    }

}
