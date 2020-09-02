# Camagru
An image sharing site much like Instagram
## Requirements
* PHP
* JavaScript
* MAMP : https://bitnami.com/stack/mamp
## Installation 
### How to download the source code
* Navigate to https://github.com/cyberkuv/camagru, click on clone or download 
### How to setup and configure
* Download MAMP from bitnami website
* Copy the camagru directory into the folder MAMP/htdocs
* Open the manager-osx, Go to manage servers tabs and make sure mysql database and apache web sever is running
### How to run the program
* Click on the folder named Camafru to get started. 
## Code brakedown
* Backend technologies
  * PHP
  * JavaScript
* Front-end technologies
  * HTML
  * CSS
* Database management systems
  * mysql
* Break down of app folder structure
  * /config
    * database.php
    * setup.php
  * php files
    * comments.php
      * This contains code that adds comments to users picture which have been uploaded
    * delete.php
      * This contains code to delete a users picture which have been uploaded
    * passreset.php
      * This contains code to recover a users account once a password is forgotten
    * like.php
      * This contains code for liking user images
    * login.php
      * This contains code for a user to access their account
    * notify.php
      * This contains code to send mail to users
    * password.php
      * This contains code to verify the password is strong when registering 
    * upload.php
      * This contains code to upload a users images to the web app
    * signup.php
      * This contains code to allow a user to register to the site
    * update.php
      * This contains code for a user to be able to change their details such as their password
    * verify.php
      * This contains code that verifies the users account with the link sent to their mail
  * /js
    * camera.js
      * This contains code to snap pictures through the web cam also to add fliters to the images the user wants to upload
## Testing 
https://github.com/wethinkcode-students/corrections_42_curriculum/blob/master/camagru.markingsheet.pdf
I used this pdf to test my application both the test and the expected results are included
