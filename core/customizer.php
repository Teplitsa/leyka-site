<?php /** Customizer options **/

if ( ! defined( 'WPINC' ) )
	die();

function ll_customize_register( WP_Customize_Manager $wp_customize ) {
    
    $ll_customizer = new LL_Customizer($wp_customize);
    
    ll_customize_register_home_page_labels($wp_customize, $ll_customizer);
    ll_customize_register_prices_page_labels($wp_customize, $ll_customizer);
    
    //     $ll_customizer->add_label_setting( '', esc_html__( '', 'll' ), '',
    //         array( 'type' => 'textarea' ));
    
    //     $ll_customizer->add_label_setting( '', esc_html__( '', 'll' ), '' );
}
add_action( 'customize_register', 'll_customize_register', 15 );

function ll_customize_register_prices_page_labels($wp_customize, $ll_customizer) {
    
    $wp_customize->add_panel(
        'll_prices_page_labels',
        array(
            'priority' => 30,
            'capability' => 'edit_theme_options',
            'theme_supports' => '',
            'title' => esc_html__( 'Prices page labels', 'll' ) 
            
        ));
    
    // quick start
    $wp_customize->add_section(
        'll_common_prices_labels',
        array(
            'title' => esc_html__( 'Common labels', 'll' ),
            'capability' => 'edit_theme_options',
            'panel' => 'll_prices_page_labels'
        ));
    
    $ll_customizer->add_label_setting( 'll_label_quick_start_price_description', esc_html__( 'Best price description', 'll' ), 'll_common_prices_labels', array( 'type' => 'textarea' ) );

    $ll_customizer->add_label_setting( 'll_label_quick_start_price_currency', esc_html__( 'Best price currency', 'll' ), 'll_common_prices_labels' );
    
    $ll_customizer->add_label_setting( 'll_label_other_prices_description', esc_html__( 'Other prices description', 'll' ), 'll_common_prices_labels', array( 'type' => 'textarea' ) );
    
    $ll_customizer->add_label_setting( 'll_label_other_prices_currency', esc_html__( 'Other prices currency', 'll' ), 'll_common_prices_labels' );
    
    $ll_customizer->add_label_setting( 'll_label_quick_start_price_submit_caption', esc_html__( 'Submit button caption', 'll' ), 'll_common_prices_labels' );
    
    
    // quick start
    $wp_customize->add_section(
        'll_quick_start_price_labels',
        array(
            'title' => esc_html__( 'Quick start', 'll' ),
            'capability' => 'edit_theme_options',
            'panel' => 'll_prices_page_labels' 
        ));
            
    $ll_customizer->add_label_setting( 'll_label_quick_start_price_title', esc_html__( 'Title', 'll' ), 'll_quick_start_price_labels' );
    
    $ll_customizer->add_label_setting( 'll_label_quick_start_price_price', esc_html__( 'Price', 'll' ), 'll_quick_start_price_labels' );
    
    $ll_customizer->add_label_setting( 'll_label_quick_start_price_point1', esc_html__( 'Point 1', 'll' ), 'll_quick_start_price_labels' );
    
    $ll_customizer->add_label_setting( 'll_label_quick_start_price_point2', esc_html__( 'Point 2', 'll' ), 'll_quick_start_price_labels' );
    
    $ll_customizer->add_label_setting( 'll_label_quick_start_price_point3', esc_html__( 'Point 3', 'll' ), 'll_quick_start_price_labels' );
            

    // subscriptions
    $wp_customize->add_section(
        'll_price1_labels',
        array(
            'title' => esc_html__( 'Price1', 'll' ),
            'capability' => 'edit_theme_options',
            'panel' => 'll_prices_page_labels'
        ));
    
    $ll_customizer->add_label_setting( 'll_label_price1_title', esc_html__( 'Title', 'll' ), 'll_price1_labels' );
    
    $ll_customizer->add_label_setting( 'll_label_price1_price', esc_html__( 'Price', 'll' ), 'll_price1_labels' );
    
    $ll_customizer->add_label_setting( 'll_label_price1_point1', esc_html__( 'Point 1', 'll' ), 'll_price1_labels' );
    
    $ll_customizer->add_label_setting( 'll_label_price1_point2', esc_html__( 'Point 2', 'll' ), 'll_price1_labels' );
    
    $wp_customize->add_section(
        'll_price2_labels',
        array(
            'title' => esc_html__( 'Price2', 'll' ),
            'capability' => 'edit_theme_options',
            'panel' => 'll_prices_page_labels'
        ));
    
    $ll_customizer->add_label_setting( 'll_label_price2_title', esc_html__( 'Title', 'll' ), 'll_price2_labels' );
    
    $ll_customizer->add_label_setting( 'll_label_price2_price', esc_html__( 'Price', 'll' ), 'll_price2_labels' );
    
//     $ll_customizer->add_label_setting( 'll_label_price2_point1', esc_html__( 'Point 1', 'll' ), 'll_price2_labels' );
    
//     $ll_customizer->add_label_setting( 'll_label_price2_point2', esc_html__( 'Point 2', 'll' ), 'll_price2_labels' );

    $ll_customizer->add_label_setting( 'll_label_price2_point3', esc_html__( 'Extra Point 3', 'll' ), 'll_price2_labels' );
    
    $wp_customize->add_section(
        'll_price3_labels',
        array(
            'title' => esc_html__( 'Price3', 'll' ),
            'capability' => 'edit_theme_options',
            'panel' => 'll_prices_page_labels'
        ));
    
    $ll_customizer->add_label_setting( 'll_label_price3_title', esc_html__( 'Title', 'll' ), 'll_price3_labels' );
    
    $ll_customizer->add_label_setting( 'll_label_price3_price', esc_html__( 'Price', 'll' ), 'll_price3_labels' );
    
//     $ll_customizer->add_label_setting( 'll_label_price3_point1', esc_html__( 'Point 1', 'll' ), 'll_price3_labels' );
    
//     $ll_customizer->add_label_setting( 'll_label_price3_point2', esc_html__( 'Point 2', 'll' ), 'll_price3_labels' );
    
//     $ll_customizer->add_label_setting( 'll_label_price3_point3', esc_html__( 'Point 3', 'll' ), 'll_price3_labels' );
    
    $ll_customizer->add_label_setting( 'll_label_price3_point4', esc_html__( 'Extra Point 4', 'll' ), 'll_price3_labels' );
    
}

