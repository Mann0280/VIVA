<?php
require_once 'data/products-data.php';

$cat_slug = isset($_GET['category']) ? $_GET['category'] : null;
$sub_slug = isset($_GET['sub']) ? $_GET['sub'] : null;

$level = 1; // 1: Main Categories, 2: Sub-Products, 3: Variants
$items = [];
$page_title = "Products | VIVA ENGINEERING Solutions";
$meta_description = "VIVA ENGINEERING - Precision engineering in slitting, rewinding, and coating machinery. Industrial manufacturing excellence.";

$breadcrumb = [['name' => 'Home', 'url' => 'index.php'], ['name' => 'Products', 'url' => 'products.php']];
$page_heading = "Our Product Range";
$page_subheading = "Discover our comprehensive range of precision-engineered industrial machinery designed to elevate your manufacturing capabilities with cutting-edge technology.";

// Validate and set data
if ($cat_slug && isset($product_categories[$cat_slug])) {
    $category = $product_categories[$cat_slug];
    $breadcrumb[] = ['name' => $category['name'], 'url' => "products.php?category=$cat_slug"];
    $page_title = $category['name'] . " | VIVA ENGINEERING";
    $meta_description = $category['description'];
    $page_heading = $category['name'];
    $page_subheading = $category['description'];
    
    if ($sub_slug && isset($category['sub_categories'][$sub_slug])) {
        $sub = $category['sub_categories'][$sub_slug];
        $breadcrumb[] = ['name' => $sub['name'], 'url' => "products.php?category=$cat_slug&sub=$sub_slug"];
        $page_title = $sub['name'] . " | VIVA ENGINEERING";
        $meta_description = $sub['description'];
        $page_heading = $sub['name'];
        $page_subheading = $sub['description'];
        
        $level = 3; // List Variants
        $items = $sub['variants'];
    } else {
        $level = 2; // List Sub-Products
        $items = $category['sub_categories'];
    }
} else {
    $level = 1; // List Categories
    $items = $product_categories;
}
?>
<?php include 'includes/header.php'; ?>

<style>
/* Lenis Smooth Scroll Styles */
html.lenis, html.lenis body {
    height: auto;
}

.lenis.lenis-smooth {
    scroll-behavior: auto !important;
}

.lenis.lenis-smooth [data-lenis-prevent] {
    overscroll-behavior: contain;
}

.lenis.lenis-stopped {
    overflow: hidden;
}

.lenis.lenis-scrolling iframe {
    pointer-events: none;
}

/* Enhanced smoothness */
* {
    scroll-behavior: smooth;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    backface-visibility: hidden;
    -webkit-backface-visibility: hidden;
}

body {
    overscroll-behavior-y: none;
    overflow-x: hidden;
}

/* Prevent janky animations during scroll */
@media (prefers-reduced-motion: no-preference) {
    .animate-on-scroll,
    .product-card-gallery,
    .hover-scale,
    .hover-lift {
        will-change: transform, opacity;
    }
}

/* Smooth image loading */
img {
    content-visibility: auto;
    image-rendering: -webkit-optimize-contrast;
    image-rendering: crisp-edges;
}

/* Ensure proper container width */
.container-custom {
    width: 100%;
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 1rem;
}

/* Fix overflow issues */
body {
    overflow-x: hidden;
}

/* Enhanced Animations */
@keyframes float {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-15px); }
}

@keyframes pulse-glow {
    0%, 100% { 
        box-shadow: 0 0 5px rgba(255, 107, 0, 0.3);
        transform: scale(1);
    }
    50% { 
        box-shadow: 0 0 25px rgba(255, 107, 0, 0.8);
        transform: scale(1.05);
    }
}

@keyframes shimmer {
    0% { background-position: -1000px 0; }
    100% { background-position: 1000px 0; }
}

@keyframes slideInLeft {
    from {
        transform: translateX(-50px);
        opacity: 0;
    }
    to {
        transform: translateX(0);
        opacity: 1;
    }
}

@keyframes slideInRight {
    from {
        transform: translateX(50px);
        opacity: 0;
    }
    to {
        transform: translateX(0);
        opacity: 1;
    }
}

