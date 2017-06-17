<?php
/**
 * Created by PhpStorm.
 * User: themartins
 * Date: 2017/06/12
 * Time: 19:38
 */

require 'vendor/autoload.php';

use Symfony\Component\Dotenv\Dotenv;

$dotenv = new Dotenv();
$dotenv->load( '.env' );

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
define( 'BASE_URL', [ 'base_uri' => $_ENV['URL'] ] );
define( 'HEADERS', [ 'base_uri' => $_ENV['URL'], 'headers' => [ 'Authorization' => 'Bearer ' . $_ENV['TOKEN'] ] ] );
define( 'CONFIG_DIRECTORIES', [ __DIR__ . DIRECTORY_SEPARATOR . CONFIG . DIRECTORY_SEPARATOR . PROPERTIES_DIR ] );

require 'main.php';