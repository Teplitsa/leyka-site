<?php /** The default procedure of Donor Metadata Cache total refresh. */

require_once 'procedures-common.php';

if( !defined('WPINC') ) die;

ini_set('max_execution_time', 0);
set_time_limit(0);
ini_set('memory_limit', 268435456); // 256 Mb, just in case

function set_theme_mod_safe($name, $val) {
    if(!get_theme_mod($name)) {
        set_theme_mod($name, $val);
    }
}

// common
set_theme_mod_safe('ll_label_install_leyka_caption', "Установить Лейку");

set_theme_mod_safe('ll_label_leyka_version', "Версия 3.2.2");

set_theme_mod_safe('ll_install_leyka_url', "https://ru.wordpress.org/plugins/leyka/");

// intro
set_theme_mod_safe('ll_label_intro_header', "<span>Собирай</span>
<span>пожертвования</span>
<span>на своем сайте</span>");

set_theme_mod_safe('ll_label_intro_subheader', "Установите Лейку и собирайте, управляйте и получайте отчетность по онлайн-пожертвованиям");

set_theme_mod_safe('ll_label_intro_stats_header', "Более 1000 активных установок");

set_theme_mod_safe('ll_label_intro_stats_subheader', "по данным WordPress");

// testimonials
set_theme_mod_safe('ll_label_testimonials_header', "Бесплатно навсегда.");

set_theme_mod_safe('ll_label_testimonials_subheader', "Лейка создана для некоммерческих организаций, общественных объединений и 
партнерств, а также и для физических лиц");

set_theme_mod_safe('ll_label_testimonials_installations_stats', "Установлено в <span>более 350 НКО</span>");

// features
set_theme_mod_safe('ll_label_feaures_freedom', "Свобода. Контроль. Децентрализация.");

set_theme_mod_safe('ll_label_feaures_customize_it', "Не ограничивайте себя — дорабатывайте Лейку для ваших нужд, так как этого хочется вам");

set_theme_mod_safe('ll_label_feaures_24pm', "24+ способ приема платежей");

set_theme_mod_safe('ll_label_feaures_fizur', "Юридические и физические лица");

set_theme_mod_safe('ll_label_feaures_single_recur', "Регулярные и разовые платежи");

set_theme_mod_safe('ll_label_feaures_donor_account', "Личный кабинет донора при регулярных платежах");

set_theme_mod_safe('ll_label_feaures_donations_reports', "Отчетность по пожертвованиям");

set_theme_mod_safe('ll_label_feaures_all', "Все возможности");

set_theme_mod_safe('ll_all_fetures_url', "https://leyka.te-st.ru/vozmozhnosti/");

// quick start
set_theme_mod_safe('ll_label_quick_start_needed', "У меня нет времени. <span>Как мне быстро начать собирать деньги?</span>");

set_theme_mod_safe('ll_label_quick_start_know_how_to', "Узнайте как");
set_theme_mod_safe('ll_quick_start_know_how_to_url', "https://leyka.te-st.ru/leyka-standalone/");

// how it works steps
set_theme_mod_safe('ll_label_hiw_how_it_works', "Как это работает?");

set_theme_mod_safe('ll_label_hiw_30_minutes_enough', "Для корректной установки Лейки на вашем сайте достаточно 30 минут.");

set_theme_mod_safe('ll_label_hiw_no_programming_skills_required', "Навыков программирования не требуется.");

set_theme_mod_safe('ll_label_step1_header', '<a href="#">Скачай</a> и установи Лейку <span>у себя на сайте</span>');

set_theme_mod_safe('ll_label_step1_subheader', "Лейка — это плагин для Wordpress’a. Но установить его не трудно и у нас есть подробная видео-инструкция");

set_theme_mod_safe('ll_label_step1_link1_url', "https://www.youtube.com/watch?v=SVxXIynTG8k");

set_theme_mod_safe('ll_label_step1_link1_title', "Если ваш сайт на WordPress");

set_theme_mod_safe('ll_label_step1_link2_url', "https://www.youtube.com/watch?v=SVxXIynTG8k");

set_theme_mod_safe('ll_label_step1_link2_title', "Если ваш сайт на  Tilda, Wix или другой платформе");

set_theme_mod_safe('ll_label_step2_header', "Настрой свои данные в Лейке");

set_theme_mod_safe('ll_label_step2_subheader', "Введите свои реквизиты, отредактируйте шаблоны писем рассылки, обязательные документы: оферту и соглашение о персональных данных");

set_theme_mod_safe('ll_label_step2_link1_url', "#");

set_theme_mod_safe('ll_label_step2_link1_title', "Первые шаги в Лейке");

set_theme_mod_safe('ll_label_step3_header', "Подключи платежную систему и способы приема денег");

set_theme_mod_safe('ll_label_step3_subheader', "Выбрать будет из чего! Яндекс.Деньги, CloudPayments, PayPal и даже платежные квитанции :)");

set_theme_mod_safe('ll_label_step3_link1_url', "#");

set_theme_mod_safe('ll_label_step3_link1_title', "Подключаем платежную систему");

set_theme_mod_safe('ll_label_step4_header', "Настрой кампанию");

set_theme_mod_safe('ll_label_step4_subheader', "Введите свои реквизиты, отредактируйте шаблоны писем рассылки, обязательные документы: оферту и соглашение о персональных данных");

set_theme_mod_safe('ll_label_step4_link1_url', "#");

set_theme_mod_safe('ll_label_step4_link1_title', "Два типа кампании");

set_theme_mod_safe('ll_label_step4_link2_url', "#");

set_theme_mod_safe('ll_label_step4_link2_title', "Настройка аналитики");

set_theme_mod_safe('ll_label_step4_link3_url', "#");

set_theme_mod_safe('ll_label_step4_link3_title', "Изменение шаблона");

set_theme_mod_safe('ll_label_step5_header', "Выстраивай взаимоотношения с Донорами");

set_theme_mod_safe('ll_label_step5_subheader', "Выбрать будет из чего! Яндекс.Деньги, CloudPayments, PayPal и даже платежные квитанции :)");

set_theme_mod_safe('ll_label_step5_link1_url', "#");

set_theme_mod_safe('ll_label_step5_link1_title', "Личный кабинет");

set_theme_mod_safe('ll_label_step5_link2_url', "#");

set_theme_mod_safe('ll_label_step5_link2_title', "Работа с донорами");

set_theme_mod_safe('ll_label_congrats', "Поздравляем! Вы можете собирать пожертвования!");

// news
set_theme_mod_safe('ll_label_news_header', "Новости Лейки");

set_theme_mod_safe('ll_label_news_be_informed', "Узнавай об обновлениях Лейки:");

set_theme_mod_safe('ll_label_news_channel1_url', "#");

set_theme_mod_safe('ll_label_news_channel1_title', "RSS");

set_theme_mod_safe('ll_label_news_channel2_url', "#");

set_theme_mod_safe('ll_label_news_channel2_title', "Подписка");

set_theme_mod_safe('ll_label_news_channel3_url', "https://t.me/leykadev");

set_theme_mod_safe('ll_label_news_channel3_title', "Чат разработчиков");

set_theme_mod_safe('ll_label_fundraising_advices_header', 'Советы фандрайзинга');

// stats
set_theme_mod_safe('ll_label_stats_data1_value', "1000+");

set_theme_mod_safe('ll_label_stats_data1_label', "установок");

set_theme_mod_safe('ll_label_stats_data2_value', "240");

set_theme_mod_safe('ll_label_stats_data2_label', "НКО");

set_theme_mod_safe('ll_label_stats_data3_value', "120<sup>млн.руб.</sup>");

set_theme_mod_safe('ll_label_stats_data3_label', "собрано в 2018 г.");

set_theme_mod_safe('ll_label_stats_data4_value', "350 000");

set_theme_mod_safe('ll_label_stats_data4_label', "платежей с помощью Лейки");

set_theme_mod_safe('ll_label_', "");

// footer
set_theme_mod_safe('ll_label_footer_menu_title1', "Лейка");
set_theme_mod_safe('ll_label_footer_menu_title2', "Помощь");
set_theme_mod_safe('ll_label_footer_created_by', "Лейка создана Теплицей социальных технологий");
set_theme_mod_safe('ll_label_footer_created_by_explanation', "Мы развиваем сотрудничество между некоммерческим сектором и IT-специалистами");
set_theme_mod_safe('ll_label_footer_licence', "Все материалы доступны по лицензии Creative Commons СС-BY-SA 3.0");

?>


<?php echo get_theme_mod('');?>
<?php echo get_theme_mod('');?>
<?php echo get_theme_mod('');?>
<?php echo get_theme_mod('');?>
<?php echo get_theme_mod('');?>
<?php echo get_theme_mod('');?>
<?php echo get_theme_mod('');?>
<?php echo get_theme_mod('');?>
<?php echo get_theme_mod('');?>
<?php echo get_theme_mod('');?>
<?php echo get_theme_mod('');?>
<?php echo get_theme_mod('');?>
<?php echo get_theme_mod('');?>
<?php echo get_theme_mod('');?>
<?php echo get_theme_mod('');?>
<?php echo get_theme_mod('');?>
<?php echo get_theme_mod('');?>
<?php echo get_theme_mod('');?>
<?php echo get_theme_mod('');?>
<?php echo get_theme_mod('');?>
<?php echo get_theme_mod('');?>
<?php echo get_theme_mod('');?>
<?php echo get_theme_mod('');?>
<?php echo get_theme_mod('');?>
<?php echo get_theme_mod('');?>
<?php echo get_theme_mod('');?>
<?php echo get_theme_mod('');?>
<?php echo get_theme_mod('');?>
<?php echo get_theme_mod('');?>
<?php echo get_theme_mod('');?>