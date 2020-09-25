<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Sales Web Application

sales_app is a web application system at an international sales firm which sales goods both online and from retail stores.

The main functionality for the sales web application is: 

- Store manager registers
- Store manager logs into web application platform and views a mini dashboard
- Navigates to CSV File Upload link to upload a CSV file
- When a user selects a CSV file for upload, they click upload button which then emits a flash message of "queued for importing"
- The CSV file is split into many individual files with an extension "csv" using "Laravel queues" as it can not be all inserted into the DB all at once.
- The split files are then saved into a resource directory called "pending_files" in the resources folder
- A table pulls data from the database with CSV data and displays it as Sales records.

## Requirements

The minimum requirement by this project template is your Web server supports PHP 7.2.5 and make sure you have composer and node package manager (npm) installed on your computer locally.

## Installation

### Install via Git to a web server directory such as www or htdocs depending on the web server used (wamp or xamp)

~~~
git clone https://github.com/arnoldkunihira/sales_app.git
~~~

### Run composer Install and composer update

~~~
composer install 
~~~

### then

~~~
composer update 
~~~


### Writing CSS
Before compiling your CSS, install your project's frontend dependencies using the Node package manager (NPM)

~~~
npm install 
~~~

### then
You can compile your SASS files to plain CSS using Laravel Mix.

~~~
npm run dev
~~~

### Now you should be able to access the application through the following URL:

~~~
http://localhost/sales_app/public/
~~~

## CONFIGURATION

### Database

Rename `.env.example` file to `.env` and edit the file with real data, for example:

~~~
APP_NAME="Sales Application"
~~~

~~~
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=<db_name>
DB_USERNAME=<db_username>
DB_PASSWORD=<db_password>
~~~

~~~
QUEUE_CONNECTION=database
~~~

Create a database <db_name>, you should then run the migrate command to run pending migrations to setup the database using the command below:

~~~
php artisan migrate
~~~

If the configuration was followed as above, all should be well by accessing the application URL above.

### NOTE
- When uploading a CSV file, make sure you run this command below for Job queuing
~~~
php artisan queue:work
~~~

## License

The sales application license is under the Laravel framework which is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
