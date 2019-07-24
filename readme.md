## Laravel 5 example ##

For Laravel 5.8.0 [here](https://laravel.com/docs/5.5/).

### Installation ###

* `git clone https://github.com/kamhawy4/blog-articles.git`
* `cd blog-articles`
* `composer install`
* `php artisan key:generate`
* Create a database and inform *.env*
* `php artisan migrate --seed` to create and populate tables
* `php artisan vendor:publish` to publish filemanager

* `php artisan serve` to start the app on http://localhost:8000/


### Features ###

* Authentication (registration, login, logout, password reset)
* Managers dashboard create users, Managers ,Articles , Categories , comments ,Settings

### Packages included ###

* laravelcollective/html
* Intervention/Image

### Tricks ###

To test application the database is seeding with users :
* Url BackEnd : http://localhost:8000/dashboard
* Manager : email = admin@admin.com, password = 123456
