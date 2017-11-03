FROM php:5.6-apache
#FROM php:7.0-apache
#
#
# docker run --detach --name=docker_mysql --env="MYSQL_ROOT_PASSWORD=Yankees5a" --volume=/Users/jmiyares/development/docker/mysql-datadir:/var/lib/mysql  --publish 3306:3306 mysql 
#
#docker run -it --name favio-wordpress -v ~/development/faviosmom_wp/wordpress/:/var/www/html -p 80:80 --link=docker_mysql phpwithmysql 
#
LABEL maintainer="Julio Hernandez-Miyares" \
      maintainer.email="julio@faviosmom.com" \
      description="Favio's Mom Wordpress image"

RUN apt-get update
RUN apt-get -y install vim
RUN docker-php-ext-install mysqli
RUN apt-get -y install php5-gd

COPY docker-php-ext-phpgd.ini  /usr/local/etc/php/conf.d/docker-php-ext-phpgd.ini
COPY entrypoint.sh /entrypoint.sh 

# install Mail processing libraries
RUN apt-get update && apt-get -y install postfix

# install wordpress CLI
RUN curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar && chmod +x wp-cli.phar && mv wp-cli.phar /usr/local/bin/wp
RUN chmod 777 /entrypoint.sh

ENTRYPOINT ["/entrypoint.sh"]

CMD ["apache2-foreground"]
