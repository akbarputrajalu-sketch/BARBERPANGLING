<?php

$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
$host = $_SERVER['HTTP_HOST'];
$basePath = str_replace(basename(__FILE__), '', $_SERVER['PHP_SELF']);
define('BASE_URL', $protocol . '://' . $host . $basePath);

define('APP_PATH', __DIR__ . '/');
define('PUBLIC_PATH', APP_PATH . 'public/');
define('VIEWS_PATH', APP_PATH . 'app/views/');
define('COMPONENTS_PATH', APP_PATH . 'app/components/');

// ===== AUTO-LOAD DEPENDENCIES =====
require_once APP_PATH . 'app/config/database.php';

// ===== ROUTING & PAGE HANDLING =====
$page = isset($_GET['page']) ? sanitizeInput($_GET['page']) : 'home';

// Whitelist available pages
$available_pages = [
    'home'     => 'Beranda',
    'services' => 'Layanan',
    'booking'  => 'Booking',
    'payment'  => 'Pembayaran',
    'about'    => 'Tentang',
    'contact'  => 'Kontak'
];

// Default to home if page not found
if (!array_key_exists($page, $available_pages)) {
    $page = 'home';
}

$page_title = $available_pages[$page];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title; ?> - Barber Pangling</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Main Styles -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/css/styles.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/css/navbar.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/css/footer.css">
    
    <!-- Page-specific CSS -->
    <?php
    $page_css = PUBLIC_PATH . "css/{$page}.css";
    if (file_exists($page_css)) {
        echo '<link rel="stylesheet" href="' . BASE_URL . 'public/css/' . $page . '.css">' . PHP_EOL;
    }
    ?>
</head>
<body>
    <!-- ===== NAVBAR COMPONENT ===== -->
    <?php include COMPONENTS_PATH . 'navbar.php'; ?>

    <!-- ===== MAIN CONTENT ===== -->
    <main class="main-content">
        <?php
        // Load view berdasarkan page yang dipilih
        $view_file = VIEWS_PATH . $page . '.php';
        if (file_exists($view_file)) {
            include $view_file;
        } else {
            // Fallback ke home jika view tidak ditemukan
            include VIEWS_PATH . 'home.php';
        }
        ?>
    </main>

    <!-- ===== FOOTER COMPONENT ===== -->
    <?php include COMPONENTS_PATH . 'footer.php'; ?>

    <!-- ===== SCRIPTS ===== -->
    <!-- Main JavaScript -->
    <script src="<?php echo BASE_URL; ?>public/js/main.js"></script>
    
    <!-- Page-specific JavaScript -->
    <?php
    $page_js = PUBLIC_PATH . "js/{$page}.js";
    if (file_exists($page_js)) {
        echo '<script src="' . BASE_URL . 'public/js/' . $page . '.js"></script>' . PHP_EOL;
    }
    ?>
</body>
</html>
