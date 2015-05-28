<?php
namespace Ayeo\Gs1\Model\Gtin;

abstract class Gtin
{
    /**
     * @var string
     */
    protected $number;

    public function __toString()
    {
        return (string) $this->number;
    }
}
