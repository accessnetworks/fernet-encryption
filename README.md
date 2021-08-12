# Fernet Encryption for WordPress
Secure data in WordPress with Fernet.


## Description

## Setup your Key

To setup your key, you need to add the following line to your wp-config file.

```define( 'FERNET_KEY', 'YOUR_FERNET_KEY' );```

## How to Use

To encrypt data simply use `$token = fernet_encrypt( 'YOUR MESSAGE' )` in your code.

To decrypt the data simply use `fernet_decrypt( $token )` in your code.
