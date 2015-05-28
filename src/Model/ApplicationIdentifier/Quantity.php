<?php
namespace Ayeo\Gs1\Model\ApplicationIdentifier;

class Quantity extends AbstractIdentifier
{
    public function getCode()
    {
        return '37';
    }

    public function getValue()
    {
        return $this->label->getContent()->getQuantity();
    }
}