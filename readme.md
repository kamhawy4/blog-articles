## Laravel 5 example ##

For Laravel 5.8.0 [here](https://laravel.com/docs/5.8/).

### Installation ###

* `git clone https://github.com/kamhawy4/blog-articles-laravel-boilerplate.git`
* `cd blog-articles`
* `composer install`
* `php artisan key:generate`
* Create a database and inform *.env*
* `php artisan migrate --seed` to create and populate tables
* `php artisan vendor:publish` to publish filemanager

* `php artisan serve` to start the app on http://localhost:8000/


### Features ###

* Authentication (registration, login, logout, password reset)
* Managers dashboard create [ Users ,  Roles and Permissions ,  Managers , Articles , Categories , Tags 
  , Comments , Settings , Send Mails , Log , Social Links ]
* Front End Support Multi Language [Arabic and English] Just Articles Support Multi Language
* Categray and Tags Not Support  Multi Language

### Working now on ###

* Api For Blog
* Make Section categray and Tags Support Arabic and English
* Add Datatable Plugin to Make Pagination in Table Data in Backend

### Packages included ###

* laravelcollective/html
* Intervention/Image
* spatie/laravel-permission
* consoletvs/charts

### Tricks ###

To test application the database is seeding with users :
* Url BackEnd : http://localhost:8000/dashboard
* Manager : email = admin@admin.com, password = 123456
