<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice Management System</title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f8f9fa;
        }
        .container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        h1 {
            color: #2c3e50;
            border-bottom: 3px solid #3498db;
            padding-bottom: 10px;
            margin-bottom: 30px;
        }
        h2 {
            color: #34495e;
            margin-top: 30px;
            margin-bottom: 15px;
        }
        code {
            background-color: #f4f4f4;
            padding: 2px 6px;
            border-radius: 4px;
            font-family: 'Courier New', monospace;
            font-size: 0.9em;
        }
        pre {
            background-color: #2c3e50;
            color: #ecf0f1;
            padding: 15px;
            border-radius: 8px;
            overflow-x: auto;
            margin: 15px 0;
        }
        pre code {
            background: none;
            color: inherit;
            padding: 0;
        }
        ul, ol {
            margin-left: 20px;
        }
        li {
            margin-bottom: 8px;
        }
        .feature-list {
            background: #ecf0f1;
            padding: 20px;
            border-radius: 8px;
            margin: 15px 0;
        }
        .tech-stack {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin: 15px 0;
        }
        .tech-item {
            background: #3498db;
            color: white;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 0.9em;
        }
        .installation-step {
            background: #e8f5e8;
            border-left: 4px solid #27ae60;
            padding: 15px;
            margin: 10px 0;
        }
        .requirement {
            background: #fff3cd;
            border: 1px solid #ffeaa7;
            padding: 10px;
            border-radius: 5px;
            margin: 5px 0;
        }
        .badge {
            background: #e74c3c;
            color: white;
            padding: 4px 8px;
            border-radius: 12px;
            font-size: 0.8em;
            margin-left: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Invoice Management System</h1>
        
        <p>A simple invoice management system built with Laravel and Vue.js.</p>

        <h2>Features</h2>
        <div class="feature-list">
            <ul>
                <li>User login/registration</li>
                <li>Add and manage customers</li>
                <li>Create invoices with multiple items</li>
                <li>Automatic total calculation</li>
                <li>View all invoices with pagination</li>
            </ul>
        </div>

        <h2>Requirements</h2>
        <div class="requirement">PHP 8.0+</div>
        <div class="requirement">MySQL</div>
        <div class="requirement">Node.js</div>
        <div class="requirement">Composer</div>

        <h2>Installation</h2>
        
        <div class="installation-step">
            <strong>1. Clone the repository</strong>
            <pre><code>git clone https://github.com/yourusername/invoice-management.git
cd invoice-management</code></pre>
        </div>

        <div class="installation-step">
            <strong>2. Install dependencies</strong>
            <pre><code>composer install
npm install</code></pre>
        </div>

        <div class="installation-step">
            <strong>3. Setup environment</strong>
            <pre><code>cp .env.example .env
php artisan key:generate</code></pre>
        </div>

        <div class="installation-step">
            <strong>4. Configure database in <code>.env</code></strong>
            <pre><code>DB_DATABASE=invoice_management
DB_USERNAME=your_username
DB_PASSWORD=your_password</code></pre>
        </div>

        <div class="installation-step">
            <strong>5. Run migrations</strong>
            <pre><code>php artisan migrate</code></pre>
        </div>

        <div class="installation-step">
            <strong>6. Install authentication</strong>
            <pre><code>composer require laravel/ui
php artisan ui vue --auth</code></pre>
        </div>

        <div class="installation-step">
            <strong>7. Build assets and start server</strong>
            <pre><code>npm run dev
php artisan serve</code></pre>
        </div>

        <p><strong>Visit:</strong> <code>http://localhost:8000</code></p>

        <h2>Usage</h2>
        <ol>
            <li>Register/Login to access the system</li>
            <li>Add customers from the Customers menu</li>
            <li>Create invoices from the Invoices menu</li>
            <li>Add multiple line items to each invoice</li>
            <li>View all invoices in the invoice list</li>
        </ol>

        <h2>Tech Stack</h2>
        <div class="tech-stack">
            <span class="tech-item">Laravel 8+</span>
            <span class="tech-item">Vue.js 3</span>
            <span class="tech-item">MySQL</span>
            <span class="tech-item">Bootstrap 5</span>
        </div>

        <h2>License</h2>
        <p>MIT License</p>
    </div>
</body>
</html>