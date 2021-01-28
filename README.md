
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
