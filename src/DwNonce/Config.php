<?php
namespace DwNonce;
/**
 * Class Config
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
  private static $lifetime = 86400;
  /**
   * @var string
   */
  private static $salt;
  /**
   * @var int
   */
  private static $userId;

}
