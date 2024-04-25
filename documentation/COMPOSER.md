# COMPOSER

* dependency manager
* installs/updates libraries the project depends on
* installs packages from [Packagist.org](https://packagist.org/) by default
* package names must be unique that's why they consist of the package/repo name and the authors name

## Syntax
```php
//calling a command
php composer.phar [command]

//create composer.json
php composer.phar init

//install dependencies
php composer.phar install

//update dependencies
php compose.phar update

//specify required packages
php composer.phar require

//remove packages from composer.json file
php composer.phar remove user/package

//increase the lower limit for package versions
php composer.phar bump

//reinstall packages
php composer.phar reinstall user/package

//show all available packages
php composer.phar show

//update composer to the latest version
php composer.phar self-update

//clone a project
php composer.phar create-project user/package this/is/a/path/

//get more information about a command
php composer.phar help self-update
```

## composer.json properties
```json
{
  //package name
  "name": "user/package",
  
  //describtion of package
  "description": "This is the description",
  
  //package version
  "version": "1.0.0",
  
  //release time of version
  "time": "2024-02-13 15:35:12",
  
  //license of package
  "license": [
    "Apache-2.0",
    "MIT"
  ],
  
  //authors of package
  "authors": [
    {
      "name": "Max Mustermann",
      "email": "max.mustermann@example.de",
      "homepage": "https://www.max.de",
      "role": "Developer"
    },
    {
      "name": "Fred Mustermann",
      "email": "fred.mustermann@example.de",
      "homepage": "https://www.fred.de",
      "role": "Developer"
    }
  ],
  
  //sets packages that are required
  "require": {
    "monolog/monolog": "1.0.*",
    "user/package": "2.1.1"
  }
}
```