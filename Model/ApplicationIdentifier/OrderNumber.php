<?php
namespace Ayeo\Gs1\Model\ApplicationIdentifier;

class OrderNumber extends AbstractIdentifier
{
    public function getCode()
    {
        return '400';
    }

    public function getValue()
    {
        return $this->label->orderNumber;
    }
}