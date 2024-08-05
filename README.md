```
git clone git@github.com:t3rmin4l/todo_tibi.git
cd todo_tibi
docker-compose up
docker exec -it tibi_app composer install
cd tibi
cp .env.example .env
docker exec -it tibi_app php artisan key:generate
docker exec -it tibi_app php artisan migrate:fresh
docker exec -it tibi_app php artisan db:seed (if you want to get random 10 todo items)
```

App on: http://localhost:4256/

PhpMyAdmin: http://localhost:4258/ (tibi/tibi)


If you have permission problems, run (in tibi folder):
```
chmod 777 storage
chmod 777 storage/* -R
```