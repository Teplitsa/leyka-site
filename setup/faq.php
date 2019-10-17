<?php /** The default procedure of Donor Metadata Cache total refresh. */

require_once 'common.php';

if( !defined('WPINC') ) die;

ini_set('max_execution_time', 0);
set_time_limit(0);
ini_set('memory_limit', 268435456); // 256 Mb, just in case

// page
$posts_data = array(
    array(
        'post_title' => 'Вопросы и ответы',
        'post_name' => 'faq',
        'post_excerpt' => "Лейка — это плагин для Wordpress’a. Но установить его не трудно и у нас есть\n подробная видео-инструкция",
        'meta' => array('ll_page_super_title' => 'Лейка'),
    ),
);
LL_Setup_Utils::setup_posts_data($posts_data, 'page');

// questions
$posts_data = array(
    array(
        'post_title' => 'А если у меня нет сайта?', 
        'post_content' => '«Кандинский» поможет быстро запустить красивый сайт НКО без финансовых затрат и программирования. Начните работать на своем новом сайте уже сегодня.',
        'menu_order' => 1,
        'meta' => array('ll_faq_show_on_main_page' => 'on', 'll_faq_learn_more_link_title' => 'Инструкция по установке', 'll_faq_learn_more_link_url' => site_url('/faq/')),
    ),
    array(
        'post_title' => 'Кажется это сложно... Мне может кто-нибудь помочь?',
        'post_content' => 'Интегрирование по частям допускает разрыв функции. Учитывая, что (sin x)’ = cos x, матожидание тривиально. Легко проверить, что максимум ускоряет сходящийся ряд. Нормальное распределение, конечно, ускоряет убывающий вектор.',
        'menu_order' => 2,
        'meta' => array('ll_faq_show_on_main_page' => 'on'),
    ),
    array(
        'post_title' => 'Кто сделал Лейку и почему всё бесплатно?',
        'post_content' => 'Огибающая семейства прямых естественно специфицирует Наибольший Общий Делитель (НОД). Мнимая единица, не вдаваясь в подробности, осмысленно проецирует критерий сходимости Коши.',
        'menu_order' => 3,
        'meta' => array('ll_faq_show_on_main_page' => 'on'),
    ),
    array(
        'post_title' => 'Хочу быстро начать собирать деньги, как это сделать?',
        'post_content' => 'ледствие: теорема стремительно допускает полином. Векторное поле существенно изменяет вектор. Линейное уравнение необходимо и достаточно.',
        'menu_order' => 4,
        'meta' => array('ll_faq_show_on_main_page' => 'on'),
    ),
);
LL_Setup_Utils::setup_posts_data($posts_data, LL_Faq_Service::$post_type);