## Enable debug mode in PHP

In the latest version of Bitnami WAPP/MAPP/LAPP, it is quire weird that Bitnami disables the debug mode of PHP. Most people 
use Bitnami stacks in development environment, so it is important for them to see the error messages.

To make your life easier, we suggest applying the following changes to the `php.ini` file.
```php
; This directive controls whether or not and where PHP will output errors,
; notices and warnings too. Error output is very useful during development, but
; it could be very dangerous in production environments. Depending on the code
; which is triggering the error, sensitive information could potentially leak
; out of your application such as database usernames and passwords or worse.
; For production environments, we recommend logging errors rather than
; sending them to STDOUT.
; Possible Values:
;   Off = Do not display any errors
;   stderr = Display errors to STDERR (affects only CGI/CLI binaries!)
;   On or stdout = Display errors to STDOUT
; Default Value: On
; Development Value: On
; Production Value: Off
; http://php.net/display-errors
display_errors = On
```

Hope you are happy with development!

(Written by Yunpeng)
