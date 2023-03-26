### People List Backend

Open this project in other terminal and run!

- The entire application database will be configured automatically when running docker
- A standard record will be inserted, a person and a company, connected by a pivot table

##### Docker:

```yml
docker-compose up
```

In other terminal run the command to install the compose dependencies and start autoloading the classes

##### Compose:

```yml
docker exec -it people_list_web composer install
```

Now run this command to run the application tests

##### PhpUnit:

```yml
docker exec -it people_list_web vendor/bin/phpunit
```
