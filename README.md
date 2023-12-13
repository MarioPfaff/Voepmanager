# ROC Rivor VOEP Manager

## Table of Contents

- [Installation](#installation)
  - [Prerequisites](#prerequisites)
  - [Clone the Repository](#clone-the-repository)
  - [Install Dependencies](#install-dependencies)
  - [Database Setup](#database-setup)
- [Configuration](#configuration)
- [Usage](#usage)
  - [Run Migrations](#run-migrations)
  - [Database Setup](#database-setup)
- [Run Seeders](#run-seeders)
  - [Sample Users] (#sample-users)

## Installation

### Prerequisites

Make sure you have the following installed:

- [PHP](https://www.php.net/manual/en/install.php)
- [Composer](https://getcomposer.org/download/)
- [Node.js](https://nodejs.org/en/download/) and [npm](https://www.npmjs.com/get-npm)
- [MySQL](https://dev.mysql.com/downloads/) or other supported database

### Install Dependencies
    1. composer install
    2. npm install

## Usage

### Database Setup
    Create a new MySQL database and configure the .env file with your database credentials:

    1. cp .env.example .env
    2. Update the .env file with your application-specific configuration.

### Run Migrations
    1. php artisan migrate

# Run Seeders
    Populate the database by running the seeder.

    1. php artisan db:seed

## Sample Users

### Beheerder (Administrator)

- **Name:** Admin
- **Email:** beheerder@rocrivor.com
- **Password:** 12345678
- **Role:** Beheerder

### Docent (Teacher)

- **Name:** Docent
- **Email:** docent@rocrivor.nl
- **Password:** 12345678
- **Role:** Docent

### Slber (SLBer)

- **Name:** Slber
- **Email:** slber@rocrivor.nl
- **Password:** 12345678
- **Role:** Slber

### Student

- **Name:** Student
- **Email:** student@rocrivor.nl
- **Password:** 12345678
- **Role:** Student

### Stagebegeleider (Internship Supervisor)

- **Name:** Stagebegeleider
- **Email:** stagebegeleider@rocrivor.nl
- **Password:** 12345678
- **Role:** Stagebegeleider

### Auteur (Author)

- **Name:** Auteur
- **Email:** auteur@rocrivor.nl
- **Password:** 12345678
- **Role:** Auteur
