
Installation
------------
```shell
docker-compose up --build --force-rm --no-cache
```

```shell
docker-compose exec php composer install
docker-compose exec php php bin/console doctrine:fixtures:load
```

~~//php bin/console doctrine:migrations:migrate~~


