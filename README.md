# MediaTalk Social Network / Backend
MediaTalk is a social networking software developed with Angular (Frontend) and Laravel (Backend) that allows you to build social relationships, with people who share similar professional or personal interests.

Visit the [Frontend](https://github.com/pinko615) side of this project

![mediatalk-social-network](http://pink0.online/main-i.jpg)

## First steps
You can download or clone this project to see the code of the entire website.
```
git clone https://github.com/pinko615/mediatalk-backend.git
```

## Developed with
* Laravel - https://laravel.com/
* MySQL - https://mysql.com/
* MAMP - https://mamp.info/

## Install Composer
Laravel utilizes Composer (https://getcomposer.org/download/) to manage its dependencies. First, download a copy of the composer.phar. Once you have the PHAR archive, you can either keep it in your local project directory or move to usr/local/bin to use it globally on your system. On Windows, you can use the Composer Windows installer.
```
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('sha384', 'composer-setup.php') === 'e0012edf3e80b6978849f5eff0d4b4e4c79ff1609dd1e613307e16318854d24ae64f26d17af3ef0bf7cfb710ca74755a') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"
```

## Install Laravel
First, download the Laravel installer using Composer.
```
composer global require "laravel/installer=~1.1"
```
Make sure to place the ~/.composer/vendor/bin directory in your PATH so the laravel executable is found when you run the laravel command in your terminal.

## Serving Laravel
Typically, you may use a web server such as Apache or Nginx to serve your Laravel applications. If you are on PHP 5.4+ and would like to use PHP's built-in development server, you may use the serve Artisan command:
```
php artisan serve
```
By default the HTTP-server will listen to port 8000. However if that port is already in use or you wish to serve multiple applications this way, you might want to specify what port to use. Just add the --port argument:
```
php artisan serve --port=8080
```

## Environment Configuration
Edit the .env file with your database settings
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_db_name
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

## User Routes
```
Route::prefix('users')->group(function () {
    Route::post('/register', 'UserController@register');
    Route::post('/addFollower', 'UserController@createFollower');
    Route::post('/login', 'UserController@login');
    Route::get('/{id}', 'UserController@getUserById');
    Route::middleware('auth:api')->group(function () {
        Route::get('/logout/{id}', 'UserController@logout');
        Route::put('/update/{id}', 'UserController@update');
        Route::post('/updateProfile', 'UserController@editImageProfile');
    });
});
```

## Post Routes
```
Route::prefix('posts')->group(function () {
    Route::get('/', 'PostController@show');
    Route::middleware('auth:api')->group(function () {
        Route::put('/{id}', 'PostController@update');
        Route::delete('/{id}', 'PostController@destroy');
        Route::post('/addLike/{id}', 'LikeableController@addPostLike');
        Route::post('/addComment/{id}', 'LikeableController@addCommentLike');
        Route::put('/image/{id}', 'PostController@uploadImage');
        Route::post('/', 'PostController@create');
    });
});
```

## Database Tables
![db-tables](http://pink0.online/db1.jpg)

## APIs

* [CryptoCompare] https://cryptocompare.com
* [OpenWeatherMap] https://openweathermap.org/api


## Screenshots

Landing Page
![Landing-Page](http://pink0.online/landing-2.png)

Home
![Home-Page](http://pink0.online/profile-3.png)

Profile
![Profile-Page](http://pink0.online/profile-2.png)

Sign In
![Sign-In](http://pink0.online/login-2.png)

---
* **Martín Pinto Hoffman** - *Full Stack Designer & Developer* - [pinko615](https://github.com/pinko615)
