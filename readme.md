## Laravel-5.2 based CodeLineFilms App

### Steps for Installation
##### 1 - Download or clone the project from the specified git-repo.
##### 2 - Make sure, that your system is running on PHP >=5.5.9
##### 3 - Run "composer install" command to install the required php/laravel dependencies
##### 4 - Run "npm install" command to install the required js/elixer dependencies
##### 5 - Goto .env.example file of the project, rename it to ".env" file and update following settings
  ###### 5.1 - Mysql Database settings
  ###### 5.2 - Assign APP_URL by "http://domain-name.xyz" or "http://virtual-host.xyz" by pointing virtual host to public directory of the laravel project
  ###### 5.3 - SMTP settings
##### 6 - Run "php artisan migrate"
##### 7 - Run "composer dump-autoload"
##### 8 - Run "php artisan db:seed"
##### 9 - Assign "777" permissions to application's "storage" and "bootstrap" directories
##### 10 - Access the application with the specified Urls and login to app and go

### Authenticated User Credentials
##### 1- FrontEnd User Creds :
    email : naeem@user.com
    pass : niki.00028

### Application Description
simple web application for films.

1) BACKEND

1.1) Implement RESTful API to manage films DONE

Films should have fields: DONE

Name
Description
Release Date
Rating
Ticket Price
Country
Genre
Photo

1.2) All fields are required, rating is on scale from 1 to 5, 1 film can have several genres. DONE


2) FRONTEND

2.1) create frontend page /films/ to show all films through API. 1 film per 1 page. DONE

2.2) add redirect from / to /films/  DONE


2.3) implement frontend page /films/film-slug-name to show specific film. URL should have film's slug. DONE

2.4) implement frontend page /films/create with form to create new film. DONE

2.5) add registration and authentication DONE

2.6) add possibility to post comments for each films. Fields "Name" and "Comment" are required. DONE

2.7) only registered users can post comments DONE
