# Usar a imagem oficial do PHP com Apache como base
FROM php:8.3-apache

# Instalar extensões do PHP (se necessário)
RUN docker-php-ext-install pdo pdo_mysql mysqli

# Ativar módulos do Apache (se necessário)
RUN a2enmod rewrite

# Copiar o código da aplicação para o diretório do Apache
COPY ./html /var/www/html

# Definir as permissões corretas para o diretório do Apache
RUN chown -R www-data:www-data /var/www/html

# Definir o diretório de trabalho para o Apache
WORKDIR /var/www/html

# Expor a porta 80 do contêiner
EXPOSE 80
