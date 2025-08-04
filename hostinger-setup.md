# Panduan Setup KORMI Kaltim CMS di Hostinger

## 1. Persiapan di Hostinger Control Panel

### 1.1 Domain Setup
- Login ke Hostinger Control Panel
- Pastikan domain `kormi-kaltim.id` sudah terdaftar dan aktif
- Aktifkan SSL certificate untuk domain

### 1.2 Database Setup
1. Buka **MySQL Databases** di Hostinger Control Panel
2. Buat database baru:
   - Database name: `kormi_kaltim_cms`
   - Username: `kormi_kaltim_cms`
   - Password: [buat password yang kuat]
3. Catat credentials database untuk digunakan di `.env`

### 1.3 Email Setup
1. Buka **Email** di Hostinger Control Panel
2. Buat email account: `info@kormi-kaltim.id`
3. Catat password email untuk konfigurasi SMTP

## 2. Upload File ke Hostinger

### 2.1 Menggunakan File Manager
1. Buka **File Manager** di Hostinger Control Panel
2. Navigasi ke folder `public_html`
3. Upload semua file Laravel ke root domain (bukan di public_html)

### 2.2 Menggunakan FTP
1. Dapatkan FTP credentials dari Hostinger
2. Gunakan FTP client (FileZilla, WinSCP, dll)
3. Upload semua file Laravel ke root domain

### 2.3 Struktur File yang Benar
```
Root Domain (/)
├── app/
├── bootstrap/
├── config/
├── database/
├── resources/
├── routes/
├── storage/
├── vendor/
├── .env
├── artisan
├── composer.json
└── composer.lock

public_html/
├── index.php (copy dari Laravel public/index.php)
├── .htaccess
├── assets/
└── [semua file dari Laravel public/]
```

## 3. Konfigurasi Environment

### 3.1 Buat File .env
Buat file `.env` di root domain dengan konfigurasi:

```env
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
DB_DATABASE=kormi_kaltim_cms
DB_USERNAME=kormi_kaltim_cms
DB_PASSWORD=[password_database_anda]

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
MAIL_PASSWORD=[password_email_anda]
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="info@kormi-kaltim.id"
MAIL_FROM_NAME="${APP_NAME}"
```

### 3.2 Set File Permissions
Di File Manager Hostinger, set permissions:
- Folder `storage/`: 755
- Folder `bootstrap/cache/`: 755
- File `.env`: 644

## 4. Setup Laravel via SSH

### 4.1 Akses SSH
1. Buka **SSH Access** di Hostinger Control Panel
2. Aktifkan SSH access
3. Gunakan SSH client untuk connect

### 4.2 Jalankan Commands
```bash
# Navigasi ke root domain
cd /home/[username]/public_html

# Install dependencies
composer install --optimize-autoloader --no-dev

# Generate application key
php artisan key:generate

# Clear dan cache config
php artisan config:clear
php artisan config:cache

# Clear dan cache routes
php artisan route:clear
php artisan route:cache

# Clear dan cache views
php artisan view:clear
php artisan view:cache

# Jalankan migration
php artisan migrate

# Jalankan seeder jika ada
php artisan db:seed

# Set storage link
php artisan storage:link
```

## 5. Konfigurasi Domain

### 5.1 Point Domain ke Laravel
1. Pastikan `public_html/index.php` adalah file Laravel public index
2. Update `.htaccess` di `public_html` dengan konfigurasi yang sudah disediakan

### 5.2 SSL Certificate
1. Aktifkan SSL certificate di Hostinger
2. Pastikan semua URL menggunakan HTTPS
3. Update `APP_URL` di `.env` ke `https://kormi-kaltim.id`

## 6. Testing dan Verifikasi

### 6.1 Test Website
1. Akses https://kormi-kaltim.id
2. Cek apakah website berjalan normal
3. Test semua fitur utama

### 6.2 Test Admin Panel
1. Akses https://kormi-kaltim.id/admin
2. Test login admin
3. Test semua fitur admin

### 6.3 Test Email
1. Test form contact
2. Test reset password
3. Verifikasi email terkirim dengan benar

## 7. Troubleshooting

### 7.1 Error 500
- Cek file permissions
- Cek error logs di `storage/logs/laravel.log`
- Pastikan `.env` file ada dan benar

### 7.2 Database Connection Error
- Verifikasi database credentials
- Pastikan database user memiliki privileges yang cukup
- Cek apakah database server berjalan

### 7.3 File Upload Error
- Cek permission folder `storage/app/public/`
- Pastikan `storage:link` sudah dijalankan
- Verifikasi disk space

## 8. Maintenance

### 8.1 Regular Backups
- Setup automatic database backup
- Backup file uploads secara berkala
- Backup `.env` file

### 8.2 Updates
- Monitor Laravel security updates
- Update dependencies secara berkala
- Test di staging environment sebelum update production

### 8.3 Monitoring
- Monitor error logs
- Setup uptime monitoring
- Track website performance 