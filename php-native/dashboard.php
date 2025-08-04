<?php
require_once 'config/config.php';

// Require login
requireLogin();

$pageTitle = 'Dashboard';

// Get statistics
$totalNews = fetchOne("SELECT COUNT(*) as total FROM berita")['total'];
$totalPages = fetchOne("SELECT COUNT(*) as total FROM halaman")['total'];
$totalUsers = fetchOne("SELECT COUNT(*) as total FROM users")['total'];
$totalInorga = fetchOne("SELECT COUNT(*) as total FROM inorga")['total'];

// Get latest news
$latestNews = fetchAll("SELECT * FROM berita ORDER BY created_at DESC LIMIT 5");

// Get latest users
$latestUsers = fetchAll("SELECT * FROM users ORDER BY created_at DESC LIMIT 5");

include 'includes/header.php';
?>

<div class="row">
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
            <div class="card-header p-3 pt-2">
                <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                    <i class="material-icons opacity-10">article</i>
                </div>
                <div class="text-end pt-1">
                    <p class="text-sm mb-0 text-capitalize">Total Berita</p>
                    <h4 class="mb-0"><?php echo $totalNews; ?></h4>
                </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
                <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+3% </span>dari bulan lalu</p>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
            <div class="card-header p-3 pt-2">
                <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                    <i class="material-icons opacity-10">pages</i>
                </div>
                <div class="text-end pt-1">
                    <p class="text-sm mb-0 text-capitalize">Total Halaman</p>
                    <h4 class="mb-0"><?php echo $totalPages; ?></h4>
                </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
                <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+1% </span>dari bulan lalu</p>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
            <div class="card-header p-3 pt-2">
                <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                    <i class="material-icons opacity-10">people</i>
                </div>
                <div class="text-end pt-1">
                    <p class="text-sm mb-0 text-capitalize">Total Users</p>
                    <h4 class="mb-0"><?php echo $totalUsers; ?></h4>
                </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
                <p class="mb-0"><span class="text-danger text-sm font-weight-bolder">-2% </span>dari bulan lalu</p>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6">
        <div class="card">
            <div class="card-header p-3 pt-2">
                <div class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                    <i class="material-icons opacity-10">groups</i>
                </div>
                <div class="text-end pt-1">
                    <p class="text-sm mb-0 text-capitalize">Total Inorga</p>
                    <h4 class="mb-0"><?php echo $totalInorga; ?></h4>
                </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
                <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+5% </span>dari bulan lalu</p>
            </div>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-lg-4 col-md-6 mt-4 mb-4">
        <div class="card z-index-2 ">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                    <div class="chart">
                        <canvas id="chart-bars" class="chart-canvas" height="170"></canvas>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <h6 class="mb-0 ">Website Views</h6>
                <p class="text-sm ">Last Campaign Performance</p>
                <hr class="dark horizontal">
                <div class="d-flex ">
                    <i class="material-icons text-sm my-auto me-1">schedule</i>
                    <p class="mb-0 text-sm">campaign sent 2 days ago</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 mt-4 mb-4">
        <div class="card z-index-2  ">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                <div class="bg-gradient-success shadow-success border-radius-lg py-3 pe-1">
                    <div class="chart">
                        <canvas id="chart-line" class="chart-canvas" height="170"></canvas>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <h6 class="mb-0 "> Daily Sales </h6>
                <p class="text-sm "> (<span class="font-weight-bolder">+15%</span>) increase in today sales. </p>
                <hr class="dark horizontal">
                <div class="d-flex ">
                    <i class="material-icons text-sm my-auto me-1">schedule</i>
                    <p class="mb-0 text-sm">updated 4 min ago</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 mt-4 mb-3">
        <div class="card z-index-2 ">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                <div class="bg-gradient-dark shadow-dark border-radius-lg py-3 pe-1">
                    <div class="chart">
                        <canvas id="chart-line-tasks" class="chart-canvas" height="170"></canvas>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <h6 class="mb-0 ">Completed Tasks</h6>
                <p class="text-sm ">Last Last Performance</p>
                <hr class="dark horizontal">
                <div class="d-flex ">
                    <i class="material-icons text-sm my-auto me-1">schedule</i>
                    <p class="mb-0 text-sm">just updated</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mb-4">
    <div class="col-lg-8 col-md-6 mb-md-0 mb-4">
        <div class="card">
            <div class="card-header pb-0">
                <div class="row">
                    <div class="col-lg-6 col-7">
                        <h6>Berita Terbaru</h6>
                        <p class="text-sm mb-0">
                            <i class="fa fa-check text-info" aria-hidden="true"></i>
                            <span class="font-weight-bold ms-1"><?php echo count($latestNews); ?> berita</span> terbaru
                        </p>
                    </div>
                    <div class="col-lg-6 col-5 my-auto text-end">
                        <div class="dropdown float-lg-end pe-4">
                            <a class="cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-ellipsis-v text-secondary"></i>
                            </a>
                            <ul class="dropdown-menu px-2 py-3 ms-sm-n4 ms-n5" aria-labelledby="dropdownTable">
                                <li><a class="dropdown-item border-radius-md" href="javascript:;">Action</a></li>
                                <li><a class="dropdown-item border-radius-md" href="javascript:;">Another action</a></li>
                                <li><a class="dropdown-item border-radius-md" href="javascript:;">Something else here</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body px-0 pb-2">
                <div class="table-responsive">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Judul</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tanggal</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($latestNews as $news): ?>
                            <tr>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div>
                                            <img src="public/assets/img/berita/<?php echo $news['gambar'] ?: 'default.jpg'; ?>" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                                        </div>
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm"><?php echo $news['judul']; ?></h6>
                                            <p class="text-xs text-secondary mb-0"><?php echo substr($news['isi'], 0, 50) . '...'; ?></p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0"><?php echo date('d M Y', strtotime($news['created_at'])); ?></p>
                                </td>
                                <td class="align-middle text-center text-sm">
                                    <span class="badge badge-sm bg-gradient-success">Published</span>
                                </td>
                                <td class="align-middle">
                                    <a href="berita-edit.php?id=<?php echo $news['id']; ?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                        Edit
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
    <div class="col-lg-4 col-md-6">
        <div class="card h-100">
            <div class="card-header pb-0">
                <h6>Users Terbaru</h6>
                <p class="text-sm">
                    <i class="fa fa-check text-info" aria-hidden="true"></i>
                    <span class="font-weight-bold ms-1"><?php echo count($latestUsers); ?> users</span> terbaru
                </p>
            </div>
            <div class="card-body p-3">
                <div class="timeline timeline-one-side">
                    <?php foreach ($latestUsers as $user): ?>
                    <div class="timeline-block mb-3">
                        <span class="timeline-step">
                            <i class="material-icons text-success text-gradient">person</i>
                        </span>
                        <div class="timeline-content">
                            <h6 class="text-dark text-sm font-weight-bold mb-0"><?php echo $user['name']; ?></h6>
                            <p class="text-secondary font-weight-bold text-xs mt-1 mb-0"><?php echo $user['email']; ?></p>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?> 