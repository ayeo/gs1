<?php
namespace Ayeo\Gs1\Validator\Constraint;

use Ayeo\Gs1\Model\Gcp;
use Ayeo\Gs1\Model\Gln;
use Ayeo\Validator\Constraint\AbstractConstraint;

//todo rename GlnBelongsToGcp
class GlnByGcpField extends AbstractConstraint
{
    private $gcpFieldName;

    public function __construct($gcpFieldName)
    {
        $this->gcpFieldName = $gcpFieldName;
    }

    public function validate($fieldName, $form)
    {
        try
        {
            $gcpValue = $this->getFieldValue($form, $this->gcpFieldName);
            $gcp = new Gcp($gcpValue);

            $glnValue = $this->getFieldValue($form, $fieldName);
            $gln = new Gln($glnValue);

            if ($gln->getGcp() != $gcp)
            {
                $this->error = $this->buildMessage($fieldName, 'does_not_belongs_to', $gcp);
            }
        }
        catch (\Exception $e)
        {
            //gcp or gln failed
        }

    }
}
