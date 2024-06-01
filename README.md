# Overview
This Laravel blog project is a comprehensive web application developed to enhance my skills in PHP and the Laravel framework. The primary goal of this project is to create a fully functional blog platform with robust CRUD (Create, Read, Update, Delete) operations, providing an intuitive and seamless experience for both users and administrators.

# Installation Instructions

To download Laravel Blog Project repository from GitHub to your local machine and then navigates into the newly cloned project directory run the following command.
```
git clone https://github.com/rO0AB/Laravel-Blog-Project.git && cd Laravel-Blog-Project/ 
```

To install all the dependencies listed in the composer.json file run the following command.
```
composer install
```

Rename the .env.example file to .env and set the MYSQL database and SMTP credentials in this file.
```
mv .env.example .env
```

To run database migrations and then seed the database with data run the following command.
```
php artisan migrate:refresh --seed
```

To generate a new application key in the Laravel framework run the following command. 
```
php artisan key:generate
```

To start a local development server and serve your Laravel application run the following command.
```
php artisan serve
```


