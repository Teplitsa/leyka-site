<?php /** The default procedure of Donor Metadata Cache total refresh. */

require_once 'common.php';

if( !defined('WPINC') ) die;

ini_set('max_execution_time', 0);
set_time_limit(0);
ini_set('memory_limit', 268435456); // 256 Mb, just in case

//page
$posts_data = array(
    array(
        'post_title' => 'Тарифы на услуги',
        'post_name' => 'prices',
        'post_excerpt' => 'Наша команда готова помочь вам в быстром освоении Лейки
и поддерживать ваше направление на ежемесячной основе',
        'meta' => array('ll_page_super_title' => 'Лейка'),
    ),
);

LL_Setup_Utils::setup_posts_data($posts_data, 'page');

// common prices
ll_set_theme_mod_safe('ll_label_quick_start_price_description', "Мы можем помочь вам быстро стартовать со сбором средств");

ll_set_theme_mod_safe('ll_label_quick_start_price_currency', "₽");

ll_set_theme_mod_safe('ll_label_other_prices_description', "Хотите быть всегда на связи с нашей командой? Мы предлагам вам наши лучшие тарифы");

ll_set_theme_mod_safe('ll_label_other_prices_currency', "₽/мес.");

ll_set_theme_mod_safe('ll_label_quick_start_price_submit_caption', "Отправить заявку");

ll_set_theme_mod_safe('ll_label_quick_start_price_submit_url', site_url("/"));

ll_set_theme_mod_safe('ll_label_back_to_prices_caption', "Вернуться к тарифам");

ll_set_theme_mod_safe('ll_label_order_form_privacy_policy_explain', "Ваши личные данные будут использоваться для обработки ваших заказов, упрощения вашей работы с сайтом и для других целей, описанных в нашей <a href=\"/personal-data-usage-terms/\" target=\"_blank\">политики конфиденциальности</a>");

ll_set_theme_mod_safe('ll_message_order_submitted_ok', "Ваша заявка отправлена. Наши специалисты свяжутся с вами в ближайшее время.");

ll_set_theme_mod_safe('ll_message_order_submitted_error', "При отправке заявки произошла ошибка. Попробуйте еще раз позднее.");

ll_set_theme_mod_safe('ll_message_order_submitted_email_subject', "Новая заявка с сайта Лейки");

ll_set_theme_mod_safe('ll_message_order_submitted_email_body', "Детали заявки:

Имя: {fname} {sname}
Email: {email}
Организация: {org}
Тарифный план: {price} 
");


// quick start
ll_set_theme_mod_safe('ll_label_quick_start_price_title', "Быстрый старт");

ll_set_theme_mod_safe('ll_label_quick_start_price_case', "У вас уже сайт на WordPress и подключенный домен");

ll_set_theme_mod_safe('ll_label_quick_start_price_price', "6 900");

ll_set_theme_mod_safe('ll_label_quick_start_price_point1', "Подключение и настройка Лейки");

ll_set_theme_mod_safe('ll_label_quick_start_price_point2', "Рекурентные платежи для одного из платежных методов");

ll_set_theme_mod_safe('ll_label_quick_start_price_point3', "Функционал постоянной кампании и доведением до стиля сайта");

// quick start case2
ll_set_theme_mod_safe('ll_label_quick_start_price2_title', "Быстрый старт +");

ll_set_theme_mod_safe('ll_label_quick_start_price2_case', "Ваш сайт на другой системе");

ll_set_theme_mod_safe('ll_label_quick_start_price2_price', "11 900");

ll_set_theme_mod_safe('ll_label_quick_start_price2_point0', "Настройка поддомена и установка WordPress");

ll_set_theme_mod_safe('ll_label_quick_start_price2_point1', "Подключение и настройка Лейки");

ll_set_theme_mod_safe('ll_label_quick_start_price2_point2', "Рекурентные платежи для одного из платежных методов");

ll_set_theme_mod_safe('ll_label_quick_start_price2_point3', "Функционал постоянной кампании и доведением до стиля сайта");

// other prices
// price1
ll_set_theme_mod_safe('ll_label_price1_title', "Первая помощь");

ll_set_theme_mod_safe('ll_label_price1_price', "2 490");

ll_set_theme_mod_safe('ll_label_price1_point1', "Приоритетное рассмотрение задач и вопросов");

ll_set_theme_mod_safe('ll_label_price1_point2', "Чат разработчиков и поддержка по почте");

// price2
ll_set_theme_mod_safe('ll_label_price2_title', "Приоритетный");

ll_set_theme_mod_safe('ll_label_price2_price', "4 999");

ll_set_theme_mod_safe('ll_label_price2_point1', "Приоритетное рассмотрение задач и вопросов");

ll_set_theme_mod_safe('ll_label_price2_point2', "Чат разработчиков и поддержка по почте");

ll_set_theme_mod_safe('ll_label_price2_point3', "1 час консультаций или дополнительные работы");

// price3
ll_set_theme_mod_safe('ll_label_price3_title', "Аналитический");

ll_set_theme_mod_safe('ll_label_price3_price', "9 999");

ll_set_theme_mod_safe('ll_label_price3_point1', "Приоритетное рассмотрение задач и вопросов");

ll_set_theme_mod_safe('ll_label_price3_point2', "Чат разработчиков и поддержка по почте");

ll_set_theme_mod_safe('ll_label_price3_point3', "4 часа (раз в неделю) консультаций или дополнительные работы");

ll_set_theme_mod_safe('ll_label_price3_point4', "Помощь в настройке и аналитике пожертвований");

// order extra recipients
ll_set_theme_mod_safe('ll_message_order_submitted_email_extra_recipients', "olga@te-st.ru");
