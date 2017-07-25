<?php
/**
 * Validate nonces in php
 * @version 1.0
 * @author Julian Weiland
 **/

namespace Derweili\DwNonces;

class Validator
{

  use BuilderTrait;

  /**
   * @var object
   */
  private $config;

  /**
   * @var string
   */
  private $algorithm = 'sha256';

  /**
   * @var int
   */
  private $lifetime = 86400;

  /**
   * @var string
   */
  private $salt;

  /**
   * @var string
   */
  private $user_id;

  /**
   * @var string|int
   */
  private $action;

  /**
   * Validator constructor
   */
  public function __construct()
  {
    $config = new Config();

    $this->algorithm    = $config->get_algorithm();
    $this->lifetime     = $config->get_lifetime();
    $this->salt         = $config->get_salt();
    $this->user_id      = $config->get_user_id();
  }

  /**
   * @param string $nonce
   * @param string|int $action
   *
   * @return bool|int
   */
  function verify( $nonce, $action ){

    $this->nonce  = $nonce;
    $this->action = $action;

    if ( empty($nonce )) {
        return false;
    }

    $nonce_check = $this->get_encrypted( $this->get_reference() );
    if ( hash_equals( $nonce_check, $nonce ) ) {
        return 1;
    }

    $nonce_check = $this->get_encrypted($this->get_reference(-1));
    if ( hash_equals( $nonce_check, $nonce )) {
        return 2;
    }

    return false;

  }



}
