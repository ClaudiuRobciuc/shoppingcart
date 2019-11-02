# Shop Website

## Setup

### Prerequisites

In order to build this and work with it locally, you need to have Docker installed on your machine. Get it [here](https://www.docker.com/community-edition#/download).

Furthermore, you need to have the following file:

-   A file called `.env` outlining the local environment variables to send to the container.

### Getting started
1. Run `composer install`
2. Run `npm install`
3. Run `docker-compose up -d --build`
4. Go to http://localhost

### Building

-   Run `docker exec -ti app bash` and then run `php artisan migrate` in order to create all the tables from the migrations
-   While still in the container console run `php artisan db:seed` to automatically seed the database

### Tests
-   In order to run unit-tests type `npm run unit-test` in the normal console
-   In order to run integration-tests type `npm run feature-test` in the normal console

### Running

Once the containers are up and running, you can test it out by accessing http://localhost.





