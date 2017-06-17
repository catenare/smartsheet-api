<?php
/**
 * Created by PhpStorm.
 * User: themartins
 * Date: 2017/06/10
 * Time: 00:33
 */

namespace SmartSheet;

/**
 * Class SmartSheet
 * @package SmartSheet
 */
/**
 * Class SmartClient
 * @package SmartSheet
 */
class SmartClient {


	/**
	 * @var \GuzzleHttp\Client
	 */
	private $client;

	/**
	 * @var \SmartSheet\Util\SmartConfig
	 */
	private $current_config = NULL;

	/**
	 * SmartSheet constructor.
	 */
	public function __construct(\GuzzleHttp\Client $client, \SmartSheet\Util\SmartConfig $config ) {
		$this->client = $client;
		$this->config = $config;

	}

	/**
	 * @param null $resource
	 *
	 * @return mixed|Util\SmartConfig
	 */
	public function getConfig($resource = NULL) {
		return $resource?$this->config->getFile($resource):$this->current_config;

	}

	/**
	 * @return \GuzzleHttp\Client
	 */
	public function getClient() {
		return $this->client;
	}

	/**
	 * @param string $method
	 * @param string $path
	 * @param array $data
	 *
	 * @return mixed
	 */
	public function process( $method = GET, $path = DEFAULT_PATH, $data = [] ) {
		$result = $this->client->request( $method, $path, $data );
		return $result;
	}

}