@keyframes slideInUp {
    from {
        transform: translateY(50px);
        opacity: 0;
    }
    to {
        transform: translateY(0);
        opacity: 1;
    }
}

@keyframes scaleIn {
    from {
        transform: scale(0.9);
        opacity: 0;
    }
    to {
        transform: scale(1);
        opacity: 1;
    }
}

@keyframes fadeIn {
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
}

@keyframes bounceIn {
    0% {
        transform: scale(0.3);
        opacity: 0;
    }
    50% {
        transform: scale(1.05);
        opacity: 1;
    }
    70% {
        transform: scale(0.9);
    }
    100% {
        transform: scale(1);
    }
}

@keyframes rotateIn {
    from {
        transform: rotate(-10deg) scale(0.5);
        opacity: 0;
    }
    to {
        transform: rotate(0) scale(1);
        opacity: 1;
    }
}

@keyframes gradientFlow {
    0% {
        background-position: 0% 50%;
    }
    50% {
        background-position: 100% 50%;
    }
    100% {
        background-position: 0% 50%;
    }
}

@keyframes wave {
    0%, 100% {
        transform: translateY(0);
    }
    50% {
        transform: translateY(-20px);
    }
}

@keyframes ripple {
    to {
        transform: scale(4);
        opacity: 0;
    }
}

@keyframes particleFloat {
    0% {
        transform: translateY(0) translateX(0);
        opacity: 0;
    }
    10% {
        opacity: 1;
    }
    90% {
        opacity: 1;
    }
    100% {
        transform: translateY(-100px) translateX(20px);
        opacity: 0;
    }
}

/* Animation Classes */
.animate-float {
    animation: float 3s ease-in-out infinite;
}

.animate-pulse-glow {
    animation: pulse-glow 2s ease-in-out infinite;
}

