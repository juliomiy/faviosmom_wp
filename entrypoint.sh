#!/bin/bash

chown -R www-data:www-data .

#enable mod_rewrite for Pretty Urls
a2enmod rewrite

exec "$@"
