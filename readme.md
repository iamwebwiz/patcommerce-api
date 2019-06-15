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
