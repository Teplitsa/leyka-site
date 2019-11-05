<?php /** The default procedure of Donor Metadata Cache total refresh. */

require_once 'common.php';

if( !defined('WPINC') ) die;

ini_set('max_execution_time', 0);
set_time_limit(0);
ini_set('memory_limit', 268435456); // 256 Mb, just in case

// add categories
$categories = array(
    array('slug' => 'leyka-basics', 'name' => "Основа Лейки", 'meta' => array(LL_Docs_Service::$term_meta_order => 1),),
    array('slug' => 'payment-systems', 'name' => "Платежные системы", 'meta' => array(LL_Docs_Service::$term_meta_order => 3),),
    array('slug' => 'star-template', 'name' => "Шаблон «Стар»", 'meta' => array(LL_Docs_Service::$term_meta_order => 4),),
    array('slug' => 'setup-campaign', 'name' => "Настройка кампании", 'meta' => array(LL_Docs_Service::$term_meta_order => 2),),
);
LL_Setup_Utils::setup_terms_data($categories, LL_Docs_Service::$category_tax);

$tags = array(
    array('slug' => 'vedenie-kampanij', 'name' => 'ведение кампаний'),
    array('slug' => 'nastrojka', 'name' => 'настройка'),
    array('slug' => 'nachalo-raboty', 'name' => 'начало работы'),
    array('slug' => 'sovmestimost', 'name' => 'совместимость'),
    array('slug' => '5-shagov-po-nastrojke', 'name' => '5 шагов по настройке'),
    array('slug' => 'platezhnye-sistemy', 'name' => 'Платежные системы'),
    array('slug' => 'yandeks-dengi', 'name' => 'Яндекс.Деньги'),
    array('slug' => '', 'name' => ''),
    array('slug' => '', 'name' => ''),
);
LL_Setup_Utils::setup_terms_data($categories, 'post_tag');

