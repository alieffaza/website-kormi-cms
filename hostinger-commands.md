# Commands untuk Setup Laravel di Hostinger - KORMI Kaltim CMS

## 📋 Informasi Hosting
- **SSH IP:** 145.79.14.38
- **SSH Port:** 65002
- **SSH Username:** u896830231
- **FTP Host:** ftp.kormi-kaltim.id
- **FTP Username:** u896830231.KORMI
- **FTP Directory:** /home/u896830231/domains/kormi-kaltim.id/public_html
- **Database:** u896830231_dbkormicms
- **Database User:** u896830231_adminkormi

## 1. Akses SSH Hostinger
```bash
# Connect ke SSH dengan custom port
ssh u896830231@145.79.14.38 -p 65002

# Navigasi ke root domain
cd /home/u896830231/public_html
```

## 2. Install Dependencies
```bash
# Install composer dependencies (production mode)
composer install --optimize-autoloader --no-dev

# Atau jika composer tidak tersedia, upload vendor folder dari local
```

## 3. Setup Laravel
```bash
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
```

## 4. Database Setup
```bash
# Jalankan migration
php artisan migrate

# Jalankan seeder jika ada
php artisan db:seed

# Atau import database dari backup
# mysql -u u896830231_adminkormi -p u896830231_dbkormicms < backup.sql
```

## 5. File Permissions
```bash
# Set permissions untuk folder storage
chmod -R 755 storage/
chmod -R 755 bootstrap/cache/

# Set permissions untuk file .env
chmod 644 .env

# Set permissions untuk log files
chmod 644 storage/logs/laravel.log
```

## 6. Storage Setup
```bash
# Buat symbolic link untuk storage
php artisan storage:link

# Atau jika symbolic link tidak berfungsi, copy folder
cp -r storage/app/public/* public/storage/
```

## 7. Optimisasi Performance
```bash
# Optimize autoloader
composer dump-autoload --optimize

# Clear dan cache config
php artisan config:cache

# Clear dan cache routes
php artisan route:cache

# Clear dan cache views
php artisan view:cache
```

## 8. Security Setup
```bash
# Set proper permissions
find storage -type d -exec chmod 755 {} \;
find storage -type f -exec chmod 644 {} \;
find bootstrap/cache -type d -exec chmod 755 {} \;
find bootstrap/cache -type f -exec chmod 644 {} \;
```

## 9. Testing Commands
```bash
# Test database connection
php artisan tinker
DB::connection()->getPdo();
exit

# Test email configuration
php artisan tinker
Mail::raw('Test email', function($message) {
    $message->to('test@example.com')->subject('Test');
});
exit

# Check Laravel version
php artisan --version

# Check environment
php artisan env
```

## 10. Maintenance Commands
```bash
# Put application in maintenance mode
php artisan down

# Bring application back up
php artisan up

# Clear all caches
php artisan optimize:clear

# Cache routes for better performance
php artisan route:cache

# Cache config for better performance
php artisan config:cache
```

## 11. Troubleshooting Commands
```bash
# Check error logs
tail -f storage/logs/laravel.log

# Check PHP version
php -v

# Check PHP extensions
php -m

# Check disk space
df -h

# Check memory usage
free -h
```

## 12. Backup Commands
```bash
# Backup database
mysqldump -u u896830231_adminkormi -p u896830231_dbkormicms > backup_$(date +%Y%m%d_%H%M%S).sql

# Backup files
tar -czf files_backup_$(date +%Y%m%d_%H%M%S).tar.gz storage/app/public/

# Backup .env file
cp .env .env.backup
```

## 13. Update Commands
```bash
# Update composer dependencies
composer update --no-dev

# Clear all caches after update
php artisan optimize:clear

# Cache again for production
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

## 14. Monitoring Commands
```bash
# Check application status
php artisan about

# Check scheduled tasks
php artisan schedule:list

# Run scheduled tasks manually
php artisan schedule:run

# Check queue status
php artisan queue:work --once
```

## 🔧 FTP Commands (Alternatif)
```bash
# Connect FTP
ftp ftp.kormi-kaltim.id
# Username: u896830231.KORMI
# Password: [password FTP Anda]

# Upload file
put filename.txt

# Upload folder
mput folder/*

# Download file
get filename.txt

# List files
ls

# Change directory
cd directory_name

# Exit FTP
quit
```

## 📞 Support Information
- **Hostinger Control Panel:** https://hpanel.hostinger.com
- **SSH Connection:** ssh u896830231@145.79.14.38 -p 65002
- **FTP Connection:** ftp.kormi-kaltim.id (port 21)
- **Database:** u896830231_dbkormicms

## Catatan Penting:
1. Gunakan port 65002 untuk SSH connection
2. Database credentials sudah dikonfigurasi untuk u896830231_dbkormicms
3. FTP directory: /home/u896830231/domains/kormi-kaltim.id/public_html
4. Pastikan semua password sudah dikonfigurasi di file `.env`
5. Backup database sebelum menjalankan migration
6. Test di staging environment terlebih dahulu
7. Monitor error logs setelah deployment 