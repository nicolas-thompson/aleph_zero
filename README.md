## Setup

Import data:

``` $ mysqlimport --fields-terminated-by='\t' --columns=first_name,last_name --local -uroot -p -d DATABASE_NAME /path/to/users.csv```