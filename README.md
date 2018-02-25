# Locations Scheme

Before starting, you need have on your machine Windows or Linux system, or have an cloud server some these systems.

### Server Requirements:

You need to make sure your server meets the following requirements:

	- PHP >= 7.1.3
	- OpenSSL PHP Extension
	- PDO PHP Extension
	- Mbstring PHP Extension
	- Tokenizer PHP Extension
	- XML PHP Extension
	- Ctype PHP Extension
	- JSON PHP Extension

Laravel utilizes Composer to manage its dependencies. So, before using Laravel, make sure you have Composer installed on your machine.

###  Clone project with Git: 
	git clone https://github.com/julietgar/locations_scheme.git

###  On the project root, execute the following commands: 

#### - Create .env file:
	cp .env.example .env

#### - Install dependencies:
	composer update

#### - Create Application Key:
	php artisan key:generate

#### - Execute Apidoc:
	apidoc -i app/ -o public/apidoc/	

### Project Configuration:

#### - Public Directory:
If you wish use a Virtual Host, you need configure your web server's document / web root to be the  public directory. The index.php in this directory serves as the front controller for all HTTP requests entering your application.

#### - Directory Permissions:
You may need to configure some permissions. Directories within the 'storage/' and the 'bootstrap/cache/' directories should be writable by your web server or Laravel will not run.

#### - Create database:
You need to create a database for your project, in this case will can put a name as 'project_locations'.

#### - Database connection:
You need open .env and modified the following variables:

	DB_DATABASE=database_name
	DB_USERNAME=database_user
	DB_PASSWORD=database_password

Of course, you must replace this values for the values your local machine or serve have.

#### - Run Migrations:
You need execute the following command to create the tables pre-configured to the project:

	php artisan migrate

## Web Server Configuration:

#### - If you use Apache:
Laravel includes a public/.htaccess file that is used to provide URLs without the index.php front controller in the path. Before serving Laravel with Apache, be sure to enable the  mod_rewrite module so the .htaccess file will be honored by the server.

#### - If you use Nginx:
If you are using Nginx, the following directive in your site configuration will direct all requests to the index.php front controller:

	location / {
	    try_files $uri $uri/ /index.php?$query_string;
	}

## How to use the API?

If you have PHP installed locally and you would like to use PHP's built-in development server to serve your application, you may use the serve Artisan command. This command will start a development server at http://localhost:8000:

	php artisan serve

#### - Create an user client:

You need create an user to use the API because it need a token for acces to endpoints.

You have two ways to create user:

##### - API:
This is explained in the Documentation API: http://localhost:8000/apidoc/index.html

##### - Web:

##### - API:
This is explained in the Documentation API: http://localhost:8000/apidoc/index.html

#### - Play with the API!:
All documentation API is explained in http://localhost:8000/apidoc/index.html

### Support or Contact

Having trouble with Pages? Check out our [documentation](https://help.github.com/categories/github-pages-basics/) or [contact support](https://github.com/contact) and we’ll help you sort it out.