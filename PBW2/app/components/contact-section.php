<!-- Contact Section (shared component) -->
<section class="section">
    <div class="container">
        <div class="section-title">
            <h2>Hubungi <span class="highlight">Kami</span></h2>
            <p>Kami siap melayani Anda 24/7</p>
        </div>

        <div class="contact-wrapper">
            <div class="contact-info">
                <div class="contact-card">
                    <div class="contact-icon">📍</div>
                    <h3>Alamat</h3>
                    <p>Jl. Sipuyuh No. 123<br>Kabupaten Tegal, Jawa Tengah<br>Indonesia 52114</p>
                </div>

                <div class="contact-card">
                    <div class="contact-icon">📞</div>
                    <h3>Telepon</h3>
                    <p><a href="tel:+62211234567">+62 21 1234 5678</a><br><a href="tel:+6281234567890">+62 812 3456 7890</a></p>
                </div>

                <div class="contact-card">
                    <div class="contact-icon">✉️</div>
                    <h3>Email</h3>
                    <p><a href="mailto:info@barberpangling.com">info@barberpangling.com</a><br><a href="mailto:booking@barberpangling.com">booking@barberpangling.com</a></p>
                </div>

                <div class="contact-card">
                    <div class="contact-icon">⏰</div>
                    <h3>Jam Buka</h3>
                    <p>Senin - Sabtu: 09:00 - 21:00 WIB<br>Minggu: 10:00 - 18:00 WIB<br>Libur Nasional: Buka 12:00 - 18:00</p>
                </div>
            </div>

            <div class="contact-form-wrapper">
                <h3>Kirim Pesan Kami</h3>
                <form class="contact-form" method="POST" action="<?php echo BASE_URL; ?>api/contact.php">
                    <div class="form-group">
                        <input type="text" name="name" placeholder="Nama Anda" required>
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" placeholder="Email Anda" required>
                    </div>
                    <div class="form-group">
                        <input type="tel" name="phone" placeholder="Nomor Telepon" required>
                    </div>
                    <div class="form-group">
                        <textarea name="message" placeholder="Pesan Anda..." rows="5" required></textarea>
                    </div>
                    <button type="submit" class="btn-primary">Kirim Pesan</button>
                </form>
            </div>
        </div>

        <div class="map-section">
            <h3>Lokasi Kami</h3>
            <div class="map-wrapper">
                <iframe
                    src="https://maps.google.com/maps?q=Jl.%20Sipuyuh%20No.%20123%2C%20Tegal&z=15&output=embed"
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                    allowfullscreen
                    style="width: 100%; height: 400px; border: none; border-radius: 8px;"
                ></iframe>
            </div>
        </div>
    </div>
</section>
