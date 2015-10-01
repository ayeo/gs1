<?php
namespace Ayeo\Gs1\Model\ApplicationIdentifier;

//fixme: this is not unit
//this means that whole palet (sscc) contains just one item
//use this if sscc items count = 1
class GtinUnit extends AbstractIdentifier
{
    public function getCode()
    {
        return '01';
    }

    public function getValue()
    {
        return sprintf('%014d', $this->label->getContent()->getGtin());
    }
}