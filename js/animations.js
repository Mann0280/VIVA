// GSAP Animations for VIVA ENGINEERING
document.addEventListener('DOMContentLoaded', function() {
    // Initialize GSAP with ScrollTrigger
    gsap.registerPlugin(ScrollTrigger);
    
    // ============================================
    // LOADING SCREEN ANIMATION
    // ============================================
    const loadingScreen = document.getElementById('loading-screen');
    if (loadingScreen) {
        // Animate loading elements
        gsap.to('.loading-ring', {
            rotation: 360,
            duration: 2,
            repeat: -1,
            ease: "none"
        });
        
        gsap.to('.pulse-circle', {
            scale: 1.5,
            opacity: 0,
            duration: 2,
            repeat: -1,
            stagger: 0.5
        });
        
        // Simulate loading
        let progress = 0;
        const progressInterval = setInterval(() => {
            progress += Math.random() * 15;
            if (progress > 100) progress = 100;
            
            const percentageElement = document.querySelector('.loading-percentage');
            if (percentageElement) {
                percentageElement.textContent = Math.round(progress) + '%';
            }
            
            if (progress >= 100) {
                clearInterval(progressInterval);
                
                // Hide loading screen
                gsap.to('#loading-screen', {
                    opacity: 0,
                    duration: 0.8,
                    ease: "power2.out",
                    onComplete: () => {
                        loadingScreen.style.display = 'none';
                        initHeroAnimations();
                    }
                });
            }
        }, 100);
    }

    // ============================================
    // HERO SECTION ANIMATIONS
    // ============================================
    function initHeroAnimations() {
        const heroSection = document.querySelector('.hero-section');
        if (heroSection) {
            // Reveal hero section
            gsap.to(heroSection, {
                opacity: 1,
                duration: 1,
                ease: "power2.out"
            });
            
            // Animate hero elements sequentially
            const heroTimeline = gsap.timeline();
            
            heroTimeline
                .from('.hero-badge', {
                    y: -30,
                    opacity: 0,
                    duration: 0.8,
                    ease: "back.out(1.7)"
                })
                .from('.hero-word', {
                    y: 50,
                    opacity: 0,
                    duration: 1,
                    ease: "power3.out",
                    stagger: 0.2
                }, "-=0.5")
                .from('.hero-description', {
                    y: 30,
                    opacity: 0,
                    duration: 0.8,
                    ease: "power2.out"
                }, "-=0.3")
                .from('.hero-cta', {
                    y: 30,
                    opacity: 0,
                    duration: 0.8,
                    ease: "power2.out"
                }, "-=0.2")
                .from('.hero-stats .stat-card', {
                    y: 30,
                    opacity: 0,
                    duration: 0.6,
                    stagger: 0.1,
                    ease: "power2.out"
                }, "-=0.2");
        }
    }

    // ============================================
    // SECTION SCROLL ANIMATIONS
    // ============================================
    
    // Animate about section
    gsap.from('.about-image', {
        scrollTrigger: {
            trigger: '.about-image',
            start: 'top 80%',
            toggleActions: 'play none none reverse'
        },
        x: -100,
        opacity: 0,
        duration: 1.2,
        ease: "power3.out"
    });
    
    gsap.from('.about-content', {
        scrollTrigger: {
            trigger: '.about-content',
            start: 'top 80%',
            toggleActions: 'play none none reverse'
        },
        x: 100,
        opacity: 0,
        duration: 1.2,
        ease: "power3.out"
    });
    
    gsap.from('.about-card', {
        scrollTrigger: {
            trigger: '.about-card',
            start: 'top 80%',
            toggleActions: 'play none none reverse'
        },
        y: 50,
        opacity: 0,
        duration: 1,
        ease: "back.out(1.7)",
        delay: 0.3
    });
    
    // Animate feature items
    gsap.from('.feature-item', {
        scrollTrigger: {
            trigger: '.feature-item',
            start: 'top 85%',
            toggleActions: 'play none none reverse'
        },
        x: 30,
        opacity: 0,
        duration: 0.8,
        stagger: 0.2,
        ease: "power2.out"
    });
    
    // Animate service cards
    gsap.from('.service-card', {
        scrollTrigger: {
            trigger: '.service-card',
            start: 'top 85%',
            toggleActions: 'play none none reverse'
        },
        y: 50,
        opacity: 0,
        duration: 0.8,
        stagger: 0.1,
        ease: "power3.out"
    });
    
    // Animate product cards with 3D effect
    gsap.from('.product-card', {
        scrollTrigger: {
            trigger: '.product-card',
            start: 'top 85%',
            toggleActions: 'play none none reverse'
        },
        y: 80,
        rotationY: -10,
        opacity: 0,
        duration: 1,
        stagger: 0.15,
        ease: "power3.out"
    });
    
    // Animate pricing cards
    gsap.from('.pricing-card', {
        scrollTrigger: {
            trigger: '.pricing-card',
            start: 'top 85%',
            toggleActions: 'play none none reverse'
        },
        y: 60,
        scale: 0.9,
        opacity: 0,
        duration: 1,
        stagger: 0.2,
        ease: "back.out(1.7)"
    });
    
    // Animate testimonial cards
    gsap.from('.testimonial-card', {
        scrollTrigger: {
            trigger: '.testimonial-card',
            start: 'top 85%',
            toggleActions: 'play none none reverse'
        },
        y: 50,
        rotationZ: -5,
        opacity: 0,
        duration: 0.8,
        stagger: 0.15,
        ease: "power3.out"
    });
    
    // Animate CTA section
    gsap.from('.cta-title', {
        scrollTrigger: {
            trigger: '.cta-title',
            start: 'top 80%',
            toggleActions: 'play none none reverse'
        },
        y: 50,
        opacity: 0,
        duration: 1,
        ease: "power3.out"
    });
    
    gsap.from('.cta-description', {
        scrollTrigger: {
            trigger: '.cta-description',
            start: 'top 80%',
            toggleActions: 'play none none reverse'
        },
        y: 30,
        opacity: 0,
        duration: 0.8,
        delay: 0.2,
        ease: "power2.out"
    });
    
    gsap.from('.cta-buttons', {
        scrollTrigger: {
            trigger: '.cta-buttons',
            start: 'top 80%',
            toggleActions: 'play none none reverse'
        },
        y: 30,
        opacity: 0,
        duration: 0.8,
        delay: 0.4,
        ease: "power2.out"
    });

    // ============================================
    // COUNTER ANIMATIONS
    // ============================================
    function animateCounters() {
        document.querySelectorAll('.counter-number').forEach(counter => {
            const target = parseInt(counter.getAttribute('data-target'));
            const duration = 2000;
            
            gsap.to(counter, {
                innerText: target,
                duration: duration / 1000,
                snap: { innerText: 1 },
                ease: "power2.out",
                scrollTrigger: {
                    trigger: counter,
                    start: 'top 80%',
                    toggleActions: 'play none none reverse'
                }
            });
        });
    }
    
    animateCounters();

    // ============================================
    // PARALLAX EFFECTS
    // ============================================
    
    // Hero section parallax
    gsap.to('.hero-section', {
        y: (i, target) => -ScrollTrigger.maxScroll(window) * 0.3,
        ease: "none",
        scrollTrigger: {
            trigger: '.hero-section',
            start: "top top",
            end: "bottom top",
            scrub: true
        }
    });
    
    // Floating elements in CTA
    gsap.to('.animated-blob', {
        y: 30,
        duration: 3,
        repeat: -1,
        yoyo: true,
        ease: "sine.inOut"
    });
    
    gsap.to('.animated-blob-2', {
        y: -30,
        duration: 4,
        repeat: -1,
        yoyo: true,
        ease: "sine.inOut",
        delay: 1
    });

    // ============================================
    // HOVER EFFECTS
    // ============================================
    
    // Product card tilt effect
    document.querySelectorAll('.product-card').forEach(card => {
        card.addEventListener('mousemove', (e) => {
            const rect = card.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            
            const centerX = rect.width / 2;
            const centerY = rect.height / 2;
            
            const rotateX = (y - centerY) / 15;
            const rotateY = (centerX - x) / 15;
            
            gsap.to(card, {
                rotationX: rotateX,
                rotationY: rotateY,
                transformPerspective: 1000,
                duration: 0.3,
                ease: "power2.out"
            });
        });
        
        card.addEventListener('mouseleave', () => {
            gsap.to(card, {
                rotationX: 0,
                rotationY: 0,
                duration: 0.5,
                ease: "elastic.out(1, 0.5)"
            });
        });
    });
    
    // Service card hover effect
    document.querySelectorAll('.service-card').forEach(card => {
        card.addEventListener('mouseenter', () => {
            gsap.to(card, {
                y: -10,
                duration: 0.3,
                ease: "power2.out"
            });
        });
        
        card.addEventListener('mouseleave', () => {
            gsap.to(card, {
                y: 0,
                duration: 0.3,
                ease: "power2.out"
            });
        });
    });

    // ============================================
    // PAGE TRANSITION ANIMATIONS
    // ============================================
    document.querySelectorAll('a:not([href^="#"])').forEach(link => {
        link.addEventListener('click', (e) => {
            if (!link.href.includes('#')) {
                e.preventDefault();
                const href = link.href;
                
                // Add page transition
                gsap.to('body', {
                    opacity: 0,
                    duration: 0.3,
                    onComplete: () => {
                        window.location.href = href;
                    }
                });
            }
        });
    });

    // ============================================
    // CURSOR EFFECT
    // ============================================
    const cursor = document.createElement('div');
    cursor.classList.add('custom-cursor');
    document.body.appendChild(cursor);
    
    const cursorFollower = document.createElement('div');
    cursorFollower.classList.add('cursor-follower');
    document.body.appendChild(cursorFollower);
    
    document.addEventListener('mousemove', (e) => {
        gsap.to(cursor, {
            x: e.clientX,
            y: e.clientY,
            duration: 0.1
        });
        
        gsap.to(cursorFollower, {
            x: e.clientX,
            y: e.clientY,
            duration: 0.3
        });
    });
    
    // Interactive elements cursor effect
    document.querySelectorAll('a, button, .product-card, .service-card').forEach(el => {
        el.addEventListener('mouseenter', () => {
            gsap.to(cursor, { scale: 1.5, duration: 0.2 });
            gsap.to(cursorFollower, { scale: 3, duration: 0.3 });
        });
        
        el.addEventListener('mouseleave', () => {
            gsap.to(cursor, { scale: 1, duration: 0.2 });
            gsap.to(cursorFollower, { scale: 1, duration: 0.3 });
        });
    });

    // ============================================
    // LOADING BAR ANIMATION
    // ============================================
    gsap.to('.loading-bar', {
        width: '100%',
        duration: 2.5,
        ease: "power2.inOut"
    });
});
