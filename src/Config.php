<?php
namespace Derweili\DwNonces;

/**
 * Configuration class to store settings
 */
class Config
{

  /**
   * @var string
   */
  private static $algorithm = 'sha256';

  /**
   * @var int
   */
  public static $lifetime = 86400;

  /**
   * @var string
   */
  private static $salt;

  /**
    * @param string $salt
    */
  public static function set_lifetime($lifetime)
  {
      self::$lifetime = (int)$lifetime;
  }

  /**
    * @return int
    */
  public function get_lifetime()
  {
      return self::$lifetime;
  }

  /**
    * @param string $salt
    */
  public static function set_salt($salt)
  {
      self::$salt = (string)$salt;
  }

  /**
    * @return string $salt
    */
  public static function get_salt()
  {  
      return self::$salt;
  }

  /**
    * @param string $salt
    */
  public static function set_algorithm($algorithm)
  {
      self::$algorithm = (string)$algorithm;
  }
  /**
    * @return string
    */
  public static function get_algorithm()
  {
      return self::$algorithm;
  }
  

}
