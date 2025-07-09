# Appointment Management System

This is a simple Laravel-based appointment management system that allows users to create, view, edit, and delete appointments. It also supports sending appointment reminders via email with a preview feature.

## Features

- User authentication (login, registration)
- Dashboard displaying upcoming appointments and a form to add new appointments
- Appointments index page with options to preview reminders, edit, and delete appointments
- Appointment reminder preview showing messages for both patient and doctor
- Sending appointment reminders via email
- Responsive UI using Tailwind CSS

## Installation

1. **Clone the repository**

```bash
git clone <repository-url>
cd <repository-folder>
```

2. **Install dependencies**

Make sure you have PHP, Composer, Node.js, and npm installed.

```bash
composer install
npm install
npm run dev
```

3. **Configure environment**

Copy `.env.example` to `.env` and update database and mail settings.

```bash
cp .env.example .env
php artisan key:generate
```

Update `.env` with your database credentials and mail configuration.

4. **Run migrations**

```bash
php artisan migrate
```

5. **Serve the application**

```bash
php artisan serve
```

The app will be available at `http://localhost:8000`.

## Usage

- Register a new user or log in.
- Use the dashboard to view upcoming appointments and add new ones.
- Navigate to the Appointments page to manage all appointments.
- Preview and send appointment reminders via email.

## Testing

Test the following critical paths:

- Appointment creation, editing, and deletion.
- Appointment reminder preview and sending.
- Navigation between dashboard and appointments pages.
- UI responsiveness and error handling.

## Technologies Used

- Laravel PHP Framework
- Tailwind CSS
- MySQL Database
- Laravel Notifications for email reminders

## License

This project is open source and available under the MIT License.
