## Task Manager application

## Project Requirements
PHP 7.4

MySQL

## Install Laravel
Before you can run the Laravel project, you need to install the necessary dependencies. To do this, make sure you have Composer installed on your machine, then run the following command in the project directory:

composer install

This will download and install all the required dependencies for the project.

## Set Up the Environment
Next, you need to set up your environment variables. Copy the .env.example file in the project directory to a new file called .env:

cp .env.example .env

Update DB credentials in .env file

Then, generate a new application key by running the following command:

## Migrate the Database
php artisan migrate

## Serve the Application
php artisan serve

This will start a development server at http://localhost:8000. You can access the application by navigating to that URL in your web browser.

