<?php
/**
 * Validate nonces in php
 * @version 1.0
 * @author Julian Weiland
 **/

namespace Derweili\DwNonces;

class Validator
{

  private $config;

  private $algorithm;

  private $lifetime;

  private $salt;

  function __construct()
  {
    $config = new Config();

    $this->algorithm    = $config->get_algorithm();
    $this->lifetime     = $config->get_lifetime();
    $this->salt         = $config->get_salt();
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

    if (empty($nonce)) {
        return false;
    }

    $nonce_check = $this->get_encrypted( $this->get_reference() );
    if ( hash_equals( $nonce_check, $nonce ) ) {
        return 1;
    }

  }


  private function get_encrypted( $message ){
    return substr( hash_hmac( $this->algorithm, $message, $this->salt ), -12, 10 );
  }

  private function get_reference( $time_adjust = 0 ){

    $string = $this->action;
    $string .= ( $this->get_timesstamp( $time_adjust ) );
    return $string;

  }

  /**
   * @param int $time_adjust
   * @return float
   */
  private function get_timesstamp( $time_adjust = 0 ){
    return ceil(time() / ($this->lifetime / 2)) + $time_adjust;
  }


}
