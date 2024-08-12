# Storing Data as JSON in laravel

## Overview

This Laravel-based application allows you to manage football player data, including their name, year, course, and availability times. The availability times are stored as JSON in the database, allowing for flexible and dynamic scheduling.

## Features

- Add and manage football player information.
- Store availability times in JSON format.
- Dynamically add multiple sets of availability times (day and time) through a user-friendly form.

## Prerequisites

- PHP >= 8.0
- Laravel >= 10.0
- Composer
- MySQL or any other supported database

## Installation

### Clone the Repository

```bash
git clone https://github.com/Ratified/Storing-Data-as-JSON---Laravel.git
cd football-player-management
```

### Install Dependencies

```bash
composer install
```

### Setup environment variable


Duplicate the .env.example file and rename it to .env. Update the database connection settings and any other necessary configurations.


```bash
cp .env.example .env
```

### Generate Application Key

```bash
php artisan key:generate
```

### Run Migrations

```bash 
php artisan migrate
```

### Usage

```bash 
php artisan serve
```

### License
This project is licensed under the MIT License. 