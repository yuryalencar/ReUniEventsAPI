# ReUniEventsAPI

### 1. How to install (DEV)

> Create database

> Install dependencies

```
composer install
```

> Copy .env.example to .env file

```
cp .env.example .env
```

> Configure .env file

> Generate key

```
php artisan key:generate
```

> Run migrations and seed

```
php artisan migrate --seed
```

> Start application
```
php artisan serve
```

### 2. How to use

> Get all itens in facebook (GET)

```
base_url/events
```


> Get itens by page using pagination, contains 10 itens per page (GET)

```
base_url/events/pages/:idPage
```

> Get a specific event (GET)

```
base_url/events/:idEvent
```

> Save a user token (POST)

```
base_url/users
```

> Update a user token (PUT)

```
base_url/users/:idUser
```


> Delete a user token (DELETE)

```
base_url/users/:idUser
```
