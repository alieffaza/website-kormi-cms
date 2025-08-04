# 🚀 Quick Fix Error 404 & 500 - KORMI Kaltim CMS

## 🚨 Error yang Ditemukan:
- **Error 404:** Failed to load resource
- **Error 500:** Server internal error

## ⚡ Quick Fix Commands

### Step 1: Connect SSH
```bash
ssh u896830231@145.79.14.38 -p 65002
cd /home/u896830231/public_html
```

### Step 2: Cek File Structure
```bash
# Cek apakah file Laravel ada di root
ls -la ../app/
ls -la ../bootstrap/
ls -la ../config/
ls -la ../storage/

# Cek file index.php
ls -la index.php

# Cek file .env
ls -la ../.env
```

### Step 3: Fix File Permissions
```bash
# Set permissions yang benar
chmod -R 755 ../storage/
chmod -R 755 ../bootstrap/cache/
chmod 644 ../.env
chmod 644 index.php
chmod 644 .htaccess
```

### Step 4: Fix Environment File
```bash
# Cek apakah .env ada
cat ../.env

# Jika tidak ada atau kosong, buat file .env
cd ..
cat > .env << 'EOF'
APP_NAME="KORMI Kaltim CMS"
APP_ENV=production
APP_KEY=
APP_DEBUG=false
APP_URL=https://kormi-kaltim.id

LOG_CHANNEL=stack
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=error

DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=u896830231_dbkormicms
DB_USERNAME=u896830231_adminkormi
DB_PASSWORD=

BROADCAST_DRIVER=log
CACHE_DRIVER=file
FILESYSTEM_DISK=local
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

MAIL_MAILER=smtp
MAIL_HOST=mail.kormi-kaltim.id
MAIL_PORT=587
MAIL_USERNAME=info@kormi-kaltim.id
MAIL_PASSWORD=
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="info@kormi-kaltim.id"
MAIL_FROM_NAME="${APP_NAME}"
EOF
```

### Step 5: Fix Laravel Setup
```bash
# Navigasi ke root domain
cd /home/u896830231/

# Install dependencies jika belum
composer install --optimize-autoloader --no-dev

# Generate application key
php artisan key:generate

# Clear semua cache
php artisan config:clear
php artisan route:clear
php artisan view:clear
php artisan cache:clear

# Cache untuk production
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Jalankan migration
php artisan migrate

# Setup storage link
php artisan storage:link
```

### Step 6: Fix Index.php
```bash
# Navigasi ke public_html
cd /home/u896830231/domains/kormi-kaltim.id/public_html

# Pastikan index.php mengarah ke root domain
cat > index.php << 'EOF'
<?php

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

if (file_exists($maintenance = __DIR__.'/../../storage/framework/maintenance.php')) {
    require $maintenance;
}

require __DIR__.'/../../vendor/autoload.php';

$app = require_once __DIR__.'/../../bootstrap/app.php';

$kernel = $app->make(Kernel::class);

$response = $kernel->handle(
    $request = Request::capture()
)->send();

$kernel->terminate($request, $response);
EOF
```

### Step 7: Test Website
```bash
# Cek error logs
tail -f storage/logs/laravel.log

# Test database connection
php artisan tinker
DB::connection()->getPdo();
exit

# Test application
php artisan about
```

## 🔧 Emergency Fix Commands

### Jika Masih Error 500:
```bash
# Put in maintenance mode
php artisan down

# Clear everything
php artisan optimize:clear

# Re-generate key
php artisan key:generate

# Re-cache
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Bring back up
php artisan up
```

### Jika Masih Error 404:
```bash
# Cek apakah file Laravel ada
ls -la /home/u896830231/

# Jika tidak ada, upload ulang
# Upload folder hostinger-upload/ ke root domain

# Pastikan index.php ada
ls -la /home/u896830231/domains/kormi-kaltim.id/public_html/index.php
```

## 📋 Quick Checklist

### File Structure Check:
- [ ] Folder app/ ada di root domain
- [ ] Folder bootstrap/ ada di root domain
- [ ] Folder config/ ada di root domain
- [ ] Folder storage/ ada di root domain
- [ ] File .env ada di root domain
- [ ] File index.php ada di public_html

### Permissions Check:
- [ ] storage/ permission 755
- [ ] bootstrap/cache/ permission 755
- [ ] .env permission 644
- [ ] index.php permission 644

### Laravel Check:
- [ ] APP_KEY sudah di-generate
- [ ] Cache sudah di-clear dan re-cache
- [ ] Database connection berhasil
- [ ] Migration sudah dijalankan

## 🚨 Jika Masih Error:

### Cek Error Logs:
```bash
# Laravel logs
tail -f storage/logs/laravel.log

# PHP logs
tail -f /var/log/php_errors.log

# Apache logs
tail -f /var/log/apache2/error.log
```

### Contact Support:
- **Hostinger Support:** https://www.hostinger.com/contact
- **SSH:** ssh u896830231@145.79.14.38 -p 65002
- **FTP:** ftp.kormi-kaltim.id (port 21)

---

**Status: 🔧 QUICK FIX READY**
**Target Domain:** https://kormi-kaltim.id
**Error:** 404 & 500
**Priority:** URGENT 