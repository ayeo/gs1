<?php
namespace Ayeo\Gs1\Model\Gtin;

// EAN
class Gtin13 extends Gtin
{
    public function __construct($number)
    {
        if (strlen($number) !== 13) {
            throw new \Exception('Invalid Gtin');
        }

        $this->number = $number;
    }
}