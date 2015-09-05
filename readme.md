###### Name of Project

##### Date

#### By Ben Casalino

## Description

## Setup

# Composer
- add Silex,Twig to composer.json
- cd ~
- sudo mkdir -p /usr/local/bin
- sudo chown -R $USER /usr/local/
- curl -sS https://getcomposer.org/installer | php
- mv composer.phar /usr/local/bin/composer
- ------- or --------
- curl -sS https://getcomposer.org/installer | php
- php composer.phar
- php composer.phar install

# PHPunit Testing
- export PATH=$PATH:./vendor/bin
- phpunit tests

# PHP
- cd web
- php -S localhost:8000

#Apache
- apachectl start
- localhost:8080 (to test)

#mysql - PHPmyadmin
- cd web
- mysql.server start
- my sql -uroot -proot
- localhost:8888/phpmyadmin

#MAMP
- cd web
- localhost:8889

## Technologies Used

- Twig
- Silex
- PHPUnit
- PHP
- HTML
- Apache/Sql/MAMP/phpmyadmin

### Legal

Copyright (c) 2015 Ben Casalino

This software is licensed under the MIT license.

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
