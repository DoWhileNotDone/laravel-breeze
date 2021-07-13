# Laravel Demo

## Local Installation with Docker ##

1. Build the docker images
   * docker compose build

2. Start the docker containers
   * docker compose up
   * **Note**: On first run, this will pull down the initial images required   

3. Install package dependencies
   * docker compose exec php-fpm composer install
   * docker run -it --rm -v "$PWD":/app -w "/app" node:latest npm install

4. Configure site
   * cp .env.docker .env
   * docker compose exec php-fpm php artisan key:generate
   * Add the following line to /etc/hosts, to create an alias to the site:
       * `127.0.0.1        env.test`
   * docker run -it --rm -v "$PWD":/app -w "/app" node:latest npm run dev

5. Create Database
   * docker compose exec php-fpm php artisan migrate:install
   * docker compose exec php-fpm php artisan migrate
   * docker compose exec php-fpm php artisan db:seed

**Notes**
 - Uses PHP v8

## Running Locally ##

1. Start the docker containers (detached, so run in the background)
   * docker compose up -d 

2. View the docker logs 
   * docker compose logs -f

3. Using the containers
   * The code can be edited in an ide, the directory is mapped into the php and nginx directories
     * http://env.test:8881
   * Run the php unit tests
      * docker compose exec php-fpm php artisan test --parallel
   * Run the vue/jest tests
      * docker run -it --rm -v "$PWD":/app -w "/app" node:latest npm run test

   * Access the db via cli
      * docker compose exec mysql mysql -u demo_usr -pdemo_pw demo_dev
      * The db volume is mapped to ./docker/volumes/mysql so it persists
   * Interacting with npm
      * docker run -it --rm -v "$PWD":/app -w "/app" node:latest {command here}
   * Interacting with artisan
     * docker compose exec php-fpm php artisan {command here}

4. Stop the running containers
   * docker compose down --remove-orphans
