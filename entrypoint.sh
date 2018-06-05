#!/bin/bash

chown -R www-data:www-data .

#enable mod_rewrite for Pretty Urls
a2enmod rewrite

a2ensite default-ssl

a2enmod ssl

#ln -s /etc/apache2/sites-available/default-ssl.conf /etc/apache2/sites-enabled/default-ssl.conf

exec "$@"
