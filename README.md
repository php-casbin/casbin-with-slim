# Casbin skeleton application with Slim Framework 4

[![Build Status](https://travis-ci.org/php-casbin/casbin-with-slim.svg?branch=master)](https://travis-ci.org/php-casbin/casbin-with-slim)
[![Coverage Status](https://coveralls.io/repos/github/php-casbin/casbin-with-slim/badge.svg)](https://coveralls.io/github/php-casbin/casbin-with-slim)
[![Latest Stable Version](https://poser.pugx.org/casbin/casbin-with-slim/v/stable)](https://packagist.org/packages/casbin/casbin-with-slim)
[![Total Downloads](https://poser.pugx.org/casbin/casbin-with-slim/downloads)](https://packagist.org/packages/casbin/casbin-with-slim)
[![License](https://poser.pugx.org/casbin/casbin-with-slim/license)](https://packagist.org/packages/casbin/casbin-with-slim)

Use this skeleton application to quickly setup and start working on a new Slim Framework 4 application. This application uses the latest Slim 4 with Slim PSR-7 implementation and PHP-DI container implementation. It also uses the Monolog logger.

This skeleton application was built for Composer. This makes setting up a new [Casbin](https://github.com/php-casbin/casbin-with-slim) skeleton application with Slim Framework quick and easy.

## Install the Application

Run this command from the directory in which you want to install your new Slim Framework application.

```bash
composer create-project casbin/casbin-with-slim [my-app-name]
```

Replace `[my-app-name]` with the desired directory name for your new application. You'll want to:

* Point your virtual host document root to your new application's `public/` directory.
* Ensure `logs/` is web writable.

To run the application in development, you can run these commands 

```bash
cd [my-app-name]
composer start
```

Or you can use PHP Built-in web server:

```
php -S localhost:8888 -t public
```

Or you can use `docker-compose` to run the app with `docker`, so you can run these commands:
```bash
cd [my-app-name]
docker-compose up -d
```
After that, open `http://localhost:8888` in your browser.

Run this command in the application directory to run the test suite

```bash
composer test
```

That's it! Now go build something cool.
