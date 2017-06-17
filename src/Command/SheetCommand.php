<?php
/**
 * Created by PhpStorm.
 * User: themartins
 * Date: 2017/06/09
 * Time: 19:03
 */

namespace SmartSheet\Command;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Command\Command;


class SheetCommand extends Command {
	private $sheet;

	public function __construct( $name = null, \SmartSheet\SmartClient $sheet ) {
		$this->sheet = $sheet;
		parent::__construct( $name );
	}

	protected function configure() {
		$this->setName( 'sheet:sheet' )
		     ->setDescription( 'Check the sheet id.' )
		     ->setHelp( 'enter the sheet id' )
		     ->addArgument( 'sheet', InputArgument::OPTIONAL, 'SmartSheetObject Id' );
	}

	protected function execute( InputInterface $input, OutputInterface $output ) {

		$output->writeln( 'hello world');
	}
}