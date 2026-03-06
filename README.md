# Task Management REST API

A simple **Task Management REST API** built with **Laravel**. Users can register, log in, and manage their personal tasks.

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

### 1. Clone the repository

```bash
git clone https://github.com/GoutamArya15/e-software.git
cd e-software
```

### 2. Install dependencies

```bash
composer install
```

### 3. Setup environment

```bash
cp .env.example .env
```

Open `.env` and set your database credentials:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=task_api
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Generate application key

```bash
php artisan key:generate
```

### 5. Run migrations

```bash
php artisan migrate
```

### 6. Start the server

```bash
php artisan serve
```

The API will be available at: **http://127.0.0.1:8000**

---

## API Endpoints

### 1. Authentication

> Since this API uses **Laravel Sanctum**, you must first register or log in to get an API Token.

| Method | Endpoint        | Description          | Payload (JSON)                                                          |
| ------ | --------------- | -------------------- | ----------------------------------------------------------------------- |
| POST   | `/api/register` | Create a new account | `{"name": "John", "email": "john@example.com", "password": "password"}` |
| POST   | `/api/login`    | Get Access Token     | `{"email": "john@example.com", "password": "password"}`                 |

> **How to use Token:** After a successful login, copy the token from the response. In Postman, go to the **Authorization** tab, select **Bearer Token**, and paste your token there for all subsequent requests.

---

### 2. Task Management

> ⚠️ These routes require the **Bearer Token** in the Header.

| Method | Endpoint                   | Description       | Payload Example                                                                           |
| ------ | -------------------------- | ----------------- | ----------------------------------------------------------------------------------------- |
| GET    | `/api/tasks`               | Fetch all tasks   | None                                                                                      |
| POST   | `/api/tasks`               | Create a new task | `{"title": "Setup XAMPP", "description": "Install and config", "due_date": "2026-12-01"}` |
| GET    | `/api/tasks/{id}`          | Get specific task | None                                                                                      |
| PUT    | `/api/tasks/{id}`          | Update a task     | `{"title": "Updated Task Name"}`                                                          |
| PATCH  | `/api/tasks/{id}/complete` | Mark as finished  | None                                                                                      |
| DELETE | `/api/tasks/{id}`          | Remove a task     | None                                                                                      |

---

## How to Test in Postman

### Headers

Ensure you add the following keys in the **Headers** tab for every request:

```
Accept: application/json
Content-Type: application/json
```

### Base URL

All routes are prefixed with `/api`. If your local server is running, the base URL is:

```
http://127.0.0.1:8000/api
```

### Validation Note

The `due_date` field must be a valid date and **cannot be in the past**.  
Example of a valid date: `2026-12-31`

---