$post_data_list = array(
    array(
        'post_title' => 'Системные требования', 
        'post_name' => 'sistemnye-trebovaniya',
        'post_content' => '<ul>
 	<li>PHP версии не ниже 5.3 (тестировалось вплоть до версии 5.4).</li>
 	<li>MySQL версии не ниже 5.</li>
 	<li>WordPress не ниже версии 3.6.1 (тестировалось вплоть до текущей официальной версии).</li>
</ul>
<strong>На WordPress более ранних версий или мультисайт плагин не тестировался и его работоспособность не подтверждена!</strong>
<h4>Поддерживаемые платежные системы</h4>
Лейка поддерживает следующие платежные системы-агрегаторы (список пополняется)
<ul>
 	<li><strong>CloudPayments</strong> - <strong><a href="http://cloudpayments.ru/" target="_blank" rel="noopener">cloudpayments.ru</a></strong></li>
 	<li><strong>Яндекс.Касса - <a href="https://money.yandex.ru/new" target="_blank" rel="noopener">kassa.yandex.ru</a></strong></li>
 	<li><strong>QIWI - <a href="http://kassa.qiwi.com/pay/" target="_blank" rel="noopener">kassa.qiwi.com/pay/</a></strong></li>
 	<li><strong>PayPal - <a href="https://www.paypal.com/" target="_blank" rel="noopener">paypal.com</a></strong></li>
 	<li><strong>MIXPLAT - <a href="http://mixplat.ru/" target="_blank" rel="noopener">mixplat.ru</a></strong></li>
 	<li><strong>Chronopay</strong> - <strong><a href="http://www.chronopay.com/ru/" target="_blank" rel="noopener">chronopay.com</a></strong></li>
 	<li><strong>RBK Money - <a href="http://www.rbkmoney.com/ru" target="_blank" rel="noopener">rbkmoney.com/ru</a></strong></li>
 	<li><strong>Webmoney - <a href="http://www.webmoney.ru/" target="_blank" rel="noopener">webmoney.ru</a></strong></li>
 	<li><strong>ROBOKASSA</strong> -  <strong><a href="https://www.robokassa.ru/">robokassa.ru</a></strong></li>
 	<li><strong>Печать банковской квитанции</strong></li>
 	<li><strong>SMS-платежи через стороннего провайдера</strong></li>
</ul>',
        'tax_terms' => array(
            LL_Docs_Service::$category_tax => array('leyka-basics'),
            'post_tag' => array('nastrojka', 'nachalo-raboty', 'sovmestimost'),
        ),
    ),
    array(
        'post_title' => 'Создание кампании',
        'post_name' => 'sozdanie-kampanii',
        'post_content' => 'Для того, чтобы создать новую кампанию, вам необходимо найти в левом меню административной панели «WordPress» название плагина, нажать на него и выбрать пункт "новая кампания".

<em>Страница новой кампании:</em>

<a href="http://leyka.te-st.ru/wp-content/uploads/2014/01/Redaktirovat-kampaniyu-Onlajn-lejka-WordPress-plagin-dlya-kraudfandinga-i-sbora-pozhertvovanij-v-Seti-WordPress.png" data-imagelightbox="gallery-901"><img class="alignnone wp-image-901 size-full" src="http://leyka.te-st.ru/wp-content/uploads/2014/01/Redaktirovat-kampaniyu-Onlajn-lejka-WordPress-plagin-dlya-kraudfandinga-i-sbora-pozhertvovanij-v-Seti-WordPress-e1435161194298.png" alt="Редактировать кампанию ‹ Онлайн лейка – WordPress плагин для краудфандинга и сбора пожертвований в Сети — WordPress" width="1177" height="2168" /></a>

Первое, что нам нужно сделать - это дать кампании название. Затем вносим текст в описание кампании, и переходим к настройкам.
<h3>Чем отличается "название кампании" от "заголовка кампании"?</h3>
Заголовок - это то, что указывается в поле "назначение пожертвования" у благотворительного платежа. Его примером может служить фразы "на штатную деятельность фонда" или "на операцию Маше Ивановой".

По умолчанию, заголовок будет совпадать с названием кампании, и вы можете не заполнять поле заголовка. Но их разделение может вам понадобиться, например, если вы захотите привлечь внимание к странице кампании необычным названием, которое не будет отражать цели пожертвования. В этом случае, цель пожертвования вписываем уже в "заголовок кампании", чтобы быть понятными платежной системе.

Далее, мы можем выбрать шаблон формы пожертвования. Шаблон, который будет использоваться по умолчанию, мы выбирали при <a title="Настройка Лейки" href="http://leyka.te-st.ru/nastrojka-lejki/">первичной настройке Лейки</a>. Если он по тем или иным причинам не устраивает, мы можем выбрать другой вариант. Разница между вариантами разъяснена на странице <a title="Настройка Лейки" href="http://leyka.te-st.ru/nastrojka-lejki/">Настройка Лейки</a>.

Далее мы видим пункт "Целевая сумма".

При заполнении цифрами этого пункта, в вашей кампании автоматически появляется такой "градусник".

<a href="http://leyka.te-st.ru/wp-content/uploads/2014/01/grad.png" data-imagelightbox="gallery-832"><img class="alignnone size-medium wp-image-832" src="http://leyka.te-st.ru/wp-content/uploads/2014/01/grad-640x69.png" alt="град" width="640" height="69" /></a>

Зеленая полоса будет приростать, как только на сайт удет поступать информация о новых пожертвованиях.

Далее можно видеть чекбокс "Кампания завершена, сбор пожертвований был прекращён". Галочку в этот чекбокс необходимо поставить, если вы набрали необходимую сумму и хотите закрыть кампанию.

<em>Если этот чекбокс отмечен, то, вместо формы пожертвования, на сайте вы увидите следующую надпись:</em>

<a class="fresco" href="http://leyka.te-st.ru/wp-content/uploads/2014/01/Novaya-kampaniya-Lejka-razrabotka.png"><img class="alignnone size-medium wp-image-386" src="http://leyka.te-st.ru/wp-content/uploads/2014/01/Novaya-kampaniya-Lejka-razrabotka-640x102.png" alt="Новая кампания   Лейка - разработка" width="640" height="102" data-id="386" /></a>

Также к кампании можно прикрепить картинку, которая будет ее символизировать и выделять в списке, если кампаний у вас будет несколько. Для этого нажмите на ссылку "задать миниатюру" в нижнем правом углу экрана и выберите подходящую картинку на жёстком диске компьютера.

После выполнения всех указанных настроек, мы можем сообщить сайту, что кампания готова к публикации. Для этого нажмите "опубликовать".

[symple_box color="green" text_align="left" width="100%" float="none"]
Обращаем ваше внимание на то, что созданная кампания не попадает в меню вашего сайта автоматически. Тип контента "кампания" ничем не отличается от таких стандартных типов, как записи и страницы. Поэтому она добавляется в меню точно также, как они - через административную панель, пункт меню "внешний вид", подпункт "меню".
[/symple_box]

Если вы не хотите создавать новую страницу, а прикрепить кампанию к уже существующей странице, вы можете воспользоваться кодом iframe.

<a href="http://leyka.te-st.ru/wp-content/uploads/2015/03/frejm.png" data-imagelightbox="gallery-824"><img class="alignnone size-medium wp-image-824" src="http://leyka.te-st.ru/wp-content/uploads/2015/03/frejm-640x301.png" alt="фрейм" width="640" height="301" /></a>Скопируйте его и вставьте в любом месте на уже созданной странице. Следите за тем, чтобы вы вставляли код в режиме "текст" (режим html-разметки).

Также теперь на странице кампании можно посмотреть список пожертвований и в случае необходимости ввести корректирующую сумму.',
        'tax_terms' => array(
            LL_Docs_Service::$category_tax => array('setup-campaign'),
            'post_tag' => array('vedenie-kampanij', 'nastrojka'),
        ),
    ),
    array(
        'post_title' => 'Настройка вкладки "Получатель пожертвований"',
        'post_name' => 'nastrojka-lejki',
        'post_content' => '<span style="font-size: 14px; line-height: 1.5em;">Установив плагин, мы приступаем непосредственно к его настройке. Для этого найдите в левом меню административной панели строку <strong>"лейка"</strong> и в открывшемся подменю выбрать <strong>"настройки"</strong>. Вы увидите список вкладок:</span>
<h5>Сейчас открыта первая вкладка, «Получатель пожертвований»</h5>
<img src="http://leyka.te-st.ru/wp-content/uploads/2014/01/Lejka-Nastrojki-Lejka-razrabotka-WordPress-640x714.png" alt="Лейка  Настройки ‹ Лейка - разработка — WordPress" width="640" height="714" data-id="336" />

[symple_box color="gray" text_align="left" width="100%" float="none"]
<strong> Внимание!</strong> Собирать пожертвования с помощью плагина «Лейка» могут только официально зарегистрированные некоммерческие организации, так как перед выполнением пожертвования пользователь обязан согласиться с договором оферты. Согласно современным правовым нормам РФ, отсутствие такого договора делает пожертвование незаконным.
[/symple_box]

Все данные, которые вы будете вводить в этом разделе, в дальнейшем будут автоматически отражены в реквизитах договора оферты.

Вам необходимо ввести название своей НКО, имя и должность официального представителя, обладающего правом подписи (чаще всего, это директор организации), официальный адрес и банковские реквизиты.

Нажмите "Сохранить"',
        'tax_terms' => array(
            LL_Docs_Service::$category_tax => array('leyka-basics'),
            'post_tag' => array('nastrojka', 'nachalo-raboty', '5-shagov-po-nastrojke'),
        ),
    ),
    array(
        'post_title' => 'Подключение Яндекс.Деньги для физических лиц',
        'post_name' => 'podklyuchenie-yandeks-dengi-dlya-fizicheskih-lits',
        'post_content' => 'Если при заполнении настроек "<a title="Настройка лейки: вкладка 2 «Платежные опции»" href="http://leyka.te-st.ru/nastrojka-lejki-vkladka-2-platezhnye-optsii/">Платежные опции</a>" вы выбрали пункт - Яндекс.Деньги, то внизу вы увидите следующий блок. <a class="fresco" href="http://leyka.te-st.ru/wp-content/uploads/2014/10/ya-k.png"><img class="alignnone size-medium wp-image-541" src="http://leyka.te-st.ru/wp-content/uploads/2014/10/ya-k-640x415.png" alt="ya-k" width="640" height="415" data-id="541" /></a>

<strong>Как видите, для настройки вам необходимо заполнить два параметра:</strong>
<ol>
	<li>Номер вашего счета в Яндекс.Деньги</li>
	<li>Секрет для проверки подлинности обратной связи</li>
</ol>
<h2> Как завести Яндекс.Кошелек:</h2>
<ol>
	<li><a href="https://money.yandex.ru/reg/">Зарегистрируйтесь в системе </a></li>
	<li>Введите код подтверждения, пришедший по смс на указанный вами номер в регистрации</li>
	<li>Зайдите в свой аккаунт и скопировать номер кошелька в левом верхнем углу.</li>
</ol>
<a class="fresco" href="http://leyka.te-st.ru/wp-content/uploads/2014/10/yand-kosh.png"><img class="alignnone size-medium wp-image-539" src="http://leyka.te-st.ru/wp-content/uploads/2014/10/yand-kosh-640x342.png" alt="yand-kosh" width="640" height="342" data-id="539" /></a>
<h2>Как узнать секрет для проверки подлинности обратной связи?</h2>
1) Не выходя из аккаунта, зайдите по ссылке <a href="https://sp-money.yandex.ru/myservices/online.xml">https://sp-money.yandex.ru/myservices/online.xml</a>

2) Нажмите на кнопку "Показать секрет"

