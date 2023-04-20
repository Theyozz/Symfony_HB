<?php

namespace App\DataFixtures;

use App\Entity\Article;
use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    const NB_ARTICLES = 50;
    const NB_CATEGORY = 4;

    public function load(ObjectManager $manager): void
    {
        $generator = \Faker\Factory::create();
        $populator = new \Faker\ORM\Doctrine\Populator($generator, $manager);
        $populator->addEntity(Category::class, 20);
        $populator->addEntity(Article::class, 150);

        $populator->execute();
        // $faker = Factory::create();

        // for ($i=0; $i < self::NB_CATEGORY; $i++) { 
        //     $category = new Category();
        //         $category
        //             ->setName($faker->realText(10))
        //             ->setDescription($faker->realText(80));
        //     $manager->persist($category);
        // }

        // for ($i=0; $i < self::NB_ARTICLES; $i++) { 
        //     $article = new Article();
        //     $article
        //         ->setTitle($faker->realText(35))
        //         ->setDateCreated($faker->dateTimeBetween('-2 years'))
        //         ->setVisible($faker->boolean(70))
        //         ->setContent($faker->realTextBetween(200, 500))
        //         ->setCategory($this->getReference('category'. $faker->numberBetween(1, self::NB_CATEGORY)));
        //     $manager->persist($article);
        // }
        
        // $manager->flush();
    }
}
