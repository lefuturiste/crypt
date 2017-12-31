<?php

namespace Lefuturiste\Crypt;

/**
 * Class Crypt
 * @package Lefuturiste\Crypt
 *
 * A simple class to use symmetric cryptography with php
 */
class Crypt
{
	private $key;
	private $method;

	/**
	 * Crypt constructor.
	 *
	 * @param string $key The password of symmetric crypt
	 * @param string $method The method of crypt http://php.net/manual/en/function.openssl-get-cipher-methods.php
	 */
	public function __construct($key, $method = 'AES-128-CBC')
	{
		$this->key = $key;
		$this->method = $method;
		$this->iv = $this->getIv();
	}

	/**
	 * Encrypt string
	 *
	 * @param string $data
	 * @return string
	 */
	public function encrypt(string $data): string
	{
		$cipher = base64_encode(openssl_encrypt($data, $this->method, $this->key, $options = 0, $this->iv));

		return $cipher;
	}

	/**
	 * Get plain text of cipher
	 *
	 * @param $cipher
	 * @return string
	 */
	public function decrypt($cipher)
	{
		$data = openssl_decrypt(base64_decode($cipher), $this->method, $this->key, $options = 0, $this->iv);

		return $data;
	}

	/**
	 * Generate 16 bit from key Iv for crypt
	 *
	 * @return bool|string
	 */
	private function getIv()
	{
		return substr(hash('sha256', $this->key), 0, 16);
	}
}