<?php
namespace Ayeo\G1\Model;

/**
 * Documentation: http://en.wikipedia.org/wiki/Global_Location_Number
 * Country prefixes: //http://en.wikipedia.org/wiki/List_of_GS1_country_codes
 *
 * Class Gln
 */
class Gln
{
    /**
     * @var string
     */
    private $gln;

    /**
     * @param $gln
     */
    public function __construct($gln)
    {
        if (is_numeric($gln) && strlen($gln) === 13)
        {
            $this->gln = (string) $gln;
        }
        else
        {
            throw new \LogicException('Invalid GLN number');
        }
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->gln;
    }

}