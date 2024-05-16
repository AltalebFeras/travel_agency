# Back-end FERAS.T.A

I finished this great project during my DWWM training. The goal was to demonstrate our advanced API consumption skills by implementing a project with an API we developed ourselves.

## Introduction

This is the README for the Symfony application. This guide will assist you in installing and configuring the necessary environment to work with Symfony.

## Prerequisites

Before getting started, make sure your system meets the following prerequisites:

- PHP version >= 8.2
- Composer
- Scoop (for Windows users)
- Symfony CLI

## Installation

### 1. Check your PHP version

```bash
php --version
```

Ensure that the displayed version is greater than or equal to 8.2.

### 2. Install Composer

Follow the installation instructions on the official Composer website: [https://getcomposer.org/download/]

### 3. Install Scoop (for Windows users)

Follow the installation instructions on the official Scoop website: [https://scoop.sh/]

### 4. Install Symfony CLI

```bash
scoop install symfony-cli
```

### 5. Verify everything is OK

```bash
symfony check:requirements
```

Make sure all necessary dependencies are installed and configured correctly.

## Application Configuration


###  .env  File
Before starting to work with your Symfony application, make sure to configure the .env file.
This file contains environment variables for your application, such as database connection information, secret keys, etc.

Ensure to create a .env file at the root of your project by copying the .env file and renaming it .env.local, and configuring the appropriate values for your development environment.

Here's an example `.env` :

```
APP_ENV=dev
APP_SECRET=your_secret_key
DATABASE_URL=mysql://DB_USERNAME:DB_PASSWORD@127.0.0.1:3306/DB_Name?serverVersion=(your_DB_version)&charset=utf8mb4"

```

Remember to replace `your_secret_key`, `db_user`, `db_password`, and  `db_name` with the actual values corresponding to your configuration.

## Usage

To start a new Symfony project, use the following command:

```bash
symfony new <your_project_name>
```


## Running the Symfony Server

Once your Symfony application is configured and ready to run, you can start the Symfony server to begin developing and testing your application.

### Accessing the Application

To start the Symfony server in the background without TLS (HTTPS), use the following command from the terminal in your open project:


```bash

symfony server:start -d

```
This command will launch an integrated development server with Symfony in the background and disable TLS support. You won't see any output in your terminal, but the server will still be running.

Once the Symfony server is running, open your web browser and navigate to the URL indicated in the output of the`symfony server:start -d` command.

By default, the URL is typically `http://localhost:8000`.

---
## API Routes


[/api/my_super_route ](https://127.0.0.1:8000/api/trips)- GET - Returns all trips.
[/api/my_super_route/id](https://127.0.0.1:8000/api/trip/id) - GET - Returns specific trip.
[/api/my_super_route/id](https://127.0.0.1:8000/api/reservation/new) - POST - store client data in database .


This update should enable you to start the Symfony server in the background without TLS support. If you have any further questions or need additional assistance, feel free to ask!
