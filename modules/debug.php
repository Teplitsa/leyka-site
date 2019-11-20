<?php

function ll_mailer_config(PHPMailer $mailer){
    $mailer->IsSMTP();
    $mailer->Host = "localhost";
    $mailer->Port = 25;
    $mailer->SMTPDebug = 2;
    $mailer->CharSet  = "utf-8";
}
add_action( 'phpmailer_init', 'll_mailer_config', 10, 1);

function ll_on_mail_error( $wp_error ) {
    echo "<pre>";
    print_r($wp_error);
    echo "</pre>";
}
add_action( 'wp_mail_failed', 'll_on_mail_error', 10, 1 );
