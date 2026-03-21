// LuxeMachinery - Custom JavaScript

document.addEventListener('DOMContentLoaded', function() {
    // Initialize all functions
    initMobileMenu();
    initSmoothScroll();
    initProductCards();
    initTestimonialSlider();
    initCounters();
    initGallery();
    initContactForm();
    initBackToTop();
    initParallax();
    initMicroInteractions();
});

// Mobile Menu Toggle
function initMobileMenu() {
    const menuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');
    const bars = document.querySelectorAll('#mobile-menu-button span');
    let menuOpen = false;
    
    if (menuButton) {
        menuButton.addEventListener('click', function() {
            menuOpen = !menuOpen;
            
            if (menuOpen) {
                mobileMenu.classList.remove('-translate-x-full');
                mobileMenu.classList.add('translate-x-0');
                // Animate to X
                bars[0].style.transform = 'rotate(45deg) translate(5px, 6px)';
                bars[1].style.opacity = '0';
                bars[2].style.width = '2rem';
                bars[2].style.transform = 'rotate(-45deg) translate(5px, -6px)';
            } else {
                mobileMenu.classList.remove('translate-x-0');
                mobileMenu.classList.add('-translate-x-full');
                // Reset
                bars[0].style.transform = 'none';
                bars[1].style.opacity = '1';
                bars[2].style.width = '0';
                bars[2].style.transform = 'none';
            }
        });
        
        // Close menu on link click
        document.querySelectorAll('.mobile-nav-link').forEach(link => {
            link.addEventListener('click', function() {
                mobileMenu.classList.remove('translate-x-0');
                mobileMenu.classList.add('-translate-x-full');
                bars[0].style.transform = 'none';
                bars[1].style.opacity = '1';
                bars[2].style.width = '0';
                bars[2].style.transform = 'none';
                menuOpen = false;
            });
        });
    }
}

// Smooth Scrolling
function initSmoothScroll() {
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
}

// Product Cards Interaction
function initProductCards() {
    const cards = document.querySelectorAll('.product-card');
    
    cards.forEach(card => {
        const img = card.querySelector('img');
        
        card.addEventListener('mouseenter', function() {
            // Image zoom effect
            if (img) {
                img.style.transform = 'scale(1.05)';
                img.style.transition = 'transform 0.8s ease';
            }
            
            // Tag animation
            const tag = card.querySelector('.product-tag');
            if (tag) {
                tag.style.transform = 'scale(1.1)';
                tag.style.transition = 'transform 0.3s ease';
            }
        });
        
        card.addEventListener('mouseleave', function() {
            // Reset image
            if (img) {
                img.style.transform = 'scale(1)';
            }
            
            // Reset tag
            const tag = card.querySelector('.product-tag');
            if (tag) {
                tag.style.transform = 'scale(1)';
            }
        });
    });
}

// Testimonial Slider
function initTestimonialSlider() {
    const slider = document.getElementById('testimonial-slider');
    if (slider) {
        let currentSlide = 0;
        const slides = slider.querySelectorAll('.testimonial-slide');
        const dots = slider.querySelectorAll('.testimonial-dot');
        
        function showSlide(index) {
            slides.forEach((slide, i) => {
                slide.style.transform = `translateX(${100 * (i - index)}%)`;
                slide.style.opacity = i === index ? '1' : '0.5';
            });
            
            dots.forEach((dot, i) => {
                dot.classList.toggle('bg-black', i === index);
                dot.classList.toggle('bg-gray-300', i !== index);
            });
            
            currentSlide = index;
        }
        
        // Auto slide
        setInterval(() => {
            showSlide((currentSlide + 1) % slides.length);
        }, 5000);
        
        // Dot click events
        dots.forEach((dot, index) => {
            dot.addEventListener('click', () => showSlide(index));
        });
    }
}

// Counter Animation for Stats
function initCounters() {
    const counters = document.querySelectorAll('.stat-number');
    
    counters.forEach(counter => {
        const target = parseInt(counter.textContent.replace('+', ''));
        const increment = target / 50;
        let current = 0;
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const updateCounter = () => {
                        if (current < target) {
                            current += increment;
                            counter.textContent = Math.ceil(current) + '+';
                            setTimeout(updateCounter, 30);
                        } else {
                            counter.textContent = target + '+';
                        }
                    };
                    updateCounter();
                    observer.unobserve(entry.target);
                }
            });
        });
        
        observer.observe(counter);
    });
}

