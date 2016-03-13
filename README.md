Tax Application [![Build Status](https://travis-ci.org/ovidiumght/taxApp.svg?branch=master)](https://travis-ci.org/ovidiumght/taxApp)
===

###
Proof of concept in separating business logic from the presentation layer (MVC framework) and persistance layer (Database, Flat Files etc.).
For now the data is read from an XML file. This can be easily changed by creating another country repository (a class that will implement the `CountryRepository` interface.

### Folder Structure
 - All business logic with it's tests is separated in the `tax` folder
 - The presentation logic (Based on Symfony 2) is located in the `src` folder
 - The data store is in the `data/tax.xml` file
 - The test data for the integration tests is in the `testData/tax.xml`

### Build

To see more details about the build click on the badge: [![Build Status](https://travis-ci.org/ovidiumght/taxApp.svg?branch=master)](https://travis-ci.org/ovidiumght/taxApp)

###Running the application:

```
git pull
composer install
php bin/console server:run
```
Navigate to http://localhost:8000 to see the report

###Running the tests:
```
git pull
composer install
cd tax/Tests
phpunit
```