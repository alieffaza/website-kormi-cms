# Checklist Deployment KORMI Kaltim CMS ke Hostinger

## Persiapan Sebelum Upload

### 1. Konfigurasi Environment
- [ ] Buat file `.env` dari `.env.example`
- [ ] Set `APP_ENV=production`
- [ ] Set `APP_DEBUG=false`
- [ ] Set `APP_URL=https://kormi-kaltim.id`
- [ ] Generate APP_KEY dengan `php artisan key:generate`
- [ ] Konfigurasi database credentials
- [ ] Konfigurasi email settings

### 2. Database Setup
- [ ] Buat database `kormi_kaltim_cms` di Hostinger
- [ ] Buat user database dengan privileges yang sesuai
- [ ] Update konfigurasi database di `.env`
- [ ] Jalankan migration: `php artisan migrate`
- [ ] Jalankan seeder jika ada: `php artisan db:seed`

### 3. File Permissions
- [ ] Set permission 755 untuk folder:
  - `storage/`
  - `bootstrap/cache/`
  - `public/`
- [ ] Set permission 644 untuk file:
  - `.env`
  - `storage/logs/laravel.log`

### 4. Optimisasi Laravel
- [ ] Jalankan `composer install --optimize-autoloader --no-dev`
- [ ] Jalankan `php artisan config:cache`
- [ ] Jalankan `php artisan route:cache`
- [ ] Jalankan `php artisan view:cache`

## Upload ke Hostinger

### 1. File yang Harus Diupload
- [ ] Semua file Laravel (kecuali `.git/`, `node_modules/`, `vendor/`)
- [ ] File `.env` dengan konfigurasi production
- [ ] Folder `storage/` dan `bootstrap/cache/` dengan permission yang benar

### 2. Struktur Folder di Hostinger
```
public_html/
├── index.php (Laravel public/index.php)
├── .htaccess
├── assets/ (dari public/assets/)
└── [semua file public Laravel]
```

### 3. File Laravel di Root Domain
```
/
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
```

## Post-Upload Checklist

### 1. Verifikasi Website
- [ ] Akses https://kormi-kaltim.id
- [ ] Cek apakah website berjalan normal
- [ ] Test login admin
- [ ] Test semua fitur utama

### 2. Security Check
- [ ] Pastikan `.env` tidak bisa diakses publik
- [ ] Cek error logs di `storage/logs/`
- [ ] Verifikasi SSL certificate
- [ ] Test form submissions

### 3. Performance Check
- [ ] Cek loading time website
- [ ] Verifikasi cache berjalan
- [ ] Test upload file jika ada
- [ ] Cek database performance

## Backup Strategy

### 1. Database Backup
- [ ] Setup automatic database backup
- [ ] Test restore database
- [ ] Dokumentasikan backup schedule

### 2. File Backup
- [ ] Backup file uploads di `storage/app/public/`
- [ ] Backup `.env` file
- [ ] Backup custom configurations

## Monitoring

### 1. Error Monitoring
- [ ] Setup error logging
- [ ] Monitor `storage/logs/laravel.log`
- [ ] Setup email notifications untuk errors

### 2. Performance Monitoring
- [ ] Monitor website uptime
- [ ] Track page load times
- [ ] Monitor database performance

## Maintenance

### 1. Regular Updates
- [ ] Update Laravel framework secara berkala
- [ ] Update dependencies
- [ ] Backup sebelum update

### 2. Security Updates
- [ ] Monitor security advisories
- [ ] Update packages yang vulnerable
- [ ] Regular security audits 