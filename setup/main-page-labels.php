<?php /** The default procedure of Donor Metadata Cache total refresh. */

require_once 'common.php';

if( !defined('WPINC') ) die;

ini_set('max_execution_time', 0);
set_time_limit(0);
ini_set('memory_limit', 268435456); // 256 Mb, just in case

$setup_on_wp_url = add_query_arg(array('ll-set-steps-cat' => LL_Steps_Service::$main_steps_cat), get_the_permalink(ll_get_post('step-setup-on-wp', LL_Steps_Service::$post_type)));
$setup_on_tilda_url = add_query_arg(array('ll-set-steps-cat' => LL_Steps_Service::$tilda_site_cat), get_the_permalink(ll_get_post('step-setup-on-tilda-etc', LL_Steps_Service::$post_type)));
$setup_on_knd_url = add_query_arg(array('ll-set-steps-cat' => LL_Steps_Service::$no_site_cat), get_the_permalink(ll_get_post('step-setup-on-knd', LL_Steps_Service::$post_type)));

$capabilities_url = get_the_permalink(ll_get_post('capabilities', 'page'));
$orgs_url = get_the_permalink(ll_get_post('orgs', 'page'));
$prices_url = get_the_permalink(ll_get_post('prices', 'page'));
$itv_paseka_url = get_the_permalink(ll_get_post('itv-paseka', 'page'));
$faq_url = get_the_permalink(ll_get_post('faq', 'page'));
$docs_url = get_the_permalink(ll_get_post('sistemnye-trebovaniya', LL_Docs_Service::$post_type));

// common
ll_set_theme_mod_safe('ll_label_install_leyka_caption', "Установить Лейку");

ll_set_theme_mod_safe('ll_label_leyka_version', "Версия 3.2.2");

ll_set_theme_mod_safe('ll_install_leyka_url', "https://ru.wordpress.org/plugins/leyka/");

