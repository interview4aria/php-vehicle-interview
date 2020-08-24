# Aria Systems Frontend Test Application


## System Requirements

The following software is required to run the application.
* PHP 7.1
* [Symfony command line](https://symfony.com/download "Download Symfony")
* [Composer](https://getcomposer.org/)
* Sqlite3


## Installation

Once you have the Symfony CLI and composer installed you can install the
application with the following command from the root directory.

composer install

The required components will be installed, the database will be created and
populated with data, and then tests will run to verify your install.


## Starting Server

Once your application is installed you can run the Symfony server to run the
application locally.

symfony server:start

This should make the application available at http://127.0.0.1:8000/.

If you're having issue with multiple versions of PHP on your server checkout
the following link:

https://symfony.com/doc/current/setup/symfony_server.html#selecting-a-different-php-version


## Application Description

The application is a small prototype that lists the inventory of exotic vehicles.
The list page uses an API available at /api/vehicles. There is also a page to
submit an inquiry at /inquire and an small admin section page to create new
vehicle records at /admin/vehicle/create. The username is ariauser and the
password is aria1234.

There are 5 tables Vehicle, Boat, Car, Plane, and SalesPerson. Boat, Car, and
Plane all have a one-to-one relationship with Vehicle and contain additional
information for those vehicles based on which type of vehicle it is.

Each vehicle type has its own detail API that returns the specific details of
the vehicle at /api/boat/vehicle_id, /api/car/vehicle_id, and /api/plane/vehicle_id.


## Requirements

There are 3 tasks to be attempted. The first is a user story for a new feature
that needs to be implemented. The second is to review a perfomance issue. The
third is a code review for any performance, security, or quality issues on a
pull request.

* As a user I want to be able to see the number of people a vehicle can
carry. In the case of boats and planes this number should contain both passengers
and crew. For cars it should just be passengers. The /vehicles API should return a
new value 'numPeople' that should contain the total for each vehicle. It should then
be displayed as a column in the table on the main page.

* In our production environment the inquiry page is loading extremely slow
despite working fine in the dev and qa environments. What may be the performance
issue with this page. Describe or prototype any solutions you could make to this
application to improve the performance problems.

* A code review needs to be done on some code recently merged to add a new
vehicle. A copy of the diff from the pull request is in /public/code_review.txt.
Review the changes for this new feature and describe any performance, quality,
or security concerns and possible solutions to them.


## Running Tests

There is a small set of tests that can be run with the following command:

php bin/phpunit tests


## Setting up and Resetting the Database

If at anytime the database needs to be reset or installed you can do so with the
following command.

This will create the tables:

php bin/console doctrine:migrations:migrate

This will populate or reset the data:

php bin/console doctrine:fixtures:load

Note that when you reset the data the id values on each record will change and
a URL that may have worked before may no longer work.
