<?php
/**
 * Created by PhpStorm.
 * User: johan
 * Date: 6/12/17
 * Time: 1:08 PM
 */
namespace SheetTest;

use SmartSheet\Sheet\Sheet;
use SmartSheet\SmartClient;
use SheetTest\BaseTest;

class SheetTest extends BaseTest {

  private $sheet;

  protected function setUp() {
    $this->sheet = new Sheet( new SmartClient(self::$client, new \SmartSheet\Util\SmartConfig()), new
    \SmartSheet\Sheet\Properties());
  }

  public function testCreate() {
    $this->assertInstanceOf('SmartSheet\Sheet\ISmartSheet', $this->sheet);
  }
}