3) Скопируйте открывшийся код <a class="fresco" href="http://leyka.te-st.ru/wp-content/uploads/2014/10/sekret.png"><img class="alignnone size-medium wp-image-546" src="http://leyka.te-st.ru/wp-content/uploads/2014/10/sekret-640x304.png" alt="sekret" width="640" height="304" data-id="546" /></a>

&nbsp;

Также вам необходимо вставить в окошко "http-уведомления" ссылку следующего вида http://your-site.org/leyka/service/yandex_phyz/response/, предварительно заменив "http://your-site.org/" на адрес вашего сайта.

[su_note note_color="#dddddc"]<strong>Внимание:</strong> деньги, полученные через Яндекс.Деньги для физических лиц не попадают автоматически на ваш расчетный счет. На сайте Яндекс <a href="https://money.yandex.ru/withdraw/">указаны способы</a>, с помощью которых можно снять деньги с Яндекс.Кошелька.

Если вы<strong> официально оформленная НКО</strong> и хотите полностью обезопасить себя от государственных проверок, выбирайте способ подключения - <a href="http://leyka.te-st.ru/yandex-dengi/">Яндекс.Деньги для юридических лиц</a>[/su_note]',
        'tax_terms' => array(
            LL_Docs_Service::$category_tax => array('payment-systems'),
            'post_tag' => array('nastrojka', 'platezhnye-sistemy', 'yandeks-dengi'),
        ),
    ),
//     array(
//         'post_title' => '',
//         'post_name' => '',
//         'post_content' => '',
//         'tax_terms' => array(
//             LL_Docs_Service::$category_tax => array(''),
//             'post_tag' => array(''),
//         ),
//     ),
);
LL_Setup_Utils::setup_posts_data($post_data_list, LL_Docs_Service::$post_type);

flush_rewrite_rules( true );

// page labels
ll_set_theme_mod_safe('ll_label_docs_page_title', "Документация");
ll_set_theme_mod_safe('ll_label_docs_page_super_title', "Помощь");

ll_set_theme_mod_safe('ll_label_docs_page_sidebar_useful_link1_title', "Git-репозиторий");
ll_set_theme_mod_safe('ll_label_docs_page_sidebar_useful_link1_url', "https://github.com/Teplitsa/leyka");

ll_set_theme_mod_safe('ll_label_docs_page_sidebar_useful_link2_title', "Чат разработчиков");
ll_set_theme_mod_safe('ll_label_docs_page_sidebar_useful_link2_url', "https://t.me/leykadev");

// search
ll_set_theme_mod_safe('ll_label_search_results', "Результаты поиска");

ll_set_theme_mod_safe('other_documents_set_title', "Другое");
