#!/bin/bash
rm -r build
php-scoper add-prefix --prefix Aki --output-dir=build
rm build/composer.json
mv build/composer-build.json build/composer.json
rm build/make.sh
rm build/complie.sh
rm build/scoper.inc.php