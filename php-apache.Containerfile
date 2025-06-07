FROM php:8.4-apache


RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli
RUN apt-get update && apt-get upgrade -y
RUN apt-get install -y nano
RUN mkdir /apps-init
COPY app/* /apps-init

#script entrypoint
COPY podman-entrypoint.sh /usr/local/bin
RUN chmod +x /usr/local/bin/podman-entrypoint.sh

ENTRYPOINT ["podman-entrypoint.sh"]
CMD ["apache2-foreground"]



