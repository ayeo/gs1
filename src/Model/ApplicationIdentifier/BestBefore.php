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
        //var_dump($this->label->getContent()->getBestBefore());
        //return $this->label->getContent()->getBestBefore()->format('Ymd');
    }
}