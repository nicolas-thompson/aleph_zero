## Setup

Import data:

``` $ mysqlimport --fields-terminated-by='\t' --columns=first_name,last_name --local -uroot -p -d DATABASE_NAME /path/to/users.csv```

Install dependancies:

``` $ composer install ```

Edit the .env file

``` DB_DATABASE=your_database_name ```

Run migrations:

``` $ php artisan migrate ```

Run tests:

``` $ vendor/bin/phpunit ```

Notes:

There is an issue with the group by clause in the search query.

``` SQLSTATE[42000]: Syntax error or access violation: 1055 Expression #1 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'vitl.users.id' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by (SQL: select * from `users` where `last_name` like %wright% or `first_name` like %wright% group by `first_name` order by `last_name` asc, `first_name` asc) ```
