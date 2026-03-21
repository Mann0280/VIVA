<?php 
include 'includes/header.php';

require_once 'data/products-data.php';

$cat_slug = isset($_GET['category']) ? $_GET['category'] : null;
$sub_slug = isset($_GET['sub']) ? $_GET['sub'] : null;
$variant_slug = isset($_GET['variant']) ? $_GET['variant'] : null;

$product = null;

if ($cat_slug && isset($product_categories[$cat_slug])) {
    $category_data = $product_categories[$cat_slug];
    
    if ($sub_slug && isset($category_data['sub_categories'][$sub_slug])) {
        $sub_data = $category_data['sub_categories'][$sub_slug];
        
        if ($variant_slug && isset($sub_data['variants'][$variant_slug])) {
            $raw_product = $sub_data['variants'][$variant_slug];
        } else {
            $raw_product = $sub_data;
        }
        
        $product_name = isset($raw_product['name']) ? $raw_product['name'] : 'Industrial Machine';
        $main_image = isset($raw_product['image']) ? $raw_product['image'] : (isset($category_data['image']) ? $category_data['image'] : '');
        $description = isset($raw_product['description']) ? $raw_product['description'] : (isset($category_data['description']) ? $category_data['description'] : '');
        
        $features = isset($raw_product['features']) && is_array($raw_product['features']) && count($raw_product['features']) > 0  ? $raw_product['features'] : (isset($category_data['features']) ? $category_data['features'] : []);
        $applications = isset($raw_product['applications']) && is_array($raw_product['applications']) && count($raw_product['applications']) > 0 ? $raw_product['applications'] : (isset($category_data['applications']) ? $category_data['applications'] : []);
        $benefits = isset($raw_product['benefits']) && is_array($raw_product['benefits']) && count($raw_product['benefits']) > 0 ? $raw_product['benefits'] : (isset($category_data['benefits']) ? $category_data['benefits'] : []);
        $specs = isset($raw_product['specs']) ? $raw_product['specs'] : [];
        $gallery = isset($raw_product['gallery']) ? $raw_product['gallery'] : [$main_image];
        
        $product = [
            'name' => $product_name,
            'category' => $category_data['name'],
            'main_image' => $main_image,
            'gallery' => $gallery,
            'description' => $description,
            'features' => $features,
            'specifications' => $specs,
            'applications' => $applications,
            'benefits' => $benefits,
            'tagline' => 'High Performance Industrial Equipment',
            'price' => isset($raw_product['price']) ? $raw_product['price'] : 'Contact for Price'
        ];
    }
}

if (!$product) {
    echo "<div class='container mx-auto py-32 px-4 text-center text-white'><h2 class='text-3xl font-bold mb-6'>Product Not Found</h2><a href='products.php' class='px-6 py-3 bg-orange-600 hover:bg-orange-700 text-white rounded-full transition-colors'>Return to Products</a></div>";
    include 'includes/footer.php';
    exit;
}
?>

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
    0% { transform: translateX(-100%); }
    100% { transform: translateX(100%); }
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

/* Animation Classes */
.animate-float {
    animation: float 3s ease-in-out infinite;
}

.animate-pulse-glow {
    animation: pulse-glow 2s ease-in-out infinite;
}

.animate-shimmer {
    animation: shimmer 3s infinite;
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
.animation-delay-600 { animation-delay: 600ms !important; }
.animation-delay-700 { animation-delay: 700ms !important; }
.animation-delay-800 { animation-delay: 800ms !important; }
.animation-delay-900 { animation-delay: 900ms !important; }
.animation-delay-1000 { animation-delay: 1000ms !important; }

/* Grid Pattern */
.bg-grid-white {
    background-image: linear-gradient(to right, rgba(255,255,255,0.1) 1px, transparent 1px),
                      linear-gradient(to bottom, rgba(255,255,255,0.1) 1px, transparent 1px);
}

/* Image Gallery Animation */
#main-image {
    transition: all 0.7s cubic-bezier(0.4, 0, 0.2, 1);
}

