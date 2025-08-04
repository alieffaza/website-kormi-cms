# Instruksi Upload ke Hostinger - KORMI Kaltim CMS

## 📋 Informasi Hosting
- **FTP Host:** ftp.kormi-kaltim.id
- **FTP Username:** u896830231.KORMI
- **FTP Port:** 21
- **FTP Directory:** /home/u896830231/domains/kormi-kaltim.id/public_html
- **Database:** u896830231_dbkormicms
- **Database User:** u896830231_adminkormi
- **SSH IP:** 145.79.14.38
- **SSH Port:** 65002
- **SSH Username:** u896830231

## 🚀 Langkah-langkah Upload:

### 1. Upload via FTP
1. **Connect ke FTP:**
   - Host: ftp.kormi-kaltim.id
   - Username: u896830231.KORMI
   - Port: 21
   - Password: [password FTP Anda]

2. **Upload ke Root Domain:**
   - Upload semua file di folder ini ke root domain (bukan public_html)
   - Pastikan struktur folder tetap sama

3. **Upload ke public_html:**
   - Upload semua file di folder public_html ke folder public_html di Hostinger

### 2. Set Permissions
- Folder storage/: 755
- Folder bootstrap/cache/: 755
- File .env: 644

### 3. Konfigurasi Database
Update file .env dengan:
```env
DB_DATABASE=u896830231_dbkormicms
DB_USERNAME=u896830231_adminkormi
DB_PASSWORD=[password_database_anda]
MAIL_PASSWORD=[password_email_anda]
```

### 4. Jalankan Commands via SSH
```bash
# Connect SSH
ssh u896830231@145.79.14.38 -p 65002

# Navigasi ke root domain
cd /home/u896830231/public_html

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

# Setup storage link
php artisan storage:link
```

### 5. Test Website
- Akses https://kormi-kaltim.id
- Test semua fitur

## 📁 File yang Diupload:
- Semua file Laravel (app/, bootstrap/, config/, dll)
- File .env dengan konfigurasi production
- Folder public_html dengan index.php dan .htaccess
- Folder vendor/ (setelah composer install)

## 🔧 Troubleshooting

### Jika Error FTP:
- Pastikan credentials FTP benar
- Cek apakah port 21 tidak diblokir
- Gunakan FTP client seperti FileZilla
- Pastikan direktori FTP: /home/u896830231/domains/kormi-kaltim.id/public_html

### Jika Error SSH:
- Pastikan SSH access aktif di Hostinger
- Gunakan port 65002 untuk SSH
- Cek apakah SSH client support custom port

### Jika Error Database:
- Verifikasi database credentials
- Pastikan database user memiliki privileges yang cukup
- Test connection via SSH

## 📞 Support
- **Hostinger Control Panel:** https://hpanel.hostinger.com
- **Hostinger Support:** https://www.hostinger.com/contact

## ⚠️ Catatan Penting:
- Pastikan SSL certificate aktif untuk domain kormi-kaltim.id
- Backup database sebelum upload
- Test di staging environment terlebih dahulu
- Monitor error logs setelah deployment
