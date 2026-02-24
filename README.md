# Table of contents

* [Preview](#preview)
* [Stack](#stack)
* [Requirements](#requirements)
* [Installation](#installation)
* [How to use](#how-to-use)
* [API endpoints](#api-endpoints)

# Preview 

A laravel-based backend service that assigns Pokemon nicknames to users either automatically every minute (via [PokeAPI](https://pokeapi.co)) or manually via an API endpoint.


# Stack

- Framework: Laravel 11x
- Database: SQLite
- Integration: PokeAPI (external)

# Requirements

- PHP
- Composer
- SQLite (default)
- Node.js & npm (optional, required for UI)


# Installation

1. Clone the repository.

```
    git clone https://github.com/gmark1337/PokeNick
```

2. Enter the folder.

```
    cd PokeNick
```

3. Install dependencies

```
    composer install
```

4. Create enviroment file (Windows)

```
    copy .env.example .env 
```

5. Generate application key
```
    php artisan key:generate
```

6. Create database(SQlite)(Windows)

```
    type nul > database\database.sqlite 
    php artisan migrate
```



## Optional 
Install npm packages for UI to work.

1. Install npm packages

```
    npm install
```

2. Run build

```
    npm run build
```

# How to use

**Note!**
You must do the steps above to use this function!

1. Populate the database with seed data 
```
    php artisan db:seed
```

2. Run the automation

```
    php artisan schedule:work
```

It should run every minute adding each user 1 nickname from [this](https://pokeapi.co).

## To run the server 

```
    php artisan serve
```

# API endpoints

There are only 3 endpoints.

| METHOD | ENDPOINT | DESCRIPTION|
|--------|----------|------------| 
| GET    | /api/users | List all users |
| GET    | /api/users-with-nicknames | List users with their assigned nicknames |
| POST   | /api/users/{user}/nicknames | Manually assign a nickname to a specific user

Example of a request Body for POST: 
```
{
    "name": "Charizard"
}
```