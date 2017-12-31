# Crypt

This is small lib to use symmetric cryptography with php.

## Installation

`composer require lefuturiste/crypt`

## Usage

Simple usage like this:

```php
$crypt = new Lefuturiste\Crypt\Crypt('YOUR_PASSWORD');
$cipher = $crypt->encrypt('YOUR DATA');
$plainText = $crypt->decrypt($cipher); //YOUR DATA
```

You can change the method in Crypt constructor : 

```php
$crypt = new Lefuturiste\Crypt\Crypt('YOUR_PASSWORD', 'AES-128-CFB1');
$cipher = $crypt->encrypt('YOUR DATA');
$plainText = $crypt->decrypt($cipher); //YOUR DATA
```

Get list of method available : http://php.net/manual/en/function.openssl-get-cipher-methods.php

## Tests

You can test the lib :

`vendor/bin/phpunit Tests`

## Contribution

This is my own usage, and this is very simple usage of cryptography. This is mostly for my personal usage. But you can reports bug, or others things, it's open source project!
You can contribute by pull request, the common method in GitHub.
