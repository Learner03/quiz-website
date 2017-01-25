quiz-website

This is a website for online quizzes. These are 1 minute MCQ questions quizzes. Admin of the website can change questions and upload tutorials. Anyone can take the quiz but playing while logging in will update the profile of user to keep his record. So he can see change in his performance.

Prerequisites

To run this website on your device you will need a PHP and MySQL server. I prefer xampp server because of its easy download,  installation and use. You can get it from here https://www.apachefriends.org/download.html 

Installation 

The complete installation process and getting started guide of xampp is here 
https://make.wordpress.org/core/handbook/tutorials/installing-a-local-server/xampp/

After installing xampp follow these steps-
1. Copy this project folder in the htdocs folder of xampp.
2. Create mydb database for project tables through phpmyadmin by typing http://localhost/phpmyadmin/ in your web browser.
3. Import "db.sql" file in "mydb" database.
4. Type path of project index file in the web browser to run it. 
   For example if it is in xampp>htdocs>project> then type  http://localhost/project/index.php
   
In database   
admin id- admin@admin.com
admin password- admin
By logging in as admin you can use "addQues.php" for changing quiz questions and "uploadTut.php" for uploading tutorials without any coding.  
