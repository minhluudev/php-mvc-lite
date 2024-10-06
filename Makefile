init:
	docker compose up --build -d
start:
	docker compose start
stop:
	docker compose stop
migrate:
	cd database && php migration.php && cd ..
migrate-rollback:
	cd database && php migration_rollback.php && cd ..