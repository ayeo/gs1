<?php
namespace Ayeo\Gs1\Model\ApplicationIdentifier;

use Ayeo\Gs1\Model\LogisticLabel;

/**
 * Class AbstractIdentifier
 * http://www.databar-barcode.info/application-identifiers/
 */
abstract class AbstractIdentifier
{
    protected $label;

    public function __construct(LogisticLabel $label)
    {
        $this->label = $label;
    }

    abstract public function getCode();

    abstract public function getValue();
}