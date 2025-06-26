# Mini LMS - Learning Management System

A simple Learning Management System (LMS) built for online educational purposes. This system helps to manage courses, students, teachers, admissions, and more in a structured way.

## 🌐 Live Demo

🔗 [Visit Live Website](https://mini-lms.deshicreative.com/)  

🔑 **Admin Login:**  
- Email: `gmzesan7767@gmail.com`  
- Password: `12345678aA`  

---

## 🚀 Features

- 🎓 **Course Management**
- 🧑‍🏫 **Teacher/Instructor Management**
- 👨‍🎓 **Student Management**
- 📑 **Online Admission Form**
- 📅 **Event & Notice Board**
- 📰 **Blog & Article System**
- 🏢 **Institute Information Page**
- 📊 **Admin Dashboard with Analytics**
- 🔐 **Secure Authentication (Admin)**
- 📄 **Certificate Generation (Optional)**

---

## 🔧 Technologies Used

- **Framework:** Laravel 10
- **Frontend:** Blade Template, TailwindCSS/Bootstrap
- **Database:** MySQL
- **Authentication:** Laravel Breeze (or Custom)
- **Hosting:** Shared Hosting (CPanel) / VPS

---

## ⚙️ Installation Guide

### ✅ Requirements

- PHP >= 8.1
- Composer
- MySQL
- Node.js and npm (for frontend assets)

---

### 🚩 Clone the Repository

```bash
git clone https://github.com/gm-zesan/mini-lms.git
cd mini-lms
```

### 2. Install Dependencies
```bash
composer install
npm install
npm run dev
```

### 3. Setup .env
```bash
APP_NAME=MiniLMS
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=mini_lms
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Generate App Key & Migrate
```bash
php artisan key:generate
php artisan migrate
```

### 5. Start the Server
```bash
php artisan serve --port=8000
```
