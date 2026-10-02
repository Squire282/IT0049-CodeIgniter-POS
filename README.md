\# CodeIgniter 4 POS System

\#\# Description

This project is a basic Point-of-Sale (POS) system created using  
CodeIgniter 4\. It demonstrates the use of routes, controllers,  
views, static PHP arrays, and navigation in an MVC web application.

\#\# Pages

The application contains four pages:

\- Home  
\- About  
\- Customer Accounts  
\- User Accounts

The Customer Accounts and User Accounts pages use static PHP arrays  
as temporary data sources.

\#\# Requirements

\- PHP  
\- Composer  
\- CodeIgniter 4  
\- XAMPP  
\- Web Browser

\#\# Installation

## TFA3 - Forms, Validation, and File Upload

The POS application was extended with create and edit functionality for customer and user accounts.

### Customer Features

- Add new customer
- Full name validation
- Email validation
- Edit existing customer information
- Preserve form values when validation fails

### User Features

- Add new user
- Required username validation
- Unique username validation
- Required full name validation
- Edit existing user information
- Upload JPG or PNG profile pictures
- Maximum avatar file size of 2MB
- Display user avatars
- Display a placeholder image when no avatar is available

### Main Routes

- `/customers` - Customer accounts
- `/customers/new` - Add customer
- `/users` - User accounts
- `/users/new` - Add user

### Running the Project

1. Clone the repository.
2. Run `composer install`.
3. Import the SQL database file included in the `database` folder.
4. Configure the database connection in `.env`.
5. Run:

   php spark serve

6. Open `http://localhost:8080` in a browser.

\#\# Routes

\- \`/\` \- Home  
\- \`/about\` \- About  
\- \`/customers\` \- Customer Accounts  
\- \`/users\` \- User Accounts

\#\# Student

Name: Cafugauan, Mc Kenrick    
Section: AC31  
