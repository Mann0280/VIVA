<?php include 'includes/header.php'; ?>

<!-- Hero Section -->
<section class="hero-section relative min-h-[60vh] flex items-center overflow-hidden bg-gradient-to-br from-gray-900 to-black">
    <!-- Background Pattern -->
    <div class="absolute inset-0 z-0">
        <div class="absolute inset-0 bg-grid-pattern opacity-5"></div>
    </div>
    
    <div class="container mx-auto px-4 lg:px-8 relative z-10">
        <div class="max-w-4xl mx-auto text-center">
            <!-- Main Heading -->
            <h1 class="text-5xl md:text-7xl font-bold text-white mb-6 leading-tight animate-fadeInUp">
                Image
                <span class="block text-orange-600 animate-fadeInUp delay-100">Gallery</span>
            </h1>
            
            <!-- Description -->
            <p class="text-xl text-gray-400 mb-8 max-w-2xl mx-auto leading-relaxed animate-fadeInUp delay-200">
                Explore our collection of machinery, manufacturing processes, and completed projects.
            </p>
        </div>
    </div>
</section>

<!-- Filter Section -->
<section class="py-8 bg-gray-900 border-b border-gray-800 animate-slideInDown">
    <div class="container mx-auto px-4 lg:px-8">
        <div class="flex flex-col md:flex-row items-center justify-between gap-4">
            <div class="text-center md:text-left animate-fadeInLeft">
                <h2 class="text-2xl font-bold text-white mb-2">Our Gallery</h2>
                <p class="text-gray-400">9 images categorized</p>
            </div>
            
            <div class="flex flex-wrap justify-center gap-2 animate-fadeInRight">
                <button class="filter-btn active" data-filter="all">All</button>
                <button class="filter-btn" data-filter="machinery">Machinery</button>
                <button class="filter-btn" data-filter="process">Process</button>
                <button class="filter-btn" data-filter="projects">Projects</button>
            </div>
        </div>
    </div>
</section>

