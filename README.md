# Aria Systems Frontend Test Application

## System Requirements

The following software is required to run the application.
* PHP 7.1
* [Symfony command line](https://symfony.com/download "Download Symfony")
* [Composer](https://getcomposer.org/)
* Sqlite3

## Installation

composer install
php bin/console doctrine:migrations:migrate
symfony server:start