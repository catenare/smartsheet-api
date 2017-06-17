<?php
/**
 * Created by PhpStorm.
 * User: themartins
 * Date: 2017/06/10
 * Time: 01:14
 */

namespace SheetTest;

use Symfony\Component\Yaml\Yaml;


class MainTest extends BaseTest {

	/**
	 * @var null
	 */
	protected static $sheet_id = NULL;
	/**
	 * @var
	 */
	private $main;

	/**
	 *
	 */
	protected function setUp() {
		$this->main = new \Main();
	}

	/**
	 *
	 */
	public function testMainClass() {

		$main = $this->main;
		$path = ROOT_DIR . DIRECTORY_SEPARATOR . 'test' . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'sheet_test.yml';
		$test_data = Yaml::parse(file_get_contents($path));
		$test_data['name'] = $test_data['name'].random_int(1,10200);
		$result = $main->createNewSheet($test_data);
		$body = \Zend\Json\Json::decode($result->getBody());
		self::$sheet_id = $body->result->id;
		$this->assertEquals(
			'OWNER',
			\Zend\Json\Json::decode(
				$result->getBody())->result->accessLevel
		);

	}

	/**
	 *
	 */
	public function testAddRows()
	{

		$main = $this->main;
		$path = ROOT_DIR . DIRECTORY_SEPARATOR
		        . 'test' . DIRECTORY_SEPARATOR
		        . 'data' . DIRECTORY_SEPARATOR
		        . 'rows_test.yml';
		$test_data = Yaml::parse(file_get_contents($path));
		$result = $main->addRows($test_data);
		$body = \Zend\Json\Json::decode($result->getBody());
		$val = $body->message;
		$this->assertEquals('SUCCESS', $val );

	}

	/**
	 *
	 */
	public function testDeleteMainClass() {

		$result = $this->main->deleteSheet(self::$sheet_id);
		$body = \Zend\Json\Json::decode($result->getBody());
		$this->assertEquals("SUCCESS", $body->message);

	}
}