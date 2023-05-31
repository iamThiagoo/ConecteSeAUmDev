#!/usr/bin/env bash

# Script created by Tom Benevides https://github.com/tombenevides

########################################################

UNAMEOUT="$(uname -s)"

generateAppKey(){
    HAS_KEY=$(grep APP_KEY=base64 .env)

    if [  -f ./.env ] && [ -z "$HAS_KEY"  ]; then
        echo -e "Generating App Key..."

        docker-compose exec \
        -u sail \
        "$APP_SERVICE" \
        php artisan key:generate --ansi
    fi
}

compileAppAssets(){
    echo -e "Compiling App Assets..."

    docker-compose exec \
    -u sail \
    "$APP_SERVICE" \
    npm run dev
}

checkDependencies() {
    if [ ! -d ./vendor ] || [ ! -f ./vendor/bin/sail ] || [ ! -f ./sonar-project.properties ] || [ ! -d ./node_modules ] || [ -z "$(ls -A ./node_modules)" ]; then
        read -p "$(echo -e "It seems your app is missing package dependencies. Let's download them now [y/N]? ")"  ANSWER

        if [[ $ANSWER == "y" || $ANSWER == "Y" || $ANSWER == "yes" || $ANSWER == "YES" ]] ; then
            configureSail
        else
            echo -e "Aborting! Run ./sail config to configure your app and download dependencies."
            exit
        fi
        exit 1
    fi
}

configureSail() {
    echo -e "Downloading packages and self-configuring..."

    ENVFILE='./.env'

    docker run --rm \
        -u "$(id -u):$(id -g)" \
        -v "$(pwd)":/opt \
        -w /opt \
        laravelsail/php80-composer:latest \
        composer install --ignore-platform-reqs

    docker run --rm \
        -u "$(id -u):$(id -g)" \
        -v "$(pwd)":/usr/src/app \
        -w /usr/src/app \
        node:latest \
        npm install

    if [ ! -f $ENVFILE ]; then
        cp .env.example .env
    fi

    if [ -d ./vendor ] && [ -f ./vendor/bin/sail ] && [ -d ./node_modules ]; then
        echo -e "Sail is ready..."
        echo -e "You can start the app now. Run: ./sail init command."
        exit 0
    else
        echo -e "Unkown error happend when configure sail."
        exit 1
    fi
}

# Verify operating system is supported...
case "${UNAMEOUT}" in
    Linux*)             MACHINE=linux;;
    Darwin*)            MACHINE=mac;;
    *)                  MACHINE="UNKNOWN"
esac

if [ "$MACHINE" == "UNKNOWN" ]; then
    echo -e "Unsupported operating system [$(uname -s)]. Laravel Sail supports macOS, Linux, and Windows (WSL2)." >&2
    exit 1
fi

# Ensure that Docker is running...
if ! docker info > /dev/null 2>&1; then
    echo -e "Docker is not running." >&2
    exit 1
fi

export APP_SERVICE=${APP_SERVICE:-"laravel.test"}
export WWWUSER=${WWWUSER:-$UID}
export WWWGROUP=${WWWGROUP:-$(id -g)}

# Determine if Sail is currently up...
PSRESULT="$(docker-compose ps -q)"

if docker-compose ps | grep $APP_SERVICE | grep 'Exit'; then
    echo -e "Shutting down old Sail processes..." >&2

    docker-compose down > /dev/null 2>&1

    EXEC="no"

elif [ -n "$PSRESULT" ]; then
    EXEC="yes"
else
    EXEC="no"
fi

# Source the ".env" file so Laravel's environment variables are available...
if [ -f ./.env ]; then
    source ./.env
fi

if [ "$1" == "config" ]; then
    configureSail
fi

checkDependencies

if [ "$1" == "init" ]; then
    AdoteBanner
    echo -e "Application is starting..."

    ./vendor/bin/sail up --build --force-recreate -d

    ALL_UP="$(docker-compose ps | grep 'Exit';)"

    if [ -n "$ALL_UP" ]; then
        docker-compose ps
        echo -e "Some services could not be started. Check the output above."
        exit 1;
    fi

    generateAppKey
    compileAppAssets

    echo -e "Services are up and running!"

elif [ "$1" == "rdev" ]; then
    compileAppAssets

elif [ "$1" == "test" ]; then
    shift 1
    docker-compose exec \
    -u sail \
    "$APP_SERVICE" \
    php artisan test -p "$@"
else
    ./vendor/bin/sail "$@"
fi