FROM php:7.2-fpm-alpine

RUN apk update

RUN apk add --no-cache \
    # for pgsql extension
    postgresql \
    # for zip extension
    libzip \
    # for ssh
    openssh bash supervisor \
    # for npm
    npm
RUN apk add --no-cache --virtual .build-dependencies \
    # for pgsql extension
    postgresql-dev \
    # for zip extension
    libzip-dev \
    # for xdebug extension
    autoconf g++ make

# Install xdebug.
RUN pecl install xdebug
RUN docker-php-ext-enable xdebug
RUN echo $'\
xdebug.default_enable=1\
\nxdebug.remote_handler=dbgp\
\nxdebug.remote_enable=1\
\nxdebug.remote_autostart=1\
\nxdebug.remote_connect_back=1\
\nxdebug.remote_port=9001\
\nxdebug.remote_host=localhost' >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

RUN docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql
RUN docker-php-ext-install pdo pgsql pdo_pgsql zip

# Install Composer.
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install ssh.
RUN sed -i s/#PermitRootLogin.*/PermitRootLogin\ yes/ /etc/ssh/sshd_config \
  && echo "root:root" | chpasswd
RUN sed -ie 's/#Port 22/Port 22/g' /etc/ssh/sshd_config
RUN sed -ri 's/#HostKey \/etc\/ssh\/ssh_host_key/HostKey \/etc\/ssh\/ssh_host_key/g' /etc/ssh/sshd_config
RUN sed -ir 's/#HostKey \/etc\/ssh\/ssh_host_rsa_key/HostKey \/etc\/ssh\/ssh_host_rsa_key/g' /etc/ssh/sshd_config
RUN sed -ir 's/#HostKey \/etc\/ssh\/ssh_host_dsa_key/HostKey \/etc\/ssh\/ssh_host_dsa_key/g' /etc/ssh/sshd_config
RUN sed -ir 's/#HostKey \/etc\/ssh\/ssh_host_ecdsa_key/HostKey \/etc\/ssh\/ssh_host_ecdsa_key/g' /etc/ssh/sshd_config
RUN sed -ir 's/#HostKey \/etc\/ssh\/ssh_host_ed25519_key/HostKey \/etc\/ssh\/ssh_host_ed25519_key/g' /etc/ssh/sshd_config
RUN /usr/bin/ssh-keygen -A
RUN ssh-keygen -t rsa -b 4096 -f  /etc/ssh/ssh_host_key

# Clear sources cache.
RUN rm -rf /tmp/* /var/cache/apk/* /src \
    && apk del .build-dependencies
RUN docker-php-source delete

# Configure supervisor.
COPY supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# Response data on ports. These ports could be mapped.
EXPOSE 9000 9001 22

# Run daemon manager (SSH daemon, PHP-FPM daemon).
CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]