# TechLink
TechLink is a simple PHP-based system that helps lecturers at the university request software and devices for their classes. It enables the ICT department to track and manage these requests efficiently.<br/>

# Features <br/>
Submit requests for software and devices.
Could you track the status of requests?
Admin dashboard for managing requests.
Notifications for approval or rejection of requests.

# Technologies Used
Backend: PHP<br/>
Frontend: HTML, CSS, JavaScript<br/>
Database: MySQL<br/>

# Requirements
To run this project, you need:

PHP >= 7.4<br/>
MySQL >= 5.7<br/>
A web server (e.g., Apache or Nginx)<br/>
A browser to access the application<br/>

# Setup Instructions

Clone this repository:

```
 git clone https://github.com/mosesmulumba/techlink.git <br/>

 cd techlink
````


Set up the database:
Create a new MySQL database.

Import the authentication.sql file from the project folder into the database.

Configure the database connection:

Edit the config.php file and update the database details:
```
<?php
$host = 'localhost';
$db = 'your_database_name';
$user = 'your_username';
$password = 'your_password';
?>
```
Start your server.

Place the project in your web server's root directory (e.g., /var/www/html/ for Apache).
Open the project in your browser:

http://localhost/techlink

# How to Use
Lecturers: Log in and submit requests for software or devices. <br/>
ICT Department: Log in to view and manage requests.<br/>
Future Plans<br/>
Add email notifications for status updates.<br/>
Improve the user interface.<br/>
Add analytics for tracking request trends.<br/>

# Contributions
Feel free to contribute to this project. Fork the repository, make your changes, and create a pull request.

# Contact
For questions or support, email: mulumbamoses94@gmail.com

