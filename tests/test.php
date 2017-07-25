<?php

require_once __DIR__ . '/../vendor/autoload.php'; // Autoload files using Composer autoload

use Derweili\DwNonces\Config;
use Derweili\DwNonces\Nonce;

$salt = 'Md[6@@zALZW_KNiBaZZx.d3+`Wx>DM01dmY[M-+)6V%+92J2OzsA{%(d$k%Qgc<t';

Config::set_salt($salt);


$my_nonce = new Nonce( 'contact_form ');

echo $my_nonce->get();
