# Laravel Ecommerce System

This is a web-based ecommerce system built with Laravel. The system has two views: an admin view for managing products, orders, and customers, and a client view for browsing products and placing orders.

## Features

### User View

The user view is accessible to all users who visit the website. It allows users to browse and purchase products. The main features of the client view include:

- Browse products by category or search for specific products
- View product details, including price, description, and images
- Add products to a shopping cart
- Checkout and place an order

### Admin View

The admin view is accessible only to users with administrator privileges. It allows administrators to manage product inventory and order fulfillment. The main features of the admin view include:

- Manage product categories, including creating, editing, and deleting categories
- Manage products, including creating, editing, and deleting products
- View and fulfill orders, including marking orders as shipped and canceling orders

## Requirements

To run this ecommerce system, you need to have the following software installed:

- PHP 7.3 or higher
- Composer
- MySQL or another compatible database

## Installation

1. Clone the repository:
```
git clone https://github.com/yourusername/laravel-ecommerce.git
```
2. Install dependencies:
```
cd laravel-ecommerce
composer install
```
3. Create a copy of the `.env.example` file and name it `.env`. Then, update the file with your environment settings:
```
cp .env.example .env
```
4. Generate an application key:
```
php artisan key:generate
```
5. Create the database tables:
```
php artisan migrate
```
6. Seed the database with sample data:
```
php artisan db:seed
```
7. Run the application:
```
php artisan serve
```

The ecommerce system should now be running at `http://localhost:8000`.

## Usage

### Client View
The client view is accessible by visiting the homepage of the website. From there, users can browse products by category or search for specific products using the search bar. Users can view product details by clicking on a product, add products to their shopping cart, and checkout by providing their shipping and payment information.

### Admin View
The admin view is accessible by logging in as an administrator. To log in as an administrator, visit /admin/login and enter your admin credentials. Once logged in, you will be taken to the admin dashboard, where you can manage product categories, products, and orders.

## License

This ecommerce system is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).



