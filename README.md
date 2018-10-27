blog
====

A Symfony project created on October 20, 2018, 5:11 pm.
http://blog-gapz101.1d35.starter-us-east-1.openshiftapps.com

Installation
------------
* Clone this repository
* Install vendors: `composer install`
* Run local server: `bin/console server:run`, visit `http://localhost:8000` or 
`http://localhost:8000/admin`
* Admin user is `admin`, password `admin`

Deploy
------
* https://symfony.com/doc/current/deployment.html
* Make sure to `web/uploads` directory writable: `blog-root$ chmod 0777 web/uploads`

Development
-----------
* Download node modules `npm install` (assuming npm is installed) and components `bower install`
* Build `grunt` and watch for changes `grunt watch`

The application is using sqlite3 database located in `var/data/data.sqlite`. To
use other database such as mysql, edit file `app/config/config.yml` under doctrine
dbal (assuming you know how to configure yml files). Then update `app/config/parameters.yml`.

1. Manually create database or run `bin/console doctrine:schema:create` (make sure
the db user has appropriate level of access)
2. Update the schema `bin/console doctrine:schema:update --force`
3. Create default data (users & posts) `bin/console doctrine:fixtures:load -n`
4. To see other useful commands `bin/console`

Directories
-----------
* `src` => Symfony/php sources
   `app/Resources/views` => admin templates
* `src-front` => frontend sources (angularjs)
   `web/templates` => frontend templates

Testing
-------
None for now.
