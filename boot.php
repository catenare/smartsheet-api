<?php
/**
 * Created by PhpStorm.
 * User: themartins
 * Date: 2017/06/12
 * Time: 19:38
 */

//require 'vendor/autoload.php';

use Symfony\Component\Dotenv\Dotenv;

function set_base_vars($auth = NULL, $api = NULL) {
	$dotenv = new Dotenv();
	if ( file_exists( __DIR__ .DIRECTORY_SEPARATOR .'.env' ) ) {
		$dotenv->load( __DIR__ .DIRECTORY_SEPARATOR .'.env' );
		define( 'AUTH_TOKEN', $_ENV['TOKEN'] );
		define( 'API_URL', $_ENV['URL'] );
	} else {
		define( 'AUTH_TOKEN', $auth );
		define( 'API_URL', $api );
	}
}

if (!defined(AUTH_TOKEN) ) {
	set_base_vars();
}

const CONFIG          = 'config';
const CONFIG_FILE     = 'services.yml';
const DEFAULT_PATH    = 'sheets';
const SHEET           = 'sheet';
const MAIN_COMMAND    = 'sheetcommand';
const PROPERTIES_DIR  = 'properties';

const RESOURCE_CELL   = 'cell.yml';
const RESOURCE_COLUMN = 'column.yml';
const RESOURCE_FOLDER = 'folder.yml';
const RESOURCE_INFO   = 'info.yml';
const RESOURCE_ROW    = 'row.yml';
const RESOURCE_SHEET  = 'sheet.yml';
const TOKEN_SHEET_ID  = '%%sheetId%%';

define( 'ROOT_DIR', __DIR__ );
define( 'GET', 'GET' );
define( 'PUT', 'PUT' );
define( 'POST', 'POST' );
define( 'DELETE', 'DELETE' );
define( 'BASE_URL', [ 'base_uri' => API_URL ] );
define( 'HEADERS', [ 'base_uri' => API_URL, 'headers' => [ 'Authorization' => 'Bearer ' . AUTH_TOKEN ] ] );
define( 'CONFIG_DIRECTORIES', [ __DIR__ . DIRECTORY_SEPARATOR . CONFIG . DIRECTORY_SEPARATOR . PROPERTIES_DIR ] );

//require 'main.php';