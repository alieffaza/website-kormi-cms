# Script PowerShell untuk mempersiapkan file upload ke Hostinger
# KORMI Kaltim CMS

Write-Host "=== Persiapan Upload KORMI Kaltim CMS ke Hostinger ===" -ForegroundColor Green

# Buat folder untuk upload
$UPLOAD_DIR = "hostinger-upload"
if (Test-Path $UPLOAD_DIR) {
    Remove-Item -Recurse -Force $UPLOAD_DIR
}
New-Item -ItemType Directory -Path $UPLOAD_DIR | Out-Null

Write-Host "1. Menyalin file Laravel ke folder upload..." -ForegroundColor Yellow

# Salin semua file Laravel (kecuali yang tidak diperlukan)
Copy-Item -Recurse -Path "app" -Destination "$UPLOAD_DIR\app"
Copy-Item -Recurse -Path "bootstrap" -Destination "$UPLOAD_DIR\bootstrap"
Copy-Item -Recurse -Path "config" -Destination "$UPLOAD_DIR\config"
Copy-Item -Recurse -Path "database" -Destination "$UPLOAD_DIR\database"
Copy-Item -Recurse -Path "resources" -Destination "$UPLOAD_DIR\resources"
Copy-Item -Recurse -Path "routes" -Destination "$UPLOAD_DIR\routes"
Copy-Item -Recurse -Path "storage" -Destination "$UPLOAD_DIR\storage"
Copy-Item -Recurse -Path "vendor" -Destination "$UPLOAD_DIR\vendor"
Copy-Item "artisan" -Destination "$UPLOAD_DIR\artisan"
Copy-Item "composer.json" -Destination "$UPLOAD_DIR\composer.json"
Copy-Item "composer.lock" -Destination "$UPLOAD_DIR\composer.lock"

Write-Host "2. Menyalin file public ke folder upload..." -ForegroundColor Yellow
New-Item -ItemType Directory -Path "$UPLOAD_DIR\public_html" | Out-Null
Copy-Item -Recurse -Path "public\*" -Destination "$UPLOAD_DIR\public_html"

Write-Host "3. Membuat file .env untuk production..." -ForegroundColor Yellow
$envContent = @"
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
DB_PASSWORD=

BROADCAST_DRIVER=log
CACHE_DRIVER=file
FILESYSTEM_DISK=local
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

MEMCACHED_HOST=127.0.0.1

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=smtp
MAIL_HOST=mail.kormi-kaltim.id
MAIL_PORT=587
MAIL_USERNAME=info@kormi-kaltim.id
MAIL_PASSWORD=
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="info@kormi-kaltim.id"
MAIL_FROM_NAME="`${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=false

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
"@
$envContent | Out-File -FilePath "$UPLOAD_DIR\.env" -Encoding UTF8

Write-Host "4. Membuat file .htaccess untuk public_html..." -ForegroundColor Yellow
$htaccessContent = @"
<IfModule mod_rewrite.c>
    <IfModule mod_negotiation.c>
        Options -MultiViews -Indexes
    </IfModule>

    RewriteEngine On

    # Handle Authorization Header
    RewriteCond %{HTTP:Authorization} .
    RewriteRule .* - [E=HTTP_AUTHORIZATION:%{HTTP:Authorization}]

    # Redirect Trailing Slashes If Not A Folder...
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_URI} (.+)/$
    RewriteRule ^ %1 [L,R=301]

    # Send Requests To Front Controller...
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteRule ^ index.php [L]

    # Security Headers
    <IfModule mod_headers.c>
        Header always set X-Content-Type-Options nosniff
        Header always set X-Frame-Options DENY
        Header always set X-XSS-Protection "1; mode=block"
        Header always set Referrer-Policy "strict-origin-when-cross-origin"
    </IfModule>

    # Compression
    <IfModule mod_deflate.c>
        AddOutputFilterByType DEFLATE text/plain
        AddOutputFilterByType DEFLATE text/html
        AddOutputFilterByType DEFLATE text/xml
        AddOutputFilterByType DEFLATE text/css
        AddOutputFilterByType DEFLATE application/xml
        AddOutputFilterByType DEFLATE application/xhtml+xml
        AddOutputFilterByType DEFLATE application/rss+xml
        AddOutputFilterByType DEFLATE application/javascript
        AddOutputFilterByType DEFLATE application/x-javascript
    </IfModule>

    # Cache Control
    <IfModule mod_expires.c>
        ExpiresActive on
        ExpiresByType text/css "access plus 1 year"
        ExpiresByType application/javascript "access plus 1 year"
        ExpiresByType image/png "access plus 1 year"
        ExpiresByType image/jpg "access plus 1 year"
        ExpiresByType image/jpeg "access plus 1 year"
        ExpiresByType image/gif "access plus 1 year"
        ExpiresByType image/ico "access plus 1 year"
        ExpiresByType image/icon "access plus 1 year"
        ExpiresByType text/plain "access plus 1 month"
        ExpiresByType application/pdf "access plus 1 month"
        ExpiresByType application/x-shockwave-flash "access plus 1 month"
    </IfModule>
