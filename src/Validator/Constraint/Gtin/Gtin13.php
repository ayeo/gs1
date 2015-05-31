<?php
namespace Ayeo\Gs1\Validator\Constraint\Gtin;

use Ayeo\Gs1\Model\Gtin\Gtin13 as Gtin13Model;
use Ayeo\Gs1\Utils\CheckDigitCalculator;
use Ayeo\Validator\Constraint\AbstractValidator;

class Gtin13 extends AbstractValidator
{
    public function __construct(CheckDigitCalculator $calculator)
    {
        $this->calculator = $calculator;
    }

    public function validate($fieldName, $form)
    {
        try
        {
            $value = (string) $this->getFieldValue($form, $fieldName);


            $checkDigit = (int)substr($value, -1);
            $rawNumber = substr($value, 0, -1);
            $expectedDigit = $this->calculator->calculate($rawNumber);

            if ($expectedDigit !== $checkDigit)
            {
                throw new \LogicException;
            }

            new Gtin13Model($value);
        }
        catch (\LogicException $e)
        {
            $this->error = $this->buildMessage($fieldName, 'invalid_gtin');
        }
    }
}