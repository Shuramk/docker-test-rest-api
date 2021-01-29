
Installation
------------
```shell
git clone
docker-compose up -d --build
```

```shell
docker-compose exec php composer install
docker-compose exec php php bin/console doctrine:migrations:migrate -n
docker-compose exec php php bin/console doctrine:fixtures:load -n
```

Check
------------
`Get token:`
POST http://localhost/api/login_check
_{
    "username": "Test",
    "password": "testtest"
}_

`Get current rates:`
GET http://localhost/api/rates

`Get archive rates:`
GET http://localhost/api/rates_history?date=YY-mm-dd
