<?php

/**
 * Create nonces in php.
 * @version 1.0
 * @author Julian Weiland
 **/

namespace Derweili\DwNonces;


class Nonce
{

  use BuilderTrait;

  private $action;

  private $config;

  private $algorithm;

  private $lifetime;

  private $salt;


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



}
