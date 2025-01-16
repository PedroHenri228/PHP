# Usar uma imagem base do Apache com PHP
FROM php:8.2-apache

# Habilitar o módulo de reescrita (mod_rewrite)
RUN a2enmod rewrite

RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

# Copiar o código do seu projeto para o diretório do Apache
COPY ./ /var/www/html/

# Configurar o Apache para permitir reescrita de URLs
COPY ./000-default.conf /etc/apache2/sites-available/000-default.conf

# Expor a porta 80 para acessar o Apache
EXPOSE 80
