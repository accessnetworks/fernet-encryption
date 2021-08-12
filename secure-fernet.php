<?php
/*
Plugin Name: Secure with Fernet
Description: Secure data with Fernet.
Version: 1.0.0
Author: Access Networks.
Author URI: https://www.accessnetworks.com
*/

require_once 'includes/class-fernet.php';


/**
 * Undocumented function
 *
 * @return void
 */
function fernet() {
	$fernet = new Fernet( fernet_key() );
	return $fernet;
}

/**
 * Undocumented function
 *
 * @return void
 */
function fernet_key() {

	if ( ! defined( 'FERNET_KEY' ) ) {
		$key = substr( NONCE_SALT, 0, 44 );
		define( 'FERNET_KEY', $key );
	} else {
		$key = FERNET_KEY;
	}

	return $key;
}

/**
 * Undocumented function
 *
 * @param [type] $data
 * @return void
 */
function fernet_encode( $data ) {
	$fernet = fernet();
	return $fernet->encode( $data );
}

/**
 * Undocumented function
 *
 * @param [type] $token
 * @return void
 */
function fernet_decode( $token ) {
	$fernet = fernet();
	return $fernet->decode( $token );
}