</IfModule>
"@
$htaccessContent | Out-File -FilePath "$UPLOAD_DIR\public_html\.htaccess" -Encoding UTF8

Write-Host "5. Membuat file index.php untuk public_html..." -ForegroundColor Yellow
$indexContent = @"
<?php

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

/*
|--------------------------------------------------------------------------
| Check If The Application Is Under Maintenance
|--------------------------------------------------------------------------
|
| If the application is in maintenance / demo mode via the "down" command
| we will load this file so that any pre-rendered content can be shown
| instead of starting the framework, which could cause an exception.
|
*/

if (file_exists(`$maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require `$maintenance;
}

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| this application. We just need to utilize it! We'll simply require it
| into the script here so we don't need to manually load our classes.
|
*/

require __DIR__.'/../vendor/autoload.php';

/*
|--------------------------------------------------------------------------
| Run The Application
|--------------------------------------------------------------------------
|
| Once we have the application, we can handle the incoming request using
| the application's HTTP kernel. Then, we will send the response back
| to this client's browser, allowing them to enjoy our application.
|
*/

`$app = require_once __DIR__.'/../bootstrap/app.php';

`$kernel = `$app->make(Kernel::class);

`$response = `$kernel->handle(
    `$request = Request::capture()
)->send();

`$kernel->terminate(`$request, `$response);
"@
$indexContent | Out-File -FilePath "$UPLOAD_DIR\public_html\index.php" -Encoding UTF8

Write-Host "6. Membuat file README untuk upload..." -ForegroundColor Yellow
$readmeContent = @"
# Instruksi Upload ke Hostinger

## Langkah-langkah Upload:

1. **Upload ke Root Domain**
   - Upload semua file di folder ini ke root domain (bukan public_html)
   - Pastikan struktur folder tetap sama

2. **Upload ke public_html**
   - Upload semua file di folder public_html ke folder public_html di Hostinger

3. **Set Permissions**
   - Folder storage/: 755
   - Folder bootstrap/cache/: 755
   - File .env: 644

4. **Konfigurasi Database**
   - Update DB_PASSWORD di file .env
   - Update MAIL_PASSWORD di file .env

5. **Jalankan Commands via SSH**
   ```bash
   composer install --optimize-autoloader --no-dev
   php artisan key:generate
   php artisan config:cache
   php artisan route:cache
   php artisan view:cache
   php artisan migrate
   php artisan storage:link
   ```

6. **Test Website**
   - Akses https://kormi-kaltim.id
   - Test semua fitur

## File yang Diupload:
- Semua file Laravel (app/, bootstrap/, config/, dll)
- File .env dengan konfigurasi production
- Folder public_html dengan index.php dan .htaccess
- Folder vendor/ (setelah composer install)

## Catatan:
- Pastikan SSL certificate aktif
- Backup database sebelum upload
- Test di staging environment terlebih dahulu
"@
$readmeContent | Out-File -FilePath "$UPLOAD_DIR\README-UPLOAD.md" -Encoding UTF8

Write-Host "7. Membuat file .gitignore untuk upload..." -ForegroundColor Yellow
$gitignoreContent = @"
/node_modules
/public/hot
/public/storage
/storage/*.key
/vendor
.env
.env.backup
.phpunit.result.cache
docker-compose.override.yml
Homestead.json
Homestead.yaml
npm-debug.log
yarn-error.log
/.idea
/.vscode
"@
$gitignoreContent | Out-File -FilePath "$UPLOAD_DIR\.gitignore" -Encoding UTF8

Write-Host "=== Persiapan selesai! ===" -ForegroundColor Green
Write-Host "Folder upload: $UPLOAD_DIR" -ForegroundColor Cyan
Write-Host ""
Write-Host "Langkah selanjutnya:" -ForegroundColor Yellow
Write-Host "1. Update password database dan email di file .env" -ForegroundColor White
Write-Host "2. Upload folder $UPLOAD_DIR ke Hostinger" -ForegroundColor White
Write-Host "3. Jalankan commands via SSH" -ForegroundColor White
Write-Host "4. Test website di https://kormi-kaltim.id" -ForegroundColor White 