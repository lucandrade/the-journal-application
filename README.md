# The Journal Application

## Requirements

Before you run be sure you have `php 7.1` installed

## Installing

Clone the repository

```
git clone https://github.com/lucandrade/the-journal-application.git
```

Inside the folder execute the following command

```
composer install
```

## Configuring

Before running the project you must create a `.env` file with the following content.

```
[thejournal]
url = http://api.thejournal.ie/
uri = v3/sample/
user = {user}
password = {password}
```

## Testing

To run the unit tests execute the following command

```
vendor/bin/phpunit
```

## Running

Inside the code folder, execute the follow command

```
php -S localhost:8080 index.php
```
> Be sure the 8080 port isn't being used

At this time you shold be able to see the system at [http://localhost:8080](http://localhost:8080)

You can see the google articles at [http://localhost:8080/google](http://localhost:8080/google)