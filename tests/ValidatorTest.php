<?php
//require_once __DIR__ . '/../vendor/autoload.php'; // Autoload files using Composer autoload

use Derweili\DwNonces\Config;
use Derweili\DwNonces\Nonce;
use Derweili\DwNonces\Validator;

class ValidatorTest extends PHPUnit_Framework_TestCase
{
    private $timestamp = 1501013538;
    private $action = 'contact_form';
    private $nonce = 'fd92035305';

    private static $original_settings = [];
    private static $salt = 'sfiu8whr3ihsl3rjhso3hrlisr';

    public static function setUpBeforeClass(){
        self::$original_settings = array(
            'lifetime'     => Config::get_lifetime(),
            'algorithm'    => Config::get_algorithm(),
            'salt'         => Config::get_salt(),
            'user_id'      => Config::get_user_id(),
        );

        Config::set_salt( self::$salt );
        Config::set_user_id( 1 );
    }

    public function testValidator()
    {

        $nonce = new Nonce( $this->action );
        $validator = new Validator();
        $this->assertNotEquals( 1, $validator->verify( $nonce->get(), $this->action ) );
        
        Config::set_lifetime( 2000 );

        $this->assertEquals( 2000, Config::get_lifetime() );

    }

    public static function tearDownAfterClass(){
        Config::set_lifetime( self::$original_settings['lifetime'] );
        Config::set_algorithm( self::$original_settings['algorithm'] );
        Config::set_salt( self::$original_settings['salt'] );
        Config::set_user_id( self::$original_settings['user_id'] );
    }

}