<!-- Image Gallery Grid -->
<section class="py-16 bg-black">
    <div class="container mx-auto px-4 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" id="image-gallery">
            <?php
            // Define image items
            $imageItems = [
                [
                    'category' => 'machinery',
                    'title' => 'High-Speed Slitting Machine',
                    'desc' => 'Advanced slitting operation with precision control',
                    'image' => 'https://www.slitterchina.com/uploads/41362/automatic-high-speed-slitting-rewinding202407291240119304f.jpg'
                ],
                [
                    'category' => 'process',
                    'title' => 'BOPP Tape Manufacturing',
                    'desc' => 'Complete manufacturing process line',
                    'image' => 'https://images.jdmagicbox.com/quickquotes/images_main/-0io4xa7s.jpg'
                ],
                [
                    'category' => 'projects',
                    'title' => 'Industrial Setup',
                    'desc' => 'Complete installation at manufacturing facility',
                    'image' => 'https://www.ndccn.com/uploads/NTH2600-1.jpg'
                ],
                [
                    'category' => 'machinery',
                    'title' => 'Automated Coating System',
                    'desc' => 'State-of-the-art coating machinery',
                    'image' => 'https://i.ytimg.com/vi/otOlvxlMFnA/maxresdefault.jpg'
                ],
                [
                    'category' => 'projects',
                    'title' => 'Completed Project',
                    'desc' => 'Successfully delivered manufacturing plant',
                    'image' => 'https://images.unsplash.com/photo-1581091226033-d5c48150dbaa?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80'
                ],
                [
                    'category' => 'process',
                    'title' => 'Quality Control',
                    'desc' => 'Quality assurance and testing',
                    'image' => 'https://www.compliancequest.com/wp-content/uploads/2023/11/automated-quality-control-inspection.jpg'
                ],
                [
                    'category' => 'machinery',
                    'title' => 'Precision Cutting',
                    'desc' => 'Digital control with high accuracy',
                    'image' => 'https://ukam.com/wp-content/uploads/2024/11/smartcut6011.webp'
                ],
                [
                    'category' => 'projects',
                    'title' => 'Factory Setup',
                    'desc' => 'Manufacturing facility installation',
                    'image' => 'https://damassets.autodesk.net/content/dam/autodesk/www/solutions/designing-manufacturing-plant-layout/what-is-a-manufacturing-plant-layout-thumb-1172x660.jpeg'
                ],
                [
                    'category' => 'process',
                    'title' => 'Production Line',
                    'desc' => 'Automated production monitoring',
                    'image' => 'https://img.freepik.com/free-photo/robotic-arms-sorting-packages-conveyor-belt_23-2152005497.jpg?semt=ais_hybrid&w=740&q=80'
                ]
            ];
            
            foreach ($imageItems as $index => $image):
            ?>
            <div class="gallery-item group animate-popIn" data-category="<?php echo $image['category']; ?>" style="animation-delay: <?php echo ($index * 0.1) + 0.2; ?>s;">
                <div class="relative overflow-hidden rounded-lg bg-gray-900 cursor-pointer transform transition-all duration-500 hover:scale-[1.03] hover:shadow-2xl hover:shadow-orange-600/20">
                    <!-- Image Container -->
                    <div class="relative h-64 overflow-hidden">
                        <img src="<?php echo $image['image']; ?>" 
                             alt="<?php echo $image['title']; ?>"
                             class="w-full h-full object-cover transition-all duration-700 ease-out group-hover:scale-110 group-hover:rotate-1">
                        
                        <!-- Gradient Overlay -->
                        <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/30 to-transparent opacity-0 group-hover:opacity-100 transition-all duration-500"></div>
                        
                        <!-- Shimmer Effect -->
                        <div class="absolute inset-0 shimmer-effect opacity-0 group-hover:opacity-30"></div>
                        
                        <!-- View Icon -->
                        <div class="absolute inset-0 flex items-center justify-center">
                            <div class="bg-orange-600/90 w-14 h-14 rounded-full flex items-center justify-center transform scale-0 transition-all duration-500 ease-out group-hover:scale-100 hover:scale-110 hover:bg-orange-500">
                                <i class="fas fa-search-plus text-white text-lg"></i>
                            </div>
                        </div>
                        
                        <!-- Category Badge -->
                        <div class="absolute top-3 left-3 bg-gradient-to-r from-orange-600 to-orange-500 px-3 py-1.5 rounded-full text-white text-xs font-semibold uppercase tracking-wider transform -translate-x-10 group-hover:translate-x-0 transition-transform duration-500 ease-out">
                            <?php echo $image['category']; ?>
                        </div>
                    </div>
                    
                    <!-- Image Info -->
                    <div class="p-5 transform transition-all duration-500 group-hover:translate-y-[-5px]">
                        <h3 class="text-lg font-bold text-white mb-2 group-hover:text-orange-400 transition-colors duration-300"><?php echo $image['title']; ?></h3>
                        <p class="text-gray-400 text-sm leading-relaxed group-hover:text-gray-300 transition-colors duration-300"><?php echo $image['desc']; ?></p>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Lightbox Modal -->
<div id="lightbox-modal" class="fixed inset-0 bg-black/95 z-50 hidden items-center justify-center p-4 backdrop-blur-sm">
    <div class="relative max-w-4xl w-full animate-modalIn">
        <!-- Close Button -->
        <button id="close-lightbox" class="absolute -top-12 right-0 w-10 h-10 bg-white/20 rounded-full flex items-center justify-center hover:bg-white/30 transition-all duration-300 hover:scale-110 hover:rotate-90 z-20">
            <i class="fas fa-times text-white"></i>
        </button>
        
        <!-- Image Container -->
        <div class="bg-black rounded-xl overflow-hidden border border-gray-800 shadow-2xl">
            <div class="relative">
                <img id="lightbox-image" src="" alt="" class="w-full h-auto max-h-[70vh] object-contain transition-opacity duration-500">
                <!-- Loading Spinner -->
                <div id="image-loading" class="absolute inset-0 flex items-center justify-center bg-black/50 hidden">
                    <div class="w-12 h-12 border-4 border-orange-600 border-t-transparent rounded-full animate-spin"></div>
                </div>
            </div>
        </div>
        
        <!-- Image Info -->
        <div class="mt-6 text-center animate-fadeInUp delay-100">
            <h3 id="lightbox-title" class="text-2xl font-bold text-white mb-2"></h3>
            <p id="lightbox-desc" class="text-gray-300 text-lg mb-3"></p>
            <div class="mt-3">
                <span id="lightbox-category" class="inline-block bg-gradient-to-r from-orange-600 to-orange-500 px-4 py-2 rounded-full text-white text-sm font-semibold tracking-wider"></span>
            </div>
        </div>
        
        <!-- Navigation -->
        <button id="prev-btn" class="absolute left-4 top-1/2 transform -translate-y-1/2 w-12 h-12 bg-white/20 rounded-full flex items-center justify-center hover:bg-white/30 transition-all duration-300 hover:scale-110 hover:-translate-x-1">
            <i class="fas fa-chevron-left text-black text-lg"></i>
        </button>
        
        <button id="next-btn" class="absolute right-4 top-1/2 transform -translate-y-1/2 w-12 h-12 bg-white/20 rounded-full flex items-center justify-center hover:bg-white/30 transition-all duration-300 hover:scale-110 hover:translate-x-1">
            <i class="fas fa-chevron-right text-black text-lg"></i>
        </button>
        
        <!-- Counter -->
        <div class="absolute -top-10 left-0 bg-white/20 backdrop-blur-sm rounded-full px-4 py-2 text-white text-sm font-medium animate-fadeIn">
            <span id="current-index">1</span>/<span id="total-count">9</span>
        </div>
    </div>
    
    <!-- Background Click to Close -->
    <div class="absolute inset-0 -z-10" id="lightbox-background"></div>
