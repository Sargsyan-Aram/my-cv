FROM alpine:3 as build

RUN addgroup -g 1000 php-fpm
RUN adduser --disabled-password php-fpm -G php-fpm

RUN apk add php7 php-common php7-phar \
    php7-openssl php7-fpm php7-gd php7-mbstring \
    php7-curl php7-bcmath php7-json php7-xml php7-zip \
    openssl php7-dom php7-tokenizer php7-fileinfo php7-xmlwriter php7-session \
    php7-pdo php7-pdo_mysql

COPY .infrastructure/Docker/app/etc/php/php-fpm/www.conf /etc/php7/php-fpm.d/

# Install Composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && \
    php -r "if (hash_file('SHA384', 'composer-setup.php') !== file_get_contents('https://composer.github.io/installer.sig')) { unlink('composer-setup.php'); }"
RUN php composer-setup.php
RUN php -r "unlink('composer-setup.php');"
RUN mv composer.phar composer
RUN mv composer /usr/local/bin/

RUN adduser -u 101 --disabled-password nginx -G php-fpm

WORKDIR /var/www/my-cv
COPY . /var/www/my-cv
# Docker entrypoint
COPY .infrastructure/Docker/app/bin/docker-entrypoint.sh /usr/local/bin/docker-entrypoint.sh
RUN chmod +x /usr/local/bin/docker-entrypoint.sh

RUN chown php-fpm:php-fpm ./ -R

ENTRYPOINT ["/usr/local/bin/docker-entrypoint.sh"]
CMD ["php-fpm7", "-F"]
