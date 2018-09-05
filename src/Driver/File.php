<?php

declare(strict_types = 1);
namespace Xutengx\Session\Driver;

use Xutengx\Contracts\Session\Driver;
use Xutengx\Tool\Tool;

/**
 * Class File
 * @package Xutengx\Session\Driver
 */
class File implements Driver{

	/**
	 * @var Tool
	 */
	protected $tool;

	/**
	 * File constructor.
	 * @param Tool $tool
	 * @param string $dir session文件存储位置
	 */
	public function __construct(Tool $tool, string $dir) {
		$this->tool = $tool;
		$tool->recursiveMakeDirectory($dir);
		ini_set('session.save_handler', 'files');
		ini_set('session.save_path', $dir);
	}

}
