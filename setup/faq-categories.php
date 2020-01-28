<?php /** The default procedure of Donor Metadata Cache total refresh. */

require_once 'common.php';

if( !defined('WPINC') ) die;

ini_set('max_execution_time', 0);
set_time_limit(0);
ini_set('memory_limit', 268435456); // 256 Mb, just in case

// add categories
$categories = array(
    array('slug' => 'other', 'name' => "Другое", 'meta' => array(LL_Faq_Service::$term_meta_order => 1000),),
);
LL_Setup_Utils::setup_terms_data($categories, LL_Faq_Service::$category_tax);
