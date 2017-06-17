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


	/**
	 * SmartSheet constructor.
	 */
	public function __construct() {

		$container = new ContainerBuilder();
		$loader    = new YamlFileLoader(
			$container, new FileLocator( ROOT_DIR . DIRECTORY_SEPARATOR . CONFIG )
		);
		$loader->load( CONFIG_FILE );
		$this->container = $container;
		$this->config    = $this->getContainer()->get( 'smartconfig' );
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