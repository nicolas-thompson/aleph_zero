## Setup

From inside the `/src` directory...

`$ composer install`

`$ cp .env.example .env`

`$ php artisan key:generate`

This next step needs Docker installed locally.

Mac - https://docs.docker.com/docker-for-mac/install/

Linux - https://docs.docker.com/install/linux/docker-ce/ubuntu/

Windows - https://docs.docker.com/docker-for-windows/

`$ docker-compose build && docker-compose up -d`

In case there are port binding issues. Stop Apache.

Mac - `sudo apachectl stop`

Linux - `sudo service apache2 stop`

Edit the ```.env``` file:

```
APP_URL=http://localhost:8080

...

DB_HOST=mysql
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=homestead
DB_USERNAME=homestead
DB_PASSWORD=secret

```


`$ docker-compose exec php php /var/www/artisan migrate`

Import data:

Connect to the database with your client using these credentials:

Host: 127.0.0.1

Username: homestead

Password: secret

Port: 3307

There is a file `/users.sql` containing an sql dump, use this to import data.

Run the tests:

`$ vendor/bin/phpunit`

Navigate to:

`localhost:8080`

Useful Docker commands:

##### Kill all running containers.
docker kill $(docker ps -q)

##### Delete all stopped containers.
docker rm $(docker ps -a -q)

##### Delete all untagged images.
docker rmi $(docker images -q -f dangling=true)

##### Delete ALL images
docker rmi $(docker images -q)

Notes:

There is an issue with the group by clause in the search query.

``` SQLSTATE[42000]: Syntax error or access violation: 1055 Expression #1 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'vitl.users.id' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by (SQL: select * from `users` where `last_name` like %wright% or `first_name` like %wright% group by `first_name` order by `last_name` asc, `first_name` asc) ```

The solution was to turn off mysql strict mode. Let's debate security?


There is an issue with the command in the travis build process which runs the unit tests.

Because the application is now dockerized it can't find phunit in order the run the unit tests.
