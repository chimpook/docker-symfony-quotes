ARG PHP_VERSION
FROM php:${PHP_VERSION}-fpm

RUN apt update \
	&& apt install -y zlib1g-dev g++ git libicu-dev zip libzip-dev \
	&& docker-php-ext-install intl opcache pdo pdo_mysql \
	&& pecl install apcu \
	&& docker-php-ext-enable apcu \
	&& docker-php-ext-configure zip \
	&& docker-php-ext-install zip

WORKDIR /var/www/app

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN curl -sS https://get.symfony.com/cli/installer | bash
RUN mv /root/.symfony/bin/symfony /usr/local/bin/symfony

RUN echo ${GIT_USER_EMAIL}

ARG GIT_USER_NAME
RUN git config --global user.name "${GIT_USER_NAME}"

ARG GIT_USER_EMAIL
RUN	git config --global user.email "${GIT_USER_EMAIL}"

