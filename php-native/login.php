<?php
require_once 'config/config.php';

// Redirect if already logged in
if (isLoggedIn()) {
    redirect('dashboard.php');
}

$error = '';

// Handle login form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = sanitize($_POST['email']);
    $password = $_POST['password'];
    $token = $_POST['csrf_token'];
    
    if (!verifyToken($token)) {
        $error = 'Invalid token. Please try again.';
    } else {
        // Get user from database
        $user = fetchOne("SELECT * FROM users WHERE email = ?", [$email]);
        
        if ($user && password_verify($password, $user['password'])) {
            // Set session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            $_SESSION['user_email'] = $user['email'];
            $_SESSION['user_role'] = $user['role'];
            
            setFlash('success', 'Login berhasil! Selamat datang ' . $user['name']);
            redirect('dashboard.php');
        } else {
            $error = 'Email atau password salah!';
        }
    }
}

$pageTitle = 'Login';
include 'includes/header.php';
?>

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-4 col-md-6 col-sm-8">
            <div class="card shadow-lg border-0 mt-5">
                <div class="card-header p-0">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                        <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Login KORMI Kaltim</h4>
                    </div>
                </div>
                <div class="card-body">
                    <?php if ($error): ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $error; ?>
                        </div>
                    <?php endif; ?>
                    
                    <form method="POST" action="">
                        <input type="hidden" name="csrf_token" value="<?php echo generateToken(); ?>">
                        
                        <div class="input-group input-group-outline my-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        
                        <div class="input-group input-group-outline mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        
                        <div class="form-check form-check-info text-start ps-0">
                            <input class="form-check-input" type="checkbox" id="remember" checked>
                            <label class="form-check-label" for="remember">
                                Ingat saya
                            </label>
                        </div>
                        
                        <div class="text-center">
                            <button type="submit" class="btn bg-gradient-primary btn-lg w-100 my-4 mb-2">
                                Login
                            </button>
                        </div>
                        
                        <p class="mt-4 mb-0 text-center">
                            Belum punya akun? 
                            <a href="register.php" class="text-primary font-weight-bold">Daftar</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?> 