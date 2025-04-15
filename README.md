# Power BI Dashboard Panel

A secure and robust web application that provides authenticated access to Power BI dashboards. Designed with scalability, performance, and maintainability in mind using Laravel 10 and modern frontend build tools.

## 🔐 Features

- **User Authentication** powered by [Laravel Fortify](https://laravel.com/docs/10.x/fortify)
- **Secure Login System** with session management
- **Error Tracking** and debug monitoring with [Laravel Telescope](https://laravel.com/docs/10.x/telescope)
- **Email Notifications** via SMTP using [Mailhog](https://github.com/mailhog/MailHog) and queued jobs
- **Frontend Build** using [Vite](https://vitejs.dev/) for fast and optimized assets (minified JS/CSS)
- **Domain-Driven Design (DDD)** structure for clean and scalable architecture
- **Built with Laravel 10** (latest stable version)
- **MySQL Database** integration for data persistence

## 🧱 Tech Stack

| Layer        | Technology          |
|--------------|---------------------|
| Backend      | Laravel 10          |
| Frontend     | Vite (JS/Blade)     |
| Auth System  | Laravel Fortify     |
| DB           | MySQL               |
| Mail         | Mailhog (SMTP)      |
| Queue System | Laravel Queues      |
| Monitoring   | Laravel Telescope   |

## 📂 Project Structure

The project follows a **Domain-Driven Design (DDD)** approach, separating concerns across different layers to improve code organization and scalability. Key directories include:

- `App/Http/Controllers/` - Entry points for user interaction
- `App/Providers/` - Service container bindings
- `Resources/Views/` - Blade templates built and optimized via Vite

## 🚀 Getting Started

### Prerequisites

- PHP 8.1+
- Composer
- MySQL
- Node.js & NPM/Yarn
- Mailhog (for local email testing)

### Installation

```bash
git clone https://github.com/Gustavo-queirozman/powerbi-dashboard.git
cd powerbi-dashboard

# Install PHP dependencies
composer install

# Install JS dependencies and build assets
npm install && npm run build

# Copy and configure environment
cp .env.example .env
php artisan key:generate

# Run migrations
php artisan migrate --seed

# Start local server
php artisan serve
