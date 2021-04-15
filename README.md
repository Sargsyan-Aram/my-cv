<h1>Aram Sargsyan CV</h1>
<hr>
<h3>Back-end: PHP (Laravel) <br><br> Front-end: Vue.js</h3>
<hr>

### For deployment
1) `composer install`
2) `php artisan migrate`
3) `php artisan db:seed`
4) `npm i`
5) `npm run build`(watch)
<hr>

### For Local work with composer
1) `cd .infrastructure && docker-compose -f docker-compose.yml up -d`
2) `docker exec -it my-cv_app sh`
3) `php artisan migrate --seed`
4) In local terminal need run ```cd ../ && sudo chown $USER:$USER vendor -R```
5) ```npm i``` _At this moment not added nodejs docker image_
6) `npm run build`(watch)
