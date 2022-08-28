I used  a third-party library called “php-open-source-saver/jwt-auth” to make authentication
----------------------------------------------------------------------------------------------

Installation


Clone the Repo:

>git clone https://github.com/Abdallahmohsen979/Stack.git

> cd Stack

> composer install

> npm install

> cp .env.example .env

> Set up .env file

> php artisan key:generate

>php artisan vendor:publish --provider="PHPOpenSourceSaver\JWTAuth\Providers\LaravelServiceProvider"

>php artisan jwt:secret

// create database stack 

> php artisan migrate

> php artisan serve
