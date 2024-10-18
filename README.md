# Task Scheduling and Caching in Laravel

## Project Overview
This Laravel application demonstrates how to implement task scheduling and caching for an API. It periodically cleans old API logs and caches responses from an external weather API for faster retrieval.

## Features
- Scheduled task to delete logs older than 30 days.
- Caching of API responses using Redis.
- API endpoint to fetch cached weather data.
- Logging of API requests to the database.

## Requirements
- PHP >= 8.0
- Composer
- Laravel 10
- MySQL or any other database
- Redis or Memcached (for caching)

## Installation

### 1. Clone the Repository
Clone this repository to your local machine using the following command:

git clone https://github.com/EBRUSTECH/TaskScheduling.git

cd TaskScheduling

## Install Dependencies
composer install

## Configure Environment Variables
cp .env.example .env

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_user
DB_PASSWORD=your_database_password

CACHE_DRIVER=redis
SESSION_DRIVER=redis

## Generate Application Key
php artisan key:generate

## Run Migrations
php artisan migrate

## Start the Local Development Server
php artisan serve

## Usage
Fetch Weather Data: Call the API endpoint to get the cached weather data.

GET http://127.0.0.1:8000/api/weather

View API Logs: To see the stored logs of API requests, you can query the apilogs table in your database.

## Acknowledgments
Laravel
WeatherAPI
Redis
