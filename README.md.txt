# CodeIgniter 4 POS System

## Description

This project is a basic Point-of-Sale (POS) system created using
CodeIgniter 4. It demonstrates the use of routes, controllers,
views, static PHP arrays, and navigation in an MVC web application.

## Pages

The application contains four pages:

- Home
- About
- Customer Accounts
- User Accounts

The Customer Accounts and User Accounts pages use static PHP arrays
as temporary data sources.

## Requirements

- PHP
- Composer
- CodeIgniter 4
- XAMPP
- Web Browser

## Installation

1. Clone or download the project.
2. Open Command Prompt in the project directory.
3. Install the required dependencies:

   composer install

4. Create a copy of the `env` file and rename it to `.env`.
5. Configure the base URL in `.env`:

   app.baseURL = 'http://localhost:8080/'

6. Start the CodeIgniter development server:

   php spark serve

7. Open the following URL:

   http://localhost:8080/

## Routes

- `/` - Home
- `/about` - About
- `/customers` - Customer Accounts
- `/users` - User Accounts

## Student

Name: Cafugauan, Mc Kenrick  
Section: AC31