.animate-shimmer {
    animation: shimmer 2s linear infinite;
    background: linear-gradient(90deg, #FF5722 0%, #FF8A65 50%, #FF5722 100%);
    background-size: 1000px 100%;
}

.animate-slide-in-left {
    animation: slideInLeft 0.8s ease-out forwards;
}

.animate-slide-in-right {
    animation: slideInRight 0.8s ease-out forwards;
}

.animate-slide-in-up {
    animation: slideInUp 0.8s ease-out forwards;
}

.animate-scale-in {
    animation: scaleIn 0.6s ease-out forwards;
}

.animate-fade-in {
    animation: fadeIn 1s ease-out forwards;
}

.animate-bounce-in {
    animation: bounceIn 0.8s ease-out forwards;
}

.animate-rotate-in {
    animation: rotateIn 0.8s ease-out forwards;
}

.animate-gradient-flow {
    background-size: 200% 200%;
    animation: gradientFlow 3s ease infinite;
}

.animate-wave {
    animation: wave 3s ease-in-out infinite;
}

/* Filter Buttons */
.filter-btn {
    position: relative;
    padding: 14px 28px;
    background: #1a1a1a;
    border: 2px solid #333333;
    border-radius: 50px;
    font-weight: 700;
    color: #999999;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    text-transform: uppercase;
    font-size: 0.9rem;
    letter-spacing: 0.5px;
    overflow: hidden;
}

.filter-btn span:first-child {
    position: relative;
    z-index: 10;
}

.filter-btn:hover {
    color: white;
    border-color: transparent;
    transform: translateY(-3px);
    box-shadow: 0 10px 25px rgba(255, 87, 34, 0.2);
}

.filter-btn.active {
    background: linear-gradient(135deg, #FF5722 0%, #FF8A65 100%);
    color: white;
    border-color: transparent;
    box-shadow: 0 10px 25px rgba(255, 87, 34, 0.3);
}

.filter-btn.active:hover {
    transform: translateY(-3px);
    box-shadow: 0 15px 30px rgba(255, 87, 34, 0.4);
}

/* Product Gallery Card Animations */
.product-card-gallery {
    opacity: 0;
    transform: translateY(50px);
    animation: fadeInUp 0.8s cubic-bezier(0.4, 0, 0.2, 1) forwards;
}

@keyframes fadeInUp {
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.product-card-gallery:nth-child(1) { animation-delay: 0.1s; }
.product-card-gallery:nth-child(2) { animation-delay: 0.2s; }
.product-card-gallery:nth-child(3) { animation-delay: 0.3s; }
.product-card-gallery:nth-child(4) { animation-delay: 0.4s; }
.product-card-gallery:nth-child(5) { animation-delay: 0.5s; }
.product-card-gallery:nth-child(6) { animation-delay: 0.6s; }
.product-card-gallery:nth-child(7) { animation-delay: 0.7s; }
.product-card-gallery:nth-child(8) { animation-delay: 0.8s; }
.product-card-gallery:nth-child(9) { animation-delay: 0.9s; }

/* Hover Effects */
.hover-scale {
    transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

.hover-scale:hover {
    transform: scale(1.05);
}

.hover-lift {
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

.hover-lift:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
}

.hover-rotate:hover {
    transform: rotate(5deg) scale(1.05);
    transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

.hover-bounce:hover {
    animation: bounce 0.5s;
}

@keyframes bounce {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-10px); }
}

/* Particle Animation */
.particle {
    position: absolute;
    background: radial-gradient(circle, #FF6B00 0%, transparent 70%);
    border-radius: 50%;
    pointer-events: none;
    animation: particleFloat 3s linear infinite;
}

/* Scroll Animation Classes */
.animate-on-scroll {
    opacity: 0;
    transform: translateY(50px);
    transition: opacity 0.8s ease, transform 0.8s ease;
}

.animate-on-scroll.active {
    opacity: 1;
    transform: translateY(0);
}

/* Animation Delay Classes */
.animation-delay-100 { animation-delay: 100ms !important; }
.animation-delay-200 { animation-delay: 200ms !important; }
.animation-delay-300 { animation-delay: 300ms !important; }
.animation-delay-400 { animation-delay: 400ms !important; }
.animation-delay-500 { animation-delay: 500ms !important; }

/* Better responsive text */
@media (max-width: 768px) {
    .hero-title {
        font-size: 2.5rem !important;
        line-height: 1.2 !important;
    }
    
    .section-title {
        font-size: 2rem !important;
        line-height: 1.2 !important;
    }
}

/* Grid Pattern */
.bg-grid-white {
    background-image: linear-gradient(to right, rgba(255,255,255,0.1) 1px, transparent 1px),
                      linear-gradient(to bottom, rgba(255,255,255,0.1) 1px, transparent 1px);
}

/* Responsive Adjustments */
@media (max-width: 768px) {
    .product-card-gallery {
        height: 400px;
    }
    
    .product-card-gallery h3 {
        font-size: 1.5rem;
    }
    
    .filter-btn {
        padding: 12px 20px;
        font-size: 0.8rem;
    }
}

@media (max-width: 480px) {
    .product-card-gallery {
        height: 350px;
    }
    
    h1 {
        font-size: 2.5rem;
    }
}
</style>

<!-- Hero Section -->
<section class="relative py-24 bg-gradient-to-br from-black via-gray-900 to-black overflow-hidden">
    <!-- Animated Background -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute inset-0 bg-grid-white/[0.02] bg-[size:20px_20px] animate-slide-in-left"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-transparent via-transparent to-black/20"></div>
    </div>
    
    <!-- Floating Particles -->
    <div class="particles-container absolute inset-0"></div>
    
    <div class="container mx-auto px-4 lg:px-8 relative z-10">
        <div class="max-w-5xl mx-auto text-center text-white">
            <!-- Animated Badge -->
            <div class="inline-flex items-center space-x-2 bg-gradient-to-r from-orange-600 to-orange-500 px-6 py-3 rounded-full mb-8 animate-pulse-glow hover-bounce" data-aos="fade-down">
                <span class="w-2 h-2 bg-white rounded-full animate-ping"></span>
                <span class="text-sm font-bold uppercase tracking-wider animate-slide-in-right">Industrial Solutions</span>
            </div>
            
            <!-- Main Title -->
            <h1 class="text-5xl lg:text-7xl font-bold mb-8 leading-tight animate-on-scroll" data-aos="fade-up">
                <?php
                if ($level == 1) {
                    echo "Our Product <span class='block text-transparent bg-clip-text bg-gradient-to-r from-orange-400 to-orange-500 animate-gradient-flow'>Range</span>";
                } else {
                    echo htmlspecialchars($page_heading);
                }
                ?>
            </h1>
            
            <!-- Description -->
            <p class="text-xl lg:text-2xl text-gray-300 leading-relaxed max-w-3xl mx-auto animate-on-scroll animation-delay-100" data-aos="fade-up" data-aos-delay="100">
                <?php echo htmlspecialchars($page_subheading); ?>
            </p>
            
            <?php if ($level == 1): ?>
            <!-- Stats -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 mt-16">
                <div class="text-center animate-on-scroll" data-aos="fade-up" data-aos-delay="200">
                    <div class="text-5xl font-bold text-orange-400 mb-2 animate-bounce-in">9+</div>
                    <div class="text-gray-400 animate-fade-in">Premium Machines</div>
                </div>
                <div class="text-center animate-on-scroll animation-delay-100" data-aos="fade-up" data-aos-delay="300">
                    <div class="text-5xl font-bold text-orange-400 mb-2 animate-bounce-in">50+</div>
                    <div class="text-gray-400 animate-fade-in">Countries Served</div>
                </div>
                <div class="text-center animate-on-scroll animation-delay-200" data-aos="fade-up" data-aos-delay="400">
                    <div class="text-5xl font-bold text-orange-400 mb-2 animate-bounce-in">24/7</div>
                    <div class="text-gray-400 animate-fade-in">Support</div>
                </div>
                <div class="text-center animate-on-scroll animation-delay-300" data-aos="fade-up" data-aos-delay="500">
                    <div class="text-5xl font-bold text-orange-400 mb-2 animate-bounce-in">ISO</div>
                    <div class="text-gray-400 animate-fade-in">Certified</div>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Products Grid Section -->
<section id="products-grid" class="py-20 bg-black">
    <div class="container mx-auto px-4 lg:px-8">
        
        <!-- Breadcrumb & Back -->
        <div class="mb-12 flex flex-col md:flex-row md:items-center justify-between gap-4">
            <nav class="flex overflow-x-auto text-sm font-medium text-gray-400 mb-2 md:mb-0 space-x-2 whitespace-nowrap pb-2">
                <?php foreach ($breadcrumb as $i => $crumb): ?>
                    <?php if ($i > 0): ?>
                        <span class="mx-2 text-gray-600">/</span>
                    <?php endif; ?>
                    <?php if ($i === count($breadcrumb) - 1): ?>
                        <span class="text-orange-500 font-bold"><?php echo htmlspecialchars($crumb['name']); ?></span>
                    <?php else: ?>
                        <a href="<?php echo htmlspecialchars($crumb['url']); ?>" class="hover:text-white transition-colors"><?php echo htmlspecialchars($crumb['name']); ?></a>
                    <?php endif; ?>
                <?php endforeach; ?>
            </nav>
            <?php if ($level > 1): ?>
            <div>
                <?php
                if ($level == 3) {
                    $back_url = "products.php?category=$cat_slug";
                } else {
                    $back_url = "products.php";
                }
                ?>
                <a href="<?php echo $back_url; ?>" class="inline-flex items-center text-sm bg-gray-900 border border-gray-700 rounded-full px-4 py-2 hover:bg-orange-600 hover:text-white hover:border-orange-600 transition-all shadow hover:shadow-lg">
                    <i class="fas fa-arrow-left mr-2"></i> Go Back
                </a>
            </div>
            <?php endif; ?>
        </div>
        
        <?php if ($level == 1): ?>
        <!-- Category Filter (Only on Level 1) -->
        <div class="flex flex-wrap justify-center gap-4 mb-20">
            <button class="filter-btn group active hover-scale" data-category="all">
                <span class="relative z-10">All Products</span>
                <span class="absolute inset-0 bg-orange-600 rounded-full scale-0 group-hover:scale-100 transition-transform duration-300"></span>
            </button>
            <?php foreach ($items as $slug => $item): ?>
            <button class="filter-btn group hover-scale" data-category="<?php echo $slug; ?>">
                <span class="relative z-10"><?php echo htmlspecialchars($item['name']); ?></span>
                <span class="absolute inset-0 bg-orange-600 rounded-full scale-0 group-hover:scale-100 transition-transform duration-300"></span>
            </button>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
        
        <!-- Products Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php
            $index = 0;
            foreach ($items as $slug => $item):
                if ($level == 1) {
                    $link = "products.php?category=$slug";
                    $badge_text = 'Category';
                    $badge_color = 'bg-orange-600';
                    $color_class = 'from-orange-500 to-orange-600';
                    $filter_cat = $slug;
                } elseif ($level == 2) {
                    if (isset($item['variants']) && count($item['variants']) > 0) {
                        $link = "products.php?category=$cat_slug&sub=$slug";
                        $badge_text = 'Series';
                    } else {
                        $link = "product-detail.php?category=$cat_slug&sub=$slug";
                        $badge_text = 'Machine';
                    }
                    $badge_color = 'bg-indigo-600';
                    $color_class = 'from-indigo-500 to-indigo-600';
                    $filter_cat = $slug;
                } else {
                    $link = "product-detail.php?category=$cat_slug&sub=$sub_slug&variant=$slug";
                    $badge_text = 'Machine';
                    $badge_color = isset($item['badge_color']) ? $item['badge_color'] : 'bg-black';
                    $color_class = isset($item['color']) ? $item['color'] : 'from-gray-800 to-black';
                    $filter_cat = $slug;
                }
                
                $is_featured = isset($item['featured']) ? $item['featured'] : false;
                $has_specs = isset($item['specs']) && is_array($item['specs']);
            ?>
            <div class="product-card-gallery group" data-category="<?php echo $filter_cat; ?>" data-aos="fade-up" data-aos-delay="<?php echo ($index % 3) * 100; ?>">
                <a href="<?php echo $link; ?>" class="block h-full">
                    <div class="relative h-[500px] rounded-2xl overflow-hidden shadow-xl hover:shadow-3xl transition-all duration-700 border border-gray-800 hover:border-orange-600 hover-scale">
                        <!-- Default State: Only Image -->
                        <div class="absolute inset-0 transition-all duration-700 group-hover:opacity-0">
                            <img src="<?php echo htmlspecialchars($item['image']); ?>" 
                                 alt="<?php echo htmlspecialchars($item['name']); ?>"
                                 class="w-full h-full object-cover">
                            
                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>
                            
                            <!-- Minimal Info -->
                            <div class="absolute bottom-0 left-0 right-0 p-6">
                                <?php if ($is_featured): ?>
                                <div class="inline-flex items-center mb-3 animate-pulse">
                                    <div class="w-3 h-3 bg-orange-500 rounded-full mr-2 animate-ping"></div>
                                    <span class="text-orange-400 text-sm font-bold">FEATURED</span>
                                </div>
                                <?php endif; ?>
                                
                                <h3 class="text-xl font-bold text-white mb-2 animate-slide-in-up"><?php echo htmlspecialchars($item['name']); ?></h3>
                                
                                <div class="flex items-center text-white/80 text-sm animate-fade-in">
                                    <span>Hover for details</span>
                                    <i class="fas fa-mouse-pointer ml-2 animate-bounce"></i>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Hover State: Full Details -->
                        <div class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-all duration-700 transform group-hover:scale-105">
                            <!-- Gradient Background -->
                            <div class="absolute inset-0 bg-gradient-to-br <?php echo $color_class; ?> opacity-90"></div>
                            
                            <!-- Featured Badge -->
                            <?php if ($is_featured): ?>
                            <div class="absolute top-6 left-6 z-20 animate-bounce-in">
                                <div class="bg-gradient-to-r from-orange-600 to-orange-500 text-white px-4 py-2 rounded-full text-sm font-bold shadow-lg hover-rotate">
                                    <i class="fas fa-star mr-2 animate-spin animation-delay-1000"></i>FEATURED
                                </div>
                            </div>
                            <?php endif; ?>
                            
                            <!-- Product Image -->
                            <div class="absolute inset-0 overflow-hidden">
                                <img src="<?php echo htmlspecialchars($item['image']); ?>" 
                                     alt="<?php echo htmlspecialchars($item['name']); ?>"
                                     class="w-full h-full object-cover transform scale-110 animate-scale-in">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/50 to-transparent"></div>
                            </div>
                            
                            <!-- Content -->
                            <div class="absolute inset-0 p-8 flex flex-col justify-between">
                                <!-- Category -->
                                <div>
                                    <div class="inline-block <?php echo $badge_color; ?> text-white px-4 py-2 rounded-full text-sm font-bold animate-slide-in-down">
                                        <?php echo $badge_text; ?>
                                    </div>
                                </div>
                                
                                <!-- Product Info -->
                                <div class="transform translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
                                    <h3 class="text-2xl lg:text-3xl font-bold text-white mb-4 leading-tight animate-slide-in-up">
                                        <?php echo htmlspecialchars($item['name']); ?>
                                    </h3>
                                    
                                    <!-- Specifications or Description -->
                                    <div class="space-y-2 mb-6">
                                        <?php if ($has_specs): ?>
                                            <?php foreach ($item['specs'] as $spec): ?>
                                            <div class="flex items-center text-white/90 text-sm animate-fade-in">
                                                <div class="w-2 h-2 bg-white rounded-full mr-3 animate-pulse"></div>
                                                <span><?php echo htmlspecialchars($spec); ?></span>
                                            </div>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <p class="text-white/90 text-sm animate-fade-in line-clamp-3">
                                                <?php echo htmlspecialchars(isset($item['description']) ? $item['description'] : ''); ?>
                                            </p>
                                        <?php endif; ?>
                                    </div>
                                    
                                    <!-- Price -->
                                    <?php if (isset($item['price'])): ?>
                                    <div class="text-2xl font-bold text-white mb-6 animate-bounce-in">
                                        <?php echo htmlspecialchars($item['price']); ?>
                                    </div>
                                    <?php endif; ?>
                                    
                                    <!-- CTA Button -->
                                    <div class="inline-flex items-center justify-between bg-white text-black px-6 py-4 rounded-xl font-bold hover:bg-black hover:text-white transition-all duration-300 w-full group/btn hover-lift">
                                        <span class="animate-slide-in-left">
                                            <?php echo $level < 3 ? 'View Products' : 'View Details'; ?>
                                        </span>
                                        <i class="fas fa-arrow-right transform group-hover/btn:translate-x-2 transition-transform duration-300 animate-slide-in-right"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <?php 
            $index++;
            endforeach; 
            ?>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="py-20 bg-gray-900 text-white">
    <div class="container mx-auto px-4 lg:px-8">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-4xl lg:text-5xl font-bold mb-6 animate-on-scroll" data-aos="fade-up">
                    Why Choose Our
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-orange-400 to-orange-500 animate-gradient-flow">
                        Machinery?
                    </span>
                </h2>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="text-center p-8 rounded-2xl bg-black border border-gray-800 hover:border-orange-600 transition-all duration-500 hover:-translate-y-2 animate-on-scroll hover-bounce" data-aos="fade-up" data-aos-delay="100">
                    <div class="w-20 h-20 bg-gradient-to-r from-orange-600 to-orange-500 rounded-full flex items-center justify-center mx-auto mb-6 animate-rotate-in">
                        <i class="fas fa-cogs text-2xl animate-spin animation-delay-1000"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-4 animate-slide-in-up">Precision Engineering</h3>
                    <p class="text-gray-400 animate-fade-in animation-delay-200">Micron-level accuracy for consistent quality</p>
                </div>
                
                <div class="text-center p-8 rounded-2xl bg-black border border-gray-800 hover:border-orange-600 transition-all duration-500 hover:-translate-y-2 animate-on-scroll hover-bounce" data-aos="fade-up" data-aos-delay="200">
                    <div class="w-20 h-20 bg-gradient-to-r from-orange-600 to-orange-500 rounded-full flex items-center justify-center mx-auto mb-6 animate-rotate-in animation-delay-100">
                        <i class="fas fa-bolt text-2xl animate-pulse"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-4 animate-slide-in-up">Energy Efficient</h3>
                    <p class="text-gray-400 animate-fade-in animation-delay-300">Reduce operational costs by up to 40%</p>
                </div>
                
                <div class="text-center p-8 rounded-2xl bg-black border border-gray-800 hover:border-orange-600 transition-all duration-500 hover:-translate-y-2 animate-on-scroll hover-bounce" data-aos="fade-up" data-aos-delay="300">
                    <div class="w-20 h-20 bg-gradient-to-r from-orange-600 to-orange-500 rounded-full flex items-center justify-center mx-auto mb-6 animate-rotate-in animation-delay-200">
                        <i class="fas fa-headset text-2xl animate-float"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-4 animate-slide-in-up">24/7 Support</h3>
                    <p class="text-gray-400 animate-fade-in animation-delay-400">Round-the-clock technical assistance</p>
                </div>
                
                <div class="text-center p-8 rounded-2xl bg-black border border-gray-800 hover:border-orange-600 transition-all duration-500 hover:-translate-y-2 animate-on-scroll hover-bounce" data-aos="fade-up" data-aos-delay="400">
                    <div class="w-20 h-20 bg-gradient-to-r from-orange-600 to-orange-500 rounded-full flex items-center justify-center mx-auto mb-6 animate-rotate-in animation-delay-300">
                        <i class="fas fa-sync-alt text-2xl animate-spin"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-4 animate-slide-in-up">Quick ROI</h3>
                    <p class="text-gray-400 animate-fade-in animation-delay-500">Average payback period of 12-18 months</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="relative py-24 bg-gradient-to-r from-black via-gray-900 to-black overflow-hidden">
    <!-- Pattern -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute inset-0 bg-black/[0.05]"></div>
    </div>
    
    <!-- Floating Particles -->
    <div class="particles-container absolute inset-0"></div>
    
    <div class="container mx-auto px-4 lg:px-8 relative z-10">
        <div class="max-w-4xl mx-auto text-center text-white">
            <h2 class="text-5xl font-bold mb-8 animate-on-scroll" data-aos="fade-up">
                Need Custom <span class="text-orange-500 animate-gradient-flow">Solutions?</span>
            </h2>
            <p class="text-gray-300 text-2xl mb-12 max-w-2xl mx-auto leading-relaxed animate-on-scroll animation-delay-100" data-aos="fade-up" data-aos-delay="100">
                Our engineering team can design and manufacture custom machinery tailored to your specific requirements.
            </p>
            
            <div class="flex flex-col sm:flex-row gap-6 justify-center animate-on-scroll animation-delay-200" data-aos="fade-up" data-aos-delay="200">
                <a href="contact.php" 
                   class="group bg-orange-600 text-white px-10 py-5 text-xl rounded-xl font-bold hover:bg-orange-700 transition-all duration-500 transform hover:-translate-y-1 shadow-2xl hover:shadow-3xl flex items-center justify-center hover-lift">
                    <i class="fas fa-comment-dots mr-3 group-hover:rotate-12 transition-transform duration-500 animate-wave"></i>
                    Discuss Your Needs
                </a>
                <a href="tel:+911234567890" 
                   class="group bg-white text-black px-10 py-5 text-xl rounded-xl font-bold hover:bg-gray-100 transition-all duration-500 transform hover:-translate-y-1 flex items-center justify-center hover-lift">
                    <i class="fas fa-phone mr-3 group-hover:scale-110 transition-transform duration-500 animate-pulse"></i>
                    Call Expert Now
                </a>
            </div>
            
            <div class="mt-16 grid grid-cols-1 md:grid-cols-3 gap-8 animate-on-scroll animation-delay-300" data-aos="fade-up" data-aos-delay="300">
                <div class="text-center">
                    <div class="text-4xl font-bold mb-2 text-orange-500 animate-bounce-in">✓</div>
                    <p class="font-medium text-gray-300 animate-fade-in">Free Consultation</p>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-bold mb-2 text-orange-500 animate-bounce-in animation-delay-100">✓</div>
                    <p class="font-medium text-gray-300 animate-fade-in animation-delay-100">Custom Engineering</p>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-bold mb-2 text-orange-500 animate-bounce-in animation-delay-200">✓</div>
                    <p class="font-medium text-gray-300 animate-fade-in animation-delay-200">Lifetime Support</p>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="https://unpkg.com/@studio-freight/lenis@1.0.42/dist/lenis.min.js"></script>
<script>
// Initialize Lenis Smooth Scroll
const lenis = new Lenis({
    duration: 1.2,
    easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)),
    direction: 'vertical',
    gestureDirection: 'vertical',
    smooth: true,
    smoothTouch: false,
    touchMultiplier: 2,
    wheelMultiplier: 1,
    infinite: false,
})

// Lenis animation frame
function raf(time) {
    lenis.raf(time)
    requestAnimationFrame(raf)
}

requestAnimationFrame(raf)

// Initialize AOS
AOS.init({
    duration: 1000,
    easing: 'ease-out',
    once: true,
    offset: 100
});

document.addEventListener('DOMContentLoaded', function() {
    // Create floating particles
    function createParticles() {
        const sections = document.querySelectorAll('.py-24, .py-20');
        
        sections.forEach(section => {
            const particlesContainer = document.createElement('div');
            particlesContainer.className = 'particles-container absolute inset-0 pointer-events-none';
            section.appendChild(particlesContainer);
            
            for (let i = 0; i < 15; i++) {
                const particle = document.createElement('div');
                particle.className = 'particle';
                particle.style.width = Math.random() * 20 + 5 + 'px';
                particle.style.height = particle.style.width;
                particle.style.left = Math.random() * 100 + '%';
                particle.style.top = Math.random() * 100 + '%';
                particle.style.animationDelay = Math.random() * 5 + 's';
                particle.style.animationDuration = Math.random() * 3 + 2 + 's';
                particlesContainer.appendChild(particle);
            }
        });
    }
    
    createParticles();

    const filterBtns = document.querySelectorAll('.filter-btn');
    const productItems = document.querySelectorAll('.product-card-gallery');
    
    filterBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            // Update active state with animation
            filterBtns.forEach(b => {
                b.classList.remove('active');
                b.style.transform = 'translateY(0)';
            });
            this.classList.add('active');
            this.style.transform = 'translateY(-3px)';
            
            const category = this.dataset.category;
            
            // Filter products with animation
            productItems.forEach((item, index) => {
                const delay = index * 50;
                
                if (category === 'all' || item.dataset.category === category) {
                    setTimeout(() => {
                        item.style.display = 'block';
                        item.style.animation = 'fadeInUp 0.5s forwards';
                    }, delay);
                } else {
                    item.style.animation = 'none';
                    item.style.opacity = '0';
                    item.style.transform = 'translateY(30px)';
                    setTimeout(() => {
                        item.style.display = 'none';
                    }, 300);
                }
            });

            // Smooth scroll to products grid
            lenis.scrollTo('#products-grid', {
                duration: 1.2,
                easing: (x) => 1 - Math.pow(1 - x, 3),
                offset: -100
            });
        });
    });

    // Add hover effect to product cards
    productItems.forEach(item => {
        item.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-10px)';
        });
        
        item.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });

    // Add click effect to product cards
    productItems.forEach(item => {
        item.addEventListener('click', function(e) {
            // Add ripple effect
            const ripple = document.createElement('span');
            const rect = this.getBoundingClientRect();
            const size = Math.max(rect.width, rect.height);
            const x = e.clientX - rect.left - size / 2;
            const y = e.clientY - rect.top - size / 2;
            
            ripple.style.cssText = `
                position: absolute;
                border-radius: 50%;
                background: rgba(255, 87, 34, 0.5);
                transform: scale(0);
                animation: ripple 0.6s linear;
                width: ${size}px;
                height: ${size}px;
                top: ${y}px;
                left: ${x}px;
                pointer-events: none;
                z-index: 100;
            `;
            
            this.appendChild(ripple);
            
            setTimeout(() => {
                ripple.remove();
            }, 600);
        });
    });

    // Scroll-triggered animations
    function onScrollAnimations() {
        const elements = document.querySelectorAll('.animate-on-scroll');
        
        elements.forEach(element => {
            const elementTop = element.getBoundingClientRect().top;
            const elementVisible = 150;
            
            if (elementTop < window.innerHeight - elementVisible) {
                element.classList.add('active');
            }
        });
    }

    // Initialize scroll animations
    window.addEventListener('scroll', onScrollAnimations);
    onScrollAnimations();
});
</script>

<?php include 'includes/footer.php'; ?>