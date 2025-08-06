# EventHive: A Full-Stack Event Management Platform

![EventHive Screenshot](https://raw.githubusercontent.com/TalhaShamo/eventhive-laravel-app/main/public/images/EventHiveScreenshot.png)

EventHive is a complete, full-stack web application for managing and discovering events. Built with the Laravel framework, this project demonstrates a wide range of modern web development practices, from database design and user authorization to a responsive frontend.

The platform allows users to register as "Organizers" or "Attendees." Organizers can create, manage, and delete their own events, while attendees can browse and register for upcoming events.

## Key Features

-   **Dual User Roles**: A robust authorization system distinguishes between **Organizers** (who can create events) and **Attendees** (who can register for them).
-   **Complete Event CRUD**: Organizers have full Create, Read, Update, and Delete capabilities for their own events.
-   **Event Registration System**: Logged-in attendees can register for and unregister from events with a single click.
-   **Secure Authentication**: A complete user authentication system (Login, Registration, Password Reset) powered by Laravel Breeze.
-   **Authorization**: Custom middleware protects organizer-only routes, and frontend logic hides unauthorized actions from the UI.
-   **Responsive Design**: A professional and responsive user interface built with Tailwind CSS, including a dark/light mode toggle.

## Technology Stack

-   **Backend**: PHP, Laravel 11
-   **Frontend**: Blade, Tailwind CSS, Alpine.js
-   **Database**: MySQL
-   **Development Environment**: Vite

## Getting Started

To get a local copy up and running, follow these simple steps.

### Prerequisites

You will need to have a local development environment with PHP, Composer, and Node.js installed.

### Installation

1.  Clone the repo:
    ```sh
    git clone [https://github.com/your-username/eventhive-laravel-app.git](https://github.com/your-username/eventhive-laravel-app.git)
    ```
2.  Navigate into the project directory:
    ```sh
    cd eventhive-laravel-app
    ```
3.  Install Composer dependencies:
    ```sh
    composer install
    ```
4.  Install NPM dependencies:
    ```sh
    npm install
    ```
5.  Create a copy of your `.env` file:
    ```sh
    cp .env.example .env
    ```
6.  Generate your application key:
    ```sh
    php artisan key:generate
    ```
7.  Set up your database credentials in the `.env` file and create a new database.
8.  Run the database migrations:
    ```sh
    php artisan migrate
    ```
9.  Compile your frontend assets:
    ```sh
    npm run dev
    ```
10. Start the development server:
    ```sh
    php artisan serve
    ```
