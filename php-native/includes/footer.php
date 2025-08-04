        </div>
    </main>
    
    <!-- Footer -->
    <footer class="footer py-4">
        <div class="container-fluid">
            <div class="row align-items-center justify-content-lg-between">
                <div class="col-lg-6 mb-lg-0 mb-4">
                    <div class="copyright text-center text-sm text-muted text-lg-start">
                        © <script>
                            document.write(new Date().getFullYear())
                        </script> <a href="<?php echo APP_URL; ?>" class="font-weight-bold" target="_blank">KORMI Kaltim</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                        <li class="nav-item">
                            <a href="<?php echo APP_URL; ?>" class="nav-link text-muted" target="_blank">Website</a>
                        </li>
                        <li class="nav-item">
                            <a href="about.php" class="nav-link text-muted">Tentang</a>
                        </li>
                        <li class="nav-item">
                            <a href="contact.php" class="nav-link text-muted">Kontak</a>
                        </li>
                        <li class="nav-item">
                            <a href="privacy.php" class="nav-link pe-0 text-muted">Privacy Policy</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
</div>

<!-- Core JS Files -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="public/assets/js/core/popper.min.js"></script>
<script src="public/assets/js/core/bootstrap.min.js"></script>
<script src="public/assets/js/plugins/perfect-scrollbar.min.js"></script>
<script src="public/assets/js/plugins/smooth-scrollbar.min.js"></script>
<script src="public/assets/js/plugins/chartjs.min.js"></script>
<script src="public/assets/js/plugins/choices.min.js"></script>
<script src="public/assets/js/plugins/datatables.js"></script>
<script src="public/assets/js/plugins/dropzone.min.js"></script>
<script src="public/assets/js/plugins/jkanban/jkanban.js"></script>
<script src="public/assets/js/plugins/jquery.countup.min.js"></script>
<script src="public/assets/js/plugins/jquery-3.6.0.min.js"></script>
<script src="public/assets/js/plugins/multistep-form.js"></script>
<script src="public/assets/js/plugins/notify.js"></script>
<script src="public/assets/js/plugins/prism.min.js"></script>
<script src="public/assets/js/plugins/quill.min.js"></script>
<script src="public/assets/js/plugins/sweetalert.min.js"></script>
<script src="public/assets/js/plugins/validate.js"></script>
<script src="public/assets/js/plugins/wizard.js"></script>
<script src="public/assets/js/plugins/zoom.js"></script>
<script src="public/assets/js/plugins/leaflet.js"></script>
<script src="public/assets/js/plugins/plugins.js"></script>

<!-- Material Dashboard JS -->
<script src="public/assets/js/material-dashboard.min.js"></script>

<!-- Custom JS -->
<script src="public/assets/js/custom.js"></script>

<script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
</script>

<!-- Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=GA_MEASUREMENT_ID"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag() { dataLayer.push(arguments); }
    gtag('js', new Date());
    gtag('config', 'GA_MEASUREMENT_ID');
</script>

</body>
</html> 