=== Fernet Encryption ===
Contributors: bhubbard, accessnetworks
Donate link: https://accessnetworks.com
Tags: fernet, encryption
Requires at least: 4.5
Tested up to: 5.8
Requires PHP: 7.0
Stable tag: 1.0.2
License: GPLv3 or later
License URI: https://www.gnu.org/licenses/gpl-3.0.html

Fernet Encryption is a plugin that can be used to encrypt and decrypt data in WordPress using fernet.

== Description ==

Fernet Encryption is a plugin that can be used to encrypt and decrypt data in WordPress using fernet.

=== Setup your Key ===

To setup your key, you need to add the following line to your wp-config file.

```define( 'FERNET_KEY', 'YOUR_FERNET_KEY' );```

=== How to Use ===

To encrypt data simply use `$token = fernet_encrypt( 'YOUR MESSAGE' )` in your code.

To decrypt the data simply use `fernet_decrypt( $token )` in your code.


== Changelog ==

= 1.0.2 =
* Updated Readme.
* Provided shortcodes for encrypting and decrypting.

= 1.0.0 =
* First release.
