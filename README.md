# expense-module-laravel

# Overview
This is a modular Laravel package implementing an Expense management system.
It follows a modular structure under the Modules\Expenses.

# Key Features
RESTful API with CRUD for Expenses
UUID primary keys for Expense model
Event broadcasting on Expense creation
Resource classes for API response formatting
Modular directory structure for scalability

# Setup Instructions
Clone the repository:
- `git clone <your_repo_url>`
- `cd expense-module-laravel`

# Install dependencies:
`composer install`

# Copy and configure .env file:
- `cp .env.example .env`
- `php artisan key:generate`

# Run migrations:
`php artisan migrate`

# Use Postman or any API client to interact with the API:
- Base URL: http://localhost:8000/api/expenses
- Supported endpoints: GET /expenses, POST /expenses, PUT /expenses/{id}, DELETE /expenses/{id}

# Project Structure and Decisions
- Modules/Expenses/ — all module code, following Laravel modular pattern
- Models/Expense.php — Eloquent model with UUID primary key and casting
- Http/Controllers/ExpenseController.php — controller for API routes
- Http/Requests/CreateExpenseRequest.php — request validation
- Http/Services/ExpenseService.php — logic layer, separating controller from model
- Events/ExpenseCreated.php — event triggered on expense creation
- Resources/ExpenseResource.php — resource for API response formatting
- Routes loaded from Routes/api.php within the module service provider
- Used Laravel 12 features such as HasUuids trait


# Assumptions Made
- API consumers will provide all necessary fields (title, amount, category, expense_date, notes) in requests.
- UUIDs are used as primary keys for Expenses.
- No authentication middleware applied for ease of testing, but it should be added in production.


# Time Spent
- Total time spent on development and debugging: approximately 5 hours.
- Includes time setting up the module structure, implementing CRUD, fixing UUID and route binding issues, and resource formatting.
