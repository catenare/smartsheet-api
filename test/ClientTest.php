<?php
/**
 * Created by PhpStorm.
 * User: themartins
 * Date: 2017/06/15
 * Time: 19:17
 */

namespace SheetTest;
use SheetTest\BaseTest;
use PHPUnit\Framework\TestCase;


class ClientTest extends BaseTest {

	public function testClient() {
		$this->assertEquals(self::$client->request(GET, '/')->getStatusCode(), 200);
	}

}
