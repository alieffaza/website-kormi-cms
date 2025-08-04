<?php
require_once 'config/config.php';

// Require login
requireLogin();

$pageTitle = 'Kelola Berita';

// Handle delete
if (isset($_GET['delete']) && is_numeric($_GET['delete'])) {
    $id = $_GET['delete'];
    $token = $_GET['token'] ?? '';
    
    if (verifyToken($token)) {
        $news = fetchOne("SELECT gambar FROM berita WHERE id = ?", [$id]);
        if ($news && $news['gambar']) {
            $imagePath = "public/assets/img/berita/" . $news['gambar'];
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        
        delete('berita', 'id = ?', [$id]);
        setFlash('success', 'Berita berhasil dihapus!');
        redirect('berita.php');
    }
}

// Get all news with pagination
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$perPage = 10;
$offset = ($page - 1) * $perPage;

$totalNews = fetchOne("SELECT COUNT(*) as total FROM berita")['total'];
$pagination = paginate($totalNews, $perPage, $page);

$news = fetchAll("SELECT * FROM berita ORDER BY created_at DESC LIMIT ? OFFSET ?", [$perPage, $offset]);

include 'includes/header.php';
?>

<div class="row">
    <div class="col-12">
        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ps-3">Kelola Berita</h6>
                </div>
            </div>
            <div class="card-body px-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Berita</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tanggal</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($news as $item): ?>
                            <tr>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div>
                                            <img src="public/assets/img/berita/<?php echo $item['gambar'] ?: 'default.jpg'; ?>" class="avatar avatar-sm me-3 border-radius-lg" alt="berita">
                                        </div>
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm"><?php echo $item['judul']; ?></h6>
                                            <p class="text-xs text-secondary mb-0"><?php echo substr($item['isi'], 0, 100) . '...'; ?></p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0"><?php echo date('d M Y', strtotime($item['created_at'])); ?></p>
                                </td>
                                <td class="align-middle text-center text-sm">
                                    <span class="badge badge-sm bg-gradient-success">Published</span>
                                </td>
                                <td class="align-middle text-center">
                                    <a href="berita-edit.php?id=<?php echo $item['id']; ?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit berita">
                                        Edit
                                    </a>
                                    <a href="?delete=<?php echo $item['id']; ?>&token=<?php echo generateToken(); ?>" class="text-danger font-weight-bold text-xs ms-2" data-toggle="tooltip" data-original-title="Delete berita" onclick="return confirm('Yakin ingin menghapus berita ini?')">
                                        Delete
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Pagination -->
<?php if ($pagination['total_pages'] > 1): ?>
<div class="row">
    <div class="col-12">
        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center">
                <?php if ($pagination['has_prev']): ?>
                <li class="page-item">
                    <a class="page-link" href="?page=<?php echo $pagination['prev_page']; ?>">Previous</a>
                </li>
                <?php endif; ?>
                
                <?php for ($i = 1; $i <= $pagination['total_pages']; $i++): ?>
                <li class="page-item <?php echo $i == $pagination['current_page'] ? 'active' : ''; ?>">
                    <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                </li>
                <?php endfor; ?>
                
                <?php if ($pagination['has_next']): ?>
                <li class="page-item">
                    <a class="page-link" href="?page=<?php echo $pagination['next_page']; ?>">Next</a>
                </li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
</div>
<?php endif; ?>

<!-- Add News Button -->
<div class="row">
    <div class="col-12 text-center">
        <a href="berita-add.php" class="btn bg-gradient-primary btn-lg">
            <i class="fas fa-plus me-2"></i>Tambah Berita Baru
        </a>
    </div>
</div>

<?php include 'includes/footer.php'; ?> 