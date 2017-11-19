## Laravel-5.2 based CodeLineFilms App

### Steps for Installation
##### 1 - Download or clone the project from the specified git-repo.
##### 2 - Make sure, that your system is running on PHP >=5.5.9
##### 3 - Run "composer install" command to install the required dependencies
##### 4 - Goto .env.example file of the project, rename it to ".env" file and update following settings
  ###### 4.1 - Mysql Database settings
  ###### 4.2 - Assign APP_URL by "http://domain-name.xyz" or "http://virtual-host.xyz" by pointing virtual host to public directory of the laravel project
  ###### 4.3 - SMTP settings
##### 5 - Run "php artisan migrate"
##### 6 - Run "php artisan db:seed"
##### 7 - Assign "777" permissions to application's "storage" and "bootstrap" directories
##### 8 - Access the application with the specified Urls and login to app and go

### Admin/User Credentials
##### 1- Admin User Creds :
    email : admin@admin.com
    pass : 1234
##### 2 - Backend User Creds :
    email : executive@executive.com
    pass : 1234
##### 3 - Frontend User Creds :
    email : user@user.com
    pass : 1234

### Application Description
simple web application for films.

1) BACKEND

1.1) Implement RESTful API to manage films

Films should have fields:

Name
Description
Realease Date
Rating
Ticket Price
Country
Genre
Photo

1.2) All fields are required, rating is on scale from 1 to 5, 1 film can have several genres.


2) FRONTEND

2.1) create frontend page /films/ to show all films through API. 1 film per 1 page.

2.2) add redirect from / to /films/


2.3) implement frontend page /films/film-slug-name to show specific film. URL should have film's slug.

2.4) implement frontend page /films/create with form to create new film.

2.5) add registration and authentication
[completed]

2.6) add possibility to post comments for each films. Fields "Name" and "Comment" are required.

2.7) only registered users can post comments