</div>

<style>
/* Animation Keyframes */
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
}

@keyframes fadeInUp {
    from { 
        opacity: 0; 
        transform: translateY(30px); 
    }
    to { 
        opacity: 1; 
        transform: translateY(0); 
    }
}

@keyframes slideInDown {
    from { 
        opacity: 0; 
        transform: translateY(-30px); 
    }
    to { 
        opacity: 1; 
        transform: translateY(0); 
    }
}

@keyframes fadeInLeft {
    from { 
        opacity: 0; 
        transform: translateX(-30px); 
    }
    to { 
        opacity: 1; 
        transform: translateX(0); 
    }
}

@keyframes fadeInRight {
    from { 
        opacity: 0; 
        transform: translateX(30px); 
    }
    to { 
        opacity: 1; 
        transform: translateX(0); 
    }
}

@keyframes popIn {
    0% { 
        opacity: 0; 
        transform: scale(0.8) translateY(20px); 
    }
    70% { 
        opacity: 0.7; 
        transform: scale(1.05) translateY(-5px); 
    }
    100% { 
        opacity: 1; 
        transform: scale(1) translateY(0); 
    }
}

@keyframes modalIn {
    0% { 
        opacity: 0; 
        transform: scale(0.7) translateY(50px); 
    }
    100% { 
        opacity: 1; 
        transform: scale(1) translateY(0); 
    }
}

@keyframes shimmer {
    0% { transform: translateX(-100%); }
    100% { transform: translateX(100%); }
}

/* Animation Classes */
.animate-fadeInUp {
    animation: fadeInUp 0.8s ease-out forwards;
}

.animate-slideInDown {
    animation: slideInDown 0.6s ease-out forwards;
}

.animate-fadeInLeft {
    animation: fadeInLeft 0.7s ease-out forwards;
}

.animate-fadeInRight {
    animation: fadeInRight 0.7s ease-out forwards;
}

.animate-popIn {
    animation: popIn 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards;
    opacity: 0;
}

.animate-modalIn {
    animation: modalIn 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards;
}

.animate-fadeIn {
    animation: fadeIn 0.5s ease-out forwards;
}

/* Delay Utilities */
.delay-100 { animation-delay: 0.1s; }
.delay-200 { animation-delay: 0.2s; }
.delay-300 { animation-delay: 0.3s; }
.delay-400 { animation-delay: 0.4s; }
.delay-500 { animation-delay: 0.5s; }
.delay-600 { animation-delay: 0.6s; }
.delay-700 { animation-delay: 0.7s; }
.delay-800 { animation-delay: 0.8s; }
.delay-900 { animation-delay: 0.9s; }

/* Filter Buttons */
.filter-btn {
    padding: 10px 24px;
    background: transparent;
    border: 2px solid #4B5563;
    color: white;
    font-weight: 600;
    border-radius: 8px;
    cursor: pointer;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
    overflow: hidden;
}

.filter-btn::before {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    width: 0;
    height: 0;
    border-radius: 50%;
    background: rgba(249, 115, 22, 0.1);
    transform: translate(-50%, -50%);
    transition: width 0.6s, height 0.6s;
}

