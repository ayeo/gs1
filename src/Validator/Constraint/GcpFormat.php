<?php
namespace Ayeo\Gs1\Validator\Constraint;

use Ayeo\Gs1\Model\Gcp;
use Ayeo\Validator\Constraint\AbstractValidator;

class GcpFormat extends AbstractValidator
{

    public function validate($fieldName, $form)
    {
        try
        {
            $gcp = $this->getFieldValue($form, $fieldName);
            new Gcp((string) $gcp);
        }
        catch (\LogicException $e)
        {
            $this->error = $this->buildMessage($fieldName, 'invalid_gcp');
        }
    }
}