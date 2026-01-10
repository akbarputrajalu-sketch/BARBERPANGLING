// Main JavaScript for Barber Pangling Booking System
// File ini menangani semua interaksi JavaScript di halaman

(function() {
    'use strict';

    // Get URL parameters
    function getUrlParameter(name) {
        const params = new URLSearchParams(window.location.search);
        return params.get(name);
    }

    // Auto-fill service from URL parameter
    window.addEventListener('load', function() {
        const serviceParam = getUrlParameter('service');
        if (serviceParam) {
            const serviceSelect = document.getElementById('service');
            if (serviceSelect) {
                const serviceMap = {
                    'haircut': 'haircut',
                    'beard': 'beard',
                    'treatment': 'treatment'
                };
                
                if (serviceMap[serviceParam]) {
                    serviceSelect.value = serviceMap[serviceParam];
                    serviceSelect.disabled = true;
                    serviceSelect.style.opacity = '0.7';
                    serviceSelect.style.cursor = 'not-allowed';
                }
            }
        }

        // Capster card selection
        const capsterCards = document.querySelectorAll('.capster-card');
        const capsterRadios = document.querySelectorAll('.capster-radio');

        capsterCards.forEach(card => {
            card.addEventListener('click', function() {
                capsterCards.forEach(c => c.classList.remove('selected'));
                this.classList.add('selected');
                
                const value = this.getAttribute('data-capster');
                const radio = document.querySelector(`input[value="${value}"]`);
                if (radio) {
                    radio.checked = true;
                }
            });
        });

        // Check if radio is already selected on page load
        capsterRadios.forEach(radio => {
            if (radio.checked) {
                const card = document.querySelector(`[data-capster="${radio.value}"]`);
                if (card) {
                    card.classList.add('selected');
                }
            }
        });
    });

    // Form submission handling
    const bookingForm = document.querySelector('.booking-form');
    if (bookingForm) {
        bookingForm.addEventListener('submit', async function(e) {
            e.preventDefault();

            const selectedCapster = document.querySelector('input[name="barber"]:checked');
            if (!selectedCapster) {
                alert('Pilih capster terlebih dahulu!');
                return;
            }

            const serviceSelect = document.getElementById('service');
            if (!serviceSelect.value) {
                alert('Pilih layanan terlebih dahulu!');
                return;
            }

            const capsterValue = selectedCapster.value;
            const capsterCard = document.querySelector(`[data-capster="${capsterValue}"]`);
            const capsterName = capsterCard ? capsterCard.querySelector('h3').textContent : selectedCapster.value;

            const priceMap = {
                'haircut': 75000,
                'beard': 50000,
                'treatment': 100000,
                'combo': 120000
            };

            const bookingData = {
                name: document.getElementById('name').value,
                phone: document.getElementById('phone').value,
                service: serviceSelect.value,
                capster: capsterName,
                date: document.getElementById('date').value,
                time: document.getElementById('time').value,
                notes: document.getElementById('notes').value || '',
                totalPrice: priceMap[serviceSelect.value] || 0
            };

            try {
                const resp = await fetch('http://localhost:5000/api/booking/create', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify(bookingData)
                });
                const result = await resp.json();
                if (result && result.success) {
                    localStorage.setItem('bookingData', JSON.stringify(result.data));
                    window.location.href = `payment.html?bookingId=${result.data.id}`;
                } else {
                    alert('Gagal membuat booking: ' + (result.message || 'Unknown error'));
                }
            } catch (err) {
                console.error('Error creating booking:', err);
                alert('Terjadi kesalahan saat mengirim booking. Coba lagi.');
            }
        });
    }
})();