.thumbnail-item img {
    transition: transform 0.3s ease;
}

.thumbnail-item:hover img {
    transform: scale(1.1);
}

/* Responsive Styles */
@media (max-width: 768px) {
    .sticky {
        position: relative;
        top: 0;
    }
    
    #main-image {
        height: 300px;
    }
    
    .thumbnail-item img {
        height: 60px;
    }
    
    h1 {
        font-size: 2rem;
    }
    
    .text-4xl {
        font-size: 1.5rem;
    }
    
    .text-2xl {
        font-size: 1.25rem;
    }
    
    .px-8 {
        padding-left: 1rem;
        padding-right: 1rem;
    }
    
    .py-5 {
        padding-top: 1.25rem;
        padding-bottom: 1.25rem;
    }
}

@media (max-width: 480px) {
    #main-image {
        height: 250px;
    }
    
    .thumbnail-item img {
        height: 50px;
    }
    
    h1 {
        font-size: 1.75rem;
    }
    
    .grid-cols-4 {
        grid-template-columns: repeat(2, 1fr);
    }
}
</style>

<!-- Product Detail Hero -->
<section class="relative py-20 bg-black overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute inset-0 bg-grid-white/[0.02] bg-[size:20px_20px] animate-slide-in-left"></div>
    </div>
    
    <div class="container mx-auto px-4 lg:px-8 relative z-10">
        <!-- Breadcrumb -->
        <nav class="flex items-center space-x-2 text-sm text-gray-400 mb-8 animate-fade-in">
            <a href="index.php" class="hover:text-white transition">Home</a>
            <i class="fas fa-chevron-right text-xs"></i>
            <a href="products.php" class="hover:text-white transition">Products</a>
            <i class="fas fa-chevron-right text-xs"></i>
            <span class="text-orange-500 font-medium animate-pulse"><?php echo $product['name']; ?></span>
        </nav>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-start">
            <!-- Image Gallery -->
            <div class="sticky top-24">
                <!-- Main Image -->
                <div class="mb-8 rounded-2xl overflow-hidden border-2 border-gray-800 bg-gray-900 shadow-2xl hover-scale" data-aos="fade-right">
                    <img id="main-image" src="<?php echo $product['main_image']; ?>" 
                         alt="<?php echo $product['name']; ?>" 
                         class="w-full h-[500px] object-cover cursor-pointer transition-transform duration-700 animate-scale-in">
                </div>
                
                <!-- Thumbnail Gallery -->
                <div class="grid grid-cols-4 gap-4" data-aos="fade-right" data-aos-delay="100">
                    <?php foreach ($product['gallery'] as $index => $image): ?>
                    <div class="thumbnail-item rounded-xl overflow-hidden border-2 border-gray-800 cursor-pointer hover:border-orange-600 transition-all duration-300 <?php echo $index === 0 ? 'border-orange-600 animate-pulse-glow' : ''; ?> hover-bounce"
                         data-image="<?php echo $image; ?>">
                        <img src="<?php echo $image; ?>" alt="View <?php echo $index + 1; ?>" 
                             class="w-full h-24 object-cover animate-fade-in" style="animation-delay: <?php echo ($index * 100) + 200; ?>ms;">
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Product Info -->
            <div class="space-y-8">
                <!-- Category Badge -->
                <div class="inline-flex items-center space-x-2 bg-gradient-to-r from-orange-600 to-orange-700 px-6 py-3 rounded-full animate-bounce-in" data-aos="fade-left">
                    <i class="fas fa-tag text-white animate-spin animation-delay-1000"></i>
                    <span class="text-sm font-bold text-white animate-slide-in-right"><?php echo $product['category']; ?></span>
                </div>

                <!-- Product Title -->
                <div data-aos="fade-left" data-aos-delay="100">
                    <h1 class="text-4xl lg:text-5xl font-bold text-white mb-4 leading-tight animate-slide-in-up">
                        <?php echo $product['name']; ?>
                    </h1>
                    <p class="text-xl text-gray-300 animate-fade-in animation-delay-200"><?php echo $product['tagline']; ?></p>
                </div>

                <!-- Price & Availability -->
                <div class="bg-gray-900 rounded-2xl p-8 border border-gray-800 animate-on-scroll hover-lift" data-aos="fade-up">
                    <div class="flex flex-col md:flex-row items-center justify-between gap-6">
                        <div class="text-center md:text-left">
                            <p class="text-sm text-gray-400 mb-1 uppercase animate-fade-in">Starting Price</p>
                            <p class="text-4xl font-bold text-white animate-bounce-in"><?php echo $product['price']; ?></p>
                        </div>
                        <div class="text-center">
                            <p class="text-sm text-gray-400 mb-1 uppercase animate-fade-in animation-delay-100">Availability</p>
                            <div class="flex items-center justify-center text-green-500 animate-pulse">
                                <div class="relative">
                                    <span class="absolute inset-0 animate-ping bg-green-400 rounded-full opacity-75"></span>
                                    <span class="relative w-3 h-3 bg-green-600 rounded-full mr-3"></span>
                                </div>
                                <span class="relative font-bold animate-slide-in-right animation-delay-200">In Stock</span>
                            </div>
                        </div>
                        <div class="text-center">
                            <p class="text-sm text-gray-400 mb-1 uppercase animate-fade-in animation-delay-200">Lead Time</p>
                            <div class="flex items-center justify-center text-orange-500">
                                <i class="fas fa-clock mr-2 animate-spin"></i>
                                <span class="font-bold animate-slide-in-up animation-delay-300">4-6 Weeks</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Description -->
                <div class="bg-gray-900 rounded-2xl p-8 border border-gray-800 animate-on-scroll hover-lift" data-aos="fade-up" data-aos-delay="100">
                    <h3 class="text-2xl font-bold text-white mb-6 pb-4 border-b border-gray-800 flex items-center animate-slide-in-left">
                        <i class="fas fa-clipboard-list mr-3 text-orange-500 animate-rotate-in"></i>
                        Product Overview
                    </h3>
                    <p class="text-gray-300 leading-relaxed animate-fade-in animation-delay-200"><?php echo $product['description']; ?></p>
                </div>

                <!-- Key Features -->
                <div class="bg-gray-900 rounded-2xl p-8 border border-gray-800 animate-on-scroll hover-lift" data-aos="fade-up" data-aos-delay="200">
                    <h3 class="text-2xl font-bold text-white mb-6 pb-4 border-b border-gray-800 flex items-center animate-slide-in-left">
                        <i class="fas fa-star mr-3 text-orange-500 animate-pulse"></i>
                        Key Features
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <?php foreach ($product['features'] as $index => $feature): ?>
                        <div class="flex items-start space-x-4 bg-gray-800 p-4 rounded-lg hover:bg-gray-700 transition-colors animate-on-scroll stagger-item" data-delay="<?php echo $index * 100; ?>">
                            <div class="flex-shrink-0 w-6 h-6 bg-orange-600 rounded-full flex items-center justify-center animate-bounce-in" style="animation-delay: <?php echo $index * 100; ?>ms;">
                                <i class="fas fa-check text-white text-xs animate-spin"></i>
                            </div>
                            <span class="text-gray-300 animate-fade-in" style="animation-delay: <?php echo $index * 100 + 200; ?>ms;"><?php echo $feature; ?></span>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- CTA Buttons -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 animate-on-scroll" data-aos="fade-up" data-aos-delay="300">
                    <a href="contact.php?product=<?php echo urlencode($product['name']); ?>" 
                       class="group bg-gradient-to-r from-orange-600 to-orange-700 text-white px-8 py-5 text-center rounded-xl font-bold hover:from-orange-700 hover:to-orange-800 transition-all duration-300 shadow-xl hover:shadow-2xl flex items-center justify-center hover-lift">
                        <i class="fas fa-envelope mr-3 group-hover:scale-110 transition-transform animate-wave"></i>
                        Request Quote
                    </a>
                    <a href="tel:+911234567890" 
                       class="group bg-gray-900 border-2 border-white text-white px-8 py-5 text-center rounded-xl font-bold hover:bg-white hover:text-black transition-all duration-300 flex items-center justify-center hover-lift">
                        <i class="fas fa-phone mr-3 group-hover:scale-110 transition-transform animate-pulse"></i>
                        Call Now
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Technical Specifications -->
<section class="py-20 bg-gray-900">
    <div class="container mx-auto px-4 lg:px-8">
        <div class="max-w-5xl mx-auto">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-4xl font-bold text-white mb-6 relative inline-block animate-slide-in-up">
                    Technical Specifications
                    <span class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-24 h-1 bg-orange-600 animate-pulse"></span>
                </h2>
                <p class="text-gray-300 text-xl animate-fade-in animation-delay-200">Detailed technical information and performance specifications</p>
            </div>

            <div class="bg-black rounded-2xl border border-gray-800 overflow-hidden animate-on-scroll hover-lift" data-aos="fade-up">
                <div class="bg-gradient-to-r from-orange-600 to-orange-700 p-6">
                    <h3 class="text-2xl font-bold text-white flex items-center animate-slide-in-left">
                        <i class="fas fa-cogs mr-3 animate-spin"></i>
                        Technical Data Sheet
                    </h3>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <tbody>
                            <?php foreach ($product['specifications'] as $key => $value): ?>
                            <tr class="border-b border-gray-800 hover:bg-gray-900 transition-colors animate-on-scroll">
                                <td class="px-4 md:px-8 py-6 font-bold text-white text-lg w-1/3 border-r border-gray-800 bg-gray-900 animate-slide-in-left">
                                    <?php echo $key; ?>
                                </td>
                                <td class="px-4 md:px-8 py-6 text-gray-300 text-lg animate-slide-in-right">
                                    <?php echo $value; ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="bg-gray-900 p-6 border-t border-gray-800">
                    <a href="#" class="inline-flex items-center text-orange-500 font-bold hover:text-orange-400 animate-pulse">
                        <i class="fas fa-download mr-2 animate-bounce"></i>
                        Download Technical Data Sheet (PDF)
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Applications -->
<section class="py-20 bg-black">
    <div class="container mx-auto px-4 lg:px-8">
        <div class="max-w-5xl mx-auto">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-4xl font-bold text-white mb-6 relative inline-block animate-slide-in-up">
                    Applications & Industries
                    <span class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-24 h-1 bg-orange-600 animate-pulse"></span>
                </h2>
                <p class="text-gray-300 text-xl animate-fade-in animation-delay-200">Ideal for various manufacturing and processing applications</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php foreach ($product['applications'] as $index => $application): ?>
                <div class="bg-gray-900 p-8 rounded-2xl border border-gray-800 hover:border-orange-600 transition-all duration-500 group animate-on-scroll hover-bounce" data-aos="fade-up" data-aos-delay="<?php echo $index * 100; ?>">
                    <div class="w-16 h-16 bg-gradient-to-r from-orange-600 to-orange-700 rounded-xl flex items-center justify-center mb-6 transform group-hover:rotate-12 transition-transform duration-500 animate-rotate-in" style="animation-delay: <?php echo $index * 100; ?>ms;">
                        <i class="fas fa-industry text-white text-2xl animate-spin animation-delay-1000"></i>
                    </div>
                    <h4 class="font-bold text-xl text-white mb-4 group-hover:text-orange-400 transition-colors duration-300 animate-slide-in-up" style="animation-delay: <?php echo $index * 100 + 100; ?>ms;">
                        <?php echo $application; ?>
                    </h4>
                    <p class="text-gray-400 text-sm animate-fade-in" style="animation-delay: <?php echo $index * 100 + 200; ?>ms;">Optimized for maximum efficiency and quality output</p>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<!-- Related Products -->
