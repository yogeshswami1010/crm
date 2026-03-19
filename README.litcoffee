# 📊 Simple CRM Web Application (PHP + MySQL)

## 🚀 Project Overview

This is a **simple CRM (Customer Relationship Management) web application** built using **Core PHP and MySQL**.

It helps manage leads through different stages:

* Leads
* Prospects
* Clients

The system includes **role-based access** for:

* **Admin**
* **Salesperson**

---

## 🎯 Features

### 👨‍💼 Admin

* Login to system
* Create Salesperson accounts
* Enable / Disable Salesperson accounts
* View all leads, prospects, and clients

### 👨‍💻 Salesperson

* Login to system
* Access CRM dashboard
* Add new leads
* Add notes/comments
* Move leads → prospects → clients
* View only their assigned leads

---

## 🧩 Core Workflow

1. Admin creates salesperson accounts
2. Salesperson logs in
3. User adds a new lead
4. Adds notes after follow-ups
5. Moves lead through stages:

   * Lead → Prospect → Client

---

## 🛠️ Tech Stack

* **Backend:** Core PHP
* **Database:** MySQL
* **Frontend:** HTML, CSS, Bootstrap
* **Authentication:** PHP Sessions

---

## 🗄️ Database Setup

### 1. Create Database

```sql
CREATE DATABASE crm;
USE crm;
```

---

### 2. Users Table

```sql
CREATE TABLE users (
id INT AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(100),
email VARCHAR(100) UNIQUE,
password VARCHAR(255),
role ENUM('admin','sales') DEFAULT 'sales',
status ENUM('active','inactive') DEFAULT 'active',
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

---

### 3. Leads Table

```sql
CREATE TABLE leads (
id INT AUTO_INCREMENT PRIMARY KEY,
user_id INT,
name VARCHAR(100),
business_name VARCHAR(150),
address TEXT,
phone VARCHAR(20),
email VARCHAR(100),
status ENUM('lead','prospect','client') DEFAULT 'lead',
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

---

### 4. Notes Table

```sql
CREATE TABLE notes (
id INT AUTO_INCREMENT PRIMARY KEY,
lead_id INT,
user_id INT,
note TEXT,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

---

## 🔐 Default Admin Login

```
Email: admin@gmail.com
Password: 123456
```

---

## ▶️ How to Run the Project

1. Install **XAMPP / WAMP / Laragon**
2. Place project folder in:

```
htdocs/crm
```

3. Start:

* Apache
* MySQL

4. Import database in **phpMyAdmin**

5. Open browser:

```
http://localhost/crm/
```

---

## 📊 Dashboard Features

* Sidebar navigation:

  * Leads
  * Prospects
  * Clients
* Add new leads
* View lead details
* Add notes with timestamp
* Move leads between stages

---

## 🔒 Role-Based Access

| Feature              | Admin | Salesperson |
| -------------------- | ----- | ----------- |
| Login                | ✅     | ✅           |
| Create Users         | ✅     | ❌           |
| Enable/Disable Users | ✅     | ❌           |
| View All Leads       | ✅     | ❌           |
| Add Leads            | ✅     | ✅           |
| Add Notes            | ✅     | ✅           |

---

## 🧪 Validation Rules

* Name: Required
* Business Name: Required
* Phone: Required
* Email: Optional

---

## 📄 License

This project is open-source and free to use for learning purposes.

---

## ⭐ Note

This is a **basic CRM system**. For production use, implement:

* Input validation
* Prepared statements
* Authentication security
* CSRF protection

---

### 🎉 You're Ready to Use Your CRM!
