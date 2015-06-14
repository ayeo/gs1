<?php
namespace Ayeo\Gs1\Validator\Constraint;

use Ayeo\Gs1\Model\Gcp;
use Ayeo\Gs1\Model\Gln;
use Ayeo\Validator\Constraint\AbstractConstraint;

class GlnByGcpField extends AbstractConstraint
{
    private $gcpFieldName;

    public function __construct($gcpFieldName)
    {
        $this->gcpFieldName = $gcpFieldName;
    }

    public function run($value)
    {
        try {
            $gcpValue = $this->getFieldValue($this->gcpFieldName);

            $gcp = new Gcp($gcpValue);
            $gln = new Gln($value);

            if ($gln->getGcp() != $gcp) {
                $this->addError('does_not_belongs_to', $gcp);
            }
        } catch (\Exception $e) {
            //gcp or gln failed
        }

    }
}
