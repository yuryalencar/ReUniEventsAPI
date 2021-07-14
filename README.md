# ReUniEventsAPI

### Requirements

* Insert your Mail config
* Configure Cron for execute a schedule:run for get events automatically
* Download GitBash
* Download Xampp
* Download Composer
### 1 How to install (DEV)

> Create database

> Go to ReUniAPI directory

```
cd ReUniAPI
```

> Install dependencies

```
composer install
```
> Update dependencies

```
composer update
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

#### 1.1 How to update project (DEV)

> Update database of the application
```
php artisan migrate:fresh --seed
```

### 2. How to use

This section has how to use of the ReUniEventsAPI

#### 2.1 Events

> Get all events in facebook saved in database (GET)

```
base_url/api/events
```


> Get itens by page using pagination, contains N itens per page (GET)

```
base_url/api/events/perpage/:amountItensPerPage
```
> Search event by partial ou full name (GET)

```
base_url/api/events/byName/:fullOrPartialName
```

> Get a specific event (GET)

```
base_url/api/events/:idEvent
```

#### 2.2 Persons

> Get all persons (facebook page administrator) saved in database (GET)

```
base_url/api/persons
```

> Search person by partial ou full name (GET)

```
base_url/api/persons/byName/:fullOrPartialName
```

> Get a specific person (GET)

```
base_url/api/persons/:idPerson
```

> Save a person with your facebook token (POST)

```
base_url/api/persons
```

> Update a person with your facebook token (PUT)

```
base_url/api/persons/:idUser
```


> Delete a person with your facebook token (DELETE)

```
base_url/api/persons/:idUser
```

#### 2.3 Pages

> Get a all pages (GET)

```
base_url/api/pages
```

> Search page by partial ou full name (GET)

```
base_url/api/pages/byName/:fullOrPartialName
```

> Get a specific page (GET)

```
base_url/api/pages/:idPage
```

> Get pages by person(administrator) name (GET)

```
base_url/api/pages/byPersonName/:fullPersonName
```

> Get pages by person(administrator) id (GET)

```
base_url/api/pages/bySpecificPerson/:idPerson
```

> Get administrator(person) page by id page (GET)

```
base_url/api/pages/:idPage/mainThePage
```

> Save a page for this is required send "person_id" and "slug_of_the_page" (POST)

```
base_url/api/pages
```

> Update a page (PUT)

```
base_url/api/page/:idPage
```


> Delete a page (DELETE)

```
base_url/api/page/:idPage
```

#### 2.4 Facebook Events

> Configure a Cron in your PC or Server

```
* * * * * cd /path-to-your-project && php artisan schedule:run >> /dev/null 2>&1
```

> How to make a Cron Job in Windows ?

```
https://www.youtube.com/watch?v=M2Ss0oUPBFQ
```

> How to make a Cron Job in my Server ?

```
Verify documentation of your server
```


