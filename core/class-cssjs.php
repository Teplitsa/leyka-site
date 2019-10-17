<?php /**
 * Class for CSSJS handling
 **/

if ( ! defined( 'WPINC' ) )
	die();

class LKL_CssJs {

	private static $_instance = null;
    
	private $manifest = null;

	private function __construct() {
		add_action( 'wp_enqueue_scripts', array( $this, 'load_styles' ), 30 );
		add_action( 'wp_enqueue_scripts', array( $this, 'load_scripts' ), 30 );
		
		add_action( 'admin_enqueue_scripts', array( $this, 'load_admin_scripts' ), 30 );
	}

	public static function get_instance() {
		
		// If the single instance hasn't been set, set it now.
		if ( ! self::$_instance ) {
			self::$_instance = new self();
		}
		
		return self::$_instance;
	}

	/** revisions **/
	private function get_manifest() {
		if ( null === $this->manifest ) {
			$manifest_path = get_template_directory() . '/assets/rev/rev-manifest.json';
			
			if ( file_exists( $manifest_path ) ) {
				$this->manifest = json_decode( file_get_contents( $manifest_path ), TRUE );
			} else {
				$this->manifest = array();
			}
		}
		
		return $this->manifest;
	}

	public function get_rev_filename( $filename ) {
		$manifest = $this->get_manifest();
		if ( array_key_exists( $filename, $manifest ) ) {
			return $manifest[$filename];
		}
		
		return $filename;
	}

	/* load css */
	function load_styles() {
		$url = get_template_directory_uri();
		$style_dependencies = array();
		
		// fonts
		wp_enqueue_style( 
			'lkl-fonts', 
			'//fonts.googleapis.com/css?family=Open+Sans:300,400,400italic,700,700italic|Roboto+Condensed:400,700&subset=latin,cyrillic', 
			$style_dependencies, 
			null );
		$style_dependencies[] = 'lkl-fonts';
		
		// design
		wp_enqueue_style( 
            'lkl-site', 
			$url . '/assets/rev/' . $this->get_rev_filename( 'bundle.css' ), 
			$style_dependencies, 
			null );
	}

	/* front */
	public function load_scripts() {
		$url = get_template_directory_uri();
		
		// jQuery
		$script_dependencies[] = 'jquery'; // adjust gulp if we want it in footer
		
		
		// front
		wp_enqueue_script( 
			'lkl-front', 
			$url . '/assets/rev/' . $this->get_rev_filename( 'bundle.js' ), 
			$script_dependencies, 
			null, 
			true );
		
		wp_localize_script( 'lkl-front', 'leykaSiteFrontend', array(
            'ajaxurl' => admin_url( 'admin-ajax.php' ),
            'lang' => array(
                'error' => esc_html__('Error!', 'lkl'),
            ),
        ));
	}

	/* admin styles - moved to news system also */
	public function load_admin_scripts() {
		$url = get_template_directory_uri();
		
		wp_enqueue_script( 
			'lkl-admin', 
			$url . '/assets/rev/' . $this->get_rev_filename( 'admin.js' ), 
			array( 'jquery' ), 
			null );
            
		wp_enqueue_style( 'lkl-admin', $url . '/assets/rev/' . $this->get_rev_filename( 'admin.css' ), array(), null );
	}

	
} // class

LKL_CssJs::get_instance();