.filter-btn:hover::before {
    width: 300px;
    height: 300px;
}

.filter-btn:hover {
    border-color: #F97316;
    color: #F97316;
    transform: translateY(-2px);
    box-shadow: 0 10px 20px rgba(249, 115, 22, 0.1);
}

.filter-btn.active {
    background: linear-gradient(135deg, #F97316, #EA580C);
    border-color: #F97316;
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 10px 20px rgba(249, 115, 22, 0.2);
}

/* Shimmer Effect */
.shimmer-effect {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(90deg, 
        transparent 0%, 
        rgba(255, 255, 255, 0.1) 50%, 
        transparent 100%);
    animation: shimmer 2s infinite;
}

/* Smooth transitions */
.gallery-item {
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
}

/* Gallery Filter Transition */
.gallery-item.filtering {
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
}

/* Lightbox Image Loading */
#lightbox-image {
    transition: opacity 0.3s ease;
}

/* Custom Scrollbar */
::-webkit-scrollbar {
    width: 8px;
}

::-webkit-scrollbar-track {
    background: #1f2937;
}

::-webkit-scrollbar-thumb {
    background: #F97316;
    border-radius: 4px;
}

::-webkit-scrollbar-thumb:hover {
    background: #EA580C;
}

/* Responsive */
@media (max-width: 768px) {
    .hero-section h1 {
        font-size: 3rem;
    }
    
    .filter-btn {
        padding: 8px 16px;
        font-size: 0.875rem;
    }
    
    .animate-fadeInLeft,
    .animate-fadeInRight {
        animation: fadeInUp 0.7s ease-out forwards;
    }
}

