Derweili DwNonce
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

Config::set_salt($salt);
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