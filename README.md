dw-nonce
========

Use nonces in an object-oriented php project.

User Manual
---

### Installation
Install all composer dependencies
````
$ composer install
````
### Configuration
```php
use Derweili\DwNonces\Config;

Config::set_salt( $salt );
Config::set_user_id( $user_id );

```
Overwrite default configurations
```php
Config::set_lifetime( 43200 );
Config::set_algorithm( 'md5' );
```

### Nonce creation
```php
use Derweili\DwNonces\Nonce;

$action = 'my_contact_form_action'
$my_nonce = new Nonce($action)
```

### Nonce validation

```php
use Derweili\DwNonces\Validator;

$validator = new Validator();
$validator->verify($nonce, $action);
```