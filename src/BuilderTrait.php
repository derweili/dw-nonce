<?php
/**
 * Builder Trait that includes methods for nonce creation
 * @version 1.0
 * @author Julian Weiland
 * @package Derweili\DwNonces
 */

namespace Derweili\DwNonces;

trait BuilderTrait
{


    /**
     * @param string $message
     * @return string
     */
    private function get_encrypted( $message ){
      return substr( hash_hmac( $this->algorithm, $message, $this->salt ), -12, 10 );
    }

    /**
     * @param int $time_adjust
     * @return string
     */
    private function get_reference( $time_adjust = 0 ){

      $string = $this->action;
      $string .= ( $this->get_timesstamp( $time_adjust ) );
      if ($this->user_id) {
          $string .= $this->user_id;
      }
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
