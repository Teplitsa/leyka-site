<?php /** The default procedure of Donor Metadata Cache total refresh. */

require_once 'common.php';

if( !defined('WPINC') ) die;

ini_set('max_execution_time', 0);
set_time_limit(0);
ini_set('memory_limit', 268435456); // 256 Mb, just in case

// add categories
$categories = array(
    array('slug' => LL_Steps_Service::$main_steps_cat, 'name' => "У меня сайт на WordPress"),
    array('slug' => LL_Steps_Service::$no_site_cat, 'name' => "У меня нет вообще никакого сайта"),
    array('slug' => LL_Steps_Service::$tilda_site_cat, 'name' => "Мой сайт на Tilda, Wix или другой платформе"),
);
LL_Setup_Utils::setup_terms_data($categories, LL_Steps_Service::$category_tax);

//steps
$posts_data = array(
    array(
        'post_title' => 'Установливаем Лейку на WordPress-сайт',
        'post_name' => 'step-setup-on-wp',
        'post_excerpt' => 'Лейка — это плагин для Wordpress’a. Но установить его не трудно и у нас есть подробная видео-инструкция',
        'post_content' => '[embed]https://www.youtube.com/watch?v=SVxXIynTG8k&t=8s[/embed]
<ol>
 	<li>
<h4><a href="https://ru.wordpress.org/plugins/leyka/">Скачайте плагин</a>, если вы его еще не скачали</h4>
Если у вас есть работающий сайт, установите WordPress на субдомен. Если сайта нет — вам потребуется домен и хостинг для установки.</li>
 	<li>
<h4>Скачайте плагин, если вы его еще не скачали</h4>
Если у вас есть работающий сайт, установите WordPress на субдомен. Если сайта нет — вам потребуется домен и хостинг для установки.</li>
 	<li>
<h4>Скачайте плагин, если вы его еще не скачали</h4>
Если у вас есть работающий сайт, установите WordPress на субдомен. Если сайта нет — вам потребуется домен и хостинг для установки.</li>
</ol>',
        'menu_order' => '1',
        'meta' => array('ll_page_super_title' => 'Шаг 1 из 5'),
        'tax_terms' => array(
            LL_Steps_Service::$category_tax => array(LL_Steps_Service::$main_steps_cat),
        ),
    ),
    array(
        'post_title' => 'Делаем сайт на Кандинском и устанавливаем Лейкку',
        'post_name' => 'step-setup-on-knd',
        'post_excerpt' => 'Лейка — это плагин для Wordpress’a. Но установить его не трудно и у нас есть подробная видео-инструкция',
        'post_content' => '[embed]https://www.youtube.com/watch?v=SVxXIynTG8k&t=8s[/embed]
<ol>
 	<li>
<h4><a href="https://ru.wordpress.org/plugins/leyka/">Скачайте плагин</a>, если вы его еще не скачали</h4>
Если у вас есть работающий сайт, установите WordPress на субдомен. Если сайта нет — вам потребуется домен и хостинг для установки.</li>
 	<li>
<h4>Скачайте плагин, если вы его еще не скачали</h4>
Если у вас есть работающий сайт, установите WordPress на субдомен. Если сайта нет — вам потребуется домен и хостинг для установки.</li>
 	<li>
<h4>Скачайте плагин, если вы его еще не скачали</h4>
Если у вас есть работающий сайт, установите WordPress на субдомен. Если сайта нет — вам потребуется домен и хостинг для установки.</li>
</ol>',
        'menu_order' => '1',
        'meta' => array('ll_page_super_title' => 'Шаг 1 из 5'),
        'tax_terms' => array(
            LL_Steps_Service::$category_tax => array(LL_Steps_Service::$no_site_cat),
        ),
    ),
    array(
        'post_title' => 'Установливаем Лейку на Tilda, Wix или другую платформу',
        'post_name' => 'step-setup-on-tilda-etc',
        'post_excerpt' => 'Лейка — это плагин для Wordpress’a. Но установить его не трудно и у нас есть подробная видео-инструкция',
        'post_content' => '[embed]https://www.youtube.com/watch?v=SVxXIynTG8k&t=8s[/embed]
<ol>
 	<li>
<h4><a href="https://ru.wordpress.org/plugins/leyka/">Скачайте плагин</a>, если вы его еще не скачали</h4>
Если у вас есть работающий сайт, установите WordPress на субдомен. Если сайта нет — вам потребуется домен и хостинг для установки.</li>
 	<li>
<h4>Скачайте плагин, если вы его еще не скачали</h4>
Если у вас есть работающий сайт, установите WordPress на субдомен. Если сайта нет — вам потребуется домен и хостинг для установки.</li>
 	<li>
<h4>Скачайте плагин, если вы его еще не скачали</h4>
Если у вас есть работающий сайт, установите WordPress на субдомен. Если сайта нет — вам потребуется домен и хостинг для установки.</li>
</ol>',
        'menu_order' => '1',
        'meta' => array('ll_page_super_title' => 'Шаг 1 из 5'),
        'tax_terms' => array(
            LL_Steps_Service::$category_tax => array(LL_Steps_Service::$tilda_site_cat),
        ),
    ),
    array(
        'post_title' => 'Настрой свои данные в Лейке',
        'post_name' => 'step-setup-your-leyka-data',
        'post_excerpt' => 'Лейка — это плагин для Wordpress’a. Но установить его не трудно и у нас есть подробная видео-инструкция',
        'post_content' => '[embed]https://www.youtube.com/watch?v=SVxXIynTG8k&t=8s[/embed]
<ol>
 	<li>
<h4><a href="https://ru.wordpress.org/plugins/leyka/">Скачайте плагин</a>, если вы его еще не скачали</h4>
Если у вас есть работающий сайт, установите WordPress на субдомен. Если сайта нет — вам потребуется домен и хостинг для установки.</li>
 	<li>
<h4>Скачайте плагин, если вы его еще не скачали</h4>
Если у вас есть работающий сайт, установите WordPress на субдомен. Если сайта нет — вам потребуется домен и хостинг для установки.</li>
 	<li>
<h4>Скачайте плагин, если вы его еще не скачали</h4>
Если у вас есть работающий сайт, установите WordPress на субдомен. Если сайта нет — вам потребуется домен и хостинг для установки.</li>
</ol>',
        'menu_order' => '2',
        'meta' => array('ll_page_super_title' => 'Шаг 2 из 5'),
        'tax_terms' => array(
            LL_Steps_Service::$category_tax => array(LL_Steps_Service::$main_steps_cat, LL_Steps_Service::$no_site_cat, LL_Steps_Service::$tilda_site_cat),
        ),
    ),
    array(
        'post_title' => 'Подключи платежную систему и способы приема денег',
        'post_name' => 'step-connect-payment-system',
        'post_excerpt' => 'Лейка — это плагин для Wordpress’a. Но установить его не трудно и у нас есть подробная видео-инструкция',
        'post_content' => '[embed]https://www.youtube.com/watch?v=SVxXIynTG8k&t=8s[/embed]
<ol>
 	<li>
<h4><a href="https://ru.wordpress.org/plugins/leyka/">Скачайте плагин</a>, если вы его еще не скачали</h4>
Если у вас есть работающий сайт, установите WordPress на субдомен. Если сайта нет — вам потребуется домен и хостинг для установки.</li>
 	<li>
<h4>Скачайте плагин, если вы его еще не скачали</h4>
Если у вас есть работающий сайт, установите WordPress на субдомен. Если сайта нет — вам потребуется домен и хостинг для установки.</li>
 	<li>
<h4>Скачайте плагин, если вы его еще не скачали</h4>
Если у вас есть работающий сайт, установите WordPress на субдомен. Если сайта нет — вам потребуется домен и хостинг для установки.</li>
</ol>',
        'menu_order' => '3',
        'meta' => array('ll_page_super_title' => 'Шаг 3 из 5'),
        'tax_terms' => array(
            LL_Steps_Service::$category_tax => array(LL_Steps_Service::$main_steps_cat, LL_Steps_Service::$no_site_cat, LL_Steps_Service::$tilda_site_cat),
        ),
    ),
    array(
        'post_title' => 'Настрой кампанию',
        'post_name' => 'step-setup-campaign',
        'post_excerpt' => 'Лейка — это плагин для Wordpress’a. Но установить его не трудно и у нас есть подробная видео-инструкция',
        'post_content' => '[embed]https://www.youtube.com/watch?v=SVxXIynTG8k&t=8s[/embed]
<ol>
 	<li>
<h4><a href="https://ru.wordpress.org/plugins/leyka/">Скачайте плагин</a>, если вы его еще не скачали</h4>
Если у вас есть работающий сайт, установите WordPress на субдомен. Если сайта нет — вам потребуется домен и хостинг для установки.</li>
 	<li>
<h4>Скачайте плагин, если вы его еще не скачали</h4>
Если у вас есть работающий сайт, установите WordPress на субдомен. Если сайта нет — вам потребуется домен и хостинг для установки.</li>
 	<li>
<h4>Скачайте плагин, если вы его еще не скачали</h4>
Если у вас есть работающий сайт, установите WordPress на субдомен. Если сайта нет — вам потребуется домен и хостинг для установки.</li>
</ol>',
        'menu_order' => '4',
        'meta' => array('ll_page_super_title' => 'Шаг 4 из 5'),
        'tax_terms' => array(
            LL_Steps_Service::$category_tax => array(LL_Steps_Service::$main_steps_cat, LL_Steps_Service::$no_site_cat, LL_Steps_Service::$tilda_site_cat),
        ),
    ),
    array(
        'post_title' => 'Выстраивай взаимоотношения с днорами',
        'post_name' => 'step-communicate-with-donors',
        'post_excerpt' => 'Лейка — это плагин для Wordpress’a. Но установить его не трудно и у нас есть подробная видео-инструкция',
        'post_content' => '[embed]https://www.youtube.com/watch?v=SVxXIynTG8k&t=8s[/embed]
<ol>
 	<li>
<h4><a href="https://ru.wordpress.org/plugins/leyka/">Скачайте плагин</a>, если вы его еще не скачали</h4>
Если у вас есть работающий сайт, установите WordPress на субдомен. Если сайта нет — вам потребуется домен и хостинг для установки.</li>
 	<li>
<h4>Скачайте плагин, если вы его еще не скачали</h4>
Если у вас есть работающий сайт, установите WordPress на субдомен. Если сайта нет — вам потребуется домен и хостинг для установки.</li>
 	<li>
<h4>Скачайте плагин, если вы его еще не скачали</h4>
Если у вас есть работающий сайт, установите WordPress на субдомен. Если сайта нет — вам потребуется домен и хостинг для установки.</li>
</ol>',
        'menu_order' => '5',
        'meta' => array('ll_page_super_title' => 'Шаг 5 из 5'),
        'tax_terms' => array(
            LL_Steps_Service::$category_tax => array(LL_Steps_Service::$main_steps_cat, LL_Steps_Service::$no_site_cat, LL_Steps_Service::$tilda_site_cat),
        ),
    ),
);
LL_Setup_Utils::setup_posts_data($posts_data, LL_Steps_Service::$post_type);

flush_rewrite_rules( true );
