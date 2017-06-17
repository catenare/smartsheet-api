<?php
/**
 * Created by PhpStorm.
 * User: themartins
 * Date: 2017/06/16
 * Time: 00:10
 */

namespace SmartSheet\Util;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\Yaml\Yaml;

class SmartConfig {

	/**
	 * @var
	 */
	private $directories;
	/**
	 * @var FileLocator
	 */
	private $locator;

	/**
	 * SmartConfig constructor.
	 */
	public function __construct() {
		$this->locator = new FileLocator(CONFIG_DIRECTORIES);
	}

	/**
	 * @param $resource
	 *
	 * @return mixed
	 */
	public function getFile($resource){
		$config_file = $this->locator->locate($resource, null, true);
		return Yaml::parse(file_get_contents($config_file));
	}
}


