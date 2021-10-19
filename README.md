# B2NH

## Documentations of the API

- Not yet.

## Launch dev environment
- Clone the repo ;
- `cd app`
- `cp .env.example .env`
- Edit .env to match your configuration
- `docker-compose up -d`
- `docker-compose exec php php artisan migrate:fresh --seed`
- Open your browser <http://127.0.0.1:9042>

## Tests
Tests are written within `./app/tests/` directory. 

- `docker-compose exec php ./vendor/bin/phpunit`

## License
- Licensed with GPLv3.