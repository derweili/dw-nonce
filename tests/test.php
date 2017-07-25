<?php

require_once __DIR__ . '/../vendor/autoload.php'; // Autoload files using Composer autoload

use Derweili\DwNonces\Config;
use Derweili\DwNonces\Nonce;
use Derweili\DwNonces\Validator;

$salt = 'Md[6@@zALZW_KNiBaZZx.d3+`Wx>DM01dmY[M-+)6V%+92J2OzsA{%(d$k%Qgc<t';
$user_id = 1;

echo time();
echo '<br>';

Config::set_salt($salt);
Config::set_user_id($user_id);


echo new Nonce( 'contact_form ');

   
echo '<br>';

echo new Nonce( 'contact_form ');

echo '<br>';

$test_nonce = '9b6141d7cb3';

$validator = new Validator();

echo $validator->verify('9b61417cb3', 'contact_form ');
