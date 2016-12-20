## About Invoice Calculator

Laravel based application of Basic Human Resource Management and (Auto) Invoice Calculator

## Install Guide

Install composer dependencies

```sh
composer install
```

Setup environment

```sh
cp .env.example .env
php artisan key:generate
```

Modify .env file to setup database connection

Database migration and seeds

```sh
php artisan migrate --seed
```

### Default Users Credentials

Email: admin@admin.com  
Password: admin