# ROC Rivor VOEP Manager

## Table of Contents

- [Installation](#installation)
  - [Prerequisites](#prerequisites)
  - [Install Dependencies](#install-dependencies)
- [Usage](#usage)
  - [Database Setup](#database-setup)
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
    php artisan migrate:fresh --seed

## Sample Users

### Beheerder (Administrator)

- **Name:** Mario Pfaff
- **Email:** m.pfaff@roc.beheerder.nl
- **Password:** 12345678
- **Role:** Beheerder

- **Name:** Tomas van Westen
- **Email:** t.vanwesten@roc.beheerder.nl
- **Password:** 12345678
- **Role:** Beheerder

### Docent (Teacher)

- **Name:** Herbert Rietman
- **Email:** h.rietman@roc.docent.nl
- **Password:** 12345678
- **Role:** Docent

- **Name:** Hanneke Kool
- **Email:** h.kool@roc.docent.nl
- **Password:** 12345678
- **Role:** Docent

### Slber (SLBer)

- **Name:** Hanneke Kool
- **Email:** h.kool@roc.slber.nl
- **Password:** 12345678
- **Role:** Slber

### Student

- **Name:** Mario Pfaff
- **Email:** m.pfaff@roc.student.nl
- **Password:** 12345678
- **Role:** Student

- **Name:** Tomas van Westen
- **Email:** t.vanwesten@roc.student.nl
- **Password:** 12345678
- **Role:** Student

### Stagebegeleider (Internship Supervisor)

- **Name:** Erik Drent
- **Email:** e.drent@roc.stagebegeleider.nl
- **Password:** 12345678
- **Role:** Stagebegeleider

### Auteur (Author)

- **Name:** Hanneke Kool
- **Email:** h.kool@roc.auteur.nl
- **Password:** 12345678
- **Role:** Auteur