<section class="py-20 bg-gray-900">
    <div class="container mx-auto px-4 lg:px-8">
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="text-4xl font-bold text-white mb-6 relative inline-block animate-slide-in-up">
                Related Products
                <span class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-24 h-1 bg-orange-600 animate-pulse"></span>
            </h2>
            <p class="text-gray-300 text-xl animate-fade-in animation-delay-200">You might also be interested in these products</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php 
            // Get 3 random related products (excluding current)
            $related_ids = [];
            while (count($related_ids) < 3) {
                $rand_id = rand(1, 9);
                if ($rand_id != $product_id && !in_array($rand_id, $related_ids)) {
                    $related_ids[] = $rand_id;
                }
            }
            
            foreach ($related_ids as $index => $rel_id):
                $related = $products[$rel_id];
            ?>
            <a href="product-detail.php?id=<?php echo $rel_id; ?>" 
               class="group block bg-black rounded-2xl border border-gray-800 overflow-hidden hover:border-orange-600 transition-all duration-500 hover:shadow-2xl animate-on-scroll hover-lift" 
               data-aos="fade-up" 
               data-aos-delay="<?php echo $index * 100; ?>">
                <div class="relative overflow-hidden">
                    <img src="<?php echo $related['main_image']; ?>" alt="<?php echo $related['name']; ?>" 
                         class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-700 animate-scale-in">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    <div class="absolute top-4 left-4">
                        <span class="bg-orange-600 text-white px-4 py-2 rounded-full text-sm font-bold animate-bounce-in" style="animation-delay: <?php echo $index * 100 + 200; ?>ms;">
                            <?php echo $related['category']; ?>
                        </span>
                    </div>
                </div>
                <div class="p-8">
                    <h4 class="font-bold text-2xl text-white mb-4 group-hover:text-orange-400 transition-colors duration-300 animate-slide-in-up" style="animation-delay: <?php echo $index * 100 + 300; ?>ms;">
                        <?php echo $related['name']; ?>
                    </h4>
                    <div class="flex items-center text-orange-500 font-bold text-lg group-hover:text-orange-400 transition-colors duration-300 animate-pulse">
                        View Details
                        <i class="fas fa-arrow-right ml-3 transform group-hover:translate-x-3 transition-transform duration-500 animate-slide-in-right" style="animation-delay: <?php echo $index * 100 + 400; ?>ms;"></i>
                    </div>
                </div>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="relative py-24 bg-gradient-to-r from-black via-gray-900 to-black overflow-hidden">
    <!-- Animated Background -->
    <div class="absolute inset-0 bg-gradient-to-r from-transparent via-orange-600/10 to-transparent animate-shimmer"></div>
    
    <div class="container mx-auto px-4 lg:px-8 relative z-10">
        <div class="max-w-4xl mx-auto text-center text-white" data-aos="fade-up">
            <h2 class="text-5xl font-bold mb-8 animate-slide-in-up">
                Ready to Transform Your Production?
            </h2>
            <p class="text-gray-300 text-2xl mb-12 max-w-2xl mx-auto leading-relaxed animate-fade-in animation-delay-200">
                Contact our engineering team for detailed pricing, customization options, and delivery timelines.
            </p>
            
            <div class="flex flex-col sm:flex-row gap-6 justify-center" data-aos="fade-up" data-aos-delay="100">
                <a href="contact.php?product=<?php echo urlencode($product['name']); ?>" 
                   class="group bg-gradient-to-r from-orange-600 to-orange-700 text-white px-10 py-5 text-xl rounded-xl font-bold hover:from-orange-700 hover:to-orange-800 transition-all duration-500 shadow-2xl hover:shadow-3xl flex items-center justify-center hover-lift">
                    <i class="fas fa-paper-plane mr-3 group-hover:rotate-12 transition-transform duration-500 animate-float"></i>
                    Get Detailed Quote
                </a>
                <a href="contact.php" 
                   class="group bg-transparent border-2 border-white text-white px-10 py-5 text-xl rounded-xl font-bold hover:bg-white hover:text-black transition-all duration-500 flex items-center justify-center hover-lift">
                    <i class="fas fa-calendar-alt mr-3 group-hover:scale-110 transition-transform duration-500 animate-pulse"></i>
                    Schedule Demo
                </a>
            </div>
            
            <div class="mt-12 pt-8 border-t border-gray-800" data-aos="fade-up" data-aos-delay="200">
                <div class="flex flex-wrap justify-center gap-8 text-gray-400">
                    <div class="flex items-center animate-on-scroll">
                        <i class="fas fa-clock text-orange-500 mr-3 animate-spin"></i>
                        <span class="animate-fade-in">24-Hour Response Time</span>
                    </div>
                    <div class="flex items-center animate-on-scroll animation-delay-100">
                        <i class="fas fa-globe text-orange-500 mr-3 animate-rotate-in"></i>
                        <span class="animate-fade-in animation-delay-100">Worldwide Shipping</span>
                    </div>
                    <div class="flex items-center animate-on-scroll animation-delay-200">
                        <i class="fas fa-user-cog text-orange-500 mr-3 animate-bounce-in"></i>
                        <span class="animate-fade-in animation-delay-200">Expert Installation Support</span>
                    </div>
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

