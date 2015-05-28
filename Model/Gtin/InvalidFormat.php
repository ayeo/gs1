<?php
namespace Ayeo\Gs1\Model\Gtin;

class InvalidFormat extends Gtin
{
    public function __construct($number)
    {
        $this->number = $number;
    }
}