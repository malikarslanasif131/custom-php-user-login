# User Registration System

## Overview

This User Registration System is a custom PHP project that allows users to register by providing their username, email, password, and security question. The system fetches security questions dynamically from a MySQL database and validates user input to ensure secure registration.

## Features

- User registration with username, email, password, and security question
- Dynamic fetching of security questions from the database
- Form validation to ensure data integrity
- User-friendly interface using Bootstrap
- Modular structure with separate files for database connection, validation, and navigation

## Technologies Used

- PHP
- MySQL
- HTML/CSS
- JavaScript (AJAX)
- Bootstrap (for styling)

## Installation

1. **Clone the repository**:

   ```bash
   git clone <repository-url>
   cd user-registration-system
   ```

2. **Set up the database**:

   - Create a new MySQL database (e.g., `user_registration`).
   - Run the following SQL commands to create the necessary tables and insert example data:

   ```sql
   CREATE TABLE users (
       id INT AUTO_INCREMENT PRIMARY KEY,
       username VARCHAR(100),
       email VARCHAR(100) UNIQUE,
       password VARCHAR(255),
       security_question_id INT,
       security_answer VARCHAR(255),
       created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
   );

   CREATE TABLE security_questions (
       id INT AUTO_INCREMENT PRIMARY KEY,
       question VARCHAR(255)
   );

   -- Example data for security questions
   INSERT INTO security_questions (question) VALUES
       ('What was your first pet\'s name?'),
       ('What is your mother\'s maiden name?'),
       ('What is your favorite color?'),
       ('What city were you born in?'),
       ('What is the name of your favorite teacher?'),
       ('What was the name of your first school?'),
       ('In what year did you graduate high school?');
   ```

3. **Configure database connection**:

   - Open `db.php` and update the database connection parameters (hostname, username, password, and database name) to match your local setup.

4. **Run the application**:
   - Use a local server environment such as XAMPP, MAMP, or WAMP.
   - Place the project folder in the server's `htdocs` or equivalent directory.
   - Access the application via your web browser at `http://localhost/user-registration-system/register.php`.

## Usage

1. Navigate to the registration page (e.g., `register.php`).
2. Fill in the form with the required information:
   - Username
   - Email
   - Password (and confirm password)
   - Select a security question and provide an answer.
3. Click the **Register** button to submit the form.
4. If registration is successful, you will be redirected to a confirmation page (implement as needed).

## File Structure

```
user-registration-system/
│
├── db.php                 # Database connection
├── get_questions.php      # Fetch security questions as JSON
├── navbar.php             # Navigation bar
├── register.php           # Registration form page
├── validate.php           # Form validation logic
├── sql/                   # (Optional) SQL scripts for database setup
└── css/                   # (Optional) Custom CSS files
```

## Contributing

Contributions are welcome! If you find any issues or want to add new features, feel free to create a pull request or open an issue.

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## Acknowledgments

- Bootstrap for the responsive design framework.
- PHP and MySQL for server-side scripting and database management.
- [MDN Web Docs](https://developer.mozilla.org) for JavaScript references and resources.
