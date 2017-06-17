<?php
/**
 * Created by PhpStorm.
 * User: johan
 * Date: 6/12/17
 * Time: 12:27 PM
 */

namespace SmartSheet\Sheet;

use SmartSheet\SmartClient;


abstract class AbstractSheet implements ISmartSheet {

	/**
	 * @var SmartClient
	 */
	protected $smart_client;

	/**
	 * @var \SmartSheet\Sheet\Properties
	 */
	protected $properties;

	/**
	 * @var String
	 */
	protected $resource;


	/**
	 * AbstractSheet constructor.
	 *
	 * @param SmartClient $smart_client
	 * @param \SmartSheet\Sheet\Properties $properties
	 * @param \SmartSheet\Util\SmartConfig $config
	 */
	public function __construct(
		\SmartSheet\SmartClient $smart_client,
		\SmartSheet\Sheet\Properties $properties
	) {

		$this->smart_client = $smart_client;
		$this->properties   = $properties;
	}

	public function setResource( $resource ) {
		$this->resource = $this->smart_client->getConfig($resource);
	}

	public function getResource() {
		return $this->resource;
	}


	/**
	 * @param string $method
	 * @param string $path
	 * @param array $data
	 *
	 * @return mixed
	 */
	public function process( $method = GET, $path = DEFAULT_PATH, $data = [] ) {
		return $this->smart_client->process( $method, $path, $data );
	}

	/**
	 * @param $data
	 */
	public function setData( $data ) {
		$this->properties->setData( $data );
	}

	/**
	 * @return mixed
	 */
	public function getData() {
		return $this->properties->getData();
	}

	/**
	 * @param $key
	 * @param $value
	 */
	public function setProperty( $key, $value ) {
		$this->properties->$key = $value;
	}

	/**
	 * @param $key
	 *
	 * @return mixed
	 */
	public function getProperty( $key ) {
		return $this->properties->$key;
	}

}