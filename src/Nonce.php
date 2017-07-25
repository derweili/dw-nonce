<?php

/**
 * Create nonces in php.
 * @version 1.0
 * @author Julian Weiland
 * @package Derweili\DwNonces
 **/

namespace Derweili\DwNonces;


class Nonce
{

  use BuilderTrait;

  /**
   * @var object
   */
  private $config;

  /**
   * @var string|int
   */
  private $algorithm;

  /**
   * @var string|int
   */
  private $lifetime = 86400;

  /**
   * @var string
   */
  private $salt;

  /**
   * @var string|int
   */
  private $action;

  /**
   * Nonce constructor
   * @param string $action Action string to use as reference for Nonce
   */
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

  /**
   * Return nonce if object used as a string
   *
   * @return string
   */
  public function __toString()
  {
    return $this->get();
  }


}
