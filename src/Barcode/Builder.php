<?php
namespace Ayeo\Gs1\Barcode;

use Ayeo\Gs1\Model\ApplicationIdentifier\AbstractIdentifier;

/**
 * Can build barcode string based on given rules set
 * http://en.wikipedia.org/wiki/GS1-128
 */
class Builder
{
    /**
     * @param array $rules
     * @return string
     */
    public function build(array $rules)
    {
        $code = '';

        /* @var $rule AbstractIdentifier */
        foreach ($rules as $rule) {
            $code .= sprintf('(%s)%s', $rule->getCode(), $rule->getValue());
        }

        return $code;
    }
}