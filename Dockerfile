#FROM php:5.6-apache
FROM php:7.0-apache
#
#docker run -it --name favio-wordpress -v ~/development/faviosmom_wp/wordpress/:/var/www/html -p 80:80 --link=docker_mysql phpwithmysql 
#
LABEL maintainer="Julio Hernandez-Miyares" \
      maintainer.email="julio@faviosmom.com" \
      description="Favio's Mom Wordpress image"

RUN apt-get update
RUN apt-get -y install vim
RUN docker-php-ext-install mysqli

COPY entrypoint.sh /entrypoint.sh 

RUN chmod 777 /entrypoint.sh

ENTRYPOINT ["/entrypoint.sh"]

CMD ["apache2-foreground"]
