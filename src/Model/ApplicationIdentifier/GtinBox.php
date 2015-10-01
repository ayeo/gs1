<?php
namespace Ayeo\Gs1\Model\ApplicationIdentifier;

//fixme - this is not box!
//this means that logistic unit contaains many sale units
class GtinBox extends AbstractIdentifier
{
    public function getCode()
    {
        return '02';
    }

    public function getValue()
    {
        return sprintf('%014d', $this->label->getContent()->getGtin());
    }


}