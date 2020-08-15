<?php
namespace App\Helper;

class Helper{

        /**
     * Converts numbers in string from western to eastern Arabic numerals.
     *
     * @param  string $str Arbitrary text
     * @return string Text with  Arabic numerals converted into English numerals.
     */
    static function arabic_w2e($str)
    {
        $arNumber = array('٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩');
        $enNumber= array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
        return str_replace($enNumber, $arNumber, $str);
    }

    /**
     * Converts numbers from eastern to western Arabic numerals.
     *
     * @param  string $str Arbitrary text
     * @return string Text with English numerals converted into  Arabic numerals.
     */
    
    static function arabic_e2w($str)
    {
        $arNumber = array('٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩');
        $enNumber= array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');

        return str_replace($arNumber, $enNumber, $str);
    }

}
