/**
 * Payment Page Functionality
 */

document.addEventListener('DOMContentLoaded', function() {
    loadBookingData();
    setupPaymentMethodHandlers();
});

function loadBookingData() {
    const bookingData = JSON.parse(localStorage.getItem('bookingData') || '{}');
    
    document.getElementById('summary-name').textContent = bookingData.name || '-';
    document.getElementById('summary-service').textContent = bookingData.service || '-';
    document.getElementById('summary-barber').textContent = bookingData.barber || '-';
    document.getElementById('summary-date').textContent = bookingData.date || '-';
    document.getElementById('summary-time').textContent = bookingData.time || '-';
    document.getElementById('summary-total').textContent = bookingData.total || 'Rp 0';
}

function setupPaymentMethodHandlers() {
    const radioButtons = document.querySelectorAll('input[name="payment_method"]');
    radioButtons.forEach(radio => {
        radio.addEventListener('change', function() {
            updatePaymentDetails(this.value);
        });
    });
}

function updatePaymentDetails(method) {
    document.querySelectorAll('.payment-detail-content').forEach(el => el.style.display = 'none');
    
    if (method === 'bank_transfer') {
        document.getElementById('bank-details').style.display = 'block';
    } else if (method === 'e_wallet') {
        document.getElementById('wallet-details').style.display = 'block';
    } else if (method === 'cash') {
        document.getElementById('cash-details').style.display = 'block';
    }
}

function processPayment() {
    if (!document.getElementById('terms').checked) {
        alert('Silakan setujui syarat dan ketentuan');
        return;
    }
    
    alert('Pembayaran berhasil diproses! Terima kasih telah booking di Barber Pangling.');
    localStorage.removeItem('bookingData');
    window.location.href = window.location.origin + window.location.pathname + '?page=home';
}
