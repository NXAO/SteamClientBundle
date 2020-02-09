FROM php:7.4.1-fpm

# composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
	&& php composer-setup.php --filename=composer --install-dir=/usr/local/bin \
	&& php -r "unlink('composer-setup.php');"

# Symfony
RUN apt-get update && apt-get install -y htop mc apt-utils wget git nano \
    && git config --global user.email "support@pay2play.ru" \
    && git config --global user.name "Pay2Play Support" \
    && wget https://get.symfony.com/cli/installer -O - | bash \
    && mv /root/.symfony/bin/symfony /usr/local/bin/symfony

# Common util
RUN apt-get update && apt-get install -y curl libcurl4-openssl-dev \
    && docker-php-ext-install -j$(nproc) curl

RUN apt-get update && apt-get install -y zlib1g-dev libbz2-dev libzip-dev unzip zip \
    && docker-php-ext-install -j$(nproc) zip \
    && docker-php-ext-install -j$(nproc) bz2

RUN apt-get update && apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
        libicu-dev \
    && :\
#    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install -j$(nproc) intl

RUN apt-get update && apt-get install -y libxml2-dev libxslt-dev \
    && docker-php-ext-install -j$(nproc) xsl \
    && docker-php-ext-install -j$(nproc) xmlrpc

RUN apt-get update && apt-get install -y libonig-dev \
    && docker-php-ext-install -j$(nproc) mbstring

RUN apt-get update && apt-get install -y libpq-dev \
    && docker-php-ext-install -j$(nproc) pdo \
    && docker-php-ext-install -j$(nproc) pdo_mysql \
    && docker-php-ext-install -j$(nproc) pdo_pgsql \
    && docker-php-ext-install -j$(nproc) pcntl \
    && docker-php-ext-install -j$(nproc) exif \
    && docker-php-ext-install -j$(nproc) calendar \
    && docker-php-ext-install -j$(nproc) gettext \
    && docker-php-ext-install -j$(nproc) sysvmsg \
    && docker-php-ext-install -j$(nproc) sysvsem \
    && docker-php-ext-install -j$(nproc) sysvshm \
    && docker-php-ext-install -j$(nproc) iconv

# xDebug
RUN pecl install xdebug
RUN docker-php-ext-enable xdebug
RUN touch /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN echo "\
    xdebug.default_enable=1 \n\
    xdebug.remote_autostart=true \n\
    xdebug.remote_mode=req \n\
	xdebug.remote_handler=dbgp \n\
	xdebug.remote_connect_back=0 \n\
	xdebug.remote_port=9001 \n\
	xdebug.remote_host=host.docker.internal \n\
	xdebug.idekey=phpstormcli \n\
	xdebug.remote_enable=1 \n\
	xdebug.remote_log = /var/log/xdebug.log \n\
	xdebug.profiler_append=0 \n\
	xdebug.profiler_enable=0 \n\
	xdebug.profiler_enable_trigger=1 \n\
	xdebug.profiler_output_dir=/var/debug \n\
	xdebug.profiler_output_name=cachegrind.out.%s.%u \n\
	xdebug.var_display_max_data=-1 \n\
	xdebug.var_display_max_children=-1 \n\
	xdebug.var_display_max_depth=-1" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

# Opcache
RUN docker-php-ext-install -j$(nproc) opcache
RUN docker-php-ext-enable opcache

RUN touch /usr/local/etc/php/conf.d/docker-php-ext-opcache.ini
RUN echo "\
    opcache.enable=1 \n\
    opcache.enable_cli=1 \n\
    #; 0 means it will check on every request \
    #; 0 is irrelevant if opcache.validate_timestamps=0 which is desirable in production \
    opcache.revalidate_freq=0 \n\
    opcache.validate_timestamps=1 \n\
    opcache.max_accelerated_files=10000 \n\
    opcache.memory_consumption=192 \n\
    opcache.max_wasted_percentage=10 \n\
    opcache.interned_strings_buffer=16 \n\
    opcache.fast_shutdown=1" >> /usr/local/etc/php/conf.d/docker-php-ext-opcache.ini

# php.ini-development
ADD php.ini /usr/local/etc/php/php.ini
