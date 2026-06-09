# 🖋️ Custom PHP MVC Blog App

A fully containerized custom PHP Model-View-Controller (MVC) blog application, redesigned for premium visual aesthetics, solid OOP standards, and strict authorization security.

---

## 🚀 Key Features

- **Premium UI/UX Design System**: Custom Vanilla CSS featuring slate-dark default color schemes, glassmorphism card panels, modern typography (Outfit & Inter), responsive navbar grids, active state menus, and hover micro-animations.
- **Dual User Authentication**: Secure registration and login using industry-standard password hashing (`bcrypt`), supporting credentials via both **Username** and **Email Address**.
- **Interactive Publisher Dashboard**: Tabular article manager allowing users to view, edit, and delete their own blog posts quickly.
- **Restructured MVC Core**: Standardized routing engine and libraries using the absolute `APPROOT` constant to prevent path resolution warnings.
- **Security-First Gates**: Fully secure database transactions via PDO parameterized statements, XSS output sanitization, and session-based authorization controls preventing users from modifying other authors' articles.
- **Dockerized Environment**: Ready-to-go Apache, PHP (8.1.2), and MariaDB containers with automatic database schema importing.

---

## 🛠️ Tech Stack

*   **Backend**: Core PHP 8.1+ (Object-Oriented POO)
*   **Database**: MariaDB / MySQL (PDO-based prepared statement driver)
*   **Server**: Apache (mod_rewrite enabled)
*   **Frontend**: Vanilla CSS Variables, Google Fonts (Outfit & Inter), FontAwesome Icons
*   **Containerization**: Docker & Docker Compose

---

## 📂 Project Directory Structure

```text
phpmvcblog/
├── app/
│   ├── config/
│   │   └── config.php         # Database and URL constants
│   ├── controllers/
│   │   ├── Pages.php          # Handles static landing & about pages
│   │   ├── Posts.php          # Handles blog posts CRUD & dashboard
│   │   └── Users.php          # Handles login, register & profile settings
│   ├── helpers/
│   │   ├── session_helper.php # Session authentication guards
│   │   └── url_helper.php     # Unified redirect utilities
│   ├── libraries/
│   │   ├── Controller.php     # Base controller class (loads views/models)
│   │   ├── Core.php           # Routing core (URL parser & controller loader)
│   │   └── Database.php       # Secure PDO database driver
│   ├── models/
│   │   ├── Post.php           # Post SQL operations (JOINs with authors)
│   │   └── User.php           # User SQL operations (register, login, update)
│   ├── views/
│   │   ├── includes/          # Shared components (head, navigation, footer, alert)
│   │   ├── pages/             # Page view templates (index, about)
│   │   ├── posts/             # Post view templates (index, dashboard, create, update, show)
│   │   └── users/             # User view templates (login, register, profile, edit)
│   └── require.php            # Core app bootstrap loader
├── database/
│   └── dump.sql               # Automatic MariaDB database seed dump
├── public/
│   ├── css/
│   │   └── style.css          # Core CSS variables, typography, and theme
│   ├── .htaccess              # Rewrites URLs to index.php
│   └── index.php              # Public entrance point
├── .htaccess                  # Rewrites root traffic to public/
├── Dockerfile                 # PHP-Apache container setup
└── docker-compose.yaml        # Service orchestrator (php web app, mariadb, phpmyadmin)
```

---

## ⚙️ Installation & Setup

Running the application requires **Docker** and **Docker Compose** installed on your machine.

### 1. Launch Containers
Orchestrate and start the web application and database containers:
```bash
docker-compose up --build -d
```

### 2. View in Browser
- **Main Blog Site**: [http://localhost:8787](http://localhost:8787)
- **phpMyAdmin (Database tool)**: [http://localhost:8080](http://localhost:8080)
    *   *To connect database in phpMyAdmin*: Select Server: `db`, Username: `root`, Password: `password`.

### 3. Default Login Credentials
You can register a new user or login with the default account seeded in `database/dump.sql`:
- **Username / Email**: `dev` or `dev@dev.com`
- **Password**: `password`
