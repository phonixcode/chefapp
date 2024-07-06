# Project 

Culinary Crafts

## Setup Instructions

Follow these steps to set up the project on your local machine.

### Prerequisites

- PHP >= 8.1
- Composer
- MySQL or any other supported database

### Installation

1. Clone the repository:

```shell
   git clone https://github.com/phonixcode/chefapp.git
```

2. Navigate to the project directory:

```shell
   cd chefapp
```

3. Install dependencies:

```shell
   composer install OR composer update
```

4. Copy the `.env.example` file to `.env`:

```shell
   cp .env.example .env
```

5. Update the .env file with your database credentials. 

```shell
    DB_DATABASE = database_name,
    DB_USERNAME = database_user_name, 
    DB_PASSWORD = database_password.
```

6. Run the below command to generate `APP_KEY`

```shell
    php artisan key:generate
```

7. Run migrations to create the database tables and seed data:

```shell
   php artisan migrate:fresh --seed
```

8. Start the development server:

```shell
   php artisan serve
```

You can now access the application at <http://localhost:8000>.

### Troubleshooting

If you encounter any issues during the setup process, you can refer to the <a href="https://laravel.com/docs/">Laravel documentation</a> for more information and troubleshooting tips.

## Additional Configuration (Optional)

....