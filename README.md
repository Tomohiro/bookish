Bookish
================================================================================

Simple thumbnail viewer


Requirements
--------------------------------------------------------------------------------

- Apache 2
- PHP 5.4


Getting Started
--------------------------------------------------------------------------------

### Books directory structure

```sh
$HOME/Sites/mybooks/
    |-- Book1
    |   |-- 000.jpg
    |   |-- 001.jpg
    |   `-- 002.jpg
    |
    |-- Book2
    |   |-- 000.png
    |   |-- 001.png
    |   `-- 002.png
    `-- index.php
```

### OS X Mavericks

Enable autoload settings to launchctl:

```sh
$ sudo launchctl load -w /System/Library/LaunchDaemons/org.apache.httpd.plist
```

Enable the php5 module:

```sh
$ sudo vim /etc/apache2/httpd.conf
#LoadModule perl_module libexec/apache2/mod_perl.so
LoadModule php5_module libexec/apache2/libphp5.so
```

Enable user directory:

```sh
$ sudo vim /private/etc/apache2/users/myname.conf
<Directory "/Users/myname/Sites">
    Allow from all
</Directory>
```

Configuration test:

```sh
$ sudo apachectl configtest
```

Start the Apache2

```sh
$ sudo apachectl restart
```

Access to `http://localhost/~myname/mybooks/`


LICENSE
--------------------------------------------------------------------------------

&copy; 2014 Tomohiro TAIRA.
This project is licensed under the MIT license.
See LICENSE for details.
