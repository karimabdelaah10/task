FROM php:8.1-fpm
# Install system dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    git \
    curl \
    vim \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libmcrypt-dev \
    libgd-dev \
    libonig-dev \
    libxml2-dev \
    libwebp-dev \
    libjpeg62-turbo-dev \
    libpng-dev libxpm-dev \
    libfreetype6-dev \
    supervisor \
    zip \
    unzip
# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-configure gd --enable-gd --with-freetype --with-jpeg
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd


RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
############################# Laravel App Config #############################
COPY scripts/entrypoint.sh /tmp/entrypoint.sh
RUN true
COPY scripts/prepare_env.sh /bin/prepare_env.sh

RUN chmod +x /bin/prepare_env.sh

RUN chmod 777 -R /tmp && chmod o+t -R /tmp
############################# Supervisor Config #############################
COPY .docker/supervisor/app.conf /etc/supervisord.conf
RUN true
COPY .docker/php/php.ini /usr/local/etc/php/conf.d/app.ini
RUN true
#############################################################################

ARG USER_ID
ARG GROUP_ID
# Create a group and user with the specified user and group IDs
RUN groupadd -g $GROUP_ID mygroup && useradd -m -u $USER_ID -g $GROUP_ID myuser

Run chown -R myuser:mygroup /var/www
# Set the user as the owner of the application folder
USER myuser

# Setup working directory
WORKDIR /var/www
COPY core/ .

RUN true

############################# Start the app (final script) #############################
ENTRYPOINT ["/tmp/entrypoint.sh"]
