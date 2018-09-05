<?php

declare(strict_types = 1);
namespace Xutengx\Session\Driver;

use Xutengx\Contracts\Session\Driver;

/**
 * Class Redis
 * @package Gaara\Core\Session\Driver
 */
class Redis implements Driver {

	/**
	 * Redis constructor.
	 * @param string $host
	 * @param int $port
	 * @param string $password
	 * @param int $database
	 */
	public function __construct(string $host = '127.0.0.1', int $port = 6379, string $password = '',
		int $database = 0) {
		$query['auth']     = $password;
		$query['database'] = $database;

		ini_set('session.save_handler', 'redis');
		ini_set('session.save_path', 'tcp://' . $host . ':' . $port . '?' . http_build_query($query));
	}

}
