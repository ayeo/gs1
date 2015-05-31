<?php
namespace Ayeo\Gs1\Validation;

use Ayeo\Validator\Constraint;
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
                    ['gcp', new Constraint\NotNull()],
                    ['name', new Constraint\MinLength(10)],
                    ['location',
                        [
                            ['locationNumber', new Constraint\Integer()],
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

                    ['gtin', new Constraint\ClassInstance('\Ayeo\Gs1\Model\Gtin\Gtin')],
                    ['gtin', new Constraint\NotClassInstance('\Ayeo\Gs1\Model\Gtin\InvalidFormat')],

                    ['bestBefore', new Constraint\DateTimeHigherThan(new \DateTime())],
                    ['bestBefore', new Constraint\NotNull()],
                    ['quantity', new Constraint\NumericMin(1)],
                    ['grossWeight', new Constraint\Integer(1)],
                    ['batchSymbol', new Constraint\MinLength(5)]
                ]
            ],

            ['orderNumber', new Constraint\NumericMin(1)],
            ['sscc', new Constraint\Length(18)],
        ];
    }
}