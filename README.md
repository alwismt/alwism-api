# alwism API Gateway

This is the API Gateway for [www.alwism.com](https://www.alwism.com). 
You can find out more about alwism at [www.alwism.com/sitemechanism](https://www.alwism.com/sitemechanism). 
This application was created utilizing a monolithic architecture, using laravel rest-apis.

## About Laravel

Laravel is a web application framework with expressive, elegant syntax.


## Site Visit

[Visit to API Gateway - https://api.alwism.com](https://api.alwism.com)

[Check Frontend integrated site - https://www.alwism.com](https://www.alwism.com)

#### Authentic API Check
Admin Username: admin@email.com

Password: Gb5^%hHGIYG$876KG(*^KJ
## Requirements
The alwism.com API gateway requires:

* Linux/Unix, WAMP/XAMP or MacOS environment
* PHP >= 8.1
* MySQL >= 8.0, MariaDB >= 10.6
* Redis >= 7 (Redis use as secoundary databse while retriving projects)
* Web server ( [Production] - Nginx or Apache |  [For testing] - integrated PHP web server)
* Composer 2.3+
* PHP-Extensions - php-intl, php-fileinfo, php-redis
* AWS S3 bucket or S3 compatible storage (optional)

If required PHP extensions are missing, `composer` will tell you about the missing dependencies.

## Installation

1. Clone or download the git repository to your pc or to your cloud server

```bash
git clone https://github.com/alwismt/alwism-api.git
cd alwism-api
```

2. Install the composer packages
```bash
composer install
```

3. Set up your .env (rename .env.example file to .env) values and CORS

    3.1 Setup CORS

    To fixed the CORS in your app. You can open .env file and add your local ip and port or server domain name in my case [www.alwism.com].
    ```bash
    SANCTUM_STATEFUL_DOMAINS="https://www.alwism.com"
    ```

    3.2 Setup SQL database

    Add your sql based databse name, username and password in .env
    ```bash
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=homestead
    DB_USERNAME=homestead
    DB_PASSWORD=secret
    ```
    3.3 Setup Redis database

    If you have redis password replace it in .env otherwise keep password null
    ```
    REDIS_HOST=127.0.0.1
    REDIS_PASSWORD=null
    REDIS_PORT=6379
    ```

    3.4 S3 compatible storage setup

    ```bash
    AWS_ACCESS_KEY_ID=
    AWS_SECRET_ACCESS_KEY=
    AWS_DEFAULT_REGION="ap-singapore-1"
    AWS_BUCKET=
    AWS_USE_PATH_STYLE_ENDPOINT=true
    AWS_ENDPOINT=
    AWS_URL=
    ```
    3.5 Setup SMTP mail server

    Replace below code with your SMTP mail settings.
    ```bash
    MAIL_MAILER=smtp
    MAIL_HOST=mailhog
    MAIL_PORT=1025
    MAIL_USERNAME=null
    MAIL_PASSWORD=null
    MAIL_ENCRYPTION=null
    MAIL_FROM_ADDRESS="hello@example.com"
    ```

    3.6 [Google RECAPTCHA](https://developers.google.com/recaptcha) setup

    Go to [Google recaptcha](https://developers.google.com/recaptcha) site and get your credentials and replace below code
    ```bash
    RECAPTCHA_SITE_KEY=
    RECAPTCHA_SECRET_KEY=
    RECAPTCHA_SKIP_IP=
    ```

4. Migrate Database and Create admin username
To Migrate table execute below command in project directory
```bash
php artisan Migrate
```

To add your own admin username and password go to `Database\Factories\UserFactory.php` and change below code to your own
```bash
'name' => 'Alwis Madhusanka',
'email' => 'admin@email.com',
'email_verified_at' => now(),
'password' => Hash::make('Gb5^%hHGIYG$876KG(*^KJ'),
```

5. Run Application
To run locally you can just use below code, or you can use Nginx or apache as your own for serve the project
```bash
php artisan serve
```

6. Run Queue Jobs 
```bash
php artisan queue:work
```
## Site Visit

[Visit to API Gateway - https://api.alwism.com](https://api.alwism.com)

[Check Frontend integrated site - https://www.alwism.com](https://www.alwism.com)

#### Authentic API Check
Admin Username: admin@email.com

Password: Gb5^%hHGIYG$876KG(*^KJ


## Screenshots

![App Screenshot 1](https://cdn.alwism.com/sv3/images/git/api-ss-2.png)


![App Screenshot 2](https://cdn.alwism.com/sv3/images/git/api-ss-1.png)


![App Screenshot 3](https://cdn.alwism.com/sv3/images/git/api-ss-3.png)
