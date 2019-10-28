#!/bin/sh

wp --skip-plugins --skip-themes theme activate leyka-landing

php ./setup/options.php
php ./setup/main-page-labels.php
php ./setup/capabilities.php
php ./setup/docs.php
php ./setup/faq.php
php ./setup/itv-paseka.php
php ./setup/news.php
php ./setup/orgs.php
php ./setup/pages.php
php ./setup/prices-page.php
php ./setup/steps.php
php ./setup/testimonials.php
php ./setup/menu.php