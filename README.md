# B2NH

## Documentation of the API (Swagger OpenAPI)

- Default: <https://b2nh-api.tintamarre.be/api-docs.html>
- Redoc: <https://b2nh-api.tintamarre.be/api-redoc.html>

## Launch dev environment
- Clone the repo ;
- `cd app`
- `cp .env.example .env`
- `vim .env` and edit it to match your configuration
- `docker-compose up -d`
- `docker-compose exec php php artisan migrate:fresh --seed`
- Open your browser <http://127.0.0.1:9042>

## Tests
Tests are written within `./app/tests/` directory.

- `docker-compose exec php ./vendor/bin/phpunit`

## SQLite Schema

![sqlite_schema](https://user-images.githubusercontent.com/409734/138834720-f658adbd-6ef5-4fff-bb57-57d367ab7c80.png)

## License
- Licensed with GPLv3
