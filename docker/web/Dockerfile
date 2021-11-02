FROM php:7.4-apache

RUN apt-get update \
  && apt-get install --no-install-recommends -y \
    apt-transport-https \
    apt-utils \
    build-essential \
    curl \
    debconf-utils \
    gcc \
    git \
    vim \
    gnupg2 \
    libfreetype6-dev \
    libicu-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libpq-dev \
    libzip-dev \
    locales \
    ssl-cert \
    unzip \
    zlib1g-dev \
    default-mysql-client \
  && apt-get clean \
  && rm -rf /var/lib/apt/lists/* \
  && echo "en_US.UTF-8 UTF-8" >/etc/locale.gen \
  && locale-gen \
  ;

RUN docker-php-ext-install mysqli pdo_mysql intl opcache gd

# 開発者は状況に応じてxdebugを有効にするか決める。
# 初期はコメントアウトしておく
# RUN pecl install xdebug \
#   && docker-php-ext-enable xdebug

# mod_rewriteを 有効に
RUN a2enmod rewrite

RUN ln -s /etc/apache2/mods-available/vhost_alias.load /etc/apache2/mods-enabled
RUN a2enmod headers
RUN a2enmod include

RUN a2enmod rewrite headers ssl
# Enable SSL
RUN ln -s /etc/apache2/sites-available/default-ssl.conf /etc/apache2/sites-enabled/default-ssl.conf
EXPOSE 443

COPY ./base.conf /etc/apache2/sites-available/base.conf
RUN a2ensite base.conf

COPY ./php.ini /usr/local/etc/php/

# ポートの解放
EXPOSE 80