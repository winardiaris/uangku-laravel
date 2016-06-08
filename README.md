# uangku-laravel

## Instalation
- clone https://github.com/winardiaris/uangku-laravel.git
- copy .env.example to .env
- open .env and  change line
``` 
DB_DATABASE=homestead
DB_USERNAME=homestead
DB_PASSWORD=homestead
MAIL_DRIVER=smtp
MAIL_HOST=mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
```
-  run in terminal
```
$ php artisan key:generate
$ php artisan migrate:install
$ php artisan migrate
```
- for example data run:
```
$ php artisan db:seed 
```
