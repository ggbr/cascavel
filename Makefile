build:
	docker-compose stop
	docker-compose rm
	docker-compose build

bash:
	docker-compose exec app /bin/bash