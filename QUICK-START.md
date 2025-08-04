# 🚀 Quick Start - KORMI Kaltim CMS Deployment

## 📋 Informasi Hosting
- **FTP:** ftp.kormi-kaltim.id (port 21)
- **FTP User:** u896830231.KORMI
- **FTP Directory:** /home/u896830231/domains/kormi-kaltim.id/public_html
- **SSH:** ssh u896830231@145.79.14.38 -p 65002
- **Database:** u896830231_dbkormicms
- **DB User:** u896830231_adminkormi

## ⚡ Langkah Cepat Deployment

### 1. Upload File via FTP
```
Host: ftp.kormi-kaltim.id
Username: u896830231.KORMI
Port: 21
Password: [password FTP Anda]

Upload folder hostinger-upload/ ke root domain
Upload folder hostinger-upload/public_html/ ke public_html
```

### 2. Konfigurasi Environment
1. Copy isi file `hostinger-upload/env-production.txt` ke file `.env` di root domain
2. Update password:
   ```
   DB_PASSWORD=[password_database_anda]
   MAIL_PASSWORD=[password_email_anda]
   ```

### 3. Setup via SSH
```bash
ssh u896830231@145.79.14.38 -p 65002
cd /home/u896830231/public_html

composer install --optimize-autoloader --no-dev
php artisan key:generate
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan migrate
php artisan storage:link
```

### 4. Set Permissions
```bash
chmod -R 755 storage/
chmod -R 755 bootstrap/cache/
chmod 644 .env
```

### 5. Test Website
- **Website:** https://kormi-kaltim.id
- **Admin:** https://kormi-kaltim.id/admin

## ✅ Status: READY TO DEPLOY!

**Target Domain:** https://kormi-kaltim.id
**Framework:** Laravel 10.x
**Database:** u896830231_dbkormicms

**Deployment Date:** ___________
**Deployed By:** ___________ 