@media (max-width: 640px) {
    .animate-popIn {
        animation: fadeInUp 0.6s ease-out forwards;
    }
    
    .gallery-item {
        animation-delay: 0.1s !important;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Image data from PHP
    const imageData = <?php echo json_encode($imageItems); ?>;
    let currentIndex = 0;
    let isTransitioning = false;
    
    // Filter functionality
    const filterButtons = document.querySelectorAll('.filter-btn');
    const galleryItems = document.querySelectorAll('.gallery-item');
    
    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            if (this.classList.contains('active')) return;
            
            // Add ripple effect
            createRipple(this);
            
            // Update active button with animation
            filterButtons.forEach(btn => {
                btn.classList.remove('active');
                btn.style.transform = 'translateY(0)';
                btn.style.boxShadow = 'none';
            });
            
            setTimeout(() => {
                this.classList.add('active');
            }, 150);
            
            const filter = this.dataset.filter;
            
            // Add filtering class to all items
            galleryItems.forEach(item => {
                item.classList.add('filtering');
            });
            
            // Filter items with staggered animation
            let visibleCount = 0;
            galleryItems.forEach((item, index) => {
                const shouldShow = filter === 'all' || item.dataset.category === filter;
                
                if (shouldShow) {
                    setTimeout(() => {
                        item.style.opacity = '0';
                        item.style.transform = 'scale(0.8) translateY(20px)';
                        
                        setTimeout(() => {
                            item.style.display = 'block';
                            
                            setTimeout(() => {
                                item.style.opacity = '1';
                                item.style.transform = 'scale(1) translateY(0)';
                            }, 10);
                        }, 300);
                        
                        visibleCount++;
                    }, index * 50);
                } else {
                    setTimeout(() => {
                        item.style.opacity = '0';
                        item.style.transform = 'scale(0.8)';
                        
                        setTimeout(() => {
                            item.style.display = 'none';
                        }, 300);
                    }, index * 50);
                }
            });
            
            // Remove filtering class after animation
            setTimeout(() => {
                galleryItems.forEach(item => {
                    item.classList.remove('filtering');
                });
            }, 800);
        });
    });
    
    // Ripple effect function
    function createRipple(button) {
        const ripple = document.createElement('span');
        const rect = button.getBoundingClientRect();
        const size = Math.max(rect.width, rect.height);
        const x = event.clientX - rect.left - size / 2;
        const y = event.clientY - rect.top - size / 2;
        
        ripple.style.cssText = `
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.3);
            transform: scale(0);
            animation: ripple 0.6s linear;
            width: ${size}px;
            height: ${size}px;
            top: ${y}px;
            left: ${x}px;
            pointer-events: none;
        `;
        
        button.appendChild(ripple);
        
        setTimeout(() => {
            ripple.remove();
        }, 600);
    }
    
    // Add ripple animation to CSS
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
    
    // Lightbox functionality
    const lightboxModal = document.getElementById('lightbox-modal');
    const lightboxImage = document.getElementById('lightbox-image');
    const lightboxTitle = document.getElementById('lightbox-title');
    const lightboxDesc = document.getElementById('lightbox-desc');
    const lightboxCategory = document.getElementById('lightbox-category');
    const currentIndexSpan = document.getElementById('current-index');
    const totalCountSpan = document.getElementById('total-count');
    const closeLightbox = document.getElementById('close-lightbox');
    const lightboxBackground = document.getElementById('lightbox-background');
    const prevBtn = document.getElementById('prev-btn');
    const nextBtn = document.getElementById('next-btn');
    const imageLoading = document.getElementById('image-loading');
    
    totalCountSpan.textContent = imageData.length;
    
    // Open lightbox when clicking gallery items
    galleryItems.forEach((item, index) => {
        item.addEventListener('click', function() {
            currentIndex = index;
            openLightbox();
        });
    });
    
    function openLightbox() {
        lightboxModal.style.opacity = '0';
        lightboxModal.classList.remove('hidden');
        lightboxModal.classList.add('flex');
        document.body.style.overflow = 'hidden';
        
        // Animate in
        setTimeout(() => {
            lightboxModal.style.transition = 'opacity 0.3s ease';
            lightboxModal.style.opacity = '1';
        }, 10);
        
        updateLightbox();
    }
    
    function updateLightbox() {
        if (isTransitioning) return;
        
        isTransitioning = true;
        const image = imageData[currentIndex];
        
        // Show loading
        imageLoading.classList.remove('hidden');
        lightboxImage.style.opacity = '0';
        
        currentIndexSpan.textContent = currentIndex + 1;
        lightboxTitle.textContent = image.title;
        lightboxDesc.textContent = image.desc;
        lightboxCategory.textContent = image.category;
        
        // Preload image
        const img = new Image();
        img.onload = () => {
            lightboxImage.src = image.image;
            lightboxImage.alt = image.title;
            
            // Fade in image
            setTimeout(() => {
                lightboxImage.style.opacity = '1';
                imageLoading.classList.add('hidden');
                isTransitioning = false;
            }, 300);
        };
        img.src = image.image;
    }
    
    function navigate(direction) {
        if (isTransitioning) return;
        
        currentIndex = (currentIndex + direction + imageData.length) % imageData.length;
        updateLightbox();
        
        // Add navigation animation
        const btn = direction > 0 ? nextBtn : prevBtn;
        btn.style.transform = `translateY(-50%) ${direction > 0 ? 'translateX(5px)' : 'translateX(-5px)'}`;
        setTimeout(() => {
            btn.style.transform = 'translateY(-50%)';
        }, 200);
    }
    
    prevBtn.addEventListener('click', () => navigate(-1));
    nextBtn.addEventListener('click', () => navigate(1));
    
    function closeLightboxModal() {
        lightboxModal.style.transition = 'opacity 0.3s ease';
        lightboxModal.style.opacity = '0';
        
        setTimeout(() => {
            lightboxModal.classList.remove('flex');
            lightboxModal.classList.add('hidden');
            document.body.style.overflow = '';
        }, 300);
    }
    
    closeLightbox.addEventListener('click', closeLightboxModal);
    lightboxBackground.addEventListener('click', closeLightboxModal);
    
    // Keyboard navigation
    document.addEventListener('keydown', function(e) {
        if (!lightboxModal.classList.contains('hidden')) {
            switch(e.key) {
                case 'Escape':
                    closeLightboxModal();
                    break;
                case 'ArrowLeft':
                    navigate(-1);
                    break;
                case 'ArrowRight':
                    navigate(1);
                    break;
            }
        }
    });
    
    // Add hover effect to gallery items on page load
    setTimeout(() => {
        galleryItems.forEach((item, index) => {
            setTimeout(() => {
                item.style.transform = 'translateY(0)';
            }, index * 100 + 500);                              
        });
    }, 100);
});
</script>

<?php include 'includes/footer.php'; ?>