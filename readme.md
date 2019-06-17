<h1 align="center">PATCOMMERCE</h1>
<p align="center">A basic functional ecommerce API</p>

### 🛠 Installation

#### REQUIREMENTS

-   [PHP 7.1.3](https://www.php.net/downloads.php) - PHP Binary
-   [Composer](https://getcomposer.org/download) - Composer Dependency Manager
-   [MySQL](https://www.mysql.com/downloads) - Database Management System

#### STEPS

-   Clone the repository

```bash
git clone https://github.com/iamwebwiz/patcommerce-api.git
```

-   Copy environment file

```bash
cp .env.example .env
```

-   Create and configure database in .env
-   Install dependencies

```bash
composer install
```

-   Generate application key

```bash
php artisan key:generate
```

-   Run migrations

```bash
php artisan migrate
```

-   Generate JWT secret

```bash
php artisan jwt:secret
```

-   Serve app

```bash
php artisan serve
```

### ✅ TEST

```bash
composer test
```

### 💻 DEMO

-   [https://patcommerce.herokuapp.com](https://patcommerce.herokuapp.com)

<h2 align="center">AVAILABLE ENDPOINTS</h2>

<details>
  <summary>POST /register</summary>
  <br>
  _Registers a user_
  - Form fields:
    - name: string
    - email: string
    - password: string
  - Response
    - token
    - user
</details>

<details>
  <summary>POST /login</summary>
  <br>
  _Log a user in_
  - Form fields:
    - email: string
    - password: string
  - Response
    - token
    - user
    - status: 200
</details>

<details>
  <summary>GET /logout</summary>
  _Signs a user out_
</details>

<details>
  <summary>GET /categories</summary>
  <br>
  _Fetch all categories_
  - Response
    - data
    - status: 200
</details>

<details>
  <summary>POST /categories</summary>
  <br>
  _Add a new category_
  - Form fields:
    - name: string, required
    - description: string, optional
  - Response
    - data
    - status: 201
</details>

<details>
  <summary>GET /categories/:id</summary>
  <br>
  _Fetch a single category_
  - URL params:
    - id: integer (id of the category)
  - Response
    - data
    - status: 200
</details>
