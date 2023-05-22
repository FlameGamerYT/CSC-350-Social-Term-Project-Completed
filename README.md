# CSC-350-Social-Term-Project-Completed
CSC 350 Social Term Project Completed version
completed version of social meet term project for csc 350 Social Media Project

Social Meet is a term project for CSC 350, it is a simple messaging/social media website used to help people communicate with one another.

----- IT IS REQUIRED TO IMPORT THE DATABASE 'social_meet.sql' OR ELSE NONE OF THE CODE WILL FUNCTION. -----

----- XAMPP and MySql IS ALSO REQUIRED -----

Step 1: Download and move the socialmeet folder with all of its child files into C:/xampp/htdocs

Step 2: Import the socialmeet.sql into your SQL databases on XAMPP:

To import the socialmeet.sql file on your XAMPP, you can follow these steps:

Copy the socialmeet.sql file to your computer.
Start the XAMPP Control Panel on your computer and make sure that the MySQL server is running.
Open a command prompt or terminal window and navigate to the XAMPP installation directory. For example, on Windows, you can type cd C:\xampp\mysql\bin.
Run the following command to import the SQL file:
mysql -u [username] -p socialmeet < path/to/socialmeet.sql
Replace [username] with your MySQL username (root by default) and path/to/socialmeet.sql with the path to the socialmeet.sql file on your computer.

Enter your MySQL password when prompted.
After running this command, the socialmeet database and its tables should be imported into your XAMPP MySQL server and the code should function as intended.

To access you need to keep XAMPP open with the MySQL server running, and you can access through the following link: http://localhost/socialmeet/login.php
