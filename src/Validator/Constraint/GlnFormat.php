<?php
namespace Ayeo\Gs1\Validator\Constraint;

use Ayeo\Gs1\Model\Gln;
use Ayeo\Validator\Constraint\AbstractConstraint;

class GlnFormat extends AbstractConstraint
{
    public function run($value)
    {
        try
        {
            new Gln($value);
        }
        catch (\LogicException $e)
        {
            $this->addError('invalid_gln');
        }
    }
}