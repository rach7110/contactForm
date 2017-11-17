VERSION REQUIREMENTS:
    PHP 7.0
    MySQL 5.7
    Composer

NOTES:
-Mail driver uses Laravel Log driver. No external mailers have been configred (ie: Mailgun, SparkPost, Amazon SES)

GET STARTED:
- Clone the repo.
- Run composer install
- Copy .env.example file to .env and configure database options
- Run php artisan migrate
- Run php artisan serve  
- Visit localhost:8000