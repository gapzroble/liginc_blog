blog
====

A Symfony project created on October 20, 2018, 5:11 pm.
(http://blog-gapz101.1d35.starter-us-east-1.openshiftapps.com)

Installation
------------
* Clone this repository
* Install vendors: `composer install`
* Run local server: `bin/console server:run`, visit `http://localhost:8000` or `http://localhost:8000/admin`

Deploy
------
* (https://symfony.com/doc/current/deployment.html)
* Make sure to `web/uploads` directory writable: `blog-root$ chmod 0777 web/uploads`

Development
-----------
* Download node modules `npm install` and components `bower install`
* Build `grunt` and watch for changes `grunt watch`

Directories
-----------
* `src` => Symfony/php sources
   `app/Resources/views` => admin templates
* `src-front` => frontend sources (angularjs)
   `web/templates` => frontend templates

Testing
-------
None for now.
