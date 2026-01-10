<!-- Booking Form - Complete Form Section -->
<section id="booking" class="section">
    <div class="container">
        <div class="section-title">
            <h2>Booking <span class="highlight">Online</span></h2>
            <p>Reservasi mudah dan cepat untuk pengalaman barbershop terbaik</p>
        </div>
        
        <form class="booking-form" action="<?php echo BASE_URL; ?>?page=booking" method="post">
            <input type="hidden" name="id" value="<?php echo isset($editingBooking['id']) ? (int)$editingBooking['id'] : ''; ?>">
            <!-- Personal Information -->
            <div class="form-grid">
                <div class="form-group">
                    <label for="name">Nama Lengkap</label>
                    <input type="text" id="name" name="nama" value="<?php echo isset($editingBooking['nama']) ? htmlspecialchars($editingBooking['nama'], ENT_QUOTES) : ''; ?>" required>
                </div>
                <div class="form-group">
                    <label for="phone">Nomor Telepon</label>
                    <input type="tel" id="phone" name="No_telepon" value="<?php echo isset($editingBooking['No_telepon']) ? htmlspecialchars($editingBooking['No_telepon'], ENT_QUOTES) : ''; ?>" required>
                </div>
            </div>

            <!-- Service Selection -->
            <div class="form-grid">
                <div class="form-group">
                    <label for="service">Pilih Layanan</label>
                    <select id="service" name="layanan" required>
                        <option value="">Pilih Layanan</option>
                        <option value="haircut" <?php echo (isset($editingBooking['layanan']) && $editingBooking['layanan'] === 'haircut') ? 'selected' : ''; ?>>Haircut Premium - Rp 75.000</option>
                        <option value="beard" <?php echo (isset($editingBooking['layanan']) && $editingBooking['layanan'] === 'beard') ? 'selected' : ''; ?>>Beard Styling - Rp 50.000</option>
                        <option value="treatment" <?php echo (isset($editingBooking['layanan']) && $editingBooking['layanan'] === 'treatment') ? 'selected' : ''; ?>>Hair Treatment - Rp 100.000</option>
                        <option value="combo" <?php echo (isset($editingBooking['layanan']) && $editingBooking['layanan'] === 'combo') ? 'selected' : ''; ?>>Haircut + Beard - Rp 120.000</option>
                    </select>
                </div>
            </div>

            <!-- Capster Selection -->
            <div class="form-group full-width">
                <label>Pilih Capster / Tukang Cukur</label>
                <div class="capster-grid">
                    <div class="capster-card" data-capster="fitron">
                        <div class="capster-image">
                            <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=300&h=300&fit=crop" alt="Fitron">
                        </div>
                        <div class="capster-info">
                            <h3>Fitron</h3>
                            <p class="capster-title">Senior Barber</p>
                            <p class="capster-desc">Expert dengan 8+ tahun pengalaman</p>
                            <div class="capster-rating">⭐ 4.9/5</div>
                        </div>
                        <input type="radio" name="barber" value="fitron" class="capster-radio" <?php echo (isset($editingBooking['Capster']) && $editingBooking['Capster'] === 'fitron') ? 'checked' : ''; ?>>
                    </div>

                    <div class="capster-card" data-capster="widi">
                        <div class="capster-image">
                            <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=300&h=300&fit=crop" alt="Widi">
                        </div>
                        <div class="capster-info">
                            <h3>Widi</h3>
                            <p class="capster-title">Master Barber</p>
                            <p class="capster-desc">Spesialis fade dan modern style</p>
                            <div class="capster-rating">⭐ 4.8/5</div>
                        </div>
                        <input type="radio" name="barber" value="widi" class="capster-radio" <?php echo (isset($editingBooking['Capster']) && $editingBooking['Capster'] === 'widi') ? 'checked' : ''; ?>>
                    </div>

                    <div class="capster-card" data-capster="bayu">
                        <div class="capster-image">
                            <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=300&h=300&fit=crop" alt="Bayu">
                        </div>
                        <div class="capster-info">
                            <h3>Bayu</h3>
                            <p class="capster-title">Expert Stylist</p>
                            <p class="capster-desc">Ahli beard grooming dan styling</p>
                            <div class="capster-rating">⭐ 4.7/5</div>
                        </div>
                        <input type="radio" name="barber" value="bayu" class="capster-radio" <?php echo (isset($editingBooking['Capster']) && $editingBooking['Capster'] === 'bayu') ? 'checked' : ''; ?>>
                    </div>

                    <div class="capster-card" data-capster="wawan">
                        <div class="capster-image">
                            <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=300&h=300&fit=crop" alt="Wawan">
                        </div>
                        <div class="capster-info">
                            <h3>Wawan</h3>
                            <p class="capster-title">Expert Stylist</p>
                            <p class="capster-desc">Profesional dengan teknik terbaru</p>
                            <div class="capster-rating">⭐ 4.9/5</div>
                        </div>
                        <input type="radio" name="barber" value="wawan" class="capster-radio" <?php echo (isset($editingBooking['Capster']) && $editingBooking['Capster'] === 'wawan') ? 'checked' : ''; ?>>
                    </div>
                </div>
            </div>

            <!-- Date & Time Selection -->
            <div class="form-grid">
                <div class="form-group">
                    <label for="date">Tanggal</label>
                    <input type="date" id="date" name="date" value="<?php echo isset($editingBooking['Tanggal']) ? htmlspecialchars(substr($editingBooking['Tanggal'],0,10), ENT_QUOTES) : ''; ?>" required>
                </div>
                <div class="form-group">
                    <label for="time">Waktu</label>
                    <select id="time" name="time" required>
                        <option value="">Pilih Waktu</option>
                        <option value="09:00" <?php echo (isset($editingBooking['Tanggal']) && strpos($editingBooking['Tanggal'], '09:00') !== false) ? 'selected' : ''; ?>>09:00 WIB</option>
                        <option value="10:00" <?php echo (isset($editingBooking['Tanggal']) && strpos($editingBooking['Tanggal'], '10:00') !== false) ? 'selected' : ''; ?>>10:00 WIB</option>
                        <option value="11:00" <?php echo (isset($editingBooking['Tanggal']) && strpos($editingBooking['Tanggal'], '11:00') !== false) ? 'selected' : ''; ?>>11:00 WIB</option>
                        <option value="13:00" <?php echo (isset($editingBooking['Tanggal']) && strpos($editingBooking['Tanggal'], '13:00') !== false) ? 'selected' : ''; ?>>13:00 WIB</option>
                        <option value="14:00" <?php echo (isset($editingBooking['Tanggal']) && strpos($editingBooking['Tanggal'], '14:00') !== false) ? 'selected' : ''; ?>>14:00 WIB</option>
                        <option value="15:00" <?php echo (isset($editingBooking['Tanggal']) && strpos($editingBooking['Tanggal'], '15:00') !== false) ? 'selected' : ''; ?>>15:00 WIB</option>
                        <option value="16:00" <?php echo (isset($editingBooking['Tanggal']) && strpos($editingBooking['Tanggal'], '16:00') !== false) ? 'selected' : ''; ?>>16:00 WIB</option>
                        <option value="17:00" <?php echo (isset($editingBooking['Tanggal']) && strpos($editingBooking['Tanggal'], '17:00') !== false) ? 'selected' : ''; ?>>17:00 WIB</option>
                    </select>
                </div>
            </div>

            <!-- Notes -->
            <div class="form-group full-width">
                <label for="notes">Catatan Khusus (Opsional)</label>
                <textarea id="notes" name="notes" placeholder="Tambahkan permintaan khusus atau catatan..."><?php echo isset($editingBooking['notes']) ? htmlspecialchars($editingBooking['notes'], ENT_QUOTES) : ''; ?></textarea>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn-primary form-submit">
                Konfirmasi Booking
            </button>

            <div class="success-message">
                ✅ Booking berhasil dikirim! Kami akan menghubungi Anda segera untuk konfirmasi.
            </div>
        </form>
    </div>
</section>
