# Mini CRM — Admin Panel

A Laravel-based admin panel for managing companies and their employees. Built with Laravel 11, Breeze authentication, and a clean custom theme.

## Features

- **Authentication** — login/logout (registration disabled)
- **Companies CRUD** — name, email, logo (min 100×100px), website
- **Employees CRUD** — first name, last name, company dropdown, email, phone
- **Pagination** — 10 entries per page on all list views
- **Validation** — FormRequest classes for all inputs
- **Logo upload** — stored in `storage/app/public`, publicly accessible
- **API endpoint** — `GET /api/companies/{id}` returns company with employees and `employee_count`
- **Responsive design** — clean light theme, mobile-friendly navigation
- **Tests** — 25 passing tests (authentication, CRUD, API)

## Prerequisites

- PHP 8.2+
- Composer
- MySQL 5.7+ (or any Laravel-supported database)
- Node.js 18+ and npm (for frontend build)

## Quick Start

```bash
# 1. Clone the repository
git clone <repo-url>
cd xperts

# 2. Install PHP dependencies
composer install

# 3. Copy environment file and generate app key
cp .env.example .env
php artisan key:generate

# 4. Configure your database in .env
# DB_CONNECTION=mysql
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=xperts
# DB_USERNAME=root
# DB_PASSWORD=

# 5. Build frontend assets
npm install
npm run build

# 6. Run migrations and seed the database
php artisan migrate --seed

# 7. Create storage symlink (for logo uploads)
php artisan storage:link

# 8. Start the development server
php artisan serve
```

Open **http://localhost:8000** in your browser.

## Default Login

| Email | Password |
|---|---|
| `admin@admin.com` | `password` |

## API Documentation

### Get Company with Employees

```
GET http://localhost:8000/api/companies/{id}
```

**Response:**
```json
{
  "data": {
    "id": 1,
    "name": "Acme Corp",
    "email": "contact@acme.com",
    "logo": "http://localhost:8000/storage/logos/abc123.png",
    "website": "https://acme.com",
    "employee_count": 5,
    "employees": [
      {
        "id": 1,
        "first_name": "John",
        "last_name": "Doe",
        "email": "john@acme.com",
        "phone": "+60 12-345 6789"
      }
    ]
  }
}
```

## Testing

```bash
php artisan test
```

All 25 tests should pass.

### Testing the API with Postman

1. Open Postman
2. Create a GET request to `http://localhost:8000/api/companies/1`
3. Check the response includes `employee_count` and `employees` array

## Project Structure

```
app/
  Http/
    Controllers/
      Api/CompanyController.php    ← API endpoint
      CompanyController.php        ← Web CRUD
      EmployeeController.php       ← Web CRUD
    Requests/
      StoreCompanyRequest.php      ← Validation
      UpdateCompanyRequest.php
      StoreEmployeeRequest.php
      UpdateEmployeeRequest.php
    Resources/
      CompanyResource.php          ← API response formatting
      EmployeeResource.php
  Models/
    Company.php                    ← HasMany employees
    Employee.php                   ← BelongsTo company
database/
  migrations/                      ← Companies & employees tables
  seeders/DatabaseSeeder.php       ← Admin user seed
resources/views/
  companies/                       ← Create, edit, index, show
  employees/                       ← Create, edit, index, show
  layouts/                         ← App & guest layouts
routes/
  web.php                          ← Web routes (auth + CRUD)
  api.php                          ← API route
  auth.php                         ← Auth routes (register disabled)
```

## License

This project is for review purposes.
