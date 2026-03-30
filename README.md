# Booking App

A Laravel application running in a fully containerised local development environment (Docker Compose).

This application integrates with the [Football-Data.org API](https://www.football-data.org/) using the [`einar-hansen/php-football-data`](https://github.com/einar-hansen/php-football-data) package to fetch and display football competitions and team data.

---

## Stack

| Service | Image | Port |
|---------|-------|------|
| PHP-FPM | `php:8.2-fpm` | — |
| Nginx | `nginx:1.25-alpine` | `8080` |
| MySQL | `mysql:8.0` | `3306` |
| Redis | `redis:7-alpine` | `6379` |
| MailHog | `mailhog/mailhog` | `8025` (UI) / `1025` (SMTP) |

---

## Requirements

- [Docker](https://docs.docker.com/get-docker/) ≥ 24
- [Docker Compose](https://docs.docker.com/compose/) ≥ 2

---

## Getting Started

### 1. Clone the repository

```bash
git clone <repo-url>
cd booking_app
```

### 2. Start containers & install Laravel

```bash
# Build images and start all services
docker compose up -d --build

# Install a fresh Laravel project, generate app key, and run migrations
./dev install
```

The application will be available at **http://localhost:8080**.

### 3. (Existing codebase) Install dependencies only

```bash
docker compose up -d --build
./dev composer install
./dev artisan key:generate
./dev artisan migrate
```

---

## Environment

The `.env` file is pre-configured with Docker service names as hostnames. The important defaults are:

```dotenv
DB_HOST=mysql
DB_DATABASE=booking_app
DB_USERNAME=booking
DB_PASSWORD=secret

REDIS_HOST=redis

MAIL_HOST=mailhog
MAIL_PORT=1025
```

> **Security:** Never commit `.env` to version control. Add it to `.gitignore`.

---

## `./dev` CLI

A convenience wrapper around `docker compose` for day-to-day tasks:

```bash
./dev up              # Start all containers
./dev down            # Stop all containers
./dev restart         # Restart all containers
./dev install         # Fresh Laravel install + migrate
./dev artisan <cmd>   # Run php artisan inside the container
./dev composer <cmd>  # Run composer inside the container
./dev shell           # Open a bash shell in the app container
./dev shell-mysql     # Open a MySQL shell
./dev logs [service]  # Tail logs (default: app)
./dev build           # Rebuild Docker images (no cache)
./dev clean           # Remove containers AND volumes ⚠️
```

---

## Project Structure

```
booking_app/
├── docker/
│   ├── nginx/
│   │   └── default.conf       # Nginx virtual host config
│   ├── php/
│   │   ├── Dockerfile         # PHP 8.2-FPM image
│   │   └── local.ini          # PHP ini overrides
│   └── mysql/
│       └── my.cnf             # MySQL config
├── docker-compose.yml
├── .env                       # Local environment variables
├── .dockerignore
└── dev                        # Helper CLI script
```

---

## Useful URLs

| URL | Description |
|-----|-------------|
| http://localhost:8080 | Application |
| http://localhost:8025 | MailHog (email UI) |

---

## Common Tasks

```bash
# Run tests
./dev artisan test

# Create a new controller
./dev artisan make:controller BookingController

# Open a tinker REPL
./dev artisan tinker

# Watch queue
./dev artisan queue:work

# Clear all caches
./dev artisan optimize:clear
```
