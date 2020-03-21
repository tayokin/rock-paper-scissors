# Installation steps
## Clone repository
```bash
git clone git@github.com:tayokin/rock-paper-scissors.git
```
## Setup env file
```bash
cp .env .env.local
```
### Set your user and group id into .env file
#### Check your user and group id
```bash
id
```
For example, if result of your "id" command starts from: uid=1000(admin) gid=1000(admin) you set user and group in .env.local file to:
 
```bash
 USERID=1000
 GROUPID=1000
```
## Run on Docker
```bash
docker-compose up -d --build
```
Everything is done

# Open link in your browser:
https://127.0.0.1:8888/

# Run Unit tests
## Enter into php-fpm docker container
```bash
docker-compose exec rock-paper-scissors-php-fpm ash
```
## Run tests
```bash
php bin/phpunit --colors=never --coverage-text
```

#Task text 
```
Задача: Бумага-ножницы-камень
Описание:
Создайте игру, в которой два игрока с разными стратегиями играют друг против друга.
- Ножницы бьют бумагу
- Камень бьет ножницы
- Бумага бьет камень
- Если оба игрока выбирают одно и то же, это ничья

Реализуйте двух игроков:
Игрок А: каждый раз выбирает бумагу
Игрок Б: каждый раз делает случайный выбор

Игроки будут соревноваться 100 раз друг против друга.
В результате мы хотели бы видеть результат поединков.
Код должен быть хорошо протестирован с выбранным вами модульным решением.
Язык программирования - PHP.
Вы можете использовать любую IDE и создавать инструменты по вашему выбору.
Пожалуйста, объясните свой выбор.
Так же необходима инструкция по запуску приложения.
```