<?php /** The default procedure of Donor Metadata Cache total refresh. */

require_once 'common.php';

if( !defined('WPINC') ) die;

ini_set('max_execution_time', 0);
set_time_limit(0);
ini_set('memory_limit', 268435456); // 256 Mb, just in case

// add fitler tag
$fundraising_advices_tag = array('slug' => LL_FUNDRAIZING_ADVICES_SLUG, 'name' => "Советы фандрайзинга");
$term = get_term_by( 'slug', $fundraising_advices_tag['slug'], 'post_tag' );
if($term === false) {
    wp_insert_term( $fundraising_advices_tag['name'], 'post_tag', $fundraising_advices_tag );
}

$post_data_list = array(
    array(
        'post_title' => 'Дарья Кузнецова',
        'post_content' => 'Мы знаем, что нужно отправлять благодарности донору. Но ведь каждому не напишешь! А Лейка отправляет их автоматически. Это здорово экономит время.',
        'post_excerpt' => 'и.о. директора "Добрый город Петербург"',
    ),
    array(
        'post_title' => 'Анна Исаева',
        'post_content' => 'Здорово, что теперь Лейку теперь можно использовать даже если у меня сайт не на WordPress. Потому что переделывать его – это долгий и мучительный процесс.',
        'post_excerpt' => 'менеджер',
    ),
    array(
        'post_title' => 'Константин Гришин', 
        'post_content' => 'Мне очень нравится, что я могу использовать Лейку, хотя у меня нет юридического лица. Это удобно. Спасибо разработчикам.',
        'post_excerpt' => 'Блогер',
        'thumbnail_path' => '/data/testimonials/face1.jpg',
    ),
    array(
        'post_title' => 'Виктория Канароева',
        'post_content' => 'Нам очень нравится, что Лейка легко интегрируется с платежными системами. Всего лишь вводишь пару цифр из договора — и все работает. Замечательный продукт.',
        'post_excerpt' => 'Центр «Зеленая дверца»',
        'thumbnail_path' => '/data/testimonials/face2.jpg',
    ),
);

LL_Setup_Utils::setup_posts_data($post_data_list, LL_Testimonials_Service::$post_type);
