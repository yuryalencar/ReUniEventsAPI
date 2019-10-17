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

> Get all itens in facebook

```
base_url/events
```


> Get itens by page using pagination, contains 10 itens per page

```
base_url/events/pages/:idPage
```

> Get a specific event

```
base_url/events/:idEvent
```
