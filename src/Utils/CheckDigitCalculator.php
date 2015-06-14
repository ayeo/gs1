<?php
namespace Ayeo\Gs1\Utils;

/**
 * Class CheckDigitCalculator
 *
 * Documentation: http://www.gs1.org/how-calculate-check-digit-manually
 */
class CheckDigitCalculator
{
    /**
     * @param $rawNumber
     * @return int 0-9
     */
    public function calculate($rawNumber)
    {
        $rawNumber = strrev($rawNumber);
        $evens = [];
        $odds = [];

        foreach (str_split($rawNumber) as $key => $char) {
            if ($key % 2) {
                $evens[] = $char;
            } else {
                $odds[] = $char;
            }
        }

        $sum = array_sum($evens) + array_sum($odds) * 3;

        if ($sum % 10) {
            $x = 10 - ($sum % 10);
        } else {
            $x = 0;
        }

        return $x;
    }
}