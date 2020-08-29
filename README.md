# Store installation

### Installation

Clone the repository

```sh
$ git clone https://github.com/jair921/prueba-jairmartinez 
```
Enter the directory and update dependencies
```sh
composer update
```

Run key generate
```sh
php artisan key:generate --ansi
```

Configure connection data to the database in the .env file
```sh
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=tienda
DB_USERNAME=db
DB_PASSWORD=secret
```

Run migrations
```sh
php artisan migrate
```

Run seeders
```sh
php artisan db:seed
```

Configure connection data for payment gateways in .env
View [Placetopay](https://placetopay.github.io/web-checkout-api-docs/#webcheckout)
```sh
PLACETOPAY_URL=
PLACETOPAY_LOGIN=
PLACETOPAY_TRANKEY=
```

### Run tests (Optional)
```sh
php artisan test
```
