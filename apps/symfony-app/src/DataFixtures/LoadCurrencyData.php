<?php

namespace App\DataFixtures;

use App\Entity\Currency;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class LoadCurrencyData extends Fixture
{
    public function load(ObjectManager $manager)
    {
        //currency
        $currency = new Currency();
        $currency->setName('USD');
        $this->addReference("currency1", $currency);
        $manager->persist($currency);

        $currency = new Currency();
        $currency->setName('EUR');
        $this->addReference("currency2", $currency);
        $manager->persist($currency);


        $manager->flush();
    }
}
