# Use a imagem oficial do PHP com Apache
FROM php:8.2-apache

# Instale extensões necessárias (ajuste conforme necessário)
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Ative o módulo rewrite do Apache
RUN a2enmod rewrite

# Defina o diretório padrão do Apache
WORKDIR /var/www/html
