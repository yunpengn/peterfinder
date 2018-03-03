## Enable debug mode in PHP

In the latest version of Bitnami WAPP/MAPP/LAPP, it is quire weird that Bitnami disables the debug mode of PHP. Most people 
use Bitnami stacks in development environment, so it is important for them to see the error messages.

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

(Written by Yunpeng)
