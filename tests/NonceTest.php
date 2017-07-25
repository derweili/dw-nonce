<?php
//require_once __DIR__ . '/../vendor/autoload.php'; // Autoload files using Composer autoload

use Derweili\DwNonces\Config;
use Derweili\DwNonces\Nonce;

class NonceTest extends PHPUnit_Framework_TestCase
{

    private static $original_settings = [];

    public static function setUpBeforeClass(){
        self::$original_settings = array(
            'lifetime'     => Config::get_lifetime(),
            'algorithm'    => Config::get_algorithm(),
            'salt'         => Config::get_salt(),
            'user_id'      => Config::get_user_id(),
        );
    }

    public function test_nonce_generation(){
        $nonce = new Nonce( 'my_form' );
        $this->assertNotEquals( null, $nonce->get() );

    }

    public static function tearDownAfterClass(){
        Config::set_lifetime( self::$original_settings['lifetime'] );
        Config::set_algorithm( self::$original_settings['algorithm'] );
        Config::set_salt( self::$original_settings['salt'] );
        Config::set_user_id( self::$original_settings['user_id'] );
    }

}
