# 🚌 BookBus — Bus Booking Management System

> A full-stack intercity bus ticket booking platform built with Laravel — inspired by marKoub.ma. Features authentication, trip search, seat selection, booking management, and an admin dashboard.

![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=flat-square&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP%208.2+-777BB4?style=flat-square&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=flat-square&logo=mysql&logoColor=white)
![TailwindCSS](https://img.shields.io/badge/TailwindCSS-06B6D4?style=flat-square&logo=tailwindcss&logoColor=white)
![Vite](https://img.shields.io/badge/Vite-646CFF?style=flat-square&logo=vite&logoColor=white)

---

## ✨ Features

### 🔐 Authentication
- Registration and login via Laravel Breeze
- Role-based access: **Admin**, **Passenger**
- Secure session management

### 🔍 Trip Search
- Search trips by origin, destination and date
- Filter by bus company, price, and departure time
- Real-time seat availability display

### 🎫 Booking Flow
- Seat selection on interactive bus layout
- Passenger details form with validation
- Booking confirmation with summary
- Ticket generation (printable)

### 📂 My Bookings
- View all past and upcoming reservations
- Cancel a booking before departure
- Download/print ticket

### 🛠 Admin Dashboard
- Manage bus companies, routes and trips
- View and manage all bookings
- User management
- Revenue and occupancy statistics

---

## 📁 Project Structure

```
BookBus/
├── app/
│   ├── Http/Controllers/   # Route controllers
│   ├── Models/             # Eloquent models
│   └── Policies/           # Authorization policies
├── database/
│   ├── migrations/         # DB schema
│   └── seeders/            # Sample data
├── resources/
│   ├── views/              # Blade templates
│   └── css/ js/            # Frontend assets
├── routes/
│   ├── web.php             # Web routes
│   └── api.php             # API routes
├── documentation/          # ERD, UML diagrams, DOCUMENTATION.md
├── tests/                  # PHPUnit tests
├── .env.example
└── vite.config.js
```

---

## 🗄️ Database Schema

| Table | Description |
|---|---|
| `users` | Passengers and admins |
| `companies` | Bus companies |
| `routes` | Origin → destination routes |
| `trips` | Scheduled departures with price & seats |
| `bookings` | Reservations linked to user + trip |
| `seats` | Seat map per trip |
| `payments` | Payment records per booking |

---

## 🛠 Tech Stack

| Technology | Usage |
|---|---|
| Laravel 10+ | MVC framework, routing, Eloquent ORM |
| PHP 8.2+ | Backend logic |
| MySQL | Relational database |
| Laravel Breeze | Authentication scaffolding |
| Blade | Server-side templating |
| TailwindCSS | Responsive UI |
| Vite | Asset bundling |
| PHPUnit | Automated testing |

---

## 🚀 Getting Started

```bash
git clone https://github.com/lioubiarabi/BookBus_Bus_Booking_Management_System.git
cd BookBus_Bus_Booking_Management_System
composer install
npm install && npm run build
cp .env.example .env
php artisan key:generate
```

Configure your database in `.env`, then:

```bash
php artisan migrate --seed
php artisan serve
```

Open `http://localhost:8000`

### Test Credentials
```
Admin:     admin@bookbus.ma   / password
Passenger: user@bookbus.ma    / password
```

---

## 📄 Documentation

All diagrams and analysis are in the `documentation/` folder:
- **ERD** — full database schema with relations
- **UML Class Diagram** — domain model
- **Use Case Diagram** — actors and interactions
- **DOCUMENTATION.md** — domain analysis and architecture decisions

---

## 🎯 Project Context

Built as a simplified clone of [marKoub.ma](https://markoub.ma), a Moroccan intercity bus booking platform. The goal was to learn Laravel by building a real-world domain application from domain analysis to deployed product.

**Duration:** 3 days foundation + full build (Jan 23 — Feb 2026)

---

## 💡 What I Learned

- Setting up a full Laravel project from scratch (Breeze, Vite, Eloquent)
- Domain analysis before coding — ERD, use cases, class diagrams
- Laravel routing, middleware, and controllers
- Eloquent ORM relationships (hasMany, belongsTo, belongsToMany)
- Blade templating with layouts and components
- Role-based authorization with policies
- Database migrations and seeders

---

## 👤 Author

**Lioubi Arabi** — Youcode Web Development Student  
[![GitHub](https://img.shields.io/badge/GitHub-lioubiarabi-181717?style=flat-square&logo=github)](https://github.com/lioubiarabi)

---

*Built to understand Laravel the right way — domain first, code second 🚌*
