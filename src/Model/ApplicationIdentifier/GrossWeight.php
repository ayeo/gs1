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
        //must contain 6 digits
        //first five are for whole kilograms
        //the sixth is for hundrets grams
        //000015 means 1,5kg
        //we dont care about grams currently
        return sprintf('%06d', $this->label->getContent()->getGrossWeight() * 10);
    }
}