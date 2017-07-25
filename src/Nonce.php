<?php

/**
 * Create nonces in php.
 * @version 1.0
 * @author Julian Weiland
 **/

namespace Derweili\DwNonces;


class Nonce
{

  private $action;


  public function __construct( $action = -1 ){

    $this->action = $action;
    $config = new Config();
    
    $this->algorithm    = $config->get_algorithm();
    $this->lifetime     = $config->get_lifetime();
    $this->salt         = $config->get_salt();

  }

  /**
  * Generates the nonce string
  *
  * @return string
  */
  public function get(){

    return $this->get_encrypted( $this->get_reference() );

  }


  private function get_encrypted( $message ){
    return substr( hash_hmac( $this->algorithm, $message, $this->salt ), -12, 10 );
  }

  private function get_reference(){

    $string = $this->action;
    $string .= $this->get_timesstamp();
    return $string;

  }


  private function get_timesstamp(){
    return ceil(time() / ($this->lifetime / 2));
  }


}
