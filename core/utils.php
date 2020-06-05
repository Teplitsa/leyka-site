<?php 

function ll_get_post( $post_id, $post_type = 'post' ) {
    global $wpdb;
    $post = null;
    if ( preg_match( '/^\d+$/', $post_id ) ) {
        $post = get_post( $post_id, OBJECT );
    } else {
        $post_id = $wpdb->get_var(
            $wpdb->prepare(
                "SELECT ID FROM {$wpdb->posts} WHERE post_name = %s AND post_type = %s LIMIT 1 ",
                $post_id,
                $post_type ) );
        if ( $post_id ) {
            $post = get_post( $post_id, OBJECT );
        }
    }
    return $post;
}

function ll_set_theme_mod_safe($name, $val) {
    if(!get_theme_mod($name) || LL_FORCE_THEME_MOD_SETUP) {
        set_theme_mod($name, $val);
    }
}

class LL_Setup_Utils {
    
    public static function setup_posts_data($posts_data, $post_type='post') {
        $post_id_list = array();
        foreach($posts_data as $post_data) {
            $post_id = self::setup_post_data($post_data, $post_type);
            $post_id_list[] = $post_id;
        }
        
        return $post_id_list;
    }
    
    public static function setup_post_data($post_data, $post_type='post') {
        $post_data['post_type'] = $post_type;
        $post_data['post_status'] = 'publish';
        
        $post_name = empty($post_data['post_name']) ? sanitize_title($post_data['post_title']) : $post_data['post_name'];
        $exist_post = ll_get_post($post_name, $post_type);
        
        if($exist_post) {
            $post_data['ID'] = $exist_post->ID;
        }
        
        $post_id = wp_insert_post($post_data);
        
        if(!empty($post_data['meta'])) {
            foreach($post_data['meta'] as $k => $v) {
                update_post_meta($post_id, $k, $v);
            }
        }
        
        if(!empty($post_data['thumbnail_path'])) {
            $attachment_id = TST_Import::get_instance()->maybe_import_local_file( get_template_directory() . $post_data['thumbnail_path'] );
            echo get_template_directory() . $post_data['thumbnail_path'] . "\n";
            echo "attachment_id=$attachment_id\n";
            set_post_thumbnail($post_id, $attachment_id);
        }
        
        if(!empty($post_data['tax_terms'])) {
            foreach($post_data['tax_terms'] as $tax => $terms) {
                wp_set_object_terms( $post_id, $terms, $tax, true );
            }
        }
        
        return $post_id;
    }
    
    public static function setup_terms_data($terms_data, $tax) {
        foreach($terms_data as $category) {
            $term = get_term_by( 'slug', $category['slug'], $tax );
            if($term === false) {
                $term_id = wp_insert_term( $category['name'], $tax, $category );
            }
            else {
                $term_id = $term->term_id;
            }
            
            if(!empty($category['meta'])) {
                foreach($category['meta'] as $k => $v) {
                    update_term_meta($term_id, $k, $v);
                }
            }
        }
    }
    
}

class LL_Old_Content_Cleaner {
    public function clean_content($content) {
        $content = preg_replace("/font-weight:\s*400;/", "", $content);
        return $content;
    }
}

function leyka_get_teplycha_posts( $args = array() ) {
    $posts = false;

    $per_page = isset( $args['per_page'] ) ? $args['per_page'] : '10';
    $tags     = ( isset( $args['tags'] ) ? $args['tags'] : false );

    $posts_url = 'https://te-st.ru/wp-json/wp/v2/posts';

    $posts_args = array( 'timeout' => 120 );

    $query_args = array();
    if ( $per_page ) {
        $query_args['per_page'] = $per_page;
    }
    if ( $tags ) {
        $query_args['tags'] = $tags;
    }

    $url = add_query_arg( $query_args, $posts_url );

    $response = wp_remote_get( $url, $args );

    if( !is_wp_error( $response ) && $response['response']['code'] == 200 ) {

        $body  =  wp_remote_retrieve_body( $response );
        $posts = json_decode( $body );

    }

    return $posts;
}

function leyka_get_teplycha_post_tag( $tag_id = null ) {
    $tag = false;

    $tags_url = 'https://te-st.ru/wp-json/wp/v2/tags/';
    $tags_args = array( 'timeout' => 120 );

    if ( $tag_id ) {
        $tags_url = $tags_url . $tag_id;
        $response = wp_remote_get( $tags_url, $tags_args );
        if( !is_wp_error( $response ) && $response['response']['code'] == 200 ) {
            $body  =  wp_remote_retrieve_body( $response );
            $tag = json_decode( $body );
        }
    }

    return $tag;
}