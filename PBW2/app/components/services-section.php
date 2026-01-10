<!-- Services Section Grid Container -->
<section id="services" class="section">
    <div class="container">
        <div class="section-title">
            <h2>Layanan <span class="highlight">Premium</span></h2>
            <p>Pilihan layanan terbaik untuk penampilan sempurna Anda</p>
        </div>
        
        <div class="services-grid">
            <!-- Haircut Premium Service -->
            <a href="<?php echo BASE_URL; ?>?page=services#haircut" class="service-card service-card-link">
                <div class="service-icon">✂️</div>
                <h3>Haircut Premium</h3>
                <p>Potongan rambut profesional dengan teknik modern dan gaya terkini</p>
                <div class="service-price">Rp 75.000</div>
            </a>

            <!-- Beard Styling Service -->
            <a href="<?php echo BASE_URL; ?>?page=services#beard" class="service-card service-card-link">
                <div class="service-icon">🧔</div>
                <h3>Beard Styling</h3>
                <p>Perawatan dan styling jenggot untuk tampilan maskulin yang sempurna</p>
                <div class="service-price">Rp 50.000</div>
            </a>

            <!-- Hair Treatment Service -->
            <a href="<?php echo BASE_URL; ?>?page=services#treatment" class="service-card service-card-link">
                <div class="service-icon">💆</div>
                <h3>Hair Treatment</h3>
                <p>Perawatan rambut lengkap dengan produk premium untuk kesehatan rambut</p>
                <div class="service-price">Rp 100.000</div>
            </a>
        </div>
    </div>
</section>

<!-- Services Detailed Articles (for services page) -->
<section class="section service-details">
    <div class="container">
        <!-- Haircut Premium -->
        <article id="haircut" class="service-detail">
            <div class="service-detail-header">
                <h2>✂️ Haircut Premium</h2>
                <span class="price">Rp 75.000</span>
            </div>
            <p>Potongan rambut profesional dengan teknik modern dan gaya terkini. Dipangani oleh barber berpengalaman dengan kepekaan terhadap bentuk wajah Anda.</p>
            <ul>
                <li>Konsultasi gaya rambut gratis</li>
                <li>Menggunakan gunting dan mesin profesional</li>
                <li>Durasi: 45 menit</li>
                <li>Included: Styling dan finishing</li>
            </ul>
            <a href="<?php echo BASE_URL; ?>?page=booking" class="btn-primary">Pesan Sekarang</a>
        </article>

        <!-- Beard Styling -->
        <article id="beard" class="service-detail">
            <div class="service-detail-header">
                <h2>🧔 Beard Styling</h2>
                <span class="price">Rp 50.000</span>
            </div>
            <p>Perawatan dan styling jenggot untuk tampilan maskulin yang sempurna. Kami menggunakan produk premium untuk menjaga kesehatan dan ketebalan jenggot Anda.</p>
            <ul>
                <li>Trim dan shape profesional</li>
                <li>Beard oil treatment</li>
                <li>Durasi: 30 menit</li>
                <li>Konsultasi free</li>
            </ul>
            <a href="<?php echo BASE_URL; ?>?page=booking" class="btn-primary">Pesan Sekarang</a>
        </article>

        <!-- Hair Treatment -->
        <article id="treatment" class="service-detail">
            <div class="service-detail-header">
                <h2>💆 Hair Treatment</h2>
                <span class="price">Rp 100.000</span>
            </div>
            <p>Perawatan rambut lengkap dengan produk premium untuk kesehatan rambut maksimal. Termasuk conditioning dan massage untuk relaksasi.</p>
            <ul>
                <li>Scalp treatment profesional</li>
                <li>Hair mask premium</li>
                <li>Massage therapy</li>
                <li>Durasi: 60 menit</li>
            </ul>
            <a href="<?php echo BASE_URL; ?>?page=booking" class="btn-primary">Pesan Sekarang</a>
        </article>
    </div>
</section>
