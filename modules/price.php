<?php

// core
class LL_Price_Service {
    
    function format_price($price) {
        $price = preg_replace("/\s*/", "", $price);
        return number_format((float)$price, 0, '.', ' ');
    }
    
} // class end
