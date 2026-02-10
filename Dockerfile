# 1. Gunakan image PHP 8.2 resmi dengan server Apache
FROM php:8.2-apache

# 2. Set direktori kerja
WORKDIR /var/www/html

# 3. Instal ekstensi PHP & dependensi sistem
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
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# 4. Aktifkan mod_rewrite Apache
RUN a2enmod rewrite

# 5. Instal Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# 6. Instal Node.js dan NPM (Vite build)
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - && apt-get install -y nodejs

# 7. Salin file konfigurasi Apache kustom
COPY 000-default.conf /etc/apache2/sites-available/000-default.conf

# 8. Tahap Install Dependensi (Optimasi Cache)
# Kita salin file lock dulu agar jika tidak ada perubahan package, Docker tidak install ulang
COPY composer.json composer.lock ./ 
RUN composer install --no-interaction --optimize-autoloader --no-dev --no-scripts

COPY package.json package-lock.json ./
RUN npm install

# 9. Salin seluruh kode aplikasi
COPY . .

# 10. Jalankan Build Aset & Finalisasi Composer
# Sekarang artisan sudah ada, kita bisa jalankan script yang tadi ditunda
RUN npm run build
RUN composer dump-autoload --optimize --no-dev

# 11. Konfigurasi Port untuk Cloud Run
# Mengubah default port Apache dari 80 ke 8080
RUN sed -i 's/80/8080/g' /etc/apache2/sites-available/000-default.conf /etc/apache2/ports.conf

# 12. Setel kepemilikan file & izin folder
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Expose port agar Cloud Run tahu di mana aplikasi berada
EXPOSE 8080

# Jalankan Apache di foreground
CMD ["apache2-foreground"]