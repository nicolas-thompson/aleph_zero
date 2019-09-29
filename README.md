Setup
$ composer install

$ docker-compose build && docker-compose up -d

$ docker-compose exec php php /var/www/artisan migrate

Edit the .env file:

APP_URL=http://localhost:8080

DB_HOST=mysql

Import data:

users.sql

Navigate to:

localhost:8080

Notes:

There is an issue with the group by clause in the search query.

SQLSTATE[42000]: Syntax error or access violation: 1055 Expression #1 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'vitl.users.id' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by (SQL: select * from `users` where `last_name` like %wright% or `first_name` like %wright% group by `first_name` order by `last_name` asc, `first_name` asc)

The solution was to turn off mysql strict mode. Let's debate security?

There is an issue with the command in the travis build process which runs the unit test. Because the application is now dockerized it can't find phunit in order the run the test.