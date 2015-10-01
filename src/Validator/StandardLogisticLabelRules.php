<?php
namespace Ayeo\Gs1\Validator;

use Ayeo\Gs1\Utils\CheckDigitCalculator;
use Ayeo\Gs1\Validator\Constraint\Gtin\Gtin13;
use Ayeo\Validator\Constraint;
use Ayeo\Gs1\Validator\Constraint as Gs1Constraint;
use Ayeo\Validator\ValidationRules;

class StandardLogisticLabelRules extends ValidationRules
{
    /**
     * @return array
     */
    public function getRules()
    {
        return
            [
            ['company',
                [
                    ['gcp', new Gs1Constraint\GcpFormat()],
                    ['name', new Constraint\MinLength(10)],
                    ['location',
                        [
                            ['gln', new Gs1Constraint\GlnFormat()],
                            ['telephoneNumber', new Constraint\MinLength(5)],
                            ['faxNumber', new Constraint\MinLength(5)],
                            ['websiteAddress', new Constraint\MinLength(5)],
                            ['address',
                                [
                                    ['streetName', new Constraint\MinLength(2)],
                                    ['buildingNumber', new Constraint\MinLength(1)],
                                    ['townName', new Constraint\MinLength(5)],
                                    ['postcode', new Constraint\MinLength(2)],
                                    ['countryName', new Constraint\MinLength(2)]
                                ]
                            ]
                        ]
                    ]
                ]
            ],

                ['content',
                    [
                        ['name', new Constraint\NotNull()],
                        ['gtin', new Gtin13(new CheckDigitCalculator())],
                        ['bestBefore', new Constraint\DateTimeHigherThan(new \DateTime())],
                        ['quantity', new Constraint\NumericMin(1)],
                        ['grossWeight', new Constraint\NumericMin(0.1)],
                        ['batchSymbol', new Constraint\MinLength(5)],
                    ]
                ],

            ['orderNumber', new Constraint\NumericMin(1)],
            ['sscc', new Constraint\Length(18)],
            ];
    }
}