<?php
/**
 * Fernet Encryption for WordPress
 *
 * @package fernet-encryption
 */

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
 * @param array  $args Arguments.
 * @return string $data Encoded data.
 */
function fernet_encrypt( $data, $args = array() ) {
	$fernet = fernet();
	return $fernet->encode( $data );
}

/**
 * Fernet Decode.
 *
 * @param string $token Token to decode.
 * @param array  $args Arguments.
 * @return string $data Decoded data.
 */
function fernet_decrypt( string $token, $args = array() ) {
	$fernet = fernet();
	return $fernet->decode( $token );
}
