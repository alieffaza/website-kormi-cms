<?php
require_once 'config/config.php';

$pageTitle = 'Beranda';

// Get latest news
$latestNews = fetchAll("SELECT * FROM berita ORDER BY created_at DESC LIMIT 6");

// Get latest announcements
$latestAnnouncements = fetchAll("SELECT * FROM pengumuman ORDER BY created_at DESC LIMIT 3");

// Get organization structure
$structure = fetchOne("SELECT * FROM struktur_organisasi ORDER BY id DESC LIMIT 1");

include 'includes/header.php';
?>

<!-- Hero Section -->
<section class="hero-section bg-primary text-white py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="display-4 fw-bold mb-4">Selamat Datang di KORMI Kaltim</h1>
                <p class="lead mb-4">Komite Olahraga Rekreasi Masyarakat Indonesia Kalimantan Timur - Mengembangkan olahraga dan rekreasi untuk masyarakat yang sehat dan aktif.</p>
                <div class="d-flex gap-3">
                    <a href="berita.php" class="btn btn-light btn-lg">Berita Terbaru</a>
                    <a href="tentang.php" class="btn btn-outline-light btn-lg">Tentang Kami</a>
                </div>
            </div>
            <div class="col-lg-6">
                <img src="public/assets/img/kormi-landing.jpg" alt="KORMI Kaltim" class="img-fluid rounded">
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h2 class="mb-4">Tentang KORMI Kaltim</h2>
                <p class="lead text-muted">KORMI (Komite Olahraga Rekreasi Masyarakat Indonesia) Kalimantan Timur adalah organisasi yang berkomitmen untuk mengembangkan dan mempromosikan olahraga dan rekreasi di Kalimantan Timur.</p>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-4 text-center">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <i class="fas fa-dumbbell fa-3x text-primary mb-3"></i>
                        <h5 class="card-title">Olahraga</h5>
                        <p class="card-text">Mengembangkan berbagai jenis olahraga untuk masyarakat Kalimantan Timur.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 text-center">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <i class="fas fa-hiking fa-3x text-primary mb-3"></i>
                        <h5 class="card-title">Rekreasi</h5>
                        <p class="card-text">Menyediakan kegiatan rekreasi yang menyenangkan dan bermanfaat.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 text-center">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <i class="fas fa-users fa-3x text-primary mb-3"></i>
                        <h5 class="card-title">Masyarakat</h5>
                        <p class="card-text">Membangun masyarakat yang sehat, aktif, dan produktif.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Latest News Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="text-center mb-5">Berita Terbaru</h2>
            </div>
        </div>
        <div class="row">
            <?php foreach ($latestNews as $news): ?>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100 shadow-sm">
                    <?php if ($news['gambar']): ?>
                    <img src="public/assets/img/berita/<?php echo $news['gambar']; ?>" class="card-img-top" alt="<?php echo $news['judul']; ?>">
                    <?php endif; ?>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $news['judul']; ?></h5>
                        <p class="card-text text-muted"><?php echo substr($news['isi'], 0, 150) . '...'; ?></p>
                        <div class="d-flex justify-content-between align-items-center">
                            <small class="text-muted"><?php echo date('d M Y', strtotime($news['created_at'])); ?></small>
                            <a href="berita-detail.php?id=<?php echo $news['id']; ?>" class="btn btn-primary btn-sm">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <div class="text-center mt-4">
            <a href="berita.php" class="btn btn-outline-primary">Lihat Semua Berita</a>
        </div>
    </div>
</section>

<!-- Announcements Section -->
<?php if ($latestAnnouncements): ?>
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="text-center mb-5">Pengumuman Terbaru</h2>
            </div>
        </div>
        <div class="row">
            <?php foreach ($latestAnnouncements as $announcement): ?>
            <div class="col-lg-4 mb-4">
                <div class="card border-warning h-100">
                    <div class="card-header bg-warning text-dark">
                        <h6 class="mb-0"><i class="fas fa-bullhorn me-2"></i>Pengumuman</h6>
                    </div>
                    <div class="card-body">
                        <h6 class="card-title"><?php echo $announcement['judul']; ?></h6>
                        <p class="card-text"><?php echo substr($announcement['isi'], 0, 100) . '...'; ?></p>
                        <small class="text-muted"><?php echo date('d M Y', strtotime($announcement['created_at'])); ?></small>
                    </div>
                    <div class="card-footer">
                        <a href="pengumuman-detail.php?id=<?php echo $announcement['id']; ?>" class="btn btn-warning btn-sm">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- Contact Section -->
<section class="py-5 bg-primary text-white">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h2 class="mb-4">Hubungi Kami</h2>
                <p class="lead mb-4">Ingin tahu lebih lanjut tentang KORMI Kaltim? Hubungi kami untuk informasi lebih detail.</p>
                <div class="row">
                    <div class="col-md-4">
                        <i class="fas fa-map-marker-alt fa-2x mb-3"></i>
                        <h5>Alamat</h5>
                        <p>Kalimantan Timur, Indonesia</p>
                    </div>
                    <div class="col-md-4">
                        <i class="fas fa-phone fa-2x mb-3"></i>
                        <h5>Telepon</h5>
                        <p>+62 541 123456</p>
                    </div>
                    <div class="col-md-4">
                        <i class="fas fa-envelope fa-2x mb-3"></i>
                        <h5>Email</h5>
                        <p>info@kormi-kaltim.id</p>
                    </div>
                </div>
                <div class="mt-4">
                    <a href="kontak.php" class="btn btn-light btn-lg">Kirim Pesan</a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?> 