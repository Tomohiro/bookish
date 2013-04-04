Bookish
================================================================================

Requirements
--------------------------------------------------------------------------------

- Apache2
- PHP 5.4


Getting Started
--------------------------------------------------------------------------------

### Book directory structure

```
$HOME/Sites/mybooks/
|-- Book1
|   |-- 00.jpg
|   |-- 01.jpg
|   `-- 02.jpg
|-- Book2
|   |-- 00.jpg
|   |-- 01.jpg
|   `-- 02.jpg
`-- index.php
```

### Mountain Lion

Enable the php5 module:

    $ sudo vim /etc/apache2/httpd.conf
    #LoadModule perl_module libexec/apache2/mod_perl.so
    LoadModule php5_module libexec/apache2/libphp5.so

Enable user directory:

    $ sudo vim /private/etc/apache2/users/myname.conf
    <Directory "/Users/myname/Sites">
      Allow from all
    </DIrectory>

Configuration test:

    $ sudo apachectl configtest

Start the Apache2

    $ sudo apachectl start


Access to `http://localhost/~myname/mybooks/`


LICENSE
--------------------------------------------------------------------------------

&copy; 2013 Tomohiro TAIRA.
This project is licensed under the MIT license.
See LICENSE for details.ICENSE
