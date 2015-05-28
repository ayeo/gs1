<?php
namespace Ayeo\Gs1\Model\ApplicationIdentifier;

class GrossWeight extends AbstractIdentifier
{
    public function getCode()
    {
        return '3301';
    }

    public function getValue()
    {
        return $this->label->getContent()->getGrossWeight();
    }
}