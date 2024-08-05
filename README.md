```
git clone git@github.com:t3rmin4l/todo_tibi.git
cd todo_tibi
docker-compose up
docker exec -it tibi_app composer install
cd tibi
cp .env.example .env
docker exec -it tibi_app php artisan key:generate
chmod 777 storage
chmod 777 storage/* -R
docker exec -it tibi_app php artisan migrate:fresh
```