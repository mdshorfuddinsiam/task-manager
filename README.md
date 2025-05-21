# 📋 Laravel Task Manager (Multi-Guard)

This is a Task Management System built with **Laravel 12 + Breeze**, where:
- Admins can manage and assign tasks
- Clients can view and complete their assigned tasks

🧑‍💻 Developed as part of a **Junior Laravel Developer interview task**.

---

## 🔧 Features

### 🛠 Admin (Web Guard)
- Login/Register via Laravel Breeze
- Create, Edit, Delete Tasks
- Assign Tasks to Clients
- Filter Tasks by Priority or Due Date
- Responsive Bootstrap 5 Dashboard

### 👤 Client (Custom Guard)
- Separate Register/Login
- View Only Assigned Tasks
- Mark Tasks as Complete (No Edit/Delete)

---

## 🚀 Setup Instructions

```bash
# 1. Clone this repository
git clone https://github.com/mdshorfuddinsiam/task-manager.git
cd task-manager

# 2. Install dependencies
composer install
npm install && npm run build

# 3. Setup environment
cp .env.example .env
php artisan key:generate

# 4. Configure .env with your database
DB_DATABASE=your_db
DB_USERNAME=root
DB_PASSWORD=

# 5. Run migrations
php artisan migrate

# 6. Start the server
php artisan serve
