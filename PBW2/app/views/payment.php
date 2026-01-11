<!-- Payment/Booking View -->
<section class="section">
    <div class="container">
        <div class="section-title">
            <h2>Konfirmasi <span class="highlight">Pembayaran</span></h2>
            <p>Selesaikan booking Anda dengan melakukan pembayaran</p>
        </div>

        <div class="payment-wrapper">
            <div class="booking-summary">
                <h3>📋 Ringkasan Booking</h3>
                <div class="summary-item">
                    <span>Nama:</span>
                    <strong id="summary-name">-</strong>
                </div>
                <div class="summary-item">
                    <span>Layanan:</span>
                    <strong id="summary-service">-</strong>
                </div>
                <div class="summary-item">
                    <span>Capster:</span>
                    <strong id="summary-barber">-</strong>
                </div>
                <div class="summary-item">
                    <span>Tanggal:</span>
                    <strong id="summary-date">-</strong>
                </div>
                <div class="summary-item">
                    <span>Waktu:</span>
                    <strong id="summary-time">-</strong>
                </div>
                <div class="summary-item total">
                    <span>Total:</span>
                    <strong id="summary-total">Rp 0</strong>
                </div>
            </div>

            <div class="payment-methods">
                <h3>💳 Pilih Metode Pembayaran</h3>
                
                <div class="payment-option">
                    <input type="radio" id="payment-transfer" name="payment_method" value="bank_transfer" checked>
                    <label for="payment-transfer">
                        <span class="icon">🏦</span>
                        <span class="label">Transfer Bank</span>
                        <span class="desc">Transfer langsung ke rekening kami</span>
                    </label>
                </div>

                <div class="payment-option">
                    <input type="radio" id="payment-wallet" name="payment_method" value="e_wallet">
                    <label for="payment-wallet">
                        <span class="icon">📱</span>
                        <span class="label">E-Wallet</span>
                        <span class="desc">GCash, PayMaya, OVO, Dana</span>
                    </label>
                </div>

                <div class="payment-option">
                    <input type="radio" id="payment-cash" name="payment_method" value="cash">
                    <label for="payment-cash">
                        <span class="icon">💵</span>
                        <span class="label">Bayar di Tempat</span>
                        <span class="desc">Bayar saat tiba di barber</span>
                    </label>
                </div>
            </div>

            <div class="payment-details">
                <h3>📝 Detail Pembayaran</h3>
                
                <div id="bank-details" class="payment-detail-content">
                    <p><strong>Nama Bank:</strong> BCA</p>
                    <p><strong>Nomor Rekening:</strong> 1234567890</p>
                    <p><strong>Atas Nama:</strong> Barber Pangling</p>
                </div>

                <div id="wallet-details" class="payment-detail-content" style="display:none;">
                    <p><strong>Dana:</strong> 0896-1234-5678</p>
                    <p><strong>OVO:</strong> 0896-1234-5678</p>
                    <p><strong>GCash:</strong> 09171234567</p>
                </div>

                <div id="cash-details" class="payment-detail-content" style="display:none;">
                    <p>Silakan datang ke barber kami pada waktu yang telah ditentukan dan bayar langsung.</p>
                </div>
            </div>

            <div class="terms-and-conditions">
                <label>
                    <input type="checkbox" id="terms" required>
                    <span>Saya setuju dengan syarat dan ketentuan</span>
                </label>
            </div>

            <button class="btn-primary btn-large" onclick="processPayment()">Konfirmasi Pembayaran</button>
        </div>
    </div>
</section>
