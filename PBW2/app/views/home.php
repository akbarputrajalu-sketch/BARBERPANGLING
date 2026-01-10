<!-- Hero Section -->
<section id="home" class="hero">
    <div class="container">
        <div class="hero-content">
            <div class="hero-text">
                <h1>Gaya Rambut <span class="highlight">Premium</span> untuk Pria Modern</h1>
                <p>Rasakan pengalaman barbershop terbaik dengan layanan profesional dan suasana yang nyaman. Booking sekarang dan dapatkan potongan rambut impian Anda.</p>
                <div class="hero-buttons">
                    <a href="<?php echo BASE_URL; ?>?page=booking" class="btn-primary">Booking Sekarang</a>
                    <a href="<?php echo BASE_URL; ?>?page=services" class="btn-secondary">Lihat Layanan</a>
                </div>
            </div>
            <div class="hero-visual">
                <div class="hero-circle">
                    <img src="<?php echo BASE_URL; ?>public/images/Logo.jpg" alt="Logo Barber Pangling">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<?php include COMPONENTS_PATH . 'services-section.php'; ?>

<!-- Booking Section -->
<?php include COMPONENTS_PATH . 'booking-section.php'; ?>

<?php include COMPONENTS_PATH . 'about-section.php'; ?>

<!-- Contact Section -->
<section id="contact" class="section">
    <div class="container">
        <div class="section-title">
            <h2>Hubungi <span class="highlight">Kami</span></h2>
            <p>Kami siap melayani Anda dengan sepenuh hati</p>
        </div>
        
        <div class="contact-grid">
            <div class="contact-card">
                <div class="contact-icon">📍</div>
                <h3>Alamat</h3>
                <p>Jl. Sipuyuh No. 123<br>Kabupaten Tegal</p>
            </div>
            
            <div class="contact-card">
                <div class="contact-icon">📞</div>
                <h3>Telepon</h3>
                <p>+62 21 1234 5678<br>+62 812 3456 7890</p>
            </div>
            
            <div class="contact-card">
                <div class="contact-icon">⏰</div>
                <h3>Jam Buka</h3>
                <p>Senin - Sabtu: 09:00 - 21:00<br>Minggu: 10:00 - 18:00</p>
            </div>
        </div>
    </div>
</section>

<!-- Map Section -->
<section id="map" class="map-section">
    <div class="container">
        <div class="section-title">
            <h2>Lokasi <span class="highlight">Barber Pangling</span></h2>
            <p>Kunjungi kami di lokasi berikut</p>
        </div>

        <div class="map-wrapper">
            <iframe
                src="https://maps.google.com/maps?q=Jl.%20Sipuyuh%20No.%20123%2C%20Tegal&z=15&output=embed"
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"
                allowfullscreen
            ></iframe>
        </div>
    </div>
</section>