function ll_customize_register_home_page_labels($wp_customize, $ll_customizer) {
        
    // home page labels
	$wp_customize->add_panel( 
		'll_main_page_labels', 
		array( 
			'priority' => 25, 
			'capability' => 'edit_theme_options', 
			'theme_supports' => '', 
			'title' => esc_html__( 'Home page labels', 'll' ) ) );
	

	// common
	$wp_customize->add_section(
	    'll_common_labels',
	    array(
	        'title' => esc_html__( 'Common labels', 'll' ),
	        'capability' => 'edit_theme_options',
	        'panel' => 'll_main_page_labels' ) );
	    
	$ll_customizer->add_label_setting( 'll_label_install_leyka_caption', esc_html__( 'Install leyka button caption', 'll' ), 'll_common_labels' );
	
	$ll_customizer->add_label_setting( 'll_label_leyka_version', esc_html__( 'Leyka version label', 'll' ), 'll_common_labels' );
	
	$ll_customizer->add_label_setting( 'll_install_leyka_url', esc_html__( 'Leyka install URL', 'll' ), 'll_common_labels' );

	
	// intro
	$wp_customize->add_section( 
		'll_intro_labels', 
		array( 
			'title' => esc_html__( 'Intro', 'll' ), 
			'capability' => 'edit_theme_options', 
			'panel' => 'll_main_page_labels' ) );
	
	$ll_customizer->add_label_setting( 'll_label_intro_header', esc_html__( 'Main header', 'll' ), 'll_intro_labels', 
	    array( 'type' => 'textarea' ) );

	$ll_customizer->add_label_setting( 'll_label_intro_subheader', esc_html__( 'Subheader', 'll' ), 'll_intro_labels',
	    array( 'type' => 'textarea' ) );
	
	$ll_customizer->add_label_setting( 'll_label_intro_stats_header', esc_html__( 'Stats header', 'll' ), 'll_intro_labels' );

	$ll_customizer->add_label_setting( 'll_label_intro_stats_subheader', esc_html__( 'Stats subheader', 'll' ), 'll_intro_labels' );
	
	
	// testimonials
	$wp_customize->add_section(
	    'll_testimonials_labels',
	    array(
	        'title' => esc_html__( 'Testimonials', 'll' ),
	        'capability' => 'edit_theme_options',
	        'panel' => 'll_main_page_labels' ) );

    $ll_customizer->add_label_setting( 'll_label_testimonials_header', esc_html__( 'Header', 'll' ), 'll_testimonials_labels' );
	    
    $ll_customizer->add_label_setting( 'll_label_testimonials_subheader', esc_html__( 'Subheader', 'll' ), 'll_testimonials_labels',
        array( 'type' => 'textarea' ));
    
    $ll_customizer->add_label_setting( 'll_label_testimonials_installations_stats', esc_html__( 'Installations stats', 'll' ), 'll_testimonials_labels' );

    
    // feautures
    $wp_customize->add_section(
        'll_feautures_labels',
        array(
            'title' => esc_html__( 'Features', 'll' ),
            'capability' => 'edit_theme_options',
            'panel' => 'll_main_page_labels' ) );
        
    $ll_customizer->add_label_setting( 'll_label_feaures_freedom', esc_html__( 'Header', 'll' ), 'll_feautures_labels' );
    
    $ll_customizer->add_label_setting( 'll_label_feaures_customize_it', esc_html__( 'Subheader', 'll' ), 'll_feautures_labels',
        array( 'type' => 'textarea' ));
    
    $ll_customizer->add_label_setting( 'll_label_feaures_24pm', esc_html__( '24+ payment methods', 'll' ), 'll_feautures_labels' );
    $ll_customizer->add_label_setting( 'll_label_feaures_fizur', esc_html__( 'Legal entity or individual', 'll' ), 'll_feautures_labels' );
    $ll_customizer->add_label_setting( 'll_label_feaures_single_recur', esc_html__( 'Single and recurring', 'll' ), 'll_feautures_labels' );
    $ll_customizer->add_label_setting( 'll_label_feaures_donor_account', esc_html__( 'Donor account', 'll' ), 'll_feautures_labels' );
    $ll_customizer->add_label_setting( 'll_label_feaures_donations_reports', esc_html__( 'Donation reports', 'll' ), 'll_feautures_labels' );
    $ll_customizer->add_label_setting( 'll_label_feaures_all', esc_html__( 'All features', 'll' ), 'll_feautures_labels' );
    $ll_customizer->add_label_setting( 'll_all_fetures_url', esc_html__( 'All features URL', 'll' ), 'll_feautures_labels' );
    
    
    // quick start
    $wp_customize->add_section(
        'll_quick_start_labels',
        array(
            'title' => esc_html__( 'Quick start', 'll' ),
            'capability' => 'edit_theme_options',
            'panel' => 'll_main_page_labels' ) );
        
    $ll_customizer->add_label_setting( 'll_label_quick_start_needed', esc_html__( 'How to start quickly?', 'll' ), 'll_quick_start_labels',
        array( 'type' => 'textarea' ));
    
    $ll_customizer->add_label_setting( 'll_label_quick_start_know_how_to', esc_html__( 'Know how', 'll' ), 'll_quick_start_labels' );
    $ll_customizer->add_label_setting( 'll_quick_start_know_how_to_url', esc_html__( 'Know how URL', 'll' ), 'll_quick_start_labels' );
    
        

    // how it works steps
    $wp_customize->add_section(
        'll_hiw_labels',
        array(
            'title' => esc_html__( 'How to start', 'll' ),
            'capability' => 'edit_theme_options',
            'panel' => 'll_main_page_labels' ) );
        
    $ll_customizer->add_label_setting( 'll_label_hiw_how_it_works', esc_html__( 'How it works?', 'll' ), 'll_hiw_labels' );
    $ll_customizer->add_label_setting( 'll_label_hiw_30_minutes_enough', esc_html__( 'Install in 30 minutes', 'll' ), 'll_hiw_labels' );
    $ll_customizer->add_label_setting( 'll_label_hiw_no_programming_skills_required', esc_html__( 'No programming skills required', 'll' ), 'll_hiw_labels' );
    
    // step1
    $ll_customizer->add_label_setting( 'll_label_step1_header', esc_html__( 'Step 1 header', 'll' ), 'll_hiw_labels',
        array( 'type' => 'textarea' ));

    $ll_customizer->add_label_setting( 'll_label_step1_subheader', esc_html__( 'Step 1 subheader', 'll' ), 'll_hiw_labels',
        array( 'type' => 'textarea' ));
    
    $ll_customizer->add_label_setting( 'll_label_step1_link1_url', esc_html__( 'Step 1 link 1 URL', 'll' ), 'll_hiw_labels' );
    $ll_customizer->add_label_setting( 'll_label_step1_link1_title', esc_html__( 'Step 1 link 1 title', 'll' ), 'll_hiw_labels' );
    $ll_customizer->add_label_setting( 'll_label_step1_link2_url', esc_html__( 'Step 1 link 2 URL', 'll' ), 'll_hiw_labels' );
    $ll_customizer->add_label_setting( 'll_label_step1_link2_title', esc_html__( 'Step 1 link 2 title', 'll' ), 'll_hiw_labels' );
    
    // step2
    $ll_customizer->add_label_setting( 'll_label_step2_header', esc_html__( 'Step 2 header', 'll' ), 'll_hiw_labels',
        array( 'type' => 'textarea' ));
    
    $ll_customizer->add_label_setting( 'll_label_step2_subheader', esc_html__( 'Step 2 subheader', 'll' ), 'll_hiw_labels',
        array( 'type' => 'textarea' ));
    
    $ll_customizer->add_label_setting( 'll_label_step2_link1_url', esc_html__( 'Step 2 link 1 URL', 'll' ), 'll_hiw_labels' );
    $ll_customizer->add_label_setting( 'll_label_step2_link1_title', esc_html__( 'Step 2 link 1 title', 'll' ), 'll_hiw_labels' );
    
    // step4
    $ll_customizer->add_label_setting( 'll_label_step3_header', esc_html__( 'Step 3 header', 'll' ), 'll_hiw_labels',
        array( 'type' => 'textarea' ));
    
    $ll_customizer->add_label_setting( 'll_label_step3_subheader', esc_html__( 'Step 3 subheader', 'll' ), 'll_hiw_labels',
        array( 'type' => 'textarea' ));
    
    $ll_customizer->add_label_setting( 'll_label_step3_link1_url', esc_html__( 'Step 3 link 1 URL', 'll' ), 'll_hiw_labels' );
    $ll_customizer->add_label_setting( 'll_label_step3_link1_title', esc_html__( 'Step 3 link 1 title', 'll' ), 'll_hiw_labels' );
    
    // step4
    $ll_customizer->add_label_setting( 'll_label_step4_header', esc_html__( 'Step 4 header', 'll' ), 'll_hiw_labels',
        array( 'type' => 'textarea' ));
    
    $ll_customizer->add_label_setting( 'll_label_step4_subheader', esc_html__( 'Step 4 subheader', 'll' ), 'll_hiw_labels',
        array( 'type' => 'textarea' ));
    
    $ll_customizer->add_label_setting( 'll_label_step4_link1_url', esc_html__( 'Step 4 link 1 URL', 'll' ), 'll_hiw_labels' );
    $ll_customizer->add_label_setting( 'll_label_step4_link1_title', esc_html__( 'Step 4 link 1 title', 'll' ), 'll_hiw_labels' );
    $ll_customizer->add_label_setting( 'll_label_step4_link2_url', esc_html__( 'Step 4 link 2 URL', 'll' ), 'll_hiw_labels' );
    $ll_customizer->add_label_setting( 'll_label_step4_link2_title', esc_html__( 'Step 4 link 2 title', 'll' ), 'll_hiw_labels' );
    $ll_customizer->add_label_setting( 'll_label_step4_link3_url', esc_html__( 'Step 4 link 3 URL', 'll' ), 'll_hiw_labels' );
    $ll_customizer->add_label_setting( 'll_label_step4_link3_title', esc_html__( 'Step 4 link 3 title', 'll' ), 'll_hiw_labels' );
    
    // step5
    $ll_customizer->add_label_setting( 'll_label_step5_header', esc_html__( 'Step 5 header', 'll' ), 'll_hiw_labels',
        array( 'type' => 'textarea' ));
    
    $ll_customizer->add_label_setting( 'll_label_step5_subheader', esc_html__( 'Step 5 subheader', 'll' ), 'll_hiw_labels',
        array( 'type' => 'textarea' ));
    
    $ll_customizer->add_label_setting( 'll_label_step5_link1_url', esc_html__( 'Step 5 link 1 URL', 'll' ), 'll_hiw_labels' );
    $ll_customizer->add_label_setting( 'll_label_step5_link1_title', esc_html__( 'Step 5 link 1 title', 'll' ), 'll_hiw_labels' );
    $ll_customizer->add_label_setting( 'll_label_step5_link2_url', esc_html__( 'Step 5 link 2 URL', 'll' ), 'll_hiw_labels' );
    $ll_customizer->add_label_setting( 'll_label_step5_link2_title', esc_html__( 'Step 5 link 2 title', 'll' ), 'll_hiw_labels' );
    
    $ll_customizer->add_label_setting( 'll_label_congrats', esc_html__( 'Congratulations', 'll' ), 'll_hiw_labels',
        array( 'type' => 'textarea' ));

    
    // news
    $wp_customize->add_section(
        'll_news_labels',
        array(
            'title' => esc_html__( 'News', 'll' ),
            'capability' => 'edit_theme_options',
            'panel' => 'll_main_page_labels' ) );
        
    $ll_customizer->add_label_setting( 'll_label_news_header', esc_html__( 'News header', 'll' ), 'll_news_labels' );
    $ll_customizer->add_label_setting( 'll_label_news_be_informed', esc_html__( 'Be informed', 'll' ), 'll_news_labels' );
    $ll_customizer->add_label_setting( 'll_label_news_channel1_url', esc_html__( 'Channel 1 URL', 'll' ), 'll_news_labels' );
    $ll_customizer->add_label_setting( 'll_label_news_channel1_title', esc_html__( 'Channel 1 title', 'll' ), 'll_news_labels' );
    $ll_customizer->add_label_setting( 'll_label_news_channel2_url', esc_html__( 'Channel 2 URL', 'll' ), 'll_news_labels' );
    $ll_customizer->add_label_setting( 'll_label_news_channel2_title', esc_html__( 'Channel 2 title', 'll' ), 'll_news_labels' );
    $ll_customizer->add_label_setting( 'll_label_news_channel3_url', esc_html__( 'Channel 3 URL', 'll' ), 'll_news_labels' );
    $ll_customizer->add_label_setting( 'll_label_news_channel3_title', esc_html__( 'Channel 3 title', 'll' ), 'll_news_labels' );
    $ll_customizer->add_label_setting( 'll_label_fundraising_advices_header', esc_html__( 'Fundraising advices header', 'll' ), 'll_news_labels' );
    
    
    // stats
    $wp_customize->add_section(
        'll_stats_labels',
        array(
            'title' => esc_html__( 'Stats', 'll' ),
            'capability' => 'edit_theme_options',
            'panel' => 'll_main_page_labels' ) );

    $ll_customizer->add_label_setting( 'll_label_stats_data1_value', esc_html__( 'Data 1 value', 'll' ), 'll_stats_labels' );
    $ll_customizer->add_label_setting( 'll_label_stats_data1_label', esc_html__( 'Data 1 label', 'll' ), 'll_stats_labels' );
    $ll_customizer->add_label_setting( 'll_label_stats_data2_value', esc_html__( 'Data 2 value', 'll' ), 'll_stats_labels' );
    $ll_customizer->add_label_setting( 'll_label_stats_data2_label', esc_html__( 'Data 2 label', 'll' ), 'll_stats_labels' );
    $ll_customizer->add_label_setting( 'll_label_stats_data3_value', esc_html__( 'Data 3 value', 'll' ), 'll_stats_labels' );
    $ll_customizer->add_label_setting( 'll_label_stats_data3_label', esc_html__( 'Data 3 label', 'll' ), 'll_stats_labels' );
    $ll_customizer->add_label_setting( 'll_label_stats_data4_value', esc_html__( 'Data 4 value', 'll' ), 'll_stats_labels' );
    $ll_customizer->add_label_setting( 'll_label_stats_data4_label', esc_html__( 'Data 4 label', 'll' ), 'll_stats_labels' );

    // footer
    $wp_customize->add_section(
        'll_footer_labels',
        array(
            'title' => esc_html__( 'Footer', 'll' ),
            'capability' => 'edit_theme_options',
            'panel' => 'll_main_page_labels' ) );

    $ll_customizer->add_label_setting( 'll_label_footer_menu_title1', esc_html__( 'Menu title 1', 'll' ), 'll_footer_labels' );
    $ll_customizer->add_label_setting( 'll_label_footer_menu_title2', esc_html__( 'Menu title 2', 'll' ), 'll_footer_labels' );
    $ll_customizer->add_label_setting( 'll_label_footer_created_by', esc_html__( 'Created by', 'll' ), 'll_footer_labels' );
    
    $ll_customizer->add_label_setting( 'll_label_footer_created_by_explanation', esc_html__( 'Created by explanation', 'll' ), 'll_footer_labels',
        array( 'type' => 'textarea' ));

    $ll_customizer->add_label_setting( 'll_label_footer_licence', esc_html__( 'Licence', 'll' ), 'll_footer_labels',
        array( 'type' => 'textarea' ));

}

class LL_Customizer {
    protected $wp_customize;
    
    public function __construct($wp_customize) {
        $this->wp_customize = $wp_customize;
    }
    
    public function add_label_setting($id, $label, $section, $options = array(), $priority = NULL) {
        
        $control_options = array(
            'type' => 'text',
            'label' => $label,
            'section' => $section,
            'settings' => $id,
        );
        
        if(isset($options['type'])) {
            $control_options['type'] = $options['type'];
            unset($options['type']);
        }
        
        $this->wp_customize->add_setting($id, $options);
        
        if($priority) {
            $control_options['priority'] = $priority;
        }
        
        $this->wp_customize->add_control($id, $control_options);
    }
}