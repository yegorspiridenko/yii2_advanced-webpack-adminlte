<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">Yii2 advanced + webpack + adminlte</h1>
    <br>
</p>

Yii 2 advanced + webpack + adminlte

## Installation
1. Clone the repository
1. Go to the project root directory and run `composer install`
1. Run `php init` from the project root directory and choose your desired environment
1. Create the database
1. Open `common/config/main-local.php`
- Configure database credentials by changing the following lines
    ```php
  // If use mamp 
  //'dsn' => 'mysql:host=localhost;dbname=your_website_db;unix_socket=/Applications/MAMP/tmp/mysql/mysql.sock',
    'dsn' => 'mysql:host=localhost;dbname=your_website_db',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8mb4',
    ```
  - If you want to use real SMTP credentials to send emails, configure the mail provider by replacing `mailer` component with the following code
      ```php
      'mailer' => [
          'class' => 'yii\swiftmailer\Mailer',
          'transport' => [
              'class' => 'Swift_SmtpTransport',
              'host' => 'SMTP_HOST',
              'username' => 'SMTP_USERNAME',
              'password' => 'SMTP_PASSWORD',
              'port' => 'SMTP_PORT',
              'encryption' => 'tls',
          ],
      ],
      ```
1. Run `php yii migrate` to apply all system migrations.

2. Open `common/config/params-local.php` and replace the content with the following code
    ```php
    <?php
    return [
        'frontendUrl' => 'YOUR_FRONTEND_HOST', // Ex: http://yourwebsite.localhost
        'vendorEmail' => 'admin@yourwebsite.com'
    ];
    ```

#### For Development
Run`yarn run dev` to build the files and start watching them. This will generate unminified versions of the files
and will generate source maps as well

#### For production
Run `yarn run prod` to build the files for production. This will generate minified files.

    
## Create admin user
Run the following console command to create admin user. PASSWORD is optional, you can skip it and system will generate a random password
```bash
php yii app/create-admin-user USERNAME [PASSWORD]
```