// Gallery Filtering
function initGallery() {
    const filterButtons = document.querySelectorAll('.gallery-filter');
    const galleryItems = document.querySelectorAll('.gallery-item');
    
    if (filterButtons.length > 0) {
        filterButtons.forEach(button => {
            button.addEventListener('click', function() {
                // Remove active class from all buttons
                filterButtons.forEach(btn => {
                    btn.classList.remove('active', 'text-black');
                    btn.classList.add('text-gray-600');
                    btn.classList.remove('border-black');
                });
                
                // Add active class to clicked button
                this.classList.add('active', 'text-black');
                this.classList.remove('text-gray-600');
                this.classList.add('border-black');
                
                const filter = this.dataset.filter;
                
                // Filter gallery items
                galleryItems.forEach(item => {
                    if (filter === 'all' || item.dataset.category === filter) {
                        item.style.display = 'block';
                        setTimeout(() => {
                            item.style.opacity = '1';
                            item.style.transform = 'scale(1)';
                        }, 10);
                    } else {
                        item.style.opacity = '0';
                        item.style.transform = 'scale(0.8)';
                        setTimeout(() => {
                            item.style.display = 'none';
                        }, 300);
                    }
                });
            });
        });
    }
}

// Contact Form Handling
function initContactForm() {
    const contactForm = document.getElementById('contact-form');
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Form validation
            const formData = new FormData(this);
            let isValid = true;
            
            // Simple validation
            this.querySelectorAll('[required]').forEach(field => {
                if (!field.value.trim()) {
                    isValid = false;
                    field.classList.add('border-red-500');
                } else {
                    field.classList.remove('border-red-500');
                }
            });
            
            if (!isValid) {
                alert('Please fill in all required fields.');
                return;
            }
            
            // Show loading state
            const submitBtn = this.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;
            submitBtn.innerHTML = `
                <span class="flex items-center justify-center">
                    <div class="loading-dots">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </span>
            `;
            submitBtn.disabled = true;
            
            // Simulate form submission
            setTimeout(() => {
                // Reset form
                contactForm.reset();
                
                // Reset button
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
                
                // Show success message
                alert('Thank you! Your message has been sent successfully. We will contact you within 24 hours.');
            }, 1500);
        });
    }
}

// Back to Top Button
function initBackToTop() {
    const backToTop = document.getElementById('back-to-top');
    
    if (backToTop) {
        window.addEventListener('scroll', function() {
            if (window.scrollY > 500) {
                backToTop.classList.remove('opacity-0', 'invisible');
                backToTop.classList.add('opacity-100', 'visible');
            } else {
                backToTop.classList.remove('opacity-100', 'visible');
                backToTop.classList.add('opacity-0', 'invisible');
            }
        });
        
        backToTop.addEventListener('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    }
}

// Parallax Effects
function initParallax() {
    let lastScrollTop = 0;
    
    window.addEventListener('scroll', function() {
        const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        
        // Navbar background on scroll
        const nav = document.querySelector('nav');
        if (scrollTop > 100) {
            nav.style.backgroundColor = 'rgba(255, 255, 255, 0.98)';
            nav.style.backdropFilter = 'blur(10px)';
        } else {
            nav.style.backgroundColor = 'rgba(255, 255, 255, 0.95)';
            nav.style.backdropFilter = 'blur(5px)';
        }
        
        lastScrollTop = scrollTop;
    });
}

// Micro-interactions
function initMicroInteractions() {
    // Button hover effects
    const buttons = document.querySelectorAll('.btn-primary, .btn-secondary');
    buttons.forEach(button => {
        button.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-2px)';
        });
        
        button.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });
    
    // Social icons animation
    const socialIcons = document.querySelectorAll('.social-icon');
    socialIcons.forEach(icon => {
        icon.addEventListener('mouseenter', function() {
            this.style.transform = 'rotate(360deg)';
            this.style.transition = 'transform 0.6s ease';
        });
        
        icon.addEventListener('mouseleave', function() {
            this.style.transform = 'rotate(0deg)';
        });
    });
}






