<?php
/**
 * Created by PhpStorm.
 * User: themartins
 * Date: 2017/06/10
 * Time: 02:10
 */
namespace SheetTest;

use SmartSheet\SmartClient;
use SheetTest\BaseTest;
use GuzzleHttp\Psr7\Uri;

class SmartSheetClientTest extends BaseTest {

    protected $sheet;

    protected function setUp()
    {
        $this->sheet = new SmartClient(self::$client, new \SmartSheet\Util\SmartConfig());
    }

    public function testProcess()
    {
        $result = $this->sheet->process();
        $this->assertEquals($result->getStatusCode(), 200);
    }

    public function testProcessWithMethods()
    {

        $method = 'GET';
        $path = 'sheet' . DIRECTORY_SEPARATOR . '21';
        $data = ['headers'=>['Authorization' => 'Bearer']];
        $result = $this->sheet->process($method, $path, $data);
        $this->assertEquals($result->getStatusCode(), 200);
    }
}
