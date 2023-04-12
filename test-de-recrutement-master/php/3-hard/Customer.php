<?php

declare(strict_types=1);


namespace App;


class Customer
{
    private string $name;
    private array $rentals = [];

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * @param Rental $rental
     * @return Rental
     */
    public function addRental(Rental $rental): Rental
    {
        return $this->rentals[] = $rental;
    }

    /**
     * retourne le prix des locations de film pour un client et ses points de fidélité.
     * @return string
     */
    public function statement(): string
    {
        $totalAmount = 0;
        $frequentRenterPoints = 0;
        $result = "Rental Record for {$this->getName()}\n";

        foreach ($this->rentals as $rental) {
            $thisAmount = 0.0;
            /* @var $each Rental */
            // determines the amount for each line
            switch ($rental->getMovie()->getPriceCode()) {
                case Movie::REGULAR:
                    $thisAmount += 2;
                    if ($rental->getDaysRented() > 2) {
                        $thisAmount += ($rental->getDaysRented() - 2) * 1.5;
                    }
                    break;
                case Movie::NEW_RELEASE:
                    $thisAmount += $rental->getDaysRented() * 3;

                    if ($rental->getDaysRented() > 1
                    ) {
                        $frequentRenterPoints++;
                    }
                    break;
                case Movie::CHILDREN:
                    $thisAmount += 1.5;
                    if ($rental->getDaysRented() > 3) {
                        $thisAmount += ($rental->getDaysRented() - 3) * 1.5;
                    }
                    break;
            }

            $frequentRenterPoints++;
            $result .= "\t" . $each->getMovie()->getTitle() . "\t"
                . number_format($thisAmount, 1) . "\n";
            $totalAmount += $thisAmount;

        }
        $result .= "You owed " . number_format($totalAmount, 1) . "\n";
        $result .= "You earned $frequentRenterPoints frequent renter points\n";

        return $result;
    }

    public function getName(): string
    {
        return $this->name;
    }


}