// intro
ll_set_theme_mod_safe('ll_label_intro_header', "<span>Собирай</span>
<span>пожертвования</span>
<span>на своем сайте</span>");

ll_set_theme_mod_safe('ll_label_intro_subheader', "Установите Лейку и собирайте, управляйте и получайте отчетность по онлайн-пожертвованиям");

ll_set_theme_mod_safe('ll_label_intro_stats_header', "Более 1000 активных установок");

ll_set_theme_mod_safe('ll_label_intro_stats_subheader', "по данным WordPress");

// testimonials
ll_set_theme_mod_safe('ll_label_testimonials_header', "Бесплатно навсегда.");

ll_set_theme_mod_safe('ll_label_testimonials_subheader', "Лейка создана для некоммерческих организаций, общественных объединений и 
партнерств, а также и для физических лиц");

ll_set_theme_mod_safe('ll_label_testimonials_installations_stats', "Установлено в <span>более 350 НКО</span>");

// features
ll_set_theme_mod_safe('ll_label_feaures_freedom', "Свобода. Контроль. Децентрализация.");

ll_set_theme_mod_safe('ll_label_feaures_customize_it', "Не ограничивайте себя — дорабатывайте Лейку для ваших нужд, так как этого хочется вам");

ll_set_theme_mod_safe('ll_label_feaures_24pm', "24+ способ приема платежей");

ll_set_theme_mod_safe('ll_label_feaures_fizur', "Юридические и физические лица");

ll_set_theme_mod_safe('ll_label_feaures_single_recur', "Регулярные и разовые платежи");

ll_set_theme_mod_safe('ll_label_feaures_donor_account', "Личный кабинет донора при регулярных платежах");

ll_set_theme_mod_safe('ll_label_feaures_donations_reports', "Отчетность по пожертвованиям");

ll_set_theme_mod_safe('ll_label_feaures_all', "Все возможности");

ll_set_theme_mod_safe('ll_all_fetures_url', $capabilities_url);

// quick start
ll_set_theme_mod_safe('ll_label_quick_start_needed', "У меня нет времени. <span>Как мне быстро начать собирать деньги?</span>");

ll_set_theme_mod_safe('ll_label_quick_start_know_how_to', "Узнайте как");
ll_set_theme_mod_safe('ll_quick_start_know_how_to_url', $setup_on_wp_url);

// how it works steps
ll_set_theme_mod_safe('ll_label_hiw_how_it_works', "Как это работает?");

ll_set_theme_mod_safe('ll_label_hiw_30_minutes_enough', "Для корректной установки Лейки на вашем сайте достаточно 30 минут.");

ll_set_theme_mod_safe('ll_label_hiw_no_programming_skills_required', "Навыков программирования не требуется.");

ll_set_theme_mod_safe('ll_label_step1_header', '<a href="#">Скачай</a> и установи Лейку <span>у себя на сайте</span>');

ll_set_theme_mod_safe('ll_label_step1_subheader', "Лейка — это плагин для Wordpress’a. Но установить его не трудно и у нас есть подробная видео-инструкция");

ll_set_theme_mod_safe('ll_label_step1_link1_url', "https://www.youtube.com/watch?v=SVxXIynTG8k");

ll_set_theme_mod_safe('ll_label_step1_link1_title', "Если ваш сайт на WordPress");

ll_set_theme_mod_safe('ll_label_step1_link2_url', "https://www.youtube.com/watch?v=SVxXIynTG8k");

ll_set_theme_mod_safe('ll_label_step1_link2_title', "Если ваш сайт на  Tilda, Wix или другой платформе");

ll_set_theme_mod_safe('ll_label_step2_header', "Настрой свои данные в Лейке");

ll_set_theme_mod_safe('ll_label_step2_subheader', "Введите свои реквизиты, отредактируйте шаблоны писем рассылки, обязательные документы: оферту и соглашение о персональных данных");

ll_set_theme_mod_safe('ll_label_step2_link1_url', "#");

ll_set_theme_mod_safe('ll_label_step2_link1_title', "Первые шаги в Лейке");

ll_set_theme_mod_safe('ll_label_step3_header', "Подключи платежную систему и способы приема денег");

ll_set_theme_mod_safe('ll_label_step3_subheader', "Выбрать будет из чего! Яндекс.Деньги, CloudPayments, PayPal и даже платежные квитанции :)");

ll_set_theme_mod_safe('ll_label_step3_link1_url', "#");

ll_set_theme_mod_safe('ll_label_step3_link1_title', "Подключаем платежную систему");

ll_set_theme_mod_safe('ll_label_step4_header', "Настрой кампанию");

ll_set_theme_mod_safe('ll_label_step4_subheader', "Введите свои реквизиты, отредактируйте шаблоны писем рассылки, обязательные документы: оферту и соглашение о персональных данных");

ll_set_theme_mod_safe('ll_label_step4_link1_url', "#");

ll_set_theme_mod_safe('ll_label_step4_link1_title', "Два типа кампании");

ll_set_theme_mod_safe('ll_label_step4_link2_url', "#");

ll_set_theme_mod_safe('ll_label_step4_link2_title', "Настройка аналитики");

ll_set_theme_mod_safe('ll_label_step4_link3_url', "#");

ll_set_theme_mod_safe('ll_label_step4_link3_title', "Изменение шаблона");

ll_set_theme_mod_safe('ll_label_step5_header', "Выстраивай взаимоотношения с Донорами");

ll_set_theme_mod_safe('ll_label_step5_subheader', "Выбрать будет из чего! Яндекс.Деньги, CloudPayments, PayPal и даже платежные квитанции :)");

ll_set_theme_mod_safe('ll_label_step5_link1_url', "#");

ll_set_theme_mod_safe('ll_label_step5_link1_title', "Личный кабинет");

ll_set_theme_mod_safe('ll_label_step5_link2_url', "#");

ll_set_theme_mod_safe('ll_label_step5_link2_title', "Работа с донорами");

ll_set_theme_mod_safe('ll_label_congrats', "Поздравляем! Вы можете собирать пожертвования!");

// news
ll_set_theme_mod_safe('ll_label_news_header', "Новости Лейки");

ll_set_theme_mod_safe('ll_label_news_be_informed', "Узнавай об обновлениях Лейки:");

ll_set_theme_mod_safe('ll_label_news_channel1_url', "#");

ll_set_theme_mod_safe('ll_label_news_channel1_title', "RSS");

ll_set_theme_mod_safe('ll_label_news_channel2_url', "#");

ll_set_theme_mod_safe('ll_label_news_channel2_title', "Подписка");

ll_set_theme_mod_safe('ll_label_news_channel3_url', "https://t.me/leykadev");

ll_set_theme_mod_safe('ll_label_news_channel3_title', "Чат разработчиков");

ll_set_theme_mod_safe('ll_label_fundraising_advices_header', 'Советы фандрайзинга');

// stats
ll_set_theme_mod_safe('ll_label_stats_data1_value', "1000+");

ll_set_theme_mod_safe('ll_label_stats_data1_label', "установок");

ll_set_theme_mod_safe('ll_label_stats_data2_value', "240");

ll_set_theme_mod_safe('ll_label_stats_data2_label', "НКО");

ll_set_theme_mod_safe('ll_label_stats_data3_value', "120<sup>млн.руб.</sup>");

ll_set_theme_mod_safe('ll_label_stats_data3_label', "собрано в 2018 г.");

ll_set_theme_mod_safe('ll_label_stats_data4_value', "350 000");

ll_set_theme_mod_safe('ll_label_stats_data4_label', "платежей с помощью Лейки");

// footer
ll_set_theme_mod_safe('ll_label_footer_menu_title1', "Лейка");
ll_set_theme_mod_safe('ll_label_footer_menu_title2', "Помощь");
ll_set_theme_mod_safe('ll_label_footer_created_by', "Лейка создана Теплицей социальных технологий");
ll_set_theme_mod_safe('ll_label_footer_created_by_explanation', "Мы развиваем сотрудничество между некоммерческим сектором и IT-специалистами");
ll_set_theme_mod_safe('ll_label_footer_licence', "Все материалы доступны по лицензии Creative Commons СС-BY-SA 3.0");
