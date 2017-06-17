<?php
/**
 * Created by PhpStorm.
 * User: themartins
 * Date: 2017/06/15
 * Time: 22:36
 */

namespace SheetTest;

use SmartSheet;
use PHPUnit\Framework\TestCase;

class Test extends BaseTest {


	public function testLiveSite() {
		$sheet = new SmartSheet\SmartClient();
		$result = $sheet->process();
		$body = $result->getBody();
		$body = json_decode($body);
		$this->assertEquals('Test Sheet', $body->data[0]->name );
	}
}
