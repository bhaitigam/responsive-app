## Generate the application key
php artisan key:generate

## .env file
Make sure your project root contains a .env file with a configuration similar to this:
APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:your-generated-key-here
APP_DEBUG=true
APP_URL=http://localhost

## Clear the configuration cache
php artisan config:clear
php artisan cache:clear

## Create a controller using artisan make:controller
php artisan make:controller Users/UserController