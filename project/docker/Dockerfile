FROM centos:7
MAINTAINER Rodrigo Ruy Oliveira <rro.oliveira@gmail.com>

# Atualizar o ambiente e instalar o Apache
RUN yum -y --setopt=tsflags=nodocs update \
    && yum -y --setopt=tsflags=nodocs install httpd httpd-tools mod_ssl openssl expect \
    && yum clean all

# Habilitar o Apache como um serviço do CentOS
RUN systemctl enable httpd.service

# Remover prováveis arquivos da pasta html
RUN rm -rf /var/www

# Diretório padrão
WORKDIR /var/www/petshop

# Alterar permissões dos arquivos e pastas
RUN chown -R apache:apache /var/www
RUN chmod -R 755 /var/www

# Instalar repositório para baixar a versão 7.0 do PHP
RUN rpm -Uvh https://dl.fedoraproject.org/pub/epel/epel-release-latest-7.noarch.rpm \
	&& rpm -Uvh http://rpms.remirepo.net/enterprise/remi-release-7.rpm

# Instalar o PHP e os módulos
RUN yum --enablerepo=remi-php80 -y --setopt=tsflags=nodocs install php \
    php-bz2 \
    php-calendar \
    php-ctype \
    php-curl \
    php-dom \
    php-exif \
    php-fileinfo \
    php-ftp \
    php-gd \
    php-gettext \
    php-iconv \
    php-mcrypt \
    php-phar \
    php-simplexml \
    php-sockets \
    php-sqlite3 \
    php-tokenizer \
    php-xmlwriter \
    php-xls \
    php-pdo_dblib \
    php-pdo_sqlite \
    php-wddx \
    php-xmlreader \
	php-bcmath \
	php-cli \
	php-gd \
	php-intl \
	php-ldap \
	php-mbstring \
    php-mysqlnd \
	php-pear \
	php-soap \
	php-xml \
	php-xmlrpc \
	php-zip \
	php-json \
	php-pdo \
	php-mysql \
	php-pecl-xdebug \
	php-pecl-mongodb \
    gcc \
	glibc \
	unzip \
    && rm -rf /var/cache/yum/* \
    && yum clean all

# Instalar o composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Instalar o repositório do Node
RUN curl --silent --location https://rpm.nodesource.com/setup_8.x | bash -

# Instalar o Nodejs
RUN yum -y install nodejs

# Variáveis locais
ENV LC_ALL en_US.UTF-8
ENV LANG en_US.UTF-8
ENV LANGUAGE en_US.UTF-8

# Timezone
ENV TZ=America/Sao_Paulo
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

# Copiar o arquivo do Apache
COPY ./docker/httpd.conf /etc/httpd/conf
RUN chmod 644 /etc/httpd/conf/httpd.conf

# Configurar Virtual Hosts
RUN mkdir -p /etc/httpd/sites-available
RUN mkdir -p /etc/httpd/sites-enabled

COPY ./docker/vhosts.conf /etc/httpd/sites-available
RUN chmod 644 /etc/httpd/sites-available/vhosts.conf
RUN ln -s /etc/httpd/sites-available/vhosts.conf /etc/httpd/sites-enabled/vhosts.conf

# Copiar o arquivo php.ini
COPY ./docker/php.ini /etc
RUN chmod 644 /etc/php.ini

# Habilitar a extensão do Xdebug e suas configurações
COPY ./docker/15-xdebug.ini /etc/php.d
RUN chmod 644 /etc/php.d/15-xdebug.ini

# Atualizar pacotes
RUN yum update -y  \
	&& rm -rf /var/cache/yum/* \
    && yum clean all

# Expor a porta de acesso
EXPOSE 80

# Copiar o arquivo de entrypoint
COPY ./docker/entrypoint.sh /entrypoint.sh

# Executar o arquivo ao iniciar o container
CMD ["/bin/bash", "/entrypoint.sh"]
