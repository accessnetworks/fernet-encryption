<?php
/**
 * Plugin Name: Fernet Encryption
 * Plugin URI: https://www.accessnetworks.com
 * Description: Secure WordPress data with Fernet Encryption.
 * Version: 1.0.0
 * Author: Access Networks
 * Author URI: https://www.accessnetworks.com
 * Text Domain: fernet-encryption
 * Domain Path: /i18n/languages/
 * Requires at least: 5.5
 * Requires PHP: 7.0
 */

// Include Fernet Encryption Class.
require_once 'includes/class-fernet.php';

/**
 * Init Fernet.
 */
function fernet() {

	$fernet = new Fernet( fernet_key() );
	return $fernet;
}

/**
 * Fernet Key
 *
 * @return string $key Key used for encryption.
 */
function fernet_key() {

	if ( ! defined( 'FERNET_KEY' ) ) {
		$key = substr( NONCE_SALT, 0, 32 );
		define( 'FERNET_KEY', $key );
	} else {
		$key = FERNET_KEY;
	}

	return $key;
}

/**
 * Fernet Encode.
 *
 * @param [type] $data Data to be encoded.
 * @return string $data Encoded data.
 * @return array $args Arguments.
 */
function fernet_encode( $data, $args = array() ) {
	$fernet = fernet();
	return $fernet->encode( $data );
}

/**
 * Fernet Decode.
 *
 * @param [type] $token Token to decode.
 * @return string $data Decoded data.
 * @return array $args Arguments.
 */
function fernet_decode( $token, $args = array() ) {
	$fernet = fernet();
	return $fernet->decode( $token );
}

add_action( 'wp_head', 'test' );
function test() {

	$token = fernet_encode( 'XOFRXLajAYVQJNNq' );
	echo $token . '<br>';
	$blah = fernet_decode( $token );
	echo $blah;

}
