<?php

namespace App\DataFixtures;

use App\Entity\Material;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class MaterialFixtures extends Fixture implements FixtureGroupInterface, OrderedFixtureInterface
{

    public function load(ObjectManager $manager)
    {
        $materials = array();
        // create 20 material! Bam!
        for ($i = 0; $i < 40; $i++) {
            $material = new Material();
            $material->setCode('DEVICE_ ' . $i);
            $material->setShortLabel('Short label' . $i);
            $material->setLongLabel('Long description text ' . $i);
            $materials[] = $material;
            $manager->persist($material);
        }

        $manager->flush();
    }

    /**
     * @inheritDoc
     */
    public static function getGroups(): array
    {
        return ['test', 'test-materials'];
    }

    /**
     * @inheritDoc
     */
    public function getOrder()
    {
        return 20;
    }
}
