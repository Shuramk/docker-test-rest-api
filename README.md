
Installation
------------
```shell
git clone
docker-compose up -d --build
```

```shell
docker-compose exec php composer install
docker-compose exec php php bin/console doctrine:migrations:migrate
docker-compose exec php php bin/console doctrine:fixtures:load
```

Check
------------
Get token:

POST http://localhost/api/login_check

{
    "username": "Test",
    "password": "testtest"
}

Get current rates:
GET http://localhost/api/rates

Get archive rates:
GET http://localhost/api/rates?date=YY-mm-dd
