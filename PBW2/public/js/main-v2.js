/**
 * ===================================================
 * BARBER PANGLING - Main JavaScript (v2.0)
 * ===================================================
 * Core functionality untuk semua halaman
 * Modular structure dengan PHP routing
 */

// ===== INITIALIZATION =====
document.addEventListener('DOMContentLoaded', function() {
    initializeApp();
});

function initializeApp() {
    console.log('🎉 Barber Pangling App Initialized');
    
    // Setup all event handlers
    setupMobileMenu();
    setupBookingForm();
    setupSmoothScroll();
    setupCapsterSelection();
}

// ===== MOBILE MENU =====
function setupMobileMenu() {
    const mobileMenuToggle = document.getElementById('mobile-menu-toggle');
    const navMenu = document.querySelector('.nav-menu');
    
    if (mobileMenuToggle) {
        mobileMenuToggle.addEventListener('change', function() {
            if (this.checked) {
                console.log('📱 Mobile menu opened');
            }
        });

        // Close menu when link clicked
        if (navMenu) {
            navMenu.querySelectorAll('a').forEach(link => {
                link.addEventListener('click', () => {
                    mobileMenuToggle.checked = false;
                });
            });
        }
    }
}

// ===== SMOOTH SCROLLING =====
function setupSmoothScroll() {
    document.querySelectorAll('a[href*="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            const href = this.getAttribute('href');
            
            // Check if link contains hash
            if (href !== '#' && href.includes('#')) {
                // Get the hash part
                const hashPart = href.substring(href.indexOf('#'));
                const target = document.querySelector(hashPart);
                
                if (target && !href.includes('?')) {
                    e.preventDefault();
                    target.scrollIntoView({ 
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            }
        });
    });
}

// ===== CAPSTER SELECTION =====
function setupCapsterSelection() {
    const capsterCards = document.querySelectorAll('.capster-card');
    
    capsterCards.forEach(card => {
        card.addEventListener('click', function(e) {
            // Prevent radio from being toggled by card click
            if (e.target.tagName === 'INPUT') return;
            
            // Remove active class from all cards
            capsterCards.forEach(c => c.classList.remove('active', 'selected'));
            
            // Add active class to clicked card
            this.classList.add('active');
            
            // Check the radio button
            const radio = this.querySelector('.capster-radio');
            if (radio) {
                radio.checked = true;
            }
            
            console.log('✨ Selected capster:', this.dataset.capster);
        });

        // Add keyboard support
        card.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                const radio = this.querySelector('.capster-radio');
                if (radio) radio.click();
            }
        });
    });

    // Also handle radio button selection
    document.querySelectorAll('.capster-radio').forEach(radio => {
        radio.addEventListener('change', function() {
            if (this.checked) {
                const card = this.closest('.capster-card');
                capsterCards.forEach(c => c.classList.remove('active'));
                if (card) card.classList.add('active');
            }
        });
    });
}

// ===== BOOKING FORM HANDLER =====
function setupBookingForm() {
    const bookingForm = document.querySelector('.booking-form');
    if (!bookingForm) return;

    bookingForm.addEventListener('submit', function(e) {
        e.preventDefault();

        // Validate form
        if (!validateBookingForm()) {
            showNotification('Mohon isi semua field yang diperlukan', 'error');
            return;
        }

        // Collect form data
        const serviceSelect = document.getElementById('service');
        const serviceLabel = serviceSelect.options[serviceSelect.selectedIndex].text;

        const bookingData = {
            name: sanitizeInput(document.getElementById('name').value),
            phone: sanitizeInput(document.getElementById('phone').value),
            service: serviceLabel,
            barber: document.querySelector('input[name="barber"]:checked')?.value || 'Tidak dipilih',
            date: document.getElementById('date').value,
            time: document.getElementById('time').value,
            notes: sanitizeInput(document.getElementById('notes').value || ''),
            timestamp: new Date().toISOString()
        };

        // Calculate price
        const priceMap = {
            'haircut': 'Rp 75.000',
            'beard': 'Rp 50.000',
            'treatment': 'Rp 100.000',
            'combo': 'Rp 120.000'
        };
        
        const serviceKey = document.getElementById('service').value;
        bookingData.total = priceMap[serviceKey] || 'Rp 0';

        // Save to localStorage
        localStorage.setItem('bookingData', JSON.stringify(bookingData));
        console.log('✅ Booking saved to localStorage:', bookingData);

        // Submit form to server (POST to current page for backend CRUD)
        bookingForm.submit();
    });
}

// ===== VALIDATION =====
function validateBookingForm() {
    const name = document.getElementById('name')?.value?.trim();
    const phone = document.getElementById('phone')?.value?.trim();
    const service = document.getElementById('service')?.value;
    const date = document.getElementById('date')?.value;
    const time = document.getElementById('time')?.value;
    const barber = document.querySelector('input[name="barber"]:checked');

    if (!name || !phone || !service || !date || !time || !barber) {
        return false;
    }

    // Validate phone format
    if (!/^(\+62|0)[0-9]{9,12}$/.test(phone)) {
        console.warn('Invalid phone format');
        return false;
    }

    return true;
}

// ===== UTILITY FUNCTIONS =====

/**
 * Sanitize input to prevent XSS
 */
function sanitizeInput(input) {
    const div = document.createElement('div');
    div.textContent = input;
    return div.innerHTML;
}

/**
 * Format currency to Rupiah
 */
function formatRupiah(amount) {
    return new Intl.NumberFormat('id-ID', {
        style: 'currency',
        currency: 'IDR',
        minimumFractionDigits: 0
    }).format(amount);
}

/**
 * Get URL parameter
 */
function getUrlParameter(name) {
    const params = new URLSearchParams(window.location.search);
    return params.get(name);
}

/**
 * Show notification toast
 */
function showNotification(message, type = 'success', duration = 3000) {
    const notif = document.createElement('div');
    notif.className = `notification notification-${type}`;
    notif.textContent = message;
    
    const bgColor = type === 'success' ? '#2D9C4F' : 
                    type === 'error' ? '#ff6b6b' : 
                    '#ffc107';

    notif.style.cssText = `
        position: fixed;
        top: 20px;
        right: 20px;
        padding: 1rem 1.5rem;
        background: ${bgColor};
        color: white;
        border-radius: 4px;
        z-index: 10000;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
        font-weight: 500;
        max-width: 400px;
        animation: slideIn 0.3s ease;
    `;
    
    const style = document.createElement('style');
    if (!document.querySelector('style[data-notification]')) {
        style.setAttribute('data-notification', 'true');
        style.textContent = `
            @keyframes slideIn {
                from {
                    transform: translateX(400px);
                    opacity: 0;
                }
                to {
                    transform: translateX(0);
                    opacity: 1;
                }
            }
        `;
        document.head.appendChild(style);
    }
    
    document.body.appendChild(notif);
    
    setTimeout(() => {
        notif.style.animation = 'slideIn 0.3s ease reverse';
        setTimeout(() => notif.remove(), 300);
    }, duration);
}

// ===== CONSOLE LOGGING =====
console.log('%c🎨 Barber Pangling v2.0', 'color: #2D9C4F; font-size: 16px; font-weight: bold;');
console.log('%cPHP Modular Structure | Routing System Active', 'color: #4CAF7F; font-size: 12px;');
