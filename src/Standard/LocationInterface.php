<?php
namespace Ayeo\Gs1\Standard;

interface LocationInterface
{

    public function getAddress();

    /**
     * @return string
     */
    public function getGln();

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