<?php

abstract class JPB_Options {

	protected static $__option_name = null;

	public final static function set() {
		$val = get_option( self::$__option_name, false );
		if( false === $val )
			return false;
		if( is_object( $val ) )
			$val = get_object_vars( $val );
		if( is_array( $val ) ) {
			foreach( $val as $key => $value ) {
				// @todo: assign values, etc.
			}
		}
	}

}
