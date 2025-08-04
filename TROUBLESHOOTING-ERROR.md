# 🔧 Troubleshooting Error 404 & 500 - KORMI Kaltim CMS

## 🚨 Error yang Ditemukan:
- **Error 404:** Failed to load resource
- **Error 500:** Server internal error

## 🔍 Langkah Troubleshooting

### 1. Cek File Structure di Hostinger
```bash
# Via SSH
ssh u896830231@145.79.14.38 -p 65002
cd /home/u896830231/public_html

# Cek apakah file index.php ada
ls -la index.php

# Cek apakah folder Laravel ada di root
ls -la ../app/
ls -la ../bootstrap/
ls -la ../config/
ls -la ../storage/
```

### 2. Cek File Permissions
```bash
# Set permissions yang benar
chmod -R 755 storage/
chmod -R 755 bootstrap/cache/
chmod 644 .env
chmod 644 index.php
chmod 644 .htaccess
```

### 3. Cek Error Logs
```bash
# Cek Laravel error logs
tail -f storage/logs/laravel.log

# Cek PHP error logs
tail -f /var/log/php_errors.log

# Cek Apache error logs
tail -f /var/log/apache2/error.log
```

### 4. Cek Database Connection
```bash
# Test database connection
php artisan tinker
DB::connection()->getPdo();
exit
```

### 5. Cek Environment File
```bash
# Pastikan file .env ada dan benar
cat .env

# Cek apakah APP_KEY sudah di-generate
grep APP_KEY .env
```

### 6. Re-run Laravel Setup
```bash
# Clear semua cache
php artisan config:clear
php artisan route:clear
php artisan view:clear
php artisan cache:clear

# Re-generate key jika belum ada
php artisan key:generate

# Cache untuk production
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Jalankan migration
php artisan migrate

# Setup storage link
php artisan storage:link
```

## 🔧 Solusi Umum

### Error 404 - File Not Found
**Kemungkinan Penyebab:**
1. File index.php tidak ada di public_html
2. .htaccess tidak dikonfigurasi dengan benar
3. File Laravel tidak diupload ke root domain

**Solusi:**
```bash
# 1. Pastikan file index.php ada di public_html
ls -la /home/u896830231/domains/kormi-kaltim.id/public_html/index.php

# 2. Jika tidak ada, copy dari Laravel public
cp ../public/index.php .

# 3. Update path di index.php
# Pastikan require __DIR__.'/../vendor/autoload.php'; mengarah ke root domain
```

### Error 500 - Internal Server Error
**Kemungkinan Penyebab:**
1. File .env tidak ada atau salah konfigurasi
2. APP_KEY belum di-generate
3. Database connection error
4. File permissions salah
5. Laravel cache error

**Solusi:**
```bash
# 1. Cek file .env
cat .env

# 2. Generate APP_KEY jika kosong
php artisan key:generate

# 3. Cek database connection
php artisan tinker
DB::connection()->getPdo();
exit

# 4. Set permissions
chmod -R 755 storage/
chmod -R 755 bootstrap/cache/
chmod 644 .env

# 5. Clear dan cache ulang
php artisan config:clear
php artisan config:cache
```

## 📋 Checklist Troubleshooting

### Pre-Check
- [ ] File index.php ada di public_html
- [ ] File .env ada di root domain
- [ ] Folder Laravel (app/, bootstrap/, config/, dll) ada di root domain
- [ ] File permissions benar

### Database Check
- [ ] Database credentials benar di .env
- [ ] Database server berjalan
- [ ] Database user memiliki privileges yang cukup
- [ ] Migration sudah dijalankan

### Laravel Check
- [ ] APP_KEY sudah di-generate
- [ ] Cache sudah di-clear dan re-cache
- [ ] Storage link sudah dibuat
- [ ] Error logs bisa diakses

### Server Check
- [ ] PHP version compatible (8.1+)
- [ ] Required PHP extensions aktif
- [ ] Apache/Nginx configuration benar
- [ ] SSL certificate aktif

## 🚨 Emergency Fix

### Jika Masih Error 500:
```bash
# 1. Put application in maintenance mode
php artisan down

# 2. Clear semua cache
php artisan optimize:clear

# 3. Re-generate key
php artisan key:generate

# 4. Re-cache
php artisan config:cache
php artisan route:cache
php artisan view:cache

# 5. Bring application back up
php artisan up
```

### Jika Masih Error 404:
```bash
# 1. Cek apakah file Laravel ada di root
ls -la /home/u896830231/

# 2. Jika tidak ada, upload ulang file Laravel
# Upload folder hostinger-upload/ ke root domain

# 3. Pastikan index.php mengarah ke root domain
# Edit index.php di public_html
```

## 📞 Support Information

### Connection Details
- **SSH:** ssh u896830231@145.79.14.38 -p 65002
- **FTP:** ftp.kormi-kaltim.id (port 21)
- **Database:** u896830231_dbkormicms

### Error Log Locations
- **Laravel:** storage/logs/laravel.log
- **PHP:** /var/log/php_errors.log
- **Apache:** /var/log/apache2/error.log

### Hostinger Support
- **Control Panel:** https://hpanel.hostinger.com
- **Support:** https://www.hostinger.com/contact

---

**Status: 🔧 TROUBLESHOOTING IN PROGRESS**
**Target Domain:** https://kormi-kaltim.id
**Error:** 404 & 500
**Priority:** HIGH 