// Update lenis on scroll
lenis.on('scroll', (e) => {
    // You can add parallax effects here if needed
    const scrolled = e.scroll
    const parallaxElements = document.querySelectorAll('[data-parallax]')
    
    parallaxElements.forEach(el => {
        const speed = el.dataset.parallaxSpeed || 0.5
        const y = scrolled * speed
        el.style.transform = `translateY(${y}px)`
    })
})

// Initialize AOS
AOS.init({
    duration: 1000,
    easing: 'ease-out',
    once: true,
    offset: 100
});

document.addEventListener('DOMContentLoaded', function() {
    // Image Gallery
    const mainImage = document.getElementById('main-image');
    const thumbnails = document.querySelectorAll('.thumbnail-item');
    
    thumbnails.forEach(thumb => {
        thumb.addEventListener('click', function() {
            const newImage = this.dataset.image;
            
            // Add fade effect
            mainImage.style.opacity = '0';
            mainImage.style.transform = 'scale(0.9)';
            setTimeout(() => {
                mainImage.src = newImage;
                mainImage.style.opacity = '1';
                mainImage.style.transform = 'scale(1)';
            }, 300);
            
            // Update active state
            thumbnails.forEach(t => {
                t.classList.remove('border-orange-600', 'animate-pulse-glow');
                t.classList.add('border-gray-800');
            });
            this.classList.add('border-orange-600', 'animate-pulse-glow');
            this.classList.remove('border-gray-800');
        });
    });

    // Image zoom on click
    mainImage.addEventListener('click', function() {
        this.classList.toggle('scale-150');
        this.classList.toggle('cursor-zoom-out');
    });

    // Scroll-triggered animations
    function onScrollAnimations() {
        const elements = document.querySelectorAll('.animate-on-scroll, .stagger-item');
        
        elements.forEach(element => {
            const elementTop = element.getBoundingClientRect().top;
            const elementVisible = 150;
            
            if (elementTop < window.innerHeight - elementVisible) {
                const delay = element.dataset.delay || 0;
                setTimeout(() => {
                    element.classList.add('active');
                }, delay);
            }
        });
    }

    // Staggered animations
    function animateStaggerItems() {
        const staggerItems = document.querySelectorAll('.stagger-item');
        
        staggerItems.forEach((item, index) => {
            const delay = item.dataset.delay || index * 100;
            setTimeout(() => {
                item.classList.add('active');
            }, delay);
        });
    }

    // Initialize animations
    window.addEventListener('scroll', onScrollAnimations);
    onScrollAnimations();
    animateStaggerItems();
});
</script>

<?php include 'includes/footer.php'; ?>