/* === GALLERY SPECIFIC STYLES === */

/* Filter Button Animation */
.gallery-filter {
    position: relative;
    overflow: hidden;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    transform: translateY(0);
}

.gallery-filter::before {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    width: 0;
    height: 0;
    background: radial-gradient(circle, rgba(0,0,0,0.1) 0%, transparent 70%);
    border-radius: 50%;
    transform: translate(-50%, -50%);
    transition: width 0.6s ease-out, height 0.6s ease-out;
}

.gallery-filter:hover::before {
    width: 300px;
    height: 300px;
}

.gallery-filter.active {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
}

/* Gallery Card Animations */
.gallery-card {
    opacity: 0;
    transform: translateY(30px) scale(0.95);
    animation: cardAppear 0.8s cubic-bezier(0.4, 0, 0.2, 1) forwards;
    animation-delay: calc(var(--delay) * 0.1s);
}

@keyframes cardAppear {
    to {
        opacity: 1;
        transform: translateY(0) scale(1);
    }
}

.gallery-card::before {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(45deg, transparent 40%, rgba(255,255,255,0.1) 50%, transparent 60%);
    background-size: 300% 300%;
    opacity: 0;
    transition: opacity 0.6s;
    z-index: 1;
}

.gallery-card:hover::before {
    opacity: 1;
    animation: shimmer 2s infinite;
}

@keyframes shimmer {
    0% { background-position: -100% -100%; }
    100% { background-position: 200% 200%; }
}

/* Image Zoom Effect */
.gallery-card .img-container {
    overflow: hidden;
    position: relative;
}

.gallery-card img {
    transition: transform 1.2s cubic-bezier(0.2, 0.8, 0.2, 1);
    will-change: transform;
}

.gallery-card:hover img {
    transform: scale(1.15) rotate(1deg);
}

/* Overlay Animation */
.overlay-content {
    transform: translateY(100%);
    transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);
    will-change: transform;
}

.gallery-card:hover .overlay-content {
    transform: translateY(0);
}

/* Category Badge Animation */
.category-badge {
    transform: translateX(-20px);
    opacity: 0;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
}

.gallery-card:hover .category-badge {
    transform: translateX(0);
    opacity: 1;
}

/* Lightbox Animations */
.lightbox-enter {
    animation: lightboxFadeIn 0.4s cubic-bezier(0.4, 0, 0.2, 1) forwards;
}

@keyframes lightboxFadeIn {
    from {
        opacity: 0;
        backdrop-filter: blur(0);
    }
    to {
        opacity: 1;
        backdrop-filter: blur(10px);
    }
}

.lightbox-content {
    animation: contentScaleIn 0.5s cubic-bezier(0.34, 1.56, 0.64, 1) forwards;
}

@keyframes contentScaleIn {
    from {
        opacity: 0;
        transform: scale(0.8) translateY(20px);
    }
    to {
        opacity: 1;
        transform: scale(1) translateY(0);
    }
}

