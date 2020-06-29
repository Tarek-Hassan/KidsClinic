
![admin](https://i.stack.imgur.com/gsEq1.png)
## Live Demo In Heroku  link
    http://pure-basin-21198.herokuapp.com
## Steps To Download
    1-clone project
    2-cd /clinic
    3-composer  install
    4-copy (.env.example) and change name to(.env)
    5-php artisan key:generate
    6-php artisan migrate
    7-php artisan db:seed                // to insert admin Details in db
    8-php artisan serve
## DashBoard  for admin
    UserName:admin@admin.com
    Password:123456789
## DashBoard for doctor
    UserName:doctor@doctor.com
    Password:123456789
## DashBoard for patientuser
    UserName:user@user.com
    Password:123456789
## Packages
    1)DataTabale
        -yajra/laravel-datatables-oracle

    2)Storage
        -php artisan storage:link

    3)NOtification
        -php artisan notifications:table
        --php artisan migrate
    
    4)queue    
        -QUEUE_CONNECTION=database(env)
        -php artisan queue:table
        -php artisan migrate
        -php artisan queue:work 

    5)Command
        -php artisan make:command ScheduleCommand

    6)schedule
        -php artisan schedule:run (ON LOCALHOST )

        - * * * * * php /path-to-your-project/artisan schedule:run >> /dev/null 2>&1(ON SERVER )
