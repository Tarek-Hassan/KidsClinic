
<p align="center">
    <img src="https://drive.google.com/file/d/1nFst0cIrjTdufeaAY76pURZkr2X9P4ko/view?usp=sharing" alt="Build Status">
    <img src="https://drive.google.com/file/d/1c2GQU-yO4vIAsNtJKBLrRTug5Xgtgy8v/view?usp=sharing" alt="Build Status"  width="400">
    <img src="https://drive.google.com/file/d/1zSqLpetWB2Pqt4-evCyo850-ZIXCWT9B/view?usp=sharing" alt="Build Status">
    <img src="https://drive.google.com/file/d/1OeeU7-ZH8b4f0FumN5IgR6LaAJ8qY6ZH/view?usp=sharing" alt="Build Status">
</p>
<p align="center">
    <img src="https://drive.google.com/file/d/1wBfJXos-ebNLKchuApR_DWlmyRrE3afZ/view?usp=sharing" alt="Build Status">
    <img src="https://drive.google.com/file/d/1qq4qkBFlKGvL-XawBhKaMD8Er7LsShvq/view?usp=sharing" alt="Build Status">
    <img src="https://drive.google.com/file/d/1ykkxSJKkQhCa5NIE2mhOa32VPlrykNmG/view?usp=sharing" alt="Build Status">
</p>

## About ClinicKids
- this Site to manage the clinic 
 
- [See All ScreenShots](https://drive.google.com/drive/folders/1ASwuvlAnXOJmZhS2yo0NQEtWS8E5BNET?usp=sharing).
- [Live Demo In Heroku](http://pure-basin-21198.herokuapp.com).

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
