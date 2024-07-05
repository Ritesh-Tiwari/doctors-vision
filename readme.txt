
Poject Name : Doctors Vision
GitHub URL  : https://github.com/Ritesh-Tiwari/doctors-vision
Site URL    : localhost and http://doctors-vision.io/
Author      : Ritesh Tiwari
E-mail      : rtiwari@cloud97.io
Created Date: 31/05/2024
Updated Date: 24/06/2024
Languages   : html5, css3, JavaScript, php 7.4
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

Required packages or librariess

* bootstrap 5.3.2
* php7.2-fpm        : sudo apt-get install -y php7.2-fpm
* jquery v3.7.1   

--------------------------------------------------------------------------------

Installation Stpes:

Step 1  :   sudo apt update
Step 2  :   sudo apt install php7.4 php7.4-fpm
Step 3  :   sudo apt install nginx
Step 4  :   sudo ufw app list
Step 5  :   sudo ufw allow 'Nginx Full'
Step 6  :   sudo ufw status
Step 7  :   sudo systemctl start nginx
Step 8  :   sudo systemctl status nginx
Step 9  :   sudo cp -R project_file_path/* /var/www/html
Step 10 :   sudo chmod 777 /var/www/html/share-files
Step 11 :   sudo systemctl restart nginx
Step 12 :   go to localhost


---------------------------------------------------------------------------------

Create a local domain name (optional)  

1. open  :  /etc/hosts file  || sudo nano /etc/hosts
2. Write :  127.0.0.1    doctors-vision.io
3. save the file


-----------------------------------------------------------------------------------

Nginx site-enbaled configuration Settings (optional)

1. Go to site-enabled folder || cd /etc/nginx/site-enabled/
2. Copy and paste the doctor-vision.io file into the site-enabled folder || cp source_file destination_path
3. Restart nginx server || sudo systemctl restart nginx
4. http://doctors-vision.io/


--------------------------------------------------------------------------------

Check the PHP configuration settings for file uploads in your php.ini file:

* file_uploads: Ensure this is set to On.
* upload_max_filesize: Ensure this is large enough to accommodate your file size.
* post_max_size: Ensure this is larger than upload_max_filesize.




------------------------------------------------------------------------------------------

Max image upload size settings :

First edit the Nginx configuration file (nginx.conf)

Location: sudo nano /etc/nginx/nginx.conf

Add following codes:

http {
        client_max_body_size 100M;
}
Then Add the following lines in PHP configuration file(php.ini)

Location: sudo gedit /etc/php5/fpm/php.ini

Add following codes:

memory_limit = 128M 
post_max_size = 20M  
upload_max_filesize = 10M




----------------------------------------------------------------------------------------------------

Error 3002 : File or folder permission problem

Step 1: Open Terminal 
Step 2: sudo chmod 777 /var/www/html/share-files

Error 3006: Result file permission process failed

step 1 : open turminal
step 2 : sudo chmod 777 /var/www/html/share-files/results/data.json



Error 3007: Result File not Found 
Step 1 : run backend code from jupyter notbook 

