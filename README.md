# Проект "Карта кликов"

```
git clone https://github.com/bobonYa/clickmap

cp .env.example .env
```



#### Что бы развернуть локально, можно использовать Sail(нужен Docker)

```
composer require laravel/sail --dev
php artisan sail:install
./vendor/bin/sail up
```


Установка 
```
php artisan admin:install
```
(либо ./vendor/bin/sail artisan admin:install )

Запись в базу ссылкок для админки

```
php artisan  db:seed
```
(либо ./vendor/bin/sail artisan db:seed )


### Используемые библиотеки
Панель администратора  encore/laravel-admin
heatmap.js 




## Инструкция

Открыть `http://localhost/admin/` 
Доступы: `admin` : `admin` 


http://localhost/admin/projects
#### Добавление проекта.
Необходимо указать название и домент( example.com|localhost etc). Скрипт проверяет домен проекта с рефером в  api

#### Подключение проекта на сайте
Сгенерируется код подключения. 
```
<script src="http://localhost/clickmap.js/1"></script>
```
Нужно скопировать и вставить на подключаемом сайте.
Так же код JS скрипта доступен. Можно использовать отдельно, но необходимо указать проект и ссылку на api
```
resources/views/clickmap.blade.php
```

##### Просмотр heatmap и статистики
После добавления JS на сайт, по мере кликов будет создаваться список страниц на которых кликают пользователи

```
admin/projects/{ID}
```
На странице распологается таблица с указанием ссылки(откуда приходит статистика) и ссылки на heatmap и статистику


