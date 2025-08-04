# 🚀 KORMI Kaltim CMS - PHP Native Version

Aplikasi Content Management System (CMS) untuk KORMI Kalimantan Timur yang dibangun menggunakan PHP Native dengan tampilan yang sama dengan versi Laravel.

## 📋 Fitur Utama

### 🔐 Authentication & Authorization
- Login/Logout system
- Session management
- Role-based access control
- CSRF protection

### 📰 Content Management
- Kelola berita dengan gambar
- Kelola halaman statis
- Kelola pengumuman
- File upload management

### 👥 User Management
- Kelola users/admin
- Role management
- Profile management

### 🏢 Organization Management
- Struktur organisasi
- Data Inorga (Induk Organisasi)
- Contact information

### 🎨 UI/UX
- Material Dashboard design
- Responsive layout
- Modern interface
- Bootstrap 5 integration

## 📁 Struktur Folder

```
php-native/
├── config/
│   ├── config.php          # Konfigurasi aplikasi
│   └── database.php        # Konfigurasi database
├── includes/
│   ├── header.php          # Header template
│   └── footer.php          # Footer template
├── public/
│   ├── assets/
│   │   ├── css/           # Stylesheets
│   │   ├── js/            # JavaScript files
│   │   └── img/           # Images
│   └── uploads/           # Uploaded files
├── resources/
│   └── views/             # View templates (from Laravel)
├── index.php              # Homepage
├── login.php              # Login page
├── dashboard.php          # Admin dashboard
├── berita.php             # News management
├── logout.php             # Logout handler
└── README.md              # This file
```

## 🛠️ Teknologi yang Digunakan

### Backend
- **PHP 8.0+** - Server-side language
- **MySQL** - Database
- **PDO** - Database abstraction layer
- **Session** - User authentication

### Frontend
- **Bootstrap 5** - CSS framework
- **Material Dashboard** - UI components
- **Font Awesome** - Icons
- **Chart.js** - Charts and graphs
- **jQuery** - JavaScript library

### Security
- **CSRF Protection** - Cross-site request forgery protection
- **SQL Injection Prevention** - Prepared statements
- **XSS Protection** - Input sanitization
- **Session Security** - Secure session management

## 🚀 Instalasi

### 1. Requirements
- PHP 8.0 atau lebih tinggi
- MySQL 5.7 atau lebih tinggi
- Web server (Apache/Nginx)
- Composer (untuk dependencies)

### 2. Database Setup
```sql
-- Buat database
CREATE DATABASE u896830231_dbkormicms;

-- Import struktur database dari file SQL
-- (akan disediakan dalam folder database/)
```

### 3. Konfigurasi
1. Edit file `config/database.php`
2. Set database credentials:
   ```php
   define('DB_HOST', 'localhost');
   define('DB_NAME', 'u896830231_dbkormicms');
   define('DB_USER', 'u896830231_adminkormi');
   define('DB_PASS', 'your_password_here');
   ```

3. Edit file `config/config.php`
4. Set application URL:
   ```php
   define('APP_URL', 'https://kormi-kaltim.id');
   ```

### 4. File Permissions
```bash
# Set permissions untuk upload folder
chmod 755 public/uploads/
chmod 755 public/assets/img/berita/
```

### 5. Upload ke Hostinger
1. Upload semua file ke root domain
2. Set file permissions
3. Konfigurasi database
4. Test aplikasi

## 📊 Database Schema

### Tables
- `users` - User management
- `berita` - News articles
- `halaman` - Static pages
- `pengumuman` - Announcements
- `inorga` - Organization data
- `struktur_organisasi` - Organization structure

## 🔧 Penggunaan

### Admin Login
1. Akses `login.php`
2. Login dengan credentials admin
3. Akses dashboard

### Content Management
1. **Berita**: Kelola berita dan artikel
2. **Halaman**: Kelola halaman statis
3. **Users**: Kelola user dan admin
4. **Inorga**: Kelola data organisasi

### File Upload
- Gambar berita: `public/assets/img/berita/`
- File upload: `public/uploads/`
- Logo dan assets: `public/assets/img/`

## 🛡️ Security Features

### Authentication
- Session-based authentication
- Password hashing dengan `password_hash()`
- CSRF token protection
- Secure logout

### Database Security
- Prepared statements untuk mencegah SQL injection
- Input sanitization
- Error handling yang aman

### File Security
- File upload validation
- Secure file naming
- Directory traversal protection

## 📱 Responsive Design

### Breakpoints
- **Mobile**: < 768px
- **Tablet**: 768px - 1024px
- **Desktop**: > 1024px

### Features
- Mobile-first approach
- Touch-friendly interface
- Optimized for all devices

## 🎨 UI Components

### Material Dashboard
- Cards dengan gradients
- Icons dari Material Icons
- Smooth animations
- Modern color scheme

### Bootstrap Integration
- Grid system
- Components (buttons, forms, tables)
- Utilities (spacing, colors, typography)
- JavaScript components

## 📈 Performance

### Optimizations
- Minified CSS/JS
- Image optimization
- Database query optimization
- Caching strategies

### Monitoring
- Error logging
- Performance metrics
- User activity tracking

## 🔄 Migration dari Laravel

### Perubahan Utama
1. **Routing**: Manual routing dengan PHP
2. **Database**: PDO instead of Eloquent
3. **Templates**: PHP includes instead of Blade
4. **Authentication**: Session-based instead of Laravel Auth
5. **File Upload**: Manual handling instead of Laravel Storage

### Keuntungan PHP Native
- ✅ Lebih ringan dan cepat
- ✅ Tidak memerlukan Composer dependencies
- ✅ Mudah di-deploy di shared hosting
- ✅ Kontrol penuh atas kode
- ✅ Kompatibilitas tinggi

## 🚨 Troubleshooting

### Common Issues
1. **Database Connection Error**
   - Cek konfigurasi database
   - Pastikan database server running

2. **File Upload Error**
   - Cek folder permissions
   - Pastikan folder upload ada

3. **Session Error**
   - Cek PHP session configuration
   - Pastikan session storage writable

4. **404 Error**
   - Cek file .htaccess
   - Pastikan mod_rewrite enabled

## 📞 Support

### Contact Information
- **Email**: info@kormi-kaltim.id
- **Website**: https://kormi-kaltim.id
- **Phone**: +62 541 123456

### Documentation
- **PHP Native Docs**: https://www.php.net/docs.php
- **Bootstrap Docs**: https://getbootstrap.com/docs/
- **Material Dashboard**: https://www.creative-tim.com/product/material-dashboard

---

**Version**: 1.0.0
**Last Updated**: <?php echo date('d M Y'); ?>
**Developer**: KORMI Kaltim Team
**License**: MIT License 