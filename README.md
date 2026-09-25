# Personal Task Manager

## Project Details

- **Project Code:** WST21-PM-2026-SF
- **Student Name:**
- **Course & Year:**
- **Database Used:** SQLite

## Features

- Add Task
- View Tasks
- Edit Task
- Delete Task
- Update Status (Pending / Completed)

## Requirements

- PHP 8.3+
- Composer
- Node.js and npm

## Setup

```bash
composer install
cp .env.example .env
php artisan key:generate
touch database/database.sqlite
php artisan migrate
npm install
npm run build
php artisan serve
```

Open `http://localhost:8000` to use the task manager.