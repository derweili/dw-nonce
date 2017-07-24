<?php

require_once __DIR__ . '/../vendor/autoload.php'; // Autoload files using Composer autoload

use DwNonce\NonceService;

$ns = new NonceService( 'nonce', 'root', 'root' );

//echo $ns->create_nonce( 'action' );
