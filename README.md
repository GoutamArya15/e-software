# Task Management REST API

This is a simple **Task Management REST API** built with **Laravel**. Users can register, log in, and manage their personal tasks.

---

## Features

- User registration and login with **Laravel Sanctum API authentication**
- Create, read, update, and delete tasks (CRUD)
- Mark tasks as completed
- Filter and paginate tasks
- Input validation (title required, due date not in the past)

---

## Technical Stack

- Laravel (latest version)
- MySQL (or PostgreSQL)
- Laravel Sanctum
- Eloquent ORM
- RESTful API structure

---

## Installation

1. Clone the repository:

```bash
git clone https://github.com/GoutamArya15/e-software.git
cd e-software

Install dependencies:

composer install

Copy .env.example to .env and set your database credentials:

cp .env.example .env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=task_api
DB_USERNAME=root
DB_PASSWORD=

Generate application key:

php artisan key:generate

Run migrations:

php artisan migrate

Serve the application:

php artisan serve

The API will be available at: http://127.0.0.1:8000
