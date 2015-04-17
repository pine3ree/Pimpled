# Pimpled

Pimple dependency injection container ansìd service locator for Processwire 2.5+

## Install

- Download/install composer and add "pimple/pimple": "3.0.*" package

- include vendor/autoload.php at the end of your site/config.php

- optional but recommended: protect your vendor directory from web access, add
    ```
    RewriteCond %{REQUEST_URI} ^/vendor/.*$ [OR]
    ```
    before the other conditions in your pw .htaccess file

- Install this module using PW admin interface

- You can now access the following variables:

```
$pimple;
$ioc
$container
$di
$locator
```

all referencing a single same instance of Pimple\Container

