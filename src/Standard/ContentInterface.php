<?php
namespace Ayeo\Gs1\Standard;

use Ayeo\Gs1\Model\Gtin\Gtin;

interface ContentInterface
{
    /**
     * @param \DateTime $datetime
     */
    public function setBestBefore(\DateTime $datetime);

    /**
     * @return \DateTime
     */
    public function getBestBefore();

    /**
     * @param integer $grossWeight
     * @return void
     */
    public function setGrossWeight($grossWeight);

    /**
     * @return integer
     */
    public function getGrossWeight();

    /**
     * @param integer $quantity
     * @return void
     */
    public function setQuantity($quantity);

    /**
     * @return integer
     */
    public function getQuantity();

    /**
     * @param string $gtin
     * @return void
     */
    public function setGtin($gtin);

    /**
     * @return Gtin
     */
    public function getGtin();

    /**
     * @param string $name
     * @return void
     */
    public function setName($name);

    /**
     * @return string
     */
    public function getName();

    /**
     * @param string $batchSymbol
     * @return void
     */
    public function setBatchSymbol($batchSymbol);

    /**
     * @return string
     */
    public function getBatchSymbol();

    /**
     * @return boolean
     */
    public function isCase();

    /**
     * @return void
     */
    public function markAsCase();
}