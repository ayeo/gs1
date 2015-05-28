<?php
namespace Ayeo\Gs1\Model\Gtin;

class Gtin8 extends Gtin
{
    public function __construct($number)
    {
        if (strlen($number) !== 8)
        {
            throw new \Exception('Invalid Gtin');
        }

        $this->number = $number;
    }
}