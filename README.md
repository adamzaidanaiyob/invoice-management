# Invoice Management System

A simple invoice management system built with Laravel and Vue.js.

## Features

- User login/registration
- Add and manage customers
- Create invoices with multiple items
- Automatic total calculation
- View all invoices with pagination

## Requirements

- PHP 8.0+
- MySQL
- Node.js
- Composer

## Installation

1. Clone the repository
```bash
git clone https://github.com/yourusername/invoice-management.git
cd invoice-management
```

2. Install dependencies
```bash
composer install
npm install
```

3. Setup environment
```bash
cp .env.example .env
php artisan key:generate
```

4. Configure database in `.env`
```env
DB_DATABASE=invoice_management
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

5. Run migrations
```bash
php artisan migrate
```

6. Install authentication
```bash
composer require laravel/ui
php artisan ui vue --auth
```

7. Build assets and start server
```bash
npm run dev
php artisan serve
```

Visit `http://localhost:8000`

## Usage

1. Register/Login to access the system
2. Add customers from the Customers menu
3. Create invoices from the Invoices menu
4. Add multiple line items to each invoice
5. View all invoices in the invoice list

## Tech Stack

- Laravel 8+
- Vue.js 3
- MySQL
- Bootstrap 5

## License

MIT License