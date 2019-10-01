<?php

// core
class LL_Capability_Service {
    public static $number = 6;
    
    function format_price($price) {
        $price = preg_replace("/\s*/", "", $price);
        return number_format((float)$price, 0, '.', ' ');
    }
    
} // class end
