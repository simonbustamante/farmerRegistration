<?php

namespace App\DataFixtures;

use App\Entity\FarmerBalance;
use App\Entity\FarmerLoans;
use App\Entity\LoanPayment;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class LoanPaymentFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        foreach($this->paymentData() as [
            $farmer_balance_id,
            $loan_id,
            $date,
            $quantity_paid
        ])
        {
            $payment = new LoanPayment();
            $farmer_balance = $manager->getRepository(FarmerBalance::class)->find($farmer_balance_id);
            $loan = $manager->getRepository(FarmerLoans::class)->find($loan_id);
            $payment->setFarmerBalanceId($farmer_balance);
            $payment->setLoanId($loan);
            $payment->setDate(\DateTime::createFromFormat('Y-m-d',$date));
            $payment->setQuantityPaid($quantity_paid);
            $manager->persist($payment);
        }

        $manager->flush();
    }
    public function getDependencies(): array
    {
        return [
            FarmerBalanceFixtures::class,
            FarmerLoanFixtures::class,
        ];
    }

    private function paymentData():array
    {
        return [
            
        ];
    }
}
