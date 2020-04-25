<?php

use Lefuturiste\Crypt\Crypt;
use PHPUnit\Framework\TestCase;

class CryptTest extends TestCase
{

	private $key = "KEY";
	private $toTest = "test";
	private $method = "AES-128-CBC";

	public function build()
	{
		return new Crypt($this->key, $this->method);
	}

	public function testCrypt()
	{
		$crypt = $this->build();
		$cipher = $crypt->encrypt($this->toTest);
		$plain = $crypt->decrypt($cipher);

		$this->assertEquals("TmlWeUptRnB5cGFLN29pRjJocENpUT09", $cipher);
		$this->assertEquals($this->toTest, $plain);
	}

	public function testCryptWithAES256OFB()
	{
		$this->method = 'AES-256-OFB';
		$crypt = $this->build();
		$cipher = $crypt->encrypt($this->toTest);
		$plain = $crypt->decrypt($cipher);

		$this->assertEquals("R0UzYnpnPT0=", $cipher);
		$this->assertEquals($this->toTest, $plain);
	}
}