## Avoid PHP cache in the development environment

In the latest version of Bitnami WAPP/MAPP/LAPP, the stack is by default shipped with Zend OPCache extension to improve 
the speed. Although this is useful in a production environment, this can be troublesome in a development environment.

For instance, you may find that after you change some codes in certain PHP file(s), the change does not take effects. In
such cases, you have to manually restart the Apache server to see the changes.

To make your life easier, we suggest applying the following changes to the `php.ini` file.
```php
zend_extension=php_opcache.dll
; Determines if Zend OPCache is enabled
; This option should be set as 0 in a development environment.
opcache.enable=0
```

Hope you are happy with development!
