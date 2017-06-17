<?php
/**
 * Created by PhpStorm.
 * User: themartins
 * Date: 2017/06/10
 * Time: 01:14
 */
namespace SheetTest;
use SmartSheet\SmartClient;
use SheetTest\BaseTest;


class SmartSheetTest extends BaseTest {

    protected $sheet;

    protected function setUp() {
        $this->sheet = new \Main();
    }

    public function testGetContainer()
    {
        $container = $this->sheet->getSmartSheet()->getContainer();
        $this->assertInstanceOf('Symfony\Component\DependencyInjection\ContainerBuilder', $container);
    }
}
