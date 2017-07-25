<?php
//require_once __DIR__ . '/../vendor/autoload.php'; // Autoload files using Composer autoload

use Derweili\DwNonces\Config;

class ConfigTest extends PHPUnit_Framework_TestCase
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

    private $salt = 'sfiu8whr3ihsl3rjhso3hrlisr';
    public function test_lifetime()
    {

        $this->assertNotEquals( 0, Config::get_lifetime() );
        
        Config::set_lifetime( 2000 );

        $this->assertEquals( 2000, Config::get_lifetime() );

    }

    public function test_user_id()
    {

        $this->assertEquals( null, Config::get_user_id() );

        Config::set_user_id( 'derweili' );

        $this->assertEquals( 'derweili', Config::get_user_id() );

    }

    public function test_salt()
    {

        $this->assertEquals( null, Config::get_salt() );

        Config::set_salt( 'ikwfijlsiji3u9jl4wj34' );

        $this->assertEquals( 'ikwfijlsiji3u9jl4wj34', Config::get_salt() );

    }

    public function test_algorithm()
    {

        $this->assertEquals( 'sha256', Config::get_algorithm() );

        Config::set_algorithm( 'md5' );

        $this->assertEquals( 'md5', Config::get_algorithm() );

    }

    public static function tearDownAfterClass(){
        Config::set_lifetime( self::$original_settings['lifetime'] );
        Config::set_algorithm( self::$original_settings['algorithm'] );
        Config::set_salt( self::$original_settings['salt'] );
        Config::set_user_id( self::$original_settings['user_id'] );
    }

}
