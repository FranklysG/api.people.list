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

##### Obs:

- You don't need to worry about creating the database, it is being generated automatically, as soon as you run docker
- The conference file is at

```yml
docker/mariadb/create-database.sh
```

- The application tests were done using the PhpUnit library
- The structure of the project, I tried to make it as close as possible to laravel, as it is already more familiar
- If you are trying to run and are having problems starting docker, it may be that your containers cache is bad, so I recommend that you clean everything with

```yml
docker system prune -a
```

- after that try running the command again