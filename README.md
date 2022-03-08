<p align="center">
    <a href="#" target="_blank">
        Online Store Application
    </a>
</p>

<p align="center">
    <a href="https://laravel.com/docs/8.x/installation">
        <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg"  width="100" alt="License">
    </a>
</p>

## About
A fashion ecommerce sture

## Features
- Website
- Admin Portal
- Customer/Client Portal

## Requirements
- PHP 8
- [node](https://nodejs.org/)
- npm
- composer

## Clone
You have to clone this repo using either `HTTPS` or `SSH`

- HTTPS
```bash
git clone https://github.com/adaugochi/fashion-app.git
```

- SSH
```bash
git clone git@github.com:adaugochi/fashion-app.git
```

## Install Dependencies
#### Composer Dependencies
```bash
composer install
```

#### Node.js Dependencies
```bash
npm install
```

## Virtual Host Setup (optional)

*Windows*
[Link 1](http://foundationphp.com/tutorials/apache_vhosts.php)
[Link 2](https://www.kristengrote.com/blog/articles/how-to-set-up-virtual-hosts-using-wamp)

*Mac*
[Link 1](http://coolestguidesontheplanet.com/set-virtual-hosts-apache-mac-osx-10-9-mavericks-osx-10-8-mountain-lion/)
[Link 2](http://coolestguidesontheplanet.com/set-virtual-hosts-apache-mac-osx-10-10-yosemite/)

*Debian Linux*
[Link 1](https://www.digitalocean.com/community/tutorials/how-to-set-up-apache-virtual-hosts-on-ubuntu-14-04-lts)
[Link 2](http://www.unixmen.com/setup-apache-virtual-hosts-on-ubuntu-15-04/)

Sample Virtual Host Config for Apache
```apache
<VirtualHost *:80>
    ServerAdmin admin@example.com
    DocumentRoot "<WebServer Root Dir>/manup/public"
    ServerName local.manup.com
    <Directory <WebServer Root Dir>/manup/public>
       AllowOverride all
       Options -MultiViews
      Require all granted
    </Directory>
</VirtualHost>
```

## Environment Variables
Make a copy of `.env.example` to `.env` in the env directory.

## Card Number
```
4242 4242 4242 4242
```

## Setup Database

#### Create Database
```sql
CREATE DATABASE fashion_app CHARACTER SET utf8 DEFAULT COLLATE utf8_unicode_ci;
```

### Migration
```bash
php artisan migrate
```

### Specify Path
```bash
php artisan migrate --path=database/migrations/filename.php
```

### Seeding
```bash
php artisan db:seed --class=SeederClass
```

## Compile SCSS to CSS
You can compile your scss file to css using:

```bash
npm run watch
```

## Starting the Application
You can run the application in development mode by running this command from the project directory:

```bash
php artisan serve
```

## Author of README.md
- Adaa Mgbede <adaamgbede@gmail.com>

## Credits
- Adaa Mgbede <adaamgbede@gmail.com>

## Code of Conduct
In order to ensure that the Laravel community is welcoming to all, please review and
abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).
