#!/usr/bin/env php
<?php

use Symfony\Component\Console\Application;
use SmartSheet\SmartSheet;


class Main {
	/**
	 * @var \SmartSheet\SmartClient
	 */
	private $smartsheet = NULL;




	/**
	 * Main constructor.
	 */
	public function __construct( ) {
        $this->smartsheet = new SmartSheet();
        $this->application = new Application();
    }

	/**
	 * @return \SmartSheet\SmartClient|SmartSheet
	 */
	public function getSmartSheet() {
	    return $this->smartsheet;
    }


	/**
	 *
	 */
	public function __invoke() {
		$this->application->add(
		        $this->smartsheet->getContainer()->get(MAIN_COMMAND)
        );
        $this->application->run();
    }

	/**
	 * @param null $data
	 *
	 * @return null
	 */
    public function createNewSheet($data = NULL) {
	    return $this->smartsheet->createSheet($data);
    }

	/**
	 * @param $sheet_id
	 *
	 * @return mixed
	 */
	public function deleteSheet($sheet_id){
        return $this->smartsheet->deleteSheet($sheet_id);
    }

	/**
	 * @param $data
	 *
	 * @return mixed
	 */
	public function addRows($data) {
        return $this->smartsheet->addRows($data);
    }

}

