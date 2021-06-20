# TODO-Debricked

Basic to-do application to be used by co-workers at Debricked.

## Tech stack: 
 - Docker
 - Nginx
 - Laravel 
 - Vue.js
 - Mysql

## Installation
- `git clone https://github.com/viktigpetterr/TODO-Debricked.git`
- `cd TODO-Debricked`
- `docker-compose build`
- `docker exec -it todo-app-app ./install.sh`
- `docker exec -it todo-app-app php artisan migrate:refresh --seed`
- Open `http://127.0.0.1` in your browser. Voila
