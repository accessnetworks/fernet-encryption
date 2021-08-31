<?php
/**
 * Fernet Encryption for WordPress
 *
 * @package fernet-encryption
 */

/**
 * Plugin Name: Fernet Encryption
 * Plugin URI: https://accessnetworks.github.io/fernet-encryption/
 * Description: Secure WordPress data with Fernet Encryption.
 * Version: 1.0.2
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
	$key    = isset( $args['key'] ) ? $args['key'] : fernet_key();
	$fernet = fernet( $key );
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
	$key    = isset( $args['key'] ) ? $args['key'] : fernet_key();
	$ttl    = isset( $args['ttl'] ) ? abs( $args['ttl'] ) : null;
	$fernet = fernet( $key );
	return $fernet->decode( $token, $ttl );
}

/**
 * Fernet Encrypt Shortcode.
 * @param  [type] $atts Attributes for Shortcode.
 * @param  [type] $content Content.
 * @return $content.
 */
function fernet_encrypt_shortcode( $atts, $content = null ) {
	return fernet_encrypt( $content );
}
add_shortcode( 'fernet-encrypt', 'fernet_encrypt_shortcode' );


/**
 * Fernet Encrypt Shortcode.
 * @param  [type] $atts Attributes for Shortcode.
 * @param  [type] $content Content.
 * @return $content.
 */
function fernet_decrypt_shortcode( $atts, $content = null ) {
	return fernet_decrypt( $content );
}
add_shortcode( 'fernet-decrypt', 'fernet_decrypt_shortcode' );
