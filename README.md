## Goals

- build a single page web app that allows a user to search for a given name in the list and display the results. The output should be ordered alphabetically by the users last name and first name (when last names match)

- the front end should communicate with a back end PHP API via AJAX using a query parameter "terms" which contains the search value. A second optional boolean parameter "dupes" should be added to filter out duplicate entries. The data should be hosted on a MySQL or PostgreSQL database.

- code just be fully annotated with meaningful comments and PHP code should be PSR compliant. You can use any PHP framework you like for the back end, however NO framework should be used for the front end (just pure JS).

- ideally the application will be delivered as a self contained docker or vagrant image with minimal set up required, but this is not mandatory if it will take you over the allotted time. If you cannot package the application up via Docker/Vagrant then please provide the exported SQL. Any additional installation steps should be outlined in an included readme file.

## To set up this project, please see the README.md inside /src which is the main application directory.
