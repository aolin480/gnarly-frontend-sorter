<?php
/*
Plugin Name: Gnarly :: Frontend Sort
Version: 0.1-alpha
Description: A Gnarly Frontend Page Sort
Author: Aaron Olin
Author URI: http://www.aaronolin.com
Plugin URI: http://www.aaronolin.com
Text Domain: gnarly-sort
Domain Path: /languages
*/

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly


if( !class_exists( 'Gnarly_sort' ) ) :

	class Gnarly_sort {				
		
		protected static $_instance = null;

		function __construct(){
			
			define('GNARLY_PATH', trailingslashit( plugin_dir_path( __FILE__ ) ) );
			define('GNARLY_HTTP', trailingslashit( plugins_url( '/', __FILE__ ) ) );

			add_action( 'init', array( $this, 'check_gnarly_admin' ) );
			add_action( 'wp_enqueue_scripts', array( $this, 'gnarly_enqueue' ) );

			// ajax handling
			add_action( "wp_ajax_gnarly_sort", array( $this, 'gnarly_ajax_sort' ) );
			add_action( "wp_ajax_nopriv_gnarly_sort", array( $this, 'gnarly_ajax_sort' ) );		

		}		

		public static function instance() {
			if ( is_null( self::$_instance ) ) {
				self::$_instance = new self();
			}
			return self::$_instance;
		}

		public function check_gnarly_admin(){
			if( current_user_can( 'edit_posts' ) ) :				
				define('GNARLY_ADMIN', true);
			endif;
		}

		public function gnarly_ajax_sort(){
			
			$result = $_REQUEST;		

			$post_ids = $result['posts'];

			if ( isset( $result['gnarly_nonce'] ) || !wp_verify_nonce( $result['gnarly_nonce'], 'do_gnarly_sort' ) ) :
				
				foreach( $post_ids as $post_id ) :
					
					$order 	= $post_id['order'];
					$id 	= $post_id['id'];

					global $wpdb;
					$response['update'] = 					
						$wpdb->update(
							$wpdb->posts,
								array( 	'menu_order' => $order ),
								array( 	'ID'	=>	$id ),
									array(	'%d'),
									array( 	'%d' )

						);

				endforeach;
			
				// If update was successful return true to ajax call
				if( $response['update'] )
					$response['gnarly'] = true;				

			endif;

			echo json_encode( $response );

			exit();

		}

		public function gnarly_enqueue() { 

		    wp_enqueue_script('jquery');  
		    wp_enqueue_script('jquery-ui-core');
			wp_enqueue_script('jquery-ui-sortable');
			
			wp_register_script( 'gnarly-frontend-sort', GNARLY_HTTP . 'js/gnarly.frontend.sort.js', array( 'jquery', 'jquery-ui-core', 'jquery-ui-sortable' ), '', true ); 
			
			
			if( GNARLY_ADMIN ) :				
				wp_enqueue_script( 'gnarly-frontend-sort' );  				
				wp_localize_script( 'gnarly-frontend-sort', 'gnarly', 
					array( 
						'ajaxurl' => wp_nonce_url( admin_url( 'admin-ajax.php' ), 'do_gnarly_sort', 'gnarly_nonce' ) 
					) 
				);

			endif;

			/*
		    wp_register_script( 'add-bx-js', get_template_directory_uri() . '/jquery.bxslider/jquery.bxslider.min.js', array('jquery'),'',true  ); 
		    wp_register_script( 'add-bx-custom-js', get_template_directory_uri() . '/jquery.bxslider/custom.js', '', null,''  ); 
		    wp_register_style( 'add-bx-css', get_template_directory_uri() . '/jquery.bxslider/jquery.bxslider.css','','', 'screen' ); 
		    */
		    
		    /*
		    wp_enqueue_script( 'add-bx-js' );  
		    wp_enqueue_script( 'add-bx-custom-js' ); 
		    wp_enqueue_style( 'add-bx-css' ); 
		    */

		}

	}

endif; // eof: class exists

function gnarly_sort() {
	return Gnarly_sort::instance();
}

// Global for backwards compatibility.
$GLOBALS['gnarly_sort'] = gnarly_sort();
?>