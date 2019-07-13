<?php

/**
 *
 * Die Oog Website Custom Functionality
 *
 */

class DieOog {

	public static $theme_dir;
	public static $version;

	public function __construct() {
		
		self::$theme_dir = get_stylesheet_directory_uri();
		self::$version   = '1.1.4';

		$this->register_activation_hooks();

	}

	public static function is_development() {

		if ( in_array($_SERVER['REMOTE_ADDR'], array('127.0.0.1', '::1')) ) {
			return true;
		}

	}

	function register_activation_hooks() {

		add_action( 'wp_enqueue_scripts', [$this, 'theme_enqueue_styles' ] );
		add_action( 'after_setup_theme', [$this, 'avada_lang_setup' ] );

	}

	function theme_enqueue_styles() {

	    wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array( 'avada-stylesheet' ) );

	    // ###########
		// DEVELOPMENT
		// ###########

	    if ($this->is_development()) : 

	    	// Main CSS Files
	    	wp_enqueue_style( 'die-oog', self::$theme_dir . '/src/css/die-oog.css');

	    	// Main JS Files
		  	wp_enqueue_script('die-oog', self::$theme_dir . '/src/js/die-oog.js', array('jquery'), null, true);

	  	else :

	    // ##########
	    // PRODUCTION
	  	// ##########

	  		// Main CSS File
	  		wp_enqueue_style( 'die-oog', self::$theme_dir . '/dist/css/die-oog.min.css', array(), self::$version, 'screen');

	    	// Main JS Files
	    	wp_enqueue_script( 'die-oog', self::$theme_dir . '/dist/js/die-oog.min.js', array('jquery'), self::$version, true );
	    	
	    endif;

	}

	function avada_lang_setup() {

		$lang = get_stylesheet_directory() . '/languages';
		load_child_theme_textdomain( 'Avada', $lang );
	}

}

new DieOog();


if (class_exists('WooCommerce')) {
	require('class-woocommerce-helpers.php');
}