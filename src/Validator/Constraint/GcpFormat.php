<?php
namespace Ayeo\Gs1\Validator\Constraint;

use Ayeo\Gs1\Model\Gcp;
use Ayeo\Validator\Constraint\AbstractConstraint;

class GcpFormat extends AbstractConstraint
{
    public function run($value)
    {
        try
        {
            new Gcp((string)$value);
        }
        catch (\LogicException $e)
        {
            $this->addError('invalid_gcp');
        }
    }
}