<?php
namespace Ayeo\Gs1\Barcode\Rules;

use Ayeo\Gs1\Model\ApplicationIdentifier as AI;
use Ayeo\Gs1\Model\LogisticLabel;

/**
 * ITEM TRADE ITEM NUMBER (02)
 */
class TypeB extends AbstractType
{
    /**
     * @param LogisticLabel $label
     * @return array
     */
    public function getRules(LogisticLabel $label)
    {
        return
            [
                new AI\GtinBox($label),
                new AI\Quantity($label),
                new AI\OrderNumber($label),
                new AI\BestBefore($label),
                new AI\GrossWeight($label),
                new AI\Batch($label),
                new AI\Sscc($label)
            ];
    }
}