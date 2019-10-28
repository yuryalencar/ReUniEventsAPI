# ReUniEventsAPI

### 1. How to install (DEV)

> Create database

> Go to ReUniAPI directory

```
cd ReUniAPI
```

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

This section has how to use of the ReUniEventsAPI

#### 2.1 Events

> Get all itens in facebook (GET)

```
base_url/events
```


> Get itens by page using pagination, contains N itens per page (GET)

```
base_url/events/perpage/:amountItensPerPage
```
> Search event by partial ou full name (GET)

```
base_url/events/byName/:FullOrPartialName
```

> Get a specific event (GET)

```
base_url/events/:idEvent
```

#### 2.2 Persons

> Get a all persons (GET)

```
base_url/persons
```

> Search person by partial ou full name (GET)

```
base_url/persons/byName/:FullOrPartialName
```

> Get a specific person (GET)

```
base_url/persons/:idPerson
```

> Save a person with your facebook token (POST)

```
base_url/persons
```

> Update a person with your facebook token (PUT)

```
base_url/persons/:idUser
```


> Delete a person with your facebook token (DELETE)

```
base_url/persons/:idUser
```

#### 2.3 Pages

**_@TODO_**


#### 2.4 Facebook Events

**_@TODO_**
