<?php

namespace App\DataFixtures;

use App\Entity\Categorys;
use App\Entity\Products;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
  public function load(ObjectManager $manager): void
  {
    $type = [
      'mouses',
      'keyboards',
      'screens',
      'towers',
      'graphics cards',
      'processors',
      'motherboards',
      'memory',
      'power supplies',
      'laptops'
    ];
    foreach ($type as $categoryName){
      $category = new Categorys();
      $category->setName($categoryName);
      $manager->persist($category);

      for($i = 1; $i <= 20; $i++) {
        $product = new Products();
        $product->setName($categoryName . ' product ' . $i);
        $product->setDescription('This is a ' . $categoryName . ' product.');
        $product->setPrice(rand(10, 500));
        $product->setStock(rand(1, 300));
        $product->setCategory($category);
        $manager->persist($product);
      }
    }

    $manager->flush();
  }
}
