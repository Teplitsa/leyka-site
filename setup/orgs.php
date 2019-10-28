<?php /** The default procedure of Donor Metadata Cache total refresh. */

require_once 'common.php';

if( !defined('WPINC') ) die;

ini_set('max_execution_time', 0);
set_time_limit(0);
ini_set('memory_limit', 268435456); // 256 Mb, just in case

// setup page
$posts_data = array(
    array(
        'post_title' => 'Уже установили Лейку',
        'post_name' => 'orgs',
        'post_excerpt' => "Лейка — это плагин, при помощи которого множество организаций собирает пожертвования через интернет.",
        'meta' => array('ll_page_super_title' => 'Лейка'),
    ),
);
LL_Setup_Utils::setup_posts_data($posts_data, 'page');

// add categories
$org_categories = array(
    array('slug' => 'charity', 'name' => "Благотворительность"),
    array('slug' => 'human_rights', 'name' => "Правозащита"),
    array('slug' => 'ecology', 'name' => "Эко-защита"),
    array('slug' => 'info', 'name' => "Информационные ресурсы"),
);
LL_Setup_Utils::setup_terms_data($org_categories, LL_Orgs_Service::$category_tax);

$post_data_list = array(
    array(
        'post_title' => 'Агентство Социальной Информации',
        'post_name' => 'agentstvo-socialnoj-informacii',
        'post_excerpt' => 'https://www.asi.org.ru/',
        'thumbnail_path' => '/data/orgs/org-logo-001.png',
        'menu_order' => 1,
        'tax_terms' => array(
            LL_Orgs_Service::$category_tax => array('info'),
        ),
        'meta' => array(LL_Orgs_Service::$meta_org_approved => 'on'),
    ),
    array(
        'post_title' => 'Центр равных возможностей для детей-сирот «Вверх»',
        'post_name' => 'centr-ravnyh-vozmozhnostej-dlja-detej-s',
        'post_excerpt' => 'https://vverh.su/',
        'thumbnail_path' => '/data/orgs/org-logo-002.png',
        'menu_order' => 2,
        'tax_terms' => array(
            LL_Orgs_Service::$category_tax => array('charity'),
        ),
        'meta' => array(LL_Orgs_Service::$meta_org_approved => 'on'),
    ),
    array(
        'post_title' => 'РООИ «Перспектива»',
        'post_name' => 'rooi-perspektiva',
        'post_excerpt' => 'https://perspektiva-inva.ru/',
        'thumbnail_path' => '/data/orgs/org-logo-006.png',
        'menu_order' => 3,
        'tax_terms' => array(
            LL_Orgs_Service::$category_tax => array('charity'),
        ),
        'meta' => array(LL_Orgs_Service::$meta_org_approved => 'on'),
    ),
    array(
        'post_title' => 'Фонд помощи взрослым «Живой»',
        'post_name' => 'fond-pomoshhi-vzroslym-zhivoj',
        'post_excerpt' => 'https://livefund.ru/',
        'thumbnail_path' => '/data/orgs/org-logo-005.png',
        'menu_order' => 4,
        'tax_terms' => array(
            LL_Orgs_Service::$category_tax => array('charity'),
        ),
        'meta' => array(LL_Orgs_Service::$meta_org_approved => 'on'),
    ),
    array(
        'post_title' => 'Wikimedia',
        'post_name' => 'wikimedia',
        'post_excerpt' => 'https://ru.wikimedia.org/wiki/Заглавная_страница',
        'thumbnail_path' => '/data/orgs/org-logo-004.png',
        'menu_order' => 5,
        'tax_terms' => array(
            LL_Orgs_Service::$category_tax => array('info'),
        ),
        'meta' => array(LL_Orgs_Service::$meta_org_approved => 'on'),
    ),
    array(
        'post_title' => 'Агентство Социальной Информации',
        'post_name' => 'agentstvo-socialnoj-informacii-2',
        'post_excerpt' => 'https://www.asi.org.ru/',
        'thumbnail_path' => '/data/orgs/org-logo-001.png',
        'menu_order' => 6,
        'tax_terms' => array(
            LL_Orgs_Service::$category_tax => array('info'),
        ),
        'meta' => array(LL_Orgs_Service::$meta_org_approved => 'on'),
    ),
    array(
        'post_title' => 'Wikimedia',
        'post_name' => 'wikimedia-2',
        'post_excerpt' => 'https://ru.wikimedia.org/wiki/Заглавная_страница',
        'thumbnail_path' => '/data/orgs/org-logo-004.png',
        'menu_order' => 7,
        'tax_terms' => array(
            LL_Orgs_Service::$category_tax => array('info'),
        ),
        'meta' => array(LL_Orgs_Service::$meta_org_approved => 'on'),
    ),
    array(
        'post_title' => 'Комитет «Гражданское содействие»',
        'post_name' => 'komitet-grazhdanskoe-sodejstvie',
        'post_excerpt' => 'https://refugee.ru/',
        'thumbnail_path' => '/data/orgs/org-logo-003.png',
        'menu_order' => 8,
        'tax_terms' => array(
            LL_Orgs_Service::$category_tax => array('human_rights'),
        ),
        'meta' => array(LL_Orgs_Service::$meta_org_approved => 'on'),
    ),
    array(
        'post_title' => 'Агентство Социальной Информации',
        'post_name' => 'agentstvo-socialnoj-informacii-3',
        'post_excerpt' => 'https://www.asi.org.ru/',
        'thumbnail_path' => '/data/orgs/org-logo-001.png',
        'menu_order' => 9,
        'tax_terms' => array(
            LL_Orgs_Service::$category_tax => array('info'),
        ),
        'meta' => array(LL_Orgs_Service::$meta_org_approved => 'on'),
    ),
    array(
        'post_title' => 'Центр равных возможностей для детей-сирот «Вверх»',
        'post_name' => 'centr-ravnyh-vozmozhnostej-dlja-detej-s-2',
        'post_excerpt' => 'https://vverh.su/',
        'thumbnail_path' => '/data/orgs/org-logo-002.png',
        'menu_order' => 10,
        'tax_terms' => array(
            LL_Orgs_Service::$category_tax => array('charity'),
        ),
        'meta' => array(LL_Orgs_Service::$meta_org_approved => 'on'),
    ),
    array(
        'post_title' => 'Фонд помощи взрослым «Живой»',
        'post_name' => 'fond-pomoshhi-vzroslym-zhivoj-2',
        'post_excerpt' => 'https://livefund.ru/',
        'thumbnail_path' => '/data/orgs/org-logo-005.png',
        'menu_order' => 11,
        'tax_terms' => array(
            LL_Orgs_Service::$category_tax => array('charity'),
        ),
        'meta' => array(LL_Orgs_Service::$meta_org_approved => 'on'),
    ),
);
LL_Setup_Utils::setup_posts_data($post_data_list, LL_Orgs_Service::$post_type);

ll_set_theme_mod_safe('ll_label_orgs_submit_new', "Отправить");
ll_set_theme_mod_safe('ll_label_orgs_upload_file', "Загрузить логотип");
ll_set_theme_mod_safe('ll_label_orgs_what_category', "Категория вашей организации");
ll_set_theme_mod_safe('ll_label_back_to_orgs_list_caption', "Вернуться к списку");
ll_set_theme_mod_safe('ll_label_upload_org_logo_file_details', "Загрузите файл в формате .jpg, .png
Размер файла не больше 8Мб");

ll_set_theme_mod_safe('ll_label_all_organizations', "Все организации");
ll_set_theme_mod_safe('ll_label_add_your_org', "Добавьте свой ресурс");
ll_set_theme_mod_safe('ll_label_show_more_orgs', "Показать ещё");

ll_set_theme_mod_safe('ll_message_org_submitted_error', "При отправке формы произошла ошибка. Попробуйте еще раз позднее.");
ll_set_theme_mod_safe('ll_message_org_submitted_ok', "Информация о вашей организации сохранена. Спасибо!");

// ll_set_theme_mod_safe('', "");
// ll_set_theme_mod_safe('', "");
// ll_set_theme_mod_safe('', "");
