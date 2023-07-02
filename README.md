# Проект "Карта кликов"




Requirements
------------
 - PHP >= 7.0.0
 - Laravel >= 5.5.0
 - Fileinfo PHP Extension

Installation
------------
Панель администратора  encore/laravel-admin

> This package requires PHP 7+ and Laravel 5.5, for old versions please refer to [1.4](https://laravel-admin.org/docs/v1.4/#/)


```
composer require encore/laravel-admin
```


```
php artisan vendor:publish --provider="Encore\Admin\AdminServiceProvider"
```

Установка 
```
php artisan admin:install
```

Запись в базу ссылкок для админки

```
php artisan artisan db:seed
```


Open `http://localhost/admin/` in browser,use username `admin` and password `admin` to login.