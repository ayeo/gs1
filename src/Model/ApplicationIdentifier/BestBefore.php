<?php
namespace Ayeo\Gs1\Model\ApplicationIdentifier;

class BestBefore extends AbstractIdentifier
{
    public function getCode()
    {
        return '15';
    }

    public function getValue()
    {
        return $this->label->getContent()->getBestBefore()->format('ymd'); //YYMMDD
    }
}