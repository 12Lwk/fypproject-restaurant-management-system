# Restaurant Management System

[![PHP Version](https://img.shields.io/badge/PHP-7.4%2B-blue.svg)](https://www.php.net/)
[![Database](https://img.shields.io/badge/Database-MySQL-orange.svg)](https://www.mysql.com/)
[![Frontend](https://img.shields.io/badge/Frontend-HTML%20%7C%20CSS-red.svg)](https://developer.mozilla.org/en-US/docs/Web/Guide/HTML/HTML5)
[![Server](https://img.shields.io/badge/Server-XAMPP-green.svg)](https://www.apachefriends.org/)

A comprehensive web-based system designed to streamline and modernize restaurant operations. This project replaces traditional manual processes with an efficient, computerized solution for food ordering, billing, reservations, and reporting, enhancing both staff productivity and the customer dining experience.

---

## Table of Contents

- [1. Project Overview](#1-project-overview)
- [2. Problem Statement](#2-problem-statement)
- [3. Key Features](#3-key-features)
- [4. System Architecture & Tech Stack](#4-system-architecture--tech-stack)
- [5. System Screenshots](#5-system-screenshots)
- [6. Setup and Installation](#6-setup-and-installation)
- [7. Project Authors](#7-project-authors)

---

## 1. Project Overview

The Restaurant Management System is a self-hosted web application designed for restaurant owners to manage their operations efficiently. It provides a seamless digital interface for customers to place orders and for administrators to manage everything from menu items and bookings to sales tracking and reporting. The primary goal is to reduce manual workload, minimize errors, and provide valuable business insights through a centralized dashboard.

---

## 2. Problem Statement

Traditional restaurant operations often suffer from inefficiencies that can impact profitability and customer satisfaction. This project aims to solve the following problems:

* **Manual Hassle:** Eliminates the need for pen-and-paper for ordering, billing, and booking, which is prone to errors and difficult to track.
* **Risk of Wrong Orders:** Reduces miscommunication between customers and staff by allowing customers to place their orders directly through the system.
* **Inefficient Management:** Provides restaurant owners with a dashboard to monitor sales, track inventory, and manage staff, replacing manual and time-consuming tracking methods.
* **Poor Customer Feedback Loop:** Offers a channel for customers to provide feedback, helping the restaurant improve its service and food quality.

---

## 3. Key Features

The system is divided into two main user roles: **Admin (Staff/Manager)** and **Customer**.

### Admin Features

* **Secure Login:** Authenticated access to the admin panel.
* **Dashboard:** An overview of key metrics including monthly/annual earnings, pending orders, and sales graphs.
* **Order Management:** View, edit, and manage all incoming customer orders (both dine-in and takeaway).
* **Booking Management:** Create, edit, and delete customer reservations.
* **Menu & Category Management:** Add, edit, and delete food items and organize them into categories.
* **Billing & Transaction Management:** View all transaction details and manage billing records.
* **Reporting:** Track sales and income to analyze business performance.

### Customer Features

* **Dine-in / Takeaway Selection:** Customers can choose their preferred order type.
* **QR Code Ordering:** Easily access the menu by scanning a QR code.
* **Interactive Menu:** View food items with images, descriptions, and prices.
* **Order Cart:** Add items to a cart, edit quantities, or remove items before checkout.
* **Multiple Payment Options:** Supports various payment methods including Pay at Counter, Credit/Debit Card, and DuitNow QR.
* **Provide Feedback:** Submit feedback on their dining experience.

---

## 4. System Architecture & Tech Stack

This project is a classic client-server web application built with the following technologies:

* **Frontend:** `HTML`, `CSS` (for structure and styling).
* **Backend:** `PHP` (for server-side logic, database interaction, and handling requests).
* **Database:** `MySQL` (managed via **phpMyAdmin**).
* **Local Server Environment:** `XAMPP` (includes Apache web server, MySQL, and PHP).
* **Email Notifications:** `PHPMailer` (for sending confirmation or notification emails).

---

## 5. System Screenshots

### Admin Panel
![Admin Dashboard](https://i.imgur.com/your-admin-dashboard-image.png)
*(Admin dashboard showing sales overview, last orders, and top customers)*

### Customer Ordering Flow
![Customer Menu](https://i.imgur.com/your-customer-menu-image.png)
*(Customer view of the menu for placing an order)*

---

## 6. Setup and Installation

To run this project on your local machine, please follow these steps:

1.  **Install XAMPP:** Download and install XAMPP from the [official website](https://www.apachefriends.org/).

2.  **Clone the Repository:**
    ```bash
    git clone [https://github.com/your-username/restaurant-management-system.git](https://github.com/your-username/restaurant-management-system.git)
    ```

3.  **Place Project in `htdocs`:** Move the cloned project folder into the `htdocs` directory inside your XAMPP installation folder (e.g., `C:\xampp\htdocs`).

4.  **Start XAMPP:** Open the XAMPP Control Panel and start the **Apache** and **MySQL** modules.

5.  **Create the Database:**
    * Open your web browser and navigate to `http://localhost/phpmyadmin`.
    * Create a new database and name it according to the project's configuration (e.g., `restaurant_db`).
    * Select the new database and go to the **"Import"** tab.
    * Click "Choose File" and select the `.sql` file provided in this repository (`fyp.sql`).
    * Click "Go" to import the database structure and data.

6.  **Run the Application:**
    * Open your web browser and navigate to `http://localhost/your-project-folder-name`.
    * You should now see the application's homepage.

---

## 7. Project Authors

* **Lee Wen Kang**
* **Choong Cheng Wai**
* **Fong Jun Yu**
