musandPlus.com

Musand Plus Shared Hosting Deploy Process




 Many shared hosting providers, including Hostinger, GoDaddy,
     Hostgator, Namecheap, etc., provide shared hosting services . Deployment
     of Laravel application on shared hosting is a lengthy process and includes
     the following steps:

 First, you need to compress your Laravel application folder you will
     get laravelapp.zip

 Second, open your Laravel Godaddy or Laravel Hostgator hosting
     cPanel.

 Click on the File manager option and next click to upload button on
     the top menu.

 Next, unzip the laravelapp folder.

 Open the laravelapp folder and MOVE the CONTENTS of the public
     folder to your cPanel’s public_html folder. You can as well delete the
     empty public folder now.

 Navigate to the public_html folder and locate the index.php file.
     Right-click on it and select Code Edit from the menu.

 This will open up another tab showing the cPanel code editor.

 Change the following line

 
 `require __DIR__.'/../bootstrap/autoload.php';

 






  

 ...

  

 $app = require_once __DIR__.'/../bootstrap/app.php';`

  

 to

  

 `require __DIR__.'/../laravel50/bootstrap/autoload.php';

  

 ...

  









 $app = require_once __DIR__.'/../laravel50/bootstrap/app.php';`







 Then you set your .htaccess file
     configuration according to your website domain and URL settings.

 Finally, you open PHPMYADMIN and
     create a new database for your application and migrate all tables for the
     application you like to use.



These are the steps you
will have to follow when you deploy the Laravel application on shared hosting.
Sometimes, you will taste success, but in most cases, all your efforts will go
in vain. The case may be you are unable to find a suitable PHP
version to support your Laravel application. Or you will end
up with a 500 error.

## How to run the code
- git clone https://github.com/abdullahzahrani/musandPlus.git
- cd musandPlus
- cp .env.example `.env`
- open .env and update DB_DATABASE (database details)
- run : `composer install`
- run : `php artisan key:generate`
- run : `php artisan migrate:fresh --seed`
- run : `php artisan serve`

- Best of luck 


## Credentials
- #### Admin
- email: admin@admin.com
- password : admin123123
- #### user
- email: user@user.com
- password: user123123 
