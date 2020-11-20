UCC Test Project

for this project i'm using Lumen as Microframework in Laravel

Backend REST Services declared in HomeController.php

Frontend without any frameworks.

## How To Run Projects
1. Migrate Database and use Dummy row for fill Type & Value Tables. (php artisan migrate & php artisan db:seed --class=NeededRow)
2. Run Project using command (php -S localhost:yourPort -t ./public)
3. Access in browser within localhost:yourPort/form for the main pages.
4. Section Input Form for add Vehicle Data
5. After Add there will be information given about EngineID / EID#

## Backend Services Routes (sceenshot display in folder)
1. REST API Show List Data localhost:yourPort/showData 
2. REST API Insert Data localhost:yourPort/insertData
