# Dashfi Test Project
Currency Exchanger, Laravue Stack, Third party Integration for exchange rate.
## Dashio Test Project API Install Guide.

## Project setup
```
composer install
```

## Set DB Access Information. 
#### You can set proper DB setting.
#### I used postgresql and you can see the setting in .env.example
```
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=dashfi
DB_USERNAME=
DB_PASSWORD=
```

### Config Fixer.io API Key in .env file. 
```
FIXER_IO_API_KEY=0bc05dc2a9ea0e4f710e1be6fab6df59
```

### Setup database using migration and seed.
In the command:
  - Migration:   
    ```
    php artisan migrate 
    ```
  - Seed Currency Table: 
    ```
    php artisan db:seed --class=InitialCurrencySeeder
    ```
#### Run API Server.
```
php artisan serve
```
### API Server should run on port 8000
