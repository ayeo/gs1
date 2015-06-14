<?php
namespace Ayeo\Gs1\Utils;

class BarCodeSplitter
{
    private $maxLineLength;

    private $replacer = '***';

    /**
     * @param integer $maxLineLength
     */
    public function __construct($maxLineLength)
    {
        $this->maxLineLength = $maxLineLength;
    }

    /**
     * @param string $barCode
     * @return array
     */
    public function split($barCode)
    {
        $replacer = $this->replacer;
        $barCode = preg_replace_callback('#\(\d+\)#', function ($match) use ($replacer) {
            return $replacer . $match[0];
        }, $barCode);

        $i = 0;
        $result = [''];
        $parts = explode($replacer, $barCode);
        foreach ($parts as $part) {
            $length = strlen($result[$i]);
            $partLength = strlen($part);

            if ($length + $partLength > 40) {
                $i++;
                $result[$i] = '';
            }

            $result[$i] .= $part;
        }

        return $result;
    }
}
