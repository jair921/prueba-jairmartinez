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
Configure connection data to the database in the .env file
```sh
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=tienda
DB_USERNAME=db
DB_PASSWORD=secret
```

Run seeders
```sh
php artisan db:seed
```

Configure connection data for payment gateways (app/payments.php)
View [Placetopay](https://placetopay.github.io/web-checkout-api-docs/#webcheckout)
```sh
'placetopay' => [
        'url'=>'https://***placetopay.com/redirection/',
        'login'=>'6dd**********',
        'trankey'=>'024*****',
    ]
```

### Run tests (Optional)
```sh
php artisan test
```
