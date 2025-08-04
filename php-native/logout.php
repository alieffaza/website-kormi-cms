<?php
require_once 'config/config.php';

// Destroy session
session_destroy();

// Redirect to login page
setFlash('success', 'Logout berhasil!');
redirect('login.php');
?> 