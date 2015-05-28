<?php
namespace Ayeo\Gs1\Model\ApplicationIdentifier;

class Sscc extends AbstractIdentifier
{
    public function getCode()
    {
        return '00';
    }

    public function  getValue()
    {
        return (string) $this->label->getSscc();
    }
}