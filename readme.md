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

### Default Admin User Credentials

Email: admin@admin.com  
Password: admin

### Schedule Cron Job

Add following cron entry to your server
```sh
* * * * * php /path/to/project schedule:run >> /dev/null 2>&1
```