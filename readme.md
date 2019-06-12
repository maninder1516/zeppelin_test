<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About Project

This is test web application to upload images and produce the images in required resolutions.

## Project Requirements

Requirements:
1. Composer should be installed.

2. GD Library should be installed and enabled
2(a) Install according to PHp version - sudo apt-get install php7.1-gd
2(b) Enable the library GD2. Open php.ini file, and then find the line:
;extension=php_gd2.dll, remove the semicolon in the front to enable it.

3. Laravel Specific Requirements
PHP >= 7.1.3
BCMath PHP Extension
Ctype PHP Extension
JSON PHP Extension
Mbstring PHP Extension
OpenSSL PHP Extension
PDO PHP Extension
Tokenizer PHP Extension
XML PHP Extension

## Project Installation

Project Installation Steps:
1. Clone the Repositroy.
-- git clone https://github.com/maninder1516/zeppelin_test.git

2. Go to the directory. 
-- cd project_name

3. Copy the .env.example to .env and configure it with applicable data(Mainly DB details).

4. Run composer install.

5. Make sure the directories bootstrap/cache and storage are writable
-- sudo chmod -R 777 /bootstrap/cache /storage

6. Run the migrations
-- php artisan migrate

7. Run database seeder(for development and test only!)
-- php artisan db:seed

8. Now run the project either by configuring the virtual host or simply using laravel server
-- php artisan serve

9. Upload the required image and select the required resolutions in which  we want the image(media)

10. It will deliver the required image


## License

The Laravel framework is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).
