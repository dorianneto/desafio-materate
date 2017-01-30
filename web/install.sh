#!/bin/bash

main () {
	RED="\e[31m"
	NC="\e[0m"

	createDatabase
	envFile
	composerInstall
	migrations
	key
}

createDatabase () {
	echo -n "What is database name (It's will be created if not exists)? "
	read DATABASE_NAME

	echo -n "What is database host? "
	read DATABASE_HOST

	echo -n "What is database user? "
	read DATABASE_USER

	echo -n "What is database pass? "
	read -s DATABASE_PASS

	mysql -h "$DATABASE_HOST" -u "$DATABASE_USER" -e "CREATE DATABASE IF NOT EXISTS $DATABASE_NAME" -p"$DATABASE_PASS"

	if [ $? -eq 0 ]; then
		echo -e "\n> Database created!\n"
	else
		exit
	fi
}

envFile () {
	cat > .env <<EOF
APP_ENV=local
APP_DEBUG=true
APP_KEY=
APP_TIMEZONE=UTC

DB_CONNECTION=mysql
DB_HOST=$DATABASE_HOST
DB_PORT=3306
DB_DATABASE=$DATABASE_NAME
DB_USERNAME=$DATABASE_USER
DB_PASSWORD=$DATABASE_PASS

CACHE_DRIVER=memcached
QUEUE_DRIVER=sync
EOF

	if [ $? -eq 0 ]; then
		echo -e "> Env file created!!\n"
	else
		echo -e "${RED}Error to create .env file"
		exit
	fi
}

composerInstall () {
	echo "> Checking if composer exists..."
	composer -V

	if [ $? -eq 1 ]; then
		echo -e "${RED}Composer not found"
		exit
	fi

	file="./composer.json"

	if [ -f "$file" ]; then
		echo -e "\n> Installing dependencies..."
		composer install --no-progress --no-interaction --profile

		if [ $? -eq 0 ]; then
			echo -e "> Dependencies installed!\n"
		fi
	else
		echo -e "${RED}composer.json not found"
		exit
	fi
}

migrations () {
	echo "> Checking if php exists..."
	php -v

	if [ $? -eq 0 ]; then
		echo -e "\n> Running migrations..."

		php artisan migrate:reset
		php artisan migrate --seed

		if [ $? -eq 0 ]; then
			echo -e "> Migrations installed!\n"
		fi
	else
		echo -e "${RED}PHP not found"
		exit
	fi
}

key () {
	echo -e "> Generating key..."
	php artisan key:generate
}

main