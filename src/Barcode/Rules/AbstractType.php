<?php
namespace Ayeo\Gs1\Barcode\Rules;

use Ayeo\Gs1\Model\LogisticLabel;

abstract class AbstractType
{
    /**
     * @param LogisticLabel $label
     * @return array
     */
    abstract public function getRules(LogisticLabel $label);
}