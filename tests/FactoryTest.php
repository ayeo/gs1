<?php
use Ayeo\Validator\Constraint;

class FactoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider getDateForTestSscc
     */
    public function testSscc($prefix, $count, $packageType, $expectedSscc)
    {
        $company = new \Module\Gs1\Entity\Company();
        $company->prefix = $prefix;

        $factory = new \Ayeo\Gs1\Gs1Facade($company);
        $factory->setPackageType($packageType);

        $sscc = $factory->buildSscc($count);

        $this->assertEquals(18, strlen($sscc));
        $this->assertEquals($expectedSscc, (string) $sscc);
    }

    public function getDateForTestSscc()
    {
        return
        [
            ['0872150',     999000002,  0,  '008721509990000028'],
            ['5901234567',  2,          1,  '159012345670000029'],
            ['0614141',     123456789,  0,  '006141411234567890'],
            ['0718908',     562723189,  0,  '007189085627231896'], //http://www.morovia.com/kb/Serial-Shipping-Container-Code-SSCC18-10601.html
        ];
    }
}