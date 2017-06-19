<?php
/**
 * Created by PhpStorm.
 * User: themartins
 * Date: 2017/06/17
 * Time: 14:55
 */

namespace SmartSheet;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;


class SmartSheet {

	/**
	 * @var null|object
	 */
	private $config = null;

	/**
	 * @var ContainerBuilder
	 */
	private $container;

	private $token = NULL;

	private $url = NULL;


	/**
	 * SmartSheet constructor.
	 *
	 * @param null $token
	 * @param null $url
	 */
	public function __construct($token = NULL, $url = NULL) {

		if( !is_null( $token ) ) {
			if (!defined('AUTH_TOKEN')) {
				define('AUTH_TOKEN', $token );
			}
			$this->token = $token;
		}


		if ( !is_null($url ) ) {
			if(!defined('API_URL') ) {
				define('API_URL', $url);
			}
			$this->url = $url;
		}

		if( !defined('BASE_URL')) {
			define( 'BASE_URL', [ 'base_uri' => API_URL ] );
		}

		if( !defined('HEADERS')) {
			define( 'HEADERS', [ 'base_uri' => API_URL, 'headers' => [ 'Authorization' => 'Bearer ' . AUTH_TOKEN ] ] );
		}

		$container = new ContainerBuilder();
		$loader    = new YamlFileLoader(
			$container, new FileLocator( ROOT_DIR . DIRECTORY_SEPARATOR . CONFIG )
		);
		$loader->load( CONFIG_FILE );
		$this->container = $container;
		$this->config    = $this->getContainer()->get( 'smartconfig' );

	}

	/**
	 * @return null
	 */
	public function getToken() {
		return $this->token;
	}

	/**
	 * @param null $token
	 */
	public function setToken( $token ) {
		$this->token = $token;
	}

	/**
	 * @return null
	 */
	public function getUrl() {
		return $this->url;
	}

	/**
	 * @param null $url
	 */
	public function setUrl( $url ) {
		$this->url = $url;
	}

	/**
	 * @return ContainerBuilder|null
	 */
	public function getContainer() {
		return $this->container;
	}

	/**
	 * @param null $data
	 *
	 * @return null
	 */
	public function createSheet( $data = null ) {
		$result = null;

		/**
		 * @var \SmartSheet\Sheet $sheet
		 */
		$sheet = $this->getContainer()->get( SHEET );
		$sheet->setData( $data );
		$sheet->setResource( RESOURCE_SHEET );
		$result = $sheet->create();

		return $result;
	}

	/**
	 * @param $data
	 * @var \SmartSheet\SmartClient $client
	 * @return mixed
	 */
	public function addRows( $data ) {

		$sheet = $this->getContainer()->get( SHEET );

		$sheet_id = $data['sheet_id'];
		$sheet->setData( $data['data'] );
		$sheet->setResource(RESOURCE_ROW);
		$result = $sheet->create($sheet_id);
		return $result;

	}

	/**
	 * @param $sheet_id
	 *
	 * @return mixed
	 */
	public function deleteSheet( $sheet_id ) {
		$sheet = $this->getContainer()->get( SHEET );
		$sheet->setData( $sheet_id );
		$sheet->setResource( RESOURCE_SHEET );
		$result = $sheet->delete();

		return $result;
	}
}