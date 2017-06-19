<?php
/**
 * Created by PhpStorm.
 * User: themartins
 * Date: 2017/06/10
 * Time: 02:26
 */

namespace SheetTest;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\handlerStack;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\RequestException;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Dotenv\Dotenv;

abstract class BaseTest extends TestCase {

    protected static $client;

    public static function setUpBeforeClass() {

		$path = __DIR__ . DIRECTORY_SEPARATOR . '..'. DIRECTORY_SEPARATOR . '.env';
	    if ( file_exists( $path ) ) {
		    $dotenv = new Dotenv();
		    $dotenv->load( $path );

		    if(!defined('AUTH_TOKEN')) {
			    define( 'AUTH_TOKEN', $_ENV['TOKEN'] );
		    }

		    if(!defined('API_URL')) {
			    define( 'API_URL', $_ENV['URL'] );
		    }
	    }

        $stream = Psr7\stream_for(
            '{"pageNumber":1,"pageSize":100,"totalPages":1,"totalCount":1,"data":[{"id":1086934253627268,"name":"Test Sheet","accessLevel":"OWNER","permalink":"https://app.smartsheet.com/b/home?lx=TTgapKnSiM-CiBdpHbtuHg","createdAt":"2017-05-11T13:10:33Z","modifiedAt":"2017-05-11T13:17:12Z"}]}
');
        $mock = new MockHandler([
            new Response(200, ['Content-Type' => 'application/json'], $stream),
            new Response(200, ['Content-Type'=>'application/json']),
            new RequestException("Error communicating with Server", new Request(GET,'test'))
        ]);

        $handler = HandlerStack::create($mock);
        self::$client = new Client(['handler' => $handler]);
    }

    public static function tearDownAfterClass() {

    }
}