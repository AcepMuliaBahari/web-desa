# 1. Mulai dari image PHP 8.2 resmi dengan server Apache
FROM php:8.2-apache

# 2. Set direktori kerja
WORKDIR /var/www/html

# 3. Instal ekstensi PHP yang umum diperlukan Laravel
RUN apt-get update && apt-get install -y \
    git \
    zip \
    unzip \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# 4. Aktifkan mod_rewrite Apache untuk URL cantik Laravel
RUN a2enmod rewrite

# 5. Salin file konfigurasi Apache kustom kita (dibuat di bawah)
COPY 000-default.conf /etc/apache2/sites-available/000-default.conf

# 6. Instal Composer (manajer paket PHP)
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# 7. Instal Node.js dan NPM (untuk build aset CSS/JS)
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - && apt-get install -y nodejs

# 8. Salin file dependensi & install
COPY composer.json composer.lock ./ 
RUN composer install --no-interaction --optimize-autoloader --no-dev
COPY package.json package-lock.json ./
RUN npm install && npm run build
# Ubah port Apache dari 80 ke 8080 agar sesuai dengan standar Cloud Run
RUN sed -i 's/80/8080/g' /etc/apache2/ports.conf
# 9. Salin sisa kode aplikasi
COPY . .

# 10. Setel kepemilikan file agar Apache bisa menulis ke folder storage
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
