# Fernet Encryption for WordPress
Secure data in WordPress with Fernet Encryption.


## Description

## Setup your Key

To setup your key, you need to add the following line to your wp-config file.

```define( 'FERNET_KEY', 'YOUR_FERNET_KEY' );```

If you choose not to setup your key, you will need to save a copy of the one provided upon activation of the plugin.

*IMPORTANT: Changing your WordPress salts will invalidate the default Fernet key provided.*
## How to Use

To encrypt data simply use `$token = fernet_encrypt( 'YOUR MESSAGE' )` in your code.

To decrypt the data simply use `fernet_decrypt( $token )` in your code.

You can also encrypt or decrypt using shortcodes:

```[fernet-encrypt]YOUR MESSAGE[/fernet-encrypt]```

```[fernet-decrypt]YOUR-FERNET-TOKEN[/fernet-decrypt]```

We have also added useful helper functions:

 * `fernet_get_post_meta`
 * `fernet_add_post_meta`
 * `fernet_update_post_meta`
 * `fernet_get_user_meta`
 * `fernet_add_user_meta`
 * `fernet_update_user_meta`
 * `fernet_add_option`
 * `fernet_get_option`
 * `fernet_update_option`

## Credits

- Illustrations provided by undraw.co
- Fernent PHP modified from Kelvin Mo - Fernet-PHP
