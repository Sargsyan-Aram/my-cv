#!/bin/sh
set -e

echo "Running composer install"
composer install

echo "Starting main program"
exec "$@"
