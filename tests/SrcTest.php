<?php
declare(strict_types = 1);

use PHPUnit\Framework\TestCase;
use Xutengx\Contracts\Session\Driver;
use Xutengx\Session\Driver\{File, Redis};
use Xutengx\Session\Session;
use Xutengx\Tool\Tool;

final class SrcTest extends TestCase {

	/**
	 * 实例化文件缓存驱动
	 * @return File
	 */
	public function testMakeFileDriver(): File {
		$dir = dirname(__DIR__) . '/storage/cache';
		$this->assertInstanceOf(Tool::class, $tool = new Tool);
		$this->assertInstanceOf(File::class, $driver = new File($tool, $dir));
		return $driver;
	}

	/**
	 * 实例化Redis缓存驱动
	 * @return Redis
	 */
	public function testMakeRedisDriver(): Redis {
		$host     = '127.0.0.1';
		$port     = 6379;
		$password = '';
		$database = 0;
		$this->assertInstanceOf(Redis::class, $driver = new Redis($host, $port, $password, $database));
		return $driver;
	}

	/**
	 * 实例化 Session
	 * @depends testMakeFileDriver
	 * @param Driver $File
	 */
	public function testSessionWithFileDriver(Driver $File) {
		$option = [
			true,
			6000,
			false
		];
		$this->assertInstanceOf(Session::class, $Manager = new Session($File, ...$option));
	}

	/**
	 * 实例化 Session
	 * @depends testMakeRedisDriver
	 * @param Driver $Redis
	 */
	public function testSessionWithRedisDriver(Driver $Redis) {
		$option = [
			true,
			6000,
			false
		];
		$this->assertInstanceOf(Session::class, $Manager = new Session($Redis, ...$option));
	}

}


