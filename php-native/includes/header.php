<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($pageTitle) ? $pageTitle . ' - ' . APP_NAME : APP_NAME; ?></title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Material Dashboard CSS -->
    <link href="public/assets/css/material-dashboard.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Custom CSS -->
    <link href="public/assets/css/custom.css" rel="stylesheet">
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="public/assets/img/favicon.png">
    
    <!-- Meta tags -->
    <meta name="description" content="Website resmi KORMI (Komite Olahraga Rekreasi Masyarakat Indonesia) Kalimantan Timur">
    <meta name="keywords" content="KORMI, olahraga, rekreasi, Kalimantan Timur, Indonesia">
    <meta name="author" content="KORMI Kaltim">
    
    <!-- Open Graph -->
    <meta property="og:title" content="<?php echo APP_NAME; ?>">
    <meta property="og:description" content="Website resmi KORMI Kalimantan Timur">
    <meta property="og:image" content="<?php echo url('public/assets/img/logo-kormi-kaltim-black.png'); ?>">
    <meta property="og:url" content="<?php echo APP_URL; ?>">
</head>
<body class="g-sidenav-show bg-gray-100">

<?php if (isLoggedIn()): ?>
    <!-- Sidebar for logged in users -->
    <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4" id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0" href="dashboard.php">
                <img src="public/assets/img/logo-kormi-kaltim-black.png" class="navbar-brand-img h-100" alt="KORMI Kaltim">
                <span class="ms-1 font-weight-bold">KORMI Kaltim</span>
            </a>
        </div>
        <hr class="horizontal dark mt-0">
        <div class="collapse navbar-collapse w-auto h-auto" id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-dark active" href="dashboard.php">
                        <div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">dashboard</i>
                        </div>
                        <span class="nav-link-text ms-1">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="berita.php">
                        <div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">article</i>
                        </div>
                        <span class="nav-link-text ms-1">Berita</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="halaman.php">
                        <div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">pages</i>
                        </div>
                        <span class="nav-link-text ms-1">Halaman</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="inorga.php">
                        <div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">groups</i>
                        </div>
                        <span class="nav-link-text ms-1">Inorga</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="struktur.php">
                        <div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">account_tree</i>
                        </div>
                        <span class="nav-link-text ms-1">Struktur Organisasi</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="users.php">
                        <div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">people</i>
                        </div>
                        <span class="nav-link-text ms-1">Users</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="sidenav-footer mx-3">
            <div class="card card-plain shadow-none" id="sidenavCard">
                <div class="card-body text-center p-3 w-100 pt-0">
                    <div class="docs-info">
                        <h6 class="text-dark font-weight-bolder mb-0">KORMI Kaltim CMS</h6>
                        <p class="text-xs text-secondary mb-0">Version <?php echo APP_VERSION; ?></p>
                    </div>
                </div>
            </div>
            <a href="logout.php" class="btn btn-outline-primary btn-sm w-100 mb-3">Logout</a>
        </div>
    </aside>
    
    <!-- Main content -->
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="dashboard.php">Pages</a></li>
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page"><?php echo isset($pageTitle) ? $pageTitle : 'Dashboard'; ?></li>
                    </ol>
                    <h6 class="font-weight-bolder mb-0"><?php echo isset($pageTitle) ? $pageTitle : 'Dashboard'; ?></h6>
                </nav>
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                        <div class="input-group">
                            <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                            <input type="text" class="form-control" placeholder="Type here...">
                        </div>
                    </div>
                    <ul class="navbar-nav justify-content-end">
                        <li class="nav-item d-flex align-items-center">
                            <a href="profile.php" class="nav-link text-body font-weight-bold px-0">
                                <i class="fa fa-user me-sm-1"></i>
                                <span class="d-sm-inline d-none"><?php echo $_SESSION['user_name'] ?? 'User'; ?></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->
        
        <div class="container-fluid py-4">
<?php else: ?>
    <!-- Public header for non-logged in users -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <img src="public/assets/img/logo-kormi-kaltim-black.png" alt="KORMI Kaltim" height="40">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="berita.php">Berita</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="tentang.php">Tentang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="kontak.php">Kontak</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-primary text-white px-3" href="login.php">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <div class="container-fluid">
<?php endif; ?>

<!-- Flash Messages -->
<?php $flash = getFlash(); ?>
<?php if ($flash): ?>
    <div class="alert alert-<?php echo $flash['type']; ?> alert-dismissible fade show" role="alert">
        <?php echo $flash['message']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
<?php endif; ?> 