# Analysis Trade

## Overview

Analysis Trade is a Laravel-based web application for traders to record, analyze, and improve their trading performance. It provides tools for trade tracking, asset management, daily task organization, challenge monitoring, and money management.

## Features

- **Trade Tracking:**  
  Create, update, and review trades with detailed analysis and quick position entries.

- **Asset Management:**  
  Add, edit, and view trading assets with custom attributes.

- **To-Do Lists & Tasks:**  
  Organize daily tasks, track completion rates, and build productive habits.

- **Challenges:**  
  Set personal trading challenges and monitor progress.

- **Money Management:**  
  Plan and track risk management strategies.

- **Live Notes:**  
  Add real-time notes to trades for learning and review.

## Technologies Used

- **Backend:** Laravel, Eloquent ORM, Artisan
- **Frontend:** Blade, Bootstrap, Custom CSS/JS
- **Database:** SQLite, Migrations, Seeders, Factories
- **Other:** Vite, .env configuration

## Getting Started

1. **Clone the repository:**
   ```
   git clone https://github.com/oussamabensaidi/trade-app.git
   cd analysis_trade
   ```

2. **Install dependencies:**
   ```
   composer install
   npm install
   ```

3. **Set up environment:**
   - Copy `.env.example` to `.env`
   - Configure database and other settings

4. **Run migrations and seeders:**
   ```
   php artisan migrate --seed
   ```

5. **Start the development server:**
   ```
   php artisan serve
   ```

6. **Build frontend assets:**
   ```
   npm run dev
   ```

## Folder Structure

- `app/` — Controllers, Models
- `resources/views/` — Blade templates
- `database/` — Migrations, seeders, factories
- `routes/` — Web and console routes

## License

This project is for educational and personal use.

---

For more details, see the documentation below 

# Analysis Trade App Documentation

## Overview

**Analysis Trade** is a Laravel-based web application designed to help users systematically track, analyze, and improve their trading activities. It provides tools for recording trade details, managing assets, tracking daily tasks, and monitoring progress through challenges and money management strategies.

## What the App Does

- **Trade Analysis:**  
  Users can create, update, and complete detailed trade analyses, including asset selection, operation type, result prediction, and actual outcomes.  
  Quick position tracking is also supported for fast trade entries.

- **Asset Management:**  
  Users can add, edit, and view assets with attributes like type, win/lose percentages, favorite indicators, and study objectives.

- **To-Do List & Task Management:**  
  Daily to-do lists and tasks help users build productive habits. Tasks can be created, edited, archived, and tracked for completion rates and streaks.

- **Challenges:**  
  Users can set up personal challenges, track failed attempts, victories, and motivation to improve discipline.

- **Money Management:**  
  Risk plans and money management strategies can be created and tracked to support responsible trading.

- **Live Notes:**  
  Users can add live notes to trades for real-time observations and learning.

- **Progress Tracking:**  
  The app visualizes progress rates, top/flop/oldest tasks, and recent performance to motivate improvement.

## Problems Solved

- **Trading Discipline:**  
  By enforcing structured analysis and review, the app helps traders avoid impulsive decisions and learn from past trades.

- **Habit Building:**  
  The to-do list and task tracking features encourage consistent routines and self-improvement.

- **Performance Monitoring:**  
  Users can easily see their strengths and weaknesses through progress rates, task statistics, and challenge outcomes.

- **Risk Management:**  
  Integrated money management tools promote safer trading practices.

- **Knowledge Retention:**  
  Live notes and detailed trade records help users retain insights and avoid repeating mistakes.

## Technologies Used

- **Backend:**  
  - [Laravel] PHP framework  
  - Eloquent ORM for database models  
  - Artisan CLI for commands

- **Frontend:**  
  - Blade templating engine  
  - Bootstrap 5 for responsive UI  
  - Custom CSS and JS for interactivity

- **Database:**  
  - SQLite (default)  
  - Migrations for schema management  
  - Seeders and Factories for test data

- **Other:**  
  - Vite for asset bundling  
  - .env configuration for environment variables

## Folder Structure

- `app/` — Controllers, Models, Providers  
- `resources/views/` — Blade templates for all pages  
- `database/` — Migrations, seeders, factories, SQLite DB  
- `routes/` — Web and console routes  
- `public/` — Entry point and assets

---
