<?php /** The default procedure of Donor Metadata Cache total refresh. */

require_once 'common.php';

if( !defined('WPINC') ) die;

ini_set('max_execution_time', 0);
set_time_limit(0);
ini_set('memory_limit', 268435456); // 256 Mb, just in case

$itv_logo_id = TST_Import::get_instance()->maybe_import_local_file( get_template_directory() . "/data/logo/logo-itv.png" );
$itv_logo_url = wp_get_attachment_url($itv_logo_id);

$paseka_logo_id = TST_Import::get_instance()->maybe_import_local_file( get_template_directory() . "/data/logo/logo-paseka.png" );
$paseka_logo_url = wp_get_attachment_url($paseka_logo_id);

//page
$posts_data = array(
    array(
        'post_title' => 'it-волонтёр — неравнодушные помощники, готовые прийти на помощь',
        'post_name' => 'itv-paseka',
        'post_excerpt' => 'Лейка — это плагин для Wordpress’a. Но установить его не трудно и у нас есть подробная видео-инструкция',
        'post_content' => '<!-- wp:image {"id":'.$itv_logo_id.'} -->
<figure class="wp-block-image"><img src="'.$itv_logo_url.'" alt="" class="wp-image-'.$itv_logo_id.'"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph -->
<p>«IT-волонтёр» – это онлайн-платформа обмена знаниями и навыками в сфере информационных технологий, созданная для помощи некоммерческим проектам.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Мы верим, что в людях есть большой потенциал создания коллективного блага. Мы знаем, что если создать соответствующие инструменты, то люди смогут реализовывать этот потенциал с взаимной выгодой.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"project-link"} -->
<p class="project-link"><a rel="noreferrer noopener" aria-label="itv.te-st.ru (откроется в новой вкладке)" href="https://itv.te-st.ru/" target="_blank">itv.te-st.ru</a></p>
<!-- /wp:paragraph -->

<!-- wp:image {"id":'.$paseka_logo_id.'} -->
<figure class="wp-block-image"><img src="'.$paseka_logo_url.'" alt="" class="wp-image-'.$paseka_logo_id.'"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph -->
<p>«IT-волонтёр» – это онлайн-платформа обмена знаниями и навыками в сфере информационных технологий, созданная для помощи некоммерческим проектам.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Мы верим, что в людях есть большой потенциал создания коллективного блага. Мы знаем, что если создать соответствующие инструменты, то люди смогут реализовывать этот потенциал с взаимной выгодой.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"project-link"} -->
<p class="project-link"><a rel="noreferrer noopener" aria-label="paseka.te-st.ru (откроется в новой вкладке)" href="https://paseka.te-st.ru/" target="_blank">paseka.te-st.ru</a></p>
<!-- /wp:paragraph -->',
        'meta' => array('ll_page_super_title' => 'Помощь'),
    ),
);
LL_Setup_Utils::setup_posts_data($posts_data, 'page');
