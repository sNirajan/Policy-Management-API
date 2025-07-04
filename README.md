# Policy Management API

A simple Laravel REST API to manage insurance policies.

## Features

- CRUD operations for policies
- Validation and error handling
- RESTful JSON responses
- Pest tests for endpoints
- SQLite or MySQL support

## Endpoints

| Method | URL                   | Description             |
|--------|-----------------------|-------------------------|
| GET    | /api/policies         | List all policies      |
| POST   | /api/policies         | Create a new policy    |
| GET    | /api/policies/{id}    | Show a single policy   |
| PUT    | /api/policies/{id}    | Update a policy        |
| DELETE | /api/policies/{id}    | Delete a policy        |

## Setup Instructions

1. Clone the repo:
git clone https://github.com/YOUR-USERNAME/Policy-Management-API.git
cd Policy-Management-API

markdown
Copy
Edit

2. Install dependencies:
composer install

markdown
Copy
Edit

3. Copy `.env` and configure:
cp .env.example .env

markdown
Copy
Edit
- Set `DB_CONNECTION` to `sqlite` or `mysql`.

4. Create SQLite file:
touch database/database.sqlite

markdown
Copy
Edit

5. Generate app key:
php artisan key:generate

markdown
Copy
Edit

6. Migrate:
php artisan migrate

cpp
Copy
Edit

7. Seed (optional):
php artisan db:seed

markdown
Copy
Edit

8. Run:
php artisan serve

shell
Copy
Edit

## Running Tests

php artisan test

shell
Copy
Edit

## License

MIT