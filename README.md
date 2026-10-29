# Baugbog Blog App

A Laravel 12 blog application with MySQL storage and Blade-based post CRUD.

## Requirements

- PHP 8.2 or newer with the `pdo_mysql` extension
- Composer
- MySQL

## Database setup

Create a MySQL database named `baugbog_blog_db` in phpMyAdmin or a MySQL client. The local `.env` file is configured for `127.0.0.1:3306` and the `root` user with no password, which is the default in many XAMPP installations. Update `DB_USERNAME` and `DB_PASSWORD` in `.env` if your MySQL credentials differ.

Run the migrations:

```sh
php artisan migrate
```

## Run the application

```sh
php artisan serve
```

Open the URL printed by Artisan. The home page redirects to the post list. Use the interface to create, read, update, and delete posts.

## Tests

```sh
php artisan test
```

Feature tests use an in-memory SQLite database and do not require a running MySQL server.
