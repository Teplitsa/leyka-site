<?php

// core
class LL_Prices_Service {
    
    function format_price($price) {
        $price = preg_replace("/\s*/", "", $price);
        return number_format((float)$price, 0, '.', ' ');
    }
    
} // class end

class LL_Prices_Hooks {
    
    public static function submit_order() {
        $submit_status = 'error';
        $message = 'll_message_order_submitted_error';
        $is_error = false;
        
        if(empty($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'll_submit_order')) {
            $is_error = true;
        }
        
        if(!$is_error) {
            $order_params = array(
                'fname' => sanitize_text_field($_POST['fname']),
                'sname' => sanitize_text_field($_POST['sname']),
                'email' => sanitize_email($_POST['email']),
                'org' => sanitize_text_field($_POST['org']),
                'price' => sanitize_text_field($_POST['price']),
            );
            
            $email_body = preg_replace_callback("/\{(\w*?)\}/", function($match) use ($order_params) {
                return !empty($order_params[$match[1]]) ? $order_params[$match[1]] : "";
            }, get_theme_mod('ll_message_order_submitted_email_body'));
            
            $email_subject = get_theme_mod('ll_message_order_submitted_email_subject');
            
            $email_to = get_option('admin_email');
            $extra_order_recipients = trim(get_theme_mod('ll_message_order_submitted_email_extra_recipients'));
            if($extra_order_recipients) {
                $email_to .= "," . $extra_order_recipients;
            }
            wp_mail($email_to, $email_subject, $email_body);

            $submit_status = 'success';
            $message = 'll_message_order_submitted_ok';
        }
        
        $post = ll_get_post('prices', 'page');
        $redirect_url = get_the_permalink($post);
        wp_redirect(add_query_arg( array('submit_status' => $submit_status, 'submit_message' => $message), $redirect_url));
    }
}

add_action('admin_post_ll_submit_order', 'LL_Prices_Hooks::submit_order');
add_action('admin_post_nopriv_ll_submit_order', 'LL_Prices_Hooks::submit_order');
