# PLMUN Connect

**PLMUN Connect** is a web-based event registration and management system designed for students and organizations at **Pamantasan ng Lungsod ng Muntinlupa (PLMun)**. The platform allows users to register for events, manage created events, and handle user accounts with ease. It aims to streamline communication and participation between student organizations and the student body.

## 💻 Tech Stack

- **Frontend:** HTML, CSS, JavaScript, Bootstrap 5
- **Backend:** PHP (Procedural)  
- **Database:** MySQL  

## 📌 Features

- User registration and login
- Event creation and registration system
- Account deletion (with data cascade)
- CRUD events and authentication
- Forgot password and account activation through Institutional Email

## 🎯 Purpose

This project was developed as a requirement for our course and submitted to our professor for academic evaluation. It reflects our understanding of web development fundamentals and backend integration using PHP and MySQL.

## 🚫 Disclaimer

This system is for **educational purposes only**. It is not intended for real-world deployment unless properly secured and enhanced.

## 👩‍🏫 Submitted To

**Ms. Marissa Lopez Umali**  
Professor @ Pamantasan ng Lungsod ng Muntinlupa

## Walk through video of website
Click the video to see the walkthrough
<p align="center">
  <a href="https://www.youtube.com/watch?v=o6FRT4UxS7U">
    <img src="https://img.youtube.com/vi/o6FRT4UxS7U/hqdefault.jpg" alt="Walkthrough Video" />
  </a>
</p>

no website link for this website because of no longer 000webshost its hostinger now and its not freee😭 😭 😭 

but you can run this at your localhost below

---

## 🧪 How to Run Locally

1. **Clone or Download the Project**
   ```bash
   git clone git@github.com:Matthew-act546/final-plmun-connect.git
   ```

2. **Place it inside your web server directory**
   - For XAMPP: Move it to `C:\xampp\htdocs\plmun-connect-final`

3. **Start XAMPP**
   - Turn on **Apache** and **MySQL**

4. **Import the Database**
   - Open `phpMyAdmin`  
   - Create a database named `plmun_connect`  
   - Import the SQL file from your project folder (`plmun_connect_event_registrations.sql`, `plmun_connect_events.sql`, `plmun_connect_users.sql`)

5. **Import SQL Files**:
   - Select your newly created database from the left sidebar.
   - Click on the **Import** tab.
   - For each **SQL dump file**, click **Choose File** and upload the structure files.
   - Click **Go** to start the import.

   
   **Note**: You will need to import the following dump files in (`database/sql_file`):
   - `plmun_connect_event_registrations.sql` (Contains the event registrations)
   - `plmun_connect_events.sql` (Contains the events.sql)
   - `plmun_connect_users.sql` (Contains the users)

5. **Configure Database Connection**
   - Go to `./database/db_func.php` and `./database/db_connection.php`
   - Update DB credentials if needed (e.g., username, password)

6. **Access the Website**
   - Visit: `http://localhost/plmun-connect-final`

---


## 👥 Developed By

- Matthew David Cabance Fernandez - Full-stack
- Lawrence Salamat Alibangbang - Front-end

## 📄 License
This project is licensed under the [**CC BY-NC-ND 4.0 License**](https://creativecommons.org/licenses/by-nc-nd/4.0/deed.en).  
It is submitted solely for academic purposes by:
- Matthew David Cabance Fernandez
- Lawrence Salamat Alibangbang

Submitted to **Ms. Marissa Lopez Umali** for academic evaluation only.  

Reproduction, modification, or public deployment is not permitted without permission.