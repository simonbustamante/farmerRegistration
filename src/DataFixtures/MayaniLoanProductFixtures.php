<?php

namespace App\DataFixtures;

use App\Entity\MayaniLoanProducts;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class MayaniLoanProductFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        foreach($this->loanProductData() as [$name, $description, $loan_interest])
        {
            $loanProduct = new MayaniLoanProducts();
            $loanProduct->setName($name);
            $loanProduct->setDescription($description);
            $loanProduct->setLoanInterest($loan_interest);

            $manager->persist($loanProduct);
        }

        $manager->flush();
    }

    private function loanProductData(): array
    {
        return [
            ['Loan Product 1','Loan Product 1',5],
['Loan Product 2','Loan Product 2',5],
['Loan Product 3','Loan Product 3',5],
['Loan Product 4','Loan Product 4',5],
['Loan Product 5','Loan Product 5',5],
['Loan Product 6','Loan Product 6',5],
['Loan Product 7','Loan Product 7',5],
['Loan Product 8','Loan Product 8',5],
['Loan Product 9','Loan Product 9',5],
['Loan Product 10','Loan Product 10',5],

        ];
    }
}
