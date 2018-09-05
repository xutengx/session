<?php

declare(strict_types = 1);
namespace Xutengx\Session;

use Xutengx\Contracts\Session\Driver;

/**
 * Class Session
 * @package Xutengx\Session
 */
class Session {

	/**
	 * @var Driver
	 */
	protected $driver;

	/**
	 * @var string
	 */
	protected $sessionName;

	/**
	 * Session constructor.
	 * @param Driver $driver
	 * @param bool $httpOnly
	 * @param int $liftTime
	 * @param bool $autoStart
	 * @param string $sessionName
	 */
	public function __construct(Driver $driver, bool $httpOnly = true, int $liftTime = 600000, bool $autoStart = true,
		string $sessionName = 'gaara_session') {

		$this->driver = $driver;

		ini_set('session.cookie_httponly', ($httpOnly === true) ? 'On' : 'Off');
		ini_set('session.cookie_lifetime', (string)$liftTime);
		ini_set('session.gc_maxlifetime', (string)$liftTime);
		ini_set('session.name', $this->sessionName = $sessionName);

		if ($autoStart)
			session_start();
	}

}
