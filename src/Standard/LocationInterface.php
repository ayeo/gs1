<?php
namespace Ayeo\Gs1\Standard;

interface LocationInterface
{
    /**
     * @return string
     */
    public function getLocationNumber();

    /**
     * @return string
     */
    public function getStreetName();

    /**
     * @return string
     */
    public function getBuildingNumber();

    /**
     * @return string
     */
    public function getTownName();

    /**
     * @return string
     */
    public function getPostcode();

    /**
     * @return string
     */
    public function getCountryName();

    /**
     * @return string
     */
    public function getTelephoneNumber();

    /**
     * @return string
     */
    public function getFaxNumber();

    /**
     * @return string
     */
    public function getWebsiteAddress();
}