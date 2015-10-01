<?php
namespace Ayeo\Gs1\Model;

use Ayeo\Gs1\Model\Gtin\Gtin;
use Ayeo\Gs1\Standard\ContentInterface;

class Content implements ContentInterface
{
    /**
     * @var bool
     */
    private $isCase = false;

    /**
     * @var Gtin
     */
    private $gtin;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $batch;

    /**
     * @var integer
     */
    private $grossWeight;

    /**
     * @var integer
     */
    private $count;

    /**
     * @var \DateTime
     */
    private $bestBefore;

    /**
     * @return \DateTime
     */
    public function getBestBefore()
    {
        return $this->bestBefore;
    }

    /**
     * @param \DateTime $datetime
     */
    public function setBestBefore(\DateTime $datetime)
    {
        $this->bestBefore = $datetime;
    }

    /**
     * @return integer
     */
    public function getGrossWeight()
    {
        return $this->grossWeight;
    }

    /**
     * @param integer $grossWeight
     * @return void
     */
    public function setGrossWeight($grossWeight)
    {
        $this->grossWeight = round($grossWeight, 1);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return void
     */
    public function setName($name)
    {
        $this->name = (string)$name;
    }

    /**
     * @param integer $quantity
     * @return void
     */
    public function setQuantity($quantity)
    {
        $this->count = (int)$quantity;
    }

    /**
     * @return integer
     */
    public function getQuantity()
    {
        return $this->count;
    }

    /**
     * @return Gtin
     */
    public function getGtin()
    {
        return $this->gtin;
    }

    /**
     * @param string $gtin
     * @return void
     */
    public function setGtin($gtin)
    {
        $this->gtin = $gtin;
    }

    /**
     * @param string $batchSymbol
     * @return void
     */
    public function setBatchSymbol($batchSymbol)
    {
        $this->batch = $batchSymbol;
    }

    /**
     * @return string
     */
    public function getBatchSymbol()
    {
        return $this->batch;
    }

    /**
     * @return bool
     */
    public function isCase()
    {
        return $this->isCase;
    }

    public function markAsCase()
    {
        $this->isCase = true;
    }
}