<?php
namespace Ayeo\Gs1\Standard;

use Ayeo\Gs1\Model\Gcp;

interface CompanyInterface
{
    /**
     * @return string
     */
    public function getName();

    /**
     * @return Gcp
     */
    public function getGcp();

    /**
     * @return LocationInterface
     */
    public function getLocation();
}