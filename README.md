## Installation

After cloning the repository, start the docker containers by running
1) Start the containers: `docker-compose up -d --build`
2) Install PHP dependencies: `docker-compose exec app composer install`
3) Setup the environment (copy the example environment file and generate the application key): `docker-composer exec app cp.env.example .env` `docker-compose exec app php artisan key:generate`
4) Configure the database using the information in the .env file (this information will not be pulled from the repository
5) Run the migrations: `docker-compose exec app php artisan migrate`
6) Build the frontend assets: `docker-compose exec app npm install` `docker-compose exec app npm run build`

You can now access via http://localhost:8080

When changing the docker yaml file, recompile the image using `docker build -t blogsite:latest .` and then run it using `docker build -t blogsite:latest`

To get the mailing services working, run `mailhog`