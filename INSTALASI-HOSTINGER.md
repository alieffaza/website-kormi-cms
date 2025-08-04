# 🚀 Instruksi Instalasi KORMI Kaltim CMS di Hostinger

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

## 📋 Persiapan yang Sudah Selesai

✅ **SEMUA FILE SUDAH DIPERSIAPKAN!**

File yang telah dibuat:
- `hostinger-upload/` - Folder siap upload
- `deployment-checklist.md` - Checklist lengkap
- `hostinger-setup.md` - Panduan setup
- `hostinger-commands.md` - Daftar commands SSH
- `production-checklist.md` - Checklist production
- `DEPLOYMENT-SUMMARY.md` - Ringkasan lengkap

## 🎯 Langkah Instalasi di Hostinger

### 1. Login ke Hostinger Control Panel
- Buka: https://hpanel.hostinger.com
- Login dengan akun Hostinger Anda

### 2. Setup Database
1. Buka **MySQL Databases**
2. Database sudah tersedia:
   - **Database name:** `u896830231_dbkormicms`
   - **Username:** `u896830231_adminkormi`
   - **Password:** [password database Anda]
3. Catat password database untuk digunakan nanti

### 3. Setup Email
1. Buka **Email** di Control Panel
2. Buat email account: `info@kormi-kaltim.id`
3. Set password yang kuat
4. Catat password untuk konfigurasi SMTP

### 4. Aktifkan SSL Certificate
1. Buka **SSL** di Control Panel
2. Aktifkan SSL untuk domain `kormi-kaltim.id`
3. Tunggu hingga SSL aktif (biasanya 5-10 menit)

### 5. Upload File via FTP
1. **Connect ke FTP:**
   - Host: ftp.kormi-kaltim.id
   - Username: u896830231.KORMI
   - Port: 21
   - Password: [password FTP Anda]

2. **Upload ke Root Domain:**
   - Upload semua file dari folder `hostinger-upload/` ke root domain
   - JANGAN upload ke folder `public_html`

3. **Upload ke public_html:**
   - Upload semua file dari folder `hostinger-upload/public_html/` ke folder `public_html`

### 6. Set File Permissions
Di File Manager, set permissions:
- Folder `storage/`: **755**
- Folder `bootstrap/cache/`: **755**
- File `.env`: **644**

### 7. Konfigurasi Environment
1. Edit file `.env` di root domain
2. Update password:
   ```
   DB_DATABASE=u896830231_dbkormicms
   DB_USERNAME=u896830231_adminkormi
   DB_PASSWORD=[password_database_anda]
   MAIL_PASSWORD=[password_email_anda]
   ```

### 8. Setup via SSH
1. Aktifkan **SSH Access** di Control Panel
2. Connect via SSH client dengan custom port:
   ```bash
   ssh u896830231@145.79.14.38 -p 65002
   ```
3. Jalankan commands berikut:

```bash
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

### 9. Testing Website
1. **Test Website:**
   - Akses: https://kormi-kaltim.id
   - Cek apakah website berjalan normal
2. **Test Admin Panel:**
   - Akses: https://kormi-kaltim.id/admin
   - Test login admin
3. **Test Email:**
   - Test contact form
   - Test reset password

## 🔧 Troubleshooting

### Jika Error FTP:
1. Pastikan credentials FTP benar
2. Cek apakah port 21 tidak diblokir
3. Gunakan FTP client seperti FileZilla
4. Pastikan direktori FTP: /home/u896830231/domains/kormi-kaltim.id/public_html

### Jika Error SSH:
1. Pastikan SSH access aktif di Hostinger
2. Gunakan port 65002 untuk SSH
3. Cek apakah SSH client support custom port

### Jika Error 500:
1. Cek file permissions
2. Cek error logs: `storage/logs/laravel.log`
3. Pastikan file `.env` ada dan benar

### Jika Database Error:
1. Verifikasi database credentials
2. Cek database user privileges
3. Test connection via SSH

### Jika File Upload Error:
1. Cek permission folder `storage/app/public/`
2. Jalankan `php artisan storage:link`
3. Verifikasi disk space

## 📞 Support

### Hostinger Support
- **Control Panel:** https://hpanel.hostinger.com
- **Support:** https://www.hostinger.com/contact
- **Documentation:** https://www.hostinger.com/tutorials

### Connection Information
- **SSH:** ssh u896830231@145.79.14.38 -p 65002
- **FTP:** ftp.kormi-kaltim.id (port 21)
- **Database:** u896830231_dbkormicms

### Emergency Contacts
- **Hostinger Support:** Available 24/7
- **Developer:** [Your Contact Information]

## ✅ Checklist Final

### Pre-Installation
- [ ] Database credentials sudah disiapkan
- [ ] Email credentials sudah disiapkan
- [ ] SSL certificate aktif
- [ ] File upload sudah siap

### Post-Installation
- [ ] Website berjalan di https://kormi-kaltim.id
- [ ] Admin panel bisa diakses
- [ ] Email functionality berjalan
- [ ] File upload berfungsi
- [ ] Error logs dimonitor

### Security
- [ ] File `.env` tidak bisa diakses publik
- [ ] Security headers aktif
- [ ] SSL certificate valid
- [ ] Database user privileges minimal

### Performance
- [ ] Page load time < 3 detik
- [ ] Cache berjalan optimal
- [ ] Database queries efisien
- [ ] Images dan assets ter-compress

---

## 🎉 SELESAI!

Website KORMI Kaltim CMS sudah siap untuk dihosting di Hostinger dengan domain **kormi-kaltim.id**.

**Status: [ ] READY TO INSTALL**
**Target Domain: https://kormi-kaltim.id**
**Framework: Laravel 10.x**
**PHP Version: 8.1+**

**Installation Date: ___________**
**Installed By: ___________**
**Verified By: ___________** 