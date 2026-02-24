# Table of contents

* [Preview](#preview)
* [Stack](#stack)
* [Installation](#installation)
* [How to use](#how-to-use)
* [API endpoints](#api-endpoints)

# Preview 

A laravel-based backend service that assigns Pokemon nicknames to users either automatically every minute (via [PokeAPI](https://pokeapi.co)) or manually via an API endpoint.


# Stack

- Framework: Laravel 11x
- Database: SQLite
- Integration: PokeAPI (external)

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
php artisan key:generate
```

4. Configure Database

```
php artisan migrate
```

5. Initialize API routes

```
php artisan install:api
```

# How to use

**Note!**
You must do the steps above to use this function!

1. Populate the database with predefined data 
```
php artistan db:seed
```

2. Add the following toggle to your **.env** file
```
POKEAPI_ENABLED=true
```
> The default value is false, so without this it won't work!

3. Run the automation

```
php artisan schedule:work
```

It should run every minute adding each user 1 nickname from [this](https://pokeapi.co).

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