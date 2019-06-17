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

#### POST /api/register

_Registers a user_

-   Form fields:
    -   name: string
    -   email: string
    -   password: string
-   Response:
    -   token
    -   user

#### POST /api/login

_Logs a user into the application_

-   Form fields:
    -   email: string
    -   password: string
-   Response:
    -   token
    -   user

#### GET /api/logout

_Logs a user out of the application_

#### GET /api/categories

_Fetch all categories_

-   Response
    -   data
    -   status: 200

#### POST /api/categories

_Add a new category_

-   Form fields:
    -   name: string, required
    -   description: string, optional
-   Response:
    -   data
    -   status: 201

#### GET /api/categories/:id

_Fetch a single category_

-   URL parameters:
    -   id: the category id
-   Response:
    -   data
    -   status: 200

#### PATCH /api/categories/:id

_Update a category_

-   URL parameters:
    -   id: the category id
-   Form fields:
    -   name: string
    -   description: string
-   Response:
    -   data

#### DELETE /api/categories/:id

_Deletes a category_

-   URL parameters:
    -   id: the category id
-   Response
    -   status: 204

#### GET /api/products

_Fetch all products_

-   Response
    -   data
    -   status 200

#### POST /api/products

_Add a new product_

-   Form fields
    -   name: string, required, min: 6, max:255
    -   price: required,
    -   category_id: required
    -   description: required
-   Response
    -   status: 201
    -   data

#### GET /api/products/:id

_Fetch a single product_

-   URL parameters
    -   id: the product id
-   Response
    -   data
    -   status: 200

#### PATCH /api/products/:id

_Update a single product_

-   URL parameters
    -   id: the product id
-   Form fields
    -   name
    -   price
    -   category_id
    -   description
-   Response
    -   data
    -   status

#### DELETE /api/products/:id

_Delete a product_

-   URL parameters
    -   id: the product id
-   Response
    -   status 204

#### GET /api/cart

-   _Fetch a user's cart_
-   _Requires authentication_

-   Header
    -   Authorization: Bearer token (token obtained from login/signup)
-   Response
    -   data: array
    -   status 200

#### POST /api/cart/add

-   _Add an item to cart_
-   _Requires authentication_

-   Form fields
    -   price
    -   quantity
    -   product_id
-   Response
    -   data
    -   status 201

#### DELETE /api/cart/:id

-   _Removes an item from user cart_
-   _Requires authentication_

-   URL parameters
    -   id: the cart id
-   Response
    -   status code: 200
    -   status: 'success'
    -   message: 'Item removed from cart.'

#### GET /api/orders

-   _Get a user's orders_
-   _Requires authentication_

-   Response
    -   data: array
    -   status 200

#### POST /api/orders/new

-   _Create a new order_
-   _Requires authentication_

-   Response
    -   status: 'success'

#### DELETE /api/orders/:id

-   _Deletes an order_
-   _Requires authentication_

-   Response
    -   status 204
