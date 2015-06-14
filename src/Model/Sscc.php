<?php
namespace Ayeo\Gs1\Model;

/**
 * http://www.gs1.org/serial-shipping-container-code-sscc
 */
class Sscc
{
    /**
     * @var string
     */
    private $sscc;

    /**
     * @param string $sscc
     * @throws \Exception
     */
    public function __construct($sscc)
    {
        if (!(is_numeric($sscc) && strlen($sscc) === 18)) {
            throw new \Exception('Invalid SSCC');
        }

        $this->sscc = (string)$sscc;
    }

    public function __toString()
    {
        return $this->sscc;
    }
}