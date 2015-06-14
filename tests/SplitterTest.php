<?php
use Ayeo\Gs1\Utils\BarCodeSplitter;

class SplitterTest extends \PHPUnit_Framework_TestCase
{
    public function testBarCode()
    {
        $barcode = '(01)0000123456789(37)1(400)0000000009(15)31122016(3301)0.5(10)ABC123(00)159012345600006737';

        $splitter = new BarCodeSplitter(40);
        $result = $splitter->split($barcode);

        $this->assertEquals(37, strlen($result[0])); // (01)0000123456789(37)1(400)0000000009
        $this->assertEquals(31, strlen($result[1]));  // (15)31122016(3301)0.5(10)ABC123
        $this->assertEquals(22, strlen($result[2])); // (00)159012345600006737
    }
}