/* Lightbox Navigation Button Effects */
.lightbox-nav-btn {
    transform: scale(0.9);
    opacity: 0.7;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

.lightbox-nav-btn:hover {
    transform: scale(1.1);
    opacity: 1;
}

/* Floating Animation for Category Badge */
@keyframes floatBadge {
    0%, 100% { transform: translateY(0) rotate(0); }
    50% { transform: translateY(-5px) rotate(2deg); }
}

.gallery-card .category-badge {
    animation: floatBadge 3s ease-in-out infinite;
}

/* Grid Item Stagger Animation */
.gallery-item {
    --delay: 0;
}

.gallery-item:nth-child(1) { --delay: 1; }
.gallery-item:nth-child(2) { --delay: 2; }
.gallery-item:nth-child(3) { --delay: 3; }
.gallery-item:nth-child(4) { --delay: 4; }
.gallery-item:nth-child(5) { --delay: 5; }
.gallery-item:nth-child(6) { --delay: 6; }
.gallery-item:nth-child(7) { --delay: 7; }
.gallery-item:nth-child(8) { --delay: 8; }
.gallery-item:nth-child(9) { --delay: 9; }

/* Filter Button Ripple Effect */
.ripple-effect {
    position: absolute;
    border-radius: 50%;
    background: rgba(0, 0, 0, 0.1);
    transform: scale(0);
    animation: ripple 0.6s linear;
    pointer-events: none;
}

@keyframes ripple {
    to {
        transform: scale(4);
        opacity: 0;
    }
}

/* Image Loading Animation */
.image-loader {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
    background-size: 200% 100%;
    animation: loading 1.5s infinite;
    border-radius: inherit;
}

@keyframes loading {
    0% { background-position: -200% 0; }
    100% { background-position: 200% 0; }
}

/* Scroll Reveal Animation */
.reveal-up {
    opacity: 0;
    transform: translateY(60px);
    transition: all 0.8s cubic-bezier(0.4, 0, 0.2, 1);
}

.reveal-up.visible {
    opacity: 1;
    transform: translateY(0);
}

/* Hover Tilt Effect */
.gallery-card {
    transform-style: preserve-3d;
    perspective: 1000px;
}

.gallery-card-inner {
    transition: transform 0.6s cubic-bezier(0.2, 0.8, 0.2, 1);
    transform-style: preserve-3d;
}

.gallery-card:hover .gallery-card-inner {
    transform: rotateY(5deg) rotateX(5deg);
}

/* Gradient Border Animation */
.gallery-card {
    position: relative;
    border: 2px solid transparent;
    background-clip: padding-box;
}

.gallery-card::after {
    content: '';
    position: absolute;
    top: -2px;
    left: -2px;
    right: -2px;
    bottom: -2px;
    background: linear-gradient(45deg, #000, #666, #000);
    background-size: 400% 400%;
    border-radius: inherit;
    z-index: -1;
    opacity: 0;
    transition: opacity 0.3s;
    animation: gradientBorder 3s ease infinite;
}

.gallery-card:hover::after {
    opacity: 1;
}

@keyframes gradientBorder {
    0%, 100% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
}

/* Particle Background for Hero */
.particle {
    position: absolute;
    border-radius: 50%;
    background: rgba(0, 0, 0, 0.05);
    pointer-events: none;
}

/* Responsive Adjustments */
@media (max-width: 768px) {
    .gallery-card {
        animation: cardAppearMobile 0.6s cubic-bezier(0.4, 0, 0.2, 1) forwards;
        animation-delay: calc(var(--delay) * 0.05s);
    }
    
    @keyframes cardAppearMobile {
        from {
            opacity: 0;
            transform: translateY(20px) scale(0.98);
        }
        to {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }
}

/* Lazy Load Fade In */
.lazy-image {
    opacity: 0;
    transform: scale(0.95);
    transition: opacity 0.8s ease, transform 0.8s ease;
}

.lazy-image.loaded {
    opacity: 1;
    transform: scale(1);
}

/* Scroll Progress Indicator */
.scroll-progress {
   
    top: 0;
    left: 0;
    width: 0%;
    height: 3px;
    background: linear-gradient(90deg, #000, #666);
    z-index: 100;
    transition: width 0.1s ease;
}






// Add ripple effect to buttons
document.addEventListener('click', function(e) {
    if (e.target.classList.contains('btn-primary') || e.target.classList.contains('btn-secondary')) {
        const ripple = document.createElement('span');
        const rect = e.target.getBoundingClientRect();
        const size = Math.max(rect.width, rect.height);
        const x = e.clientX - rect.left - size / 2;
        const y = e.clientY - rect.top - size / 2;
        
        ripple.style.cssText = `
            position: absolute;
            border-radius: 50%;
            background: rgba(0, 0, 0, 0.1);
            transform: scale(0);
            animation: ripple 0.6s linear;
            width: ${size}px;
            height: ${size}px;
            left: ${x}px;
            top: ${y}px;
            pointer-events: none;
        `;
        
        e.target.style.position = 'relative';
        e.target.style.overflow = 'hidden';
        e.target.appendChild(ripple);
        
        setTimeout(() => ripple.remove(), 600);
    }
});

// Add CSS for ripple animation
const style = document.createElement('style');
style.textContent = `
    @keyframes ripple {
        to {
            transform: scale(4);
            opacity: 0;
        }
    }
`;
document.head.appendChild(style);