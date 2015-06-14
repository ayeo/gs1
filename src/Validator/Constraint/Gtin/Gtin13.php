<?php
namespace Ayeo\Gs1\Validator\Constraint\Gtin;

use Ayeo\Gs1\Model\Gtin\Gtin13 as Gtin13Model;
use Ayeo\Gs1\Utils\CheckDigitCalculator;
use Ayeo\Validator\Constraint\AbstractConstraint;
use Exception;

class Gtin13 extends AbstractConstraint
{
    /**
     * @param CheckDigitCalculator $calculator
     */
    public function __construct(CheckDigitCalculator $calculator)
    {
        $this->calculator = $calculator;
    }

    /**
     * @param $value
     */
    public function run($value)
    {
        try {
            $checkDigit = (int)substr($value, -1);
            $rawNumber = substr($value, 0, -1);
            $expectedDigit = $this->calculator->calculate($rawNumber);

            if ($expectedDigit !== $checkDigit) {
                throw new Exception;
            }

            new Gtin13Model($value);
        } catch (Exception $e) {
            $this->addError('invalid_gtin');
        }
    }
}