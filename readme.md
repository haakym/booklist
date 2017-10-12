# Book List

```
# create .env file
> cp .env.example .env

# generate key
> php artisan key:generate

# create database file
> touch database/database.sqlite

# to create the database tables
> php artisan migrate

# for seed data (whips up some books)
> php artisan db:seed

# run app
> php artisan serve

# run tests
# ./vendor/bin/phpunit
```

## Notes

- Sorting is not case insensitive I assume because of my choice of using SQLITE for simplicity. In a real world app I would most likely use MySQL and the appropriate collation. See: https://stackoverflow.com/questions/44756938/orderby-case-insensitive-with-laravel

