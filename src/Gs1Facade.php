<?php
namespace Ayeo\Gs1;

use Ayeo\Gs1\Barcode\Builder;
use Ayeo\Gs1\Barcode\Rules\TypeA;
use Ayeo\Gs1\Barcode\Rules\TypeB;
use Ayeo\Gs1\Exception\InvalidCompany;
use Ayeo\Gs1\Model\Gtin;
use Ayeo\Gs1\Model\LogisticLabel;
use Ayeo\Gs1\Model\Sscc;
use Ayeo\Gs1\Standard\CompanyInterface;
use Ayeo\Gs1\Standard\ContentInterface;
use Ayeo\Gs1\Utils\CheckDigitCalculator;

use Exception;

/**
 * The class is a facade to all GS1 objects
 * All you need can be gained by the object
 */
class Gs1Facade
{
    private $packageType = 1;

    /**
     * @var CompanyInterface
     */
    private $company;

    /**
     * @var Model\Gcp
     */
    private $gcp;

    /**
     * @param CompanyInterface $company
     * @throws InvalidCompany
     */
    public function __construct(CompanyInterface $company)
    {
        try
        {
            $this->company = $company;
            $this->gcp = $this->company->getGcp();
        }
        catch (Exception $e)
        {
            throw new InvalidCompany;
        }

    }

    /**
     * Recalculate SSCC for new logistic counter
     *
     * @param LogisticLabel $label
     * @param $logisticCountNumber
     */
    public function rebuild(LogisticLabel $label, $logisticCountNumber)
    {
        $label->setSscc($this->buildSscc($logisticCountNumber));
    }

    /**
     * @param ContentInterface $content
     * @param $orderNumber
     * @param $logisticCountNumber
     * @return LogisticLabel
     */
    public function buildLabel(ContentInterface $content, $orderNumber, $logisticCountNumber)
    {
        $label = new LogisticLabel();
        $label->setCompany($this->company);
        $label->setContent($content);
        $label->setSscc($this->buildSscc($logisticCountNumber));
        $label->orderNumber = $orderNumber; //validate!
        $label->type = $content->isCase() ? "B" : "A";
        $label->barcode = $this->generateBarcode($label);

        return $label;
    }

    /**
     * Builds barcode as code string
     *
     * @param Model\LogisticLabel $logisticLabel
     * @return string
     */
    private function generateBarcode(Model\LogisticLabel $logisticLabel)
    {
        $builder = new Builder();

        if ($logisticLabel->getContent()->isCase())
        {
            $rules = new TypeB();
        }
        else
        {
            $rules = new TypeA();
        }

        return  $builder->build($rules->getRules($logisticLabel));
    }

    /**
     * @param $countNumber
     * @return Sscc
     */
    private function buildSscc($countNumber)
    {
        $left = 16 - strlen($this->company->getGcp());
        $ssccBase = sprintf('%1s%s%0'.$left.'d', $this->packageType, (string) $this->company->getGcp(), $countNumber);
        $checkDigit = $this->calculateCheckDigit($ssccBase);

        return new Sscc($ssccBase.$checkDigit);
    }


    /**
     * fixe: should be getCalculator();
     * @param $rawNumber
     * @return int 0-9
     */
    private function calculateCheckDigit($rawNumber)
    {
        $calculator = new CheckDigitCalculator();

        return $calculator->calculate($rawNumber);
    }

    /**
     * GS1 Packaging Types:
     *
     * 0 Case or carton
     * 1 Pallet (Larger than a case)
     * 2 Container (larger than a pallet)
     * 3 Undefined
     * 4 Internal company use
     * 5-8 Reserved
     * 9 Variable container.
     *
     * @param $packageType
     */
    public function setPackageType($packageType)
    {
        if (in_array($packageType, range(0, 9)) === false)
        {
            throw new \LogicException('Invalid GS1 Package type');
        }

        $this->packageType = $packageType;
    }
}