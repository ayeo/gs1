# GS1 support

Library supports gs1 systems. Provides ability to generate logistic labels and impose usage of valid gs1 objects. All functionality is availaible through Gs1Facade object. Library takes care about generating barcode, sscc numbers and calculating check digits. 
 

Company and Location objects
============================

Library is delivered only with location and company interfaces. You must use your own objects. That is done for purpose ypu probably want to work with existing classes. Example implementation below:

```php
class MyCustomCompany extends CompanyInterface
{
    public function getGcp()
    {
       return new Model\Gcp('123456');
    }
    
    public function getName()
    {
       return "My Custom Name"
    }
    

    public function getLocation()
    {
        $location = new MyCustomLocation();
    } 
}
```

 
```php
class MyBaseLocation extends LocationInterface
{
    public function getAddress()
    {
        $address = new Model\Address;
        $address->streetName = 'Secret Avenue';
        $address->buildingNumber = 10;
        $address->countryName = "England";
        $address->postcode = 'NG10 5GH';
    }

    public function getLocationNumber()
    {
        return '00';
    }
    
   
    public function getTelephoneNumber()
    {
        return '560 560 506';
    }
    
    
    public function getFaxNumber()
    {
        return '';
    }
    
    
    public function getWebsiteAddress()
    {
        return 'ayeo.pl';
    }
}

```

Content object
==============

```php
$content = new Model\Content;
$content->setName('test product');
$content->setBatchSymbol('abc12345');
$content->setGrossWeight(2);
$content->setGtin($gs1->buildGtin('1234512345123'));
$content->setQuantity(120);
$content->setBestBefore(new DateTime);
```

Example use
===========

```php
$gs1 = new Gs1Facade($company);
$label = $gs1->buildLabel($content, $orderNumber = '000102', $logicticCounter = 232);
```

Label contains all nessecary data such as SSCC, barcode, GTIN, full company data etc

Custom Barcode structure
========================

See code (docs to do)