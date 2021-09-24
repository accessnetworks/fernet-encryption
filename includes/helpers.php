<?php
/**
 * Fernet Encryption Helper Functions.
 *
 * @package fernet-encryption
 */


 /**
  * Fernet Add Post Meta.
  * @param [type]  $post_id     [description]
  * @param [type]  $meta_key    [description]
  * @param [type]  $meta_value  [description]
  * @param boolean $unique      [description]
  */
 function fernet_add_post_meta( $post_id, $meta_key, $meta_value, $unique = false ) {
 	$meta_value = fernet_encrypt( $meta_value );
 	return add_post_meta( $post_id, $meta_key, $meta_value, $unique );
 }

 /**
  * Fernet Update Post Meta.
  * @param  [type] $post_id                  [description]
  * @param  [type] $meta_key                 [description]
  * @param  [type] $meta_value               [description]
  * @param  string $prev_value               [description]
  * @return [type]             [description]
  */
 function fernet_update_post_meta( $post_id, $meta_key, $meta_value, $prev_value = '' ) {
 	$meta_value = fernet_encrypt( $meta_value );
 	return update_post_meta( $post_id, $meta_key, $meta_value, $prev_value );
 }

 /**
  * Fernet Get Post Meta.
  * @param  [type]  $post_id               [description]
  * @param  string  $key                   [description]
  * @param  boolean $single                [description]
  * @return [type]           [description]
  */
 function fernet_get_post_meta( $post_id, $key = '', $single = false ) {

	 if( true === $single ) {
		 return fernet_decrypt( get_post_meta( $post_id, $key, $single ) );
	 }

	 if( false === $single ) {
		 $meta = get_post_meta( $post_id, $key, $single );
		 foreach( $meta as $meta_value ) {
			 $meta[] = fernet_decrypt( $meta_value );
		 }
		 return $meta;
	 }

 }

 /**
  * Fernet Add User Meta.
  * @param [type]  $user_id     [description]
  * @param [type]  $meta_key    [description]
  * @param [type]  $meta_value  [description]
  * @param boolean $unique      [description]
  */
 function fernet_add_user_meta( $user_id, $meta_key, $meta_value, $unique = false ) {
 	$meta_value = fernet_encrypt( $meta_value );
 	return add_user_meta( $user_id, $meta_key, $meta_value, $unique );
 }

 /**
  * Fernet Update User Meta.
  * @param  [type] $user_id                  [description]
  * @param  [type] $meta_key                 [description]
  * @param  [type] $meta_value               [description]
  * @param  string $prev_value               [description]
  * @return [type]             [description]
  */
 function fernet_update_user_meta( $user_id, $meta_key, $meta_value, $prev_value = '' ) {
 	$meta_value = fernet_encrypt( $meta_value );
 	return update_user_meta( $user_id, $meta_key, $meta_value, $prev_value );
 }

 /**
  * Fernet Get User Meta.
  * @param  [type]  $user_id               [description]
  * @param  string  $key                   [description]
  * @param  boolean $single                [description]
  * @return [type]           [description]
  */
 function fernet_get_user_meta( $user_id, $key = '', $single = false ) {

	if( true === $single ) {
		return fernet_decrypt( get_user_meta( $user_id, $key, $single ) );
	}

	if( false === $single ) {
		$meta = get_user_meta( $user_id, $key, $single );
		foreach( $meta as $meta_value ) {
			$meta[] = fernet_decrypt( $meta_value );
		}
		return $meta;
	}

 }

 /**
  * Fernet Add Option.
  * @param [type] $option      [description]
  * @param string $value       [description]
  * @param string $deprecated  [description]
  * @param string $autoload    [description]
  */
 function fernet_add_option( $option, $value = '', $deprecated = '', $autoload = 'yes' ) {
 	$value = fernet_encrypt( $value );
 	return add_option( $option, $value, $deprecated, $autoload );
 }

 /**
  * Fernet Update Option.
  * @param  [type] $option                 [description]
  * @param  [type] $value                  [description]
  * @param  [type] $autoload               [description]
  * @return [type]           [description]
  */
 function fernet_update_option( $option, $value, $autoload = null ) {
 	$value = fernet_encrypt( $value );
 	return update_option( $option, $value, $autoload );
 }

 /**
  * Fernet Get Option.
  * @param  [type]  $option                [description]
  * @param  boolean $default               [description]
  * @return [type]           [description]
  */
 function fernet_get_option( $option, $default = false ) {
 	$option_data = get_option( $option, $default );
 	return fernet_decrypt( $option_data );
 }
