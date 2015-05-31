<?php
namespace Ayeo\Gs1\Validator\Constraint;

use Ayeo\Gs1\Model\Gln;
use Ayeo\Validator\Constraint\AbstractValidator;

class GlnFormat extends AbstractValidator
{

    public function __construct()
    {
    }

    public function validate($fieldName, $form)
    {
        try
        {
            $glnValue = $this->getFieldValue($form, $fieldName);
            new Gln($glnValue);
        }
        catch (\LogicException $e)
        {
            $this->error = $this->buildMessage($fieldName, 'invalid_gln');
        }
    }
}