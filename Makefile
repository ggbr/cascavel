bash:
	docker-compose exec  app "/bin/bash" 

install:
	docker-compose up --build -d
	docker-compose exec app sh -c "composer install"
	sudo chmod 777 -R .
	docker-compose exec app sh -c "cp .env.example .env"
	docker-compose exec app sh -c "php php artisan key:generate"
	docker-compose exec app sh -c "php artisan migrate"
 

reset:
	docker-compose stop
	docker-compose rm -f
	docker-compose build
	docker-compose up -d
	docker-compose exec webserver composer install
remove:
	docker-compose stop
	docker-compose rm -f