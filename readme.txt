
Poject Name : Doctors Vision
Site URL    : localhost and http://doctors-vision.io/
Author      : Ritesh Tiwari
E-mail      : rtiwari@cloud97.io
Date        : 31 May 2024
Languages   : html5, css3, JavaScript, php 7.2
server      : nginx/1.14.0 (ubuntu)
---------------------------------------------------

Defult Username and Passowrd 

* username : admin
* password : admin


-----------------------------------------------------
File structure

* assets :
    - css files
    - js files
    - image files

* connection.php
* login.html 
* login.php
* index page 
* upload_image.php
* upload.php
* delete.-image.php
* message.php
* share-files:
    - images


---------------------------------------------------------------------------------

Required dependencies or libraries

* bootstrap 5.3.2
* php7.2-fpm        : sudo apt-get install -y php7.2-fpm
* jquery v3.7.1   

--------------------------------------------------------------------------------

Check the PHP configuration settings for file uploads in your php.ini file:

* file_uploads: Ensure this is set to On.
* upload_max_filesize: Ensure this is large enough to accommodate your file size.
* post_max_size: Ensure this is larger than upload_max_filesize.



---------------------------------------------------------------------------------

Create a local domain name  

1. open  :  /etc/hosts file  || sudo nano /etc/hosts
2. Write :  127.0.0.1    doctors-vision.io
3. save the file

-----------------------------------------------------------------------------------

nginx site-enbaled configuration Settings

1. Go to site-enabled folder || cd /etc/nginx/site-enabled
2. Copy and paste the doctor-vision.io file into the site-enabled folder. cp source_file destination_path
3. Restart nginx server || sudo systemctl restart nginx
4. http://doctors-vision.io/
