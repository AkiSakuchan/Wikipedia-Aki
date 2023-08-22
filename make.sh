#!/bin/bash
php-scoper add-prefix --prefix Aki --output-dir=build
rm build/composer.json
mv build/composer-build.json build/composer.json
rm build/make.sh
rm build/complie.sh