# SHUAIBTECH PHP Site

A multi-page PHP website for a fictional digital solutions business, built with XAMPP and PHP 8. The project demonstrates reusable layout partials, data-driven content, safe output escaping, form validation, and a simple JSONL message store.

## Features

- Multi-page business website with Home, About, Services, Contact, and protected Messages pages
- Shared header and footer partials
- Data-driven service listings and team profiles
- Dynamic single-service page using a slug from the URL query string
- Server-side contact form with validation and sticky values
- CSRF protection using PHP sessions
- JSONL storage for form submissions in a protected folder
- Responsive design with CSS
- Local learning-friendly password gate for viewing messages

## Tech Stack

- PHP 8
- HTML5
- CSS3
- XAMPP / Apache
- JSONL file storage

## How to Run with XAMPP

1. Put the project in the XAMPP document root:
   C:\xampp\htdocs\swd\04-php-site
2. Start Apache in XAMPP Control Panel.
3. Open your browser and visit:
   http://localhost/swd/04-php-site/
4. To access the messages dashboard, visit:
   http://localhost/swd/04-php-site/messages.php
5. Use the hard-coded password from config.php when prompted.

## Project Structure

```text
04-php-site/
├── assets/
│   └── css/
│       └── style.css
├── includes/
│   ├── config.php
│   ├── data.php
│   ├── footer.php
│   ├── functions.php
│   ├── header.php
│   └── ...
├── storage/
│   ├── .htaccess
│   └── messages.jsonl
├── about.php
├── contact.php
├── index.php
├── messages.php
├── service.php
├── services.php
├── README.md
└── ...
```

## What I learned

- [Placeholder: I learned how to structure reusable PHP layouts with include/header patterns.] 
- [Placeholder: I learned how to validate and sanitize form input in PHP.] 
- [Placeholder: I learned how to use PHP sessions for CSRF protection and simple access control.] 
- [Placeholder: I learned how to escape output to prevent HTML injection.] 
- [Placeholder: I learned how to store data in a JSONL file for lightweight local learning projects.] 

## Notes

This project is intentionally simple and designed for local learning. The password gate in config.php is useful for studying secure patterns, but it is not production-grade because it is hard-coded and not protected by a proper password hashing system, database-backed auth, or environment variables.
