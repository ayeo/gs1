<?php
namespace Ayeo\Gs1\Model\ApplicationIdentifier;

class Batch extends AbstractIdentifier
{
    public function getCode()
    {
        return '10';
    }

    public function getValue()
    {
        return $this->label->getContent()->getBatchSymbol();
    }


}