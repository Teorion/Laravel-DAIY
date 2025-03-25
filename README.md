# Laravel-DAIY Setup Guide

## Prerequisites

Ensure you have the following installed:

-   PHP (latest stable version)
-   Composer
-   Node.js & npm
-   MySQL/SQLite/PostGreSQL (or any preferred database)

## Installation Steps

### Step 1: Clone the Repository & Install Dependencies

```sh
composer install
npm install
```

### Step 2: Configure Environment Variables

Copy the example environment file and set up your database credentials in the `.env` file.

```sh
cp .env.example .env
```

### Step 3: Generate Application Key

```sh
php artisan key:generate
```

### Step 4: Run Database Migrations & Seed Data

```sh
php artisan migrate --seed
```

### Step 5: Set Up Laravel Shield

```sh
php artisan shield:setup
```

### Step 6: Compile Frontend Assets

```sh
npm run build
```

### Step 7: Start the Application

```sh
php artisan serve
```

The application will be accessible at `http://127.0.0.1:8000`.

## Additional Notes

-   If using a queue system, start the queue worker:
    ```sh
    php artisan queue:work
    ```
-   If encountering permission issues, ensure storage and bootstrap cache directories are writable:
    ```sh
    chmod -R 777 storage bootstrap/cache
    ```
-   For production, configure a web server like Nginx or Apache and set up environment variables accordingly.
