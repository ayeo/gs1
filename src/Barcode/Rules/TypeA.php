<?php
namespace Ayeo\Gs1\Barcode\Rules;

use Ayeo\Gs1\Model\ApplicationIdentifier as AI;
use Ayeo\Gs1\Model\LogisticLabel;

/**
 * This is for Application Identifier:
 * GLOBAL TRADE ITEM NUMBER (01)
 *
 * TypeA means that SSCC (palet) contains just one item with given GTIN (01)
 * that is why there is no option to set quantity (37) for (01)
 */
class TypeA extends AbstractType
{
    /**
     * @param LogisticLabel $label
     * @return array
     */
    public function getRules(LogisticLabel $label)
    {
        return
            [
                new AI\GtinUnit($label),
                new AI\OrderNumber($label),
                new AI\BestBefore($label),
                new AI\GrossWeight($label),
                new AI\Batch($label),
                new AI\Sscc($label)
            ];
    }
}