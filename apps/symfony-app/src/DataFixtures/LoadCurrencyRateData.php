<?php

namespace App\DataFixtures;

use App\Entity\CurrencyRate;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class LoadCurrencyRateData extends Fixture  implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        // create 10 rows for each in currency_rate
        for ($j = 1; $j<=2; $j++) {
            for ($i = 10; $i < 29; $i++) {

                $currencyRate = new CurrencyRate();
                $currencyRate->setCurrency($this->getReference("currency$j"));
                $currencyRate->setDate(new DateTime("2021-01-$i"));
                $currencyRate->setRate(rand(2000, 4000) / 100);
                $manager->persist($currencyRate);
            }
            $manager->flush();
        }
    }

    public function getDependencies(): array
    {
        return array(
            LoadCurrencyData::class,
        );
    }
}

