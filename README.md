```
git clone ...
docker-compose up
cd tibi
cp .env.example .env
chmod 777 storage
chmod 777 storage/* -R
docker exec -it tibi_app php artisan migrate:fresh
