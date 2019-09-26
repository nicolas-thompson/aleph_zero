## Setup

Import data:

``` $ mysqlimport --fields-terminated-by='\t' --columns=first_name,last_name --local -uroot -p -d DATABASE_NAME /path/to/users.csv```

Install dependancies:

``` $ composer install ```

Edit the .env file

``` DB_DATABASE=your_database_name ```

Run migrations:

``` $ php artisan migrate ```

