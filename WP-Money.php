<?php

/**
 * Plugin Name: WP Money
 * Description: Track money with WordPress
 * Version: 0.1-alpha
 */
define( 'WP_MONEY_DIR', dirname( __FILE__ ) . '/' );
define( 'WP_MONEY_LIB', WP_MONEY_DIR . 'lib/' );
define( 'WP_MONEY_VAR', WP_MONEY_DIR . 'var/' );

if( function_exists( 'spl_autoload_register' ) ) {

	function _wp_money_autoloader( $name ) {
		static $files = null;
		if( null === $files ) {
			include( WP_MONEY_VAR . 'files.php' );
			$files = $file_list;
		}
		if( is_array( $files ) && in_array( $name, $files['lib'] ) )
			require( WP_MONEY_LIB . $name . '.php' );
	}

	spl_autoload_register( '_wp_money_autoloader' );
} else {
	include( WP_MONEY_VAR . 'files.php' );
	foreach( $files_list as $wpm_file_type )
		foreach( $wpm_file_type as $wpm_dir => $wpm_file )
			require( WP_MONEY_DIR . "$wpm_dir/$wpm_file.php" );
	unset( $files_list, $wpm_file_type, $wpm_dir, $wpm_file );
}

WP_Money::init();
