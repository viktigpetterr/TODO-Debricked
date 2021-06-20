#!/bin/bash

composer install
composer copy-env
yarn install
yarn run prod
