<?php
namespace Ayeo\Gs1\Model;

/**
 * Documentation: http://www.gs1.org/company-prefix
 */
class Gcp
{
    /**
     * @var string
     */
    private $gcp;


    /**
     * @param string$gcp
     */
    public function __construct($gcp)
    {
        if (is_numeric($gcp) && strlen($gcp) > 5 && strlen($gcp) < 11) //with gs1 prefix
        {
            $this->gcp = (string) $gcp;
        }
        else
        {
            throw new \LogicException('Invalid GCP number');
        }
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->gcp;
    }
}