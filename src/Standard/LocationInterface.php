<?php
namespace Ayeo\Gs1\Standard;

interface LocationInterface
{

    public function getAddress();

    /**
     * @return string
     */
    public function getLocationNumber();

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