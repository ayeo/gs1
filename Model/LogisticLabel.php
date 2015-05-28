<?php
namespace Ayeo\Gs1\Model;

use Ayeo\Gs1\Standard\CompanyInterface;
use Ayeo\Gs1\Standard\ContentInterface;

class LogisticLabel
{
	/**
	 * @var CompanyInterface
	 */
	public $company;

    /**
	 * @var ContentInterface
	 */
	public $content;

    /**
     * @var Sscc
     */
    private $sscc;

    /**
     * @var string
     */
    public $orderNumber;

    /**
     * @var string
     */
    public $barcode;

    /**
     * @var string A or B
     */
    public $type;

    /**
     * @return CompanyInterface
     */
	public function getCompany()
	{
		return $this->company;
	}

    /**
     * @param CompanyInterface $company
     */
	public function setCompany(CompanyInterface $company)
	{
		$this->company = $company;
	}

    /**
     * @param ContentInterface $content
     */
	public function setContent(ContentInterface $content)
	{
		$this->content = $content;
	}

    /**
     * @return ContentInterface
     */
	public function getContent()
	{
		return $this->content;
	}

    /**
     * @param Sscc $sscc
     */
    public function setSscc(Sscc $sscc)
    {
        $this->sscc = $sscc;
    }

    /**
     * @return Sscc
     */
    public function getSscc()
    {
        return $this->sscc;
    }

    public function getOrderNumber()
    {
        return $this->orderNumber;
    }
}