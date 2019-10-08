#!/usr/bin/env bash
#
# Bash connection.
# Usage: `bash ./bash.sh php-fpm`
#
CONTAINER_NAME=$1
if [[ ( -z $CONTAINER_NAME ) || ( ( $CONTAINER_NAME -ne "php-fpm" ) && ( $CONTAINER_NAME -ne "nginx" ) && ( $CONTAINER_NAME -ne "postgresql" ) ) ]]; then
    echo "Argument should be present and be in list (\"php-fpm\" or \"nginx\" or \"postgresql\")"
fi
echo "Run shell in container $CONTAINER_NAME:"
docker exec -it $CONTAINER_NAME bash