# 🚀 Setup Composer.phar untuk KORMI Kaltim CMS

## 📋 Informasi Composer
- **Version:** 2.6.5
- **PHP Requirement:** 8.0+
- **Download URL:** https://getcomposer.org/composer.phar

## ⚡ Cara Download Composer.phar

### Method 1: Download Manual
1. Buka browser
2. Kunjungi: https://getcomposer.org/composer.phar
3. Download file composer.phar
4. Upload ke root domain Hostinger

### Method 2: Via SSH (Recommended)
```bash
# Connect SSH
ssh u896830231@145.79.14.38 -p 65002

# Navigasi ke root domain
cd /home/u896830231/

# Download composer.phar
curl -sS https://getcomposer.org/installer | php

# Rename jika perlu
mv composer.phar composer.phar

# Set permissions
chmod +x composer.phar
```

### Method 3: Via FTP
1. Download composer.phar dari https://getcomposer.org/composer.phar
2. Upload ke root domain via FTP
3. Set permission 755

## 🔧 Penggunaan Composer

### Install Dependencies
```bash
# Install semua dependencies
php composer.phar install

# Install untuk production (tanpa dev dependencies)
php composer.phar install --optimize-autoloader --no-dev

# Update dependencies
php composer.phar update

# Dump autoloader
php composer.phar dump-autoload --optimize
```

### Commands untuk Hostinger
```bash
# Connect SSH
ssh u896830231@145.79.14.38 -p 65002

# Navigasi ke root domain
cd /home/u896830231/

# Download composer.phar
curl -sS https://getcomposer.org/installer | php

# Install dependencies
php composer.phar install --optimize-autoloader --no-dev

# Dump autoloader
php composer.phar dump-autoload --optimize
```

## 📁 File Structure Setelah Setup

```
/home/u896830231/
├── composer.phar (file yang baru diupload)
├── composer.json
├── composer.lock
├── app/
├── bootstrap/
├── config/
├── database/
├── resources/
├── routes/
├── storage/
├── vendor/ (akan dibuat setelah composer install)
└── .env
```

## ✅ Checklist Setup

### Pre-Setup
- [ ] Download composer.phar dari https://getcomposer.org/composer.phar
- [ ] Upload composer.phar ke root domain
- [ ] Set permission 755 untuk composer.phar

### Post-Setup
- [ ] Jalankan `php composer.phar install --optimize-autoloader --no-dev`
- [ ] Jalankan `php composer.phar dump-autoload --optimize`
- [ ] Cek apakah folder vendor/ terbuat
- [ ] Test dengan `php composer.phar --version`

## 🚨 Troubleshooting

### Jika Error "php: command not found"
```bash
# Cek PHP version
which php
php -v

# Jika PHP tidak tersedia, contact Hostinger support
```

### Jika Error "curl: command not found"
```bash
# Download manual dari browser
# Kunjungi: https://getcomposer.org/composer.phar
# Upload via FTP
```

### Jika Error Permission Denied
```bash
# Set permission
chmod +x composer.phar
chmod 755 composer.phar
```

## 📞 Support

### Connection Details
- **SSH:** ssh u896830231@145.79.14.38 -p 65002
- **FTP:** ftp.kormi-kaltim.id (port 21)
- **Root Domain:** /home/u896830231/

### Composer Documentation
- **Official:** https://getcomposer.org/
- **Download:** https://getcomposer.org/composer.phar

---

**Status: 🔧 COMPOSER SETUP READY**
**Target Domain:** https://kormi-kaltim.id
**Priority:** HIGH 