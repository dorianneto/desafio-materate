#!/bin/bash

main () {
    RED="\e[31m"
    NC="\e[0m"

    runServer
}

runServer () {
    echo "> Checking if php exists..."
    php -v

    if [ $? -eq 0 ]; then
        echo -e "\n> Loading the server built-in..."
        php artisan serve
    else
        echo -e "${RED}PHP not found"
        exit
    fi

}

main