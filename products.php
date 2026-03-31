<?php
require_once 'admin/includes/functions.php';
?>

<?php
$cat_slug = isset($_GET['category']) ? $_GET['category'] : null;
$level = 1; // 1: Main Categories, 2: Products
$items = [];
$page_title = "Products | VIVA ENGINEERING Solutions";
$page_heading = "Our Product Range";
$page_subheading = "Discover our comprehensive range of precision-engineered industrial machinery designed to elevate your manufacturing capabilities.";
$breadcrumb = [['name' => 'Home', 'url' => 'index.php'], ['name' => 'Products', 'url' => 'products.php']];

// Fetch Data dynamically
if ($cat_slug) {
    $stmt = $pdo->prepare("SELECT * FROM categories WHERE slug = ? AND status = 'active'");
    $stmt->execute([$cat_slug]);
    $category = $stmt->fetch();

    if ($category) {
        $breadcrumb[] = ['name' => $category['name'], 'url' => "products.php?category=$cat_slug"];
        $page_title = !empty($category['seo_title']) ? $category['seo_title'] : $category['name'] . " | VIVA ENGINEERING";
        $meta_description = $category['seo_description'] ?? '';
        $meta_keywords = $category['meta_keywords'] ?? '';
        $page_heading = $category['name'];
        
        // Fetch subcategories
        $stmt = $pdo->prepare("SELECT * FROM categories WHERE parent_id = ? AND status = 'active' ORDER BY name ASC");
        $stmt->execute([$category['id']]);
        $subcategories = $stmt->fetchAll();

        // Fetch direct products
        $stmt = $pdo->prepare("SELECT * FROM products WHERE category_id = ? AND status = 'active' ORDER BY name ASC");
        $stmt->execute([$category['id']]);
        $direct_products = $stmt->fetchAll();

        if (!empty($subcategories) || !empty($direct_products)) {
            $level = !empty($subcategories) ? 1 : 2; 
            // If both exist, we prioritize the grid view but could show both.
            // For now, let's combine them into $items but mark them
            foreach($subcategories as &$sc) { $sc['is_category'] = true; }
            foreach($direct_products as &$dp) { $dp['is_category'] = false; }
            
            $items = array_merge($subcategories, $direct_products);
        }
    }
} else {
    $stmt = $pdo->query("SELECT * FROM categories WHERE parent_id IS NULL AND status = 'active' ORDER BY name ASC");
    $items = $stmt->fetchAll();
    $level = 1;
}

include 'includes/header.php'; 
?>

<style>
    /* Products Page Styles */
    .products-hero {
        padding-top: 100px;
        padding-bottom: 40px;
        background: linear-gradient(to bottom, #000 0%, #0a0a0a 100%);
        position: relative;
        overflow: hidden;
    }
    .products-hero::before {
        content: '';
        position: absolute;
        inset: 0;
        background-image: 
            linear-gradient(rgba(255,87,34,0.03) 1px, transparent 1px),
            linear-gradient(90deg, rgba(255,87,34,0.03) 1px, transparent 1px);
        background-size: 40px 40px;
        opacity: 0.5;
    }

    /* Breadcrumb */
    .products-breadcrumb {
        display: flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 20px;
        font-size: 13px;
    }
    .products-breadcrumb a {
        color: #6b7280;
        text-decoration: none;
        transition: color 0.3s;
    }
    .products-breadcrumb a:hover { color: #FF5722; }
    .products-breadcrumb .separator { color: #374151; }
    .products-breadcrumb .current { color: #FF5722; font-weight: 600; }

    /* Results count */
    .results-bar {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 24px;
        padding-bottom: 16px;
        border-bottom: 1px solid rgba(255,255,255,0.06);
    }
    .results-count {
        font-size: 13px;
        color: #6b7280;
    }
    .results-count span { color: white; font-weight: 600; }

    /* Empty state */
    .empty-state {
        text-align: center;
        padding: 60px 20px;
        background: #111;
        border: 1px dashed #333;
        border-radius: 16px;
    }
</style>

<!-- Hero Section -->
<section class="products-hero">
    <div class="container mx-auto px-4 lg:px-8 relative z-10">
        <!-- Breadcrumb -->
        <nav class="products-breadcrumb">
            <?php foreach ($breadcrumb as $i => $crumb): ?>
                <?php if ($i < count($breadcrumb) - 1): ?>
                    <a href="<?php echo $crumb['url']; ?>"><?php echo h($crumb['name']); ?></a>
                    <span class="separator"><i class="fas fa-chevron-right text-[10px]"></i></span>
                <?php else: ?>
                    <span class="current"><?php echo h($crumb['name']); ?></span>
                <?php endif; ?>
            <?php endforeach; ?>
        </nav>

        <!-- Badge -->
        <div class="inline-flex items-center space-x-2 bg-orange-600/10 border border-orange-600/30 px-4 py-1.5 rounded-full mb-4">
            <span class="w-1.5 h-1.5 bg-orange-600 rounded-full animate-pulse"></span>
            <span class="text-[10px] font-bold text-orange-600 uppercase tracking-widest"><?php echo $level == 1 ? 'Product Categories' : 'Machines'; ?></span>
        </div>
        
        <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-white mb-3 leading-tight">
            <?php if ($level == 1 && !$cat_slug): ?>
                Our Product <span class="text-orange-600">Range</span>
            <?php else: ?>
                <?php echo htmlspecialchars($page_heading); ?>
            <?php endif; ?>
        </h1>
        
        <p class="text-sm md:text-base text-gray-500 max-w-2xl leading-relaxed">
            <?php echo htmlspecialchars($page_subheading); ?>
        </p>
    </div>
</section>

<!-- Products Grid Section -->
<section id="products-grid" class="py-10 bg-black min-h-[40vh]">
    <div class="container mx-auto px-4 lg:px-8">
        
        <!-- Results bar -->
        <div class="results-bar">
            <div class="results-count">
                Showing <span><?php echo count($items); ?></span> <?php echo $level == 1 ? 'categories' : 'products'; ?>
            </div>
            <?php if ($cat_slug && isset($category) && is_array($category) && !empty($category['parent_id'])): ?>
                <?php 
                    $parent = $pdo->prepare("SELECT slug, name FROM categories WHERE id = ?");
                    $parent->execute([$category['parent_id']]);
                    $parentCat = $parent->fetch();
                ?>
                <?php if ($parentCat): ?>
                <a href="products.php?category=<?php echo h($parentCat['slug']); ?>" class="text-sm text-gray-500 hover:text-orange-600 transition-colors">
                    <i class="fas fa-arrow-left mr-2"></i>Back to <?php echo h($parentCat['name']); ?>
                </a>
                <?php endif; ?>
            <?php elseif ($cat_slug): ?>
                <a href="products.php" class="text-sm text-gray-500 hover:text-orange-600 transition-colors">
                    <i class="fas fa-arrow-left mr-2"></i>All Categories
                </a>
            <?php endif; ?>
        </div>

        <!-- Elegant Grid Layout -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 md:gap-8">
            <?php
            $index = 0;
            foreach ($items as $item):
                $is_cat = isset($item['is_category']) ? $item['is_category'] : ($level == 1);
                $link = $is_cat ? "products.php?category=" . h($item['slug']) : "product-detail.php?product=" . h($item['slug']);
                $badge = $is_cat ? 'Category' : 'Machine';
                
                // Unified image support for both categories and newly migrated products schema
                $image_source = !empty($item['featured_image']) ? $item['featured_image'] : (!empty($item['image']) ? $item['image'] : 'v.jpeg');
                $image = h($image_source);
                
                if (strpos($image, '/VIVA/') === 0) {
                    $image = substr($image, 6); // remove leading /VIVA/ if present
                }

                $child_items = [];
                if ($is_cat) {
                    $child_stmt = $pdo->prepare("SELECT name FROM categories WHERE parent_id = ? AND status = 'active' ORDER BY name ASC");
                    $child_stmt->execute([$item['id']]);
                    $child_items = $child_stmt->fetchAll();
                    
                    if (empty($child_items)) {
                        $child_stmt = $pdo->prepare("SELECT name FROM products WHERE category_id = ? AND status = 'active' ORDER BY name ASC");
                        $child_stmt->execute([$item['id']]);
                        $child_items = $child_stmt->fetchAll();
                    }
                }
            ?>
            
            <a href="<?php echo $link; ?>" class="group block relative h-[450px] rounded-2xl overflow-hidden border border-gray-800 bg-gray-950 shadow-xl transition-all duration-500 hover:-translate-y-2 hover:border-orange-600/50 hover:shadow-[0_20px_40px_rgba(0,0,0,0.8),0_0_20px_rgba(249,115,22,0.15)]" data-aos="fade-up" data-aos-delay="<?php echo ($index % 4) * 100; ?>">
                <!-- Background Image (Object Contain to stop cropping machinery) -->
                <div class="absolute inset-0 top-0 left-0 w-full h-[60%] flex items-center justify-center p-6 bg-gradient-to-b from-gray-900 to-black">
                    <img src="<?php echo $image; ?>" alt="<?php echo h($item['name']); ?>" loading="lazy" class="max-w-full max-h-full object-contain opacity-80 transition-all duration-700 group-hover:scale-110 group-hover:opacity-100 drop-shadow-2xl">
                </div>
                
                <!-- Deep Hover Gradient for card bottom -->
                <div class="absolute inset-0 bg-gradient-to-t from-black via-black/80 to-transparent"></div>
                <div class="absolute inset-0 bg-gradient-to-t from-[#050505] via-black/95 to-black/60 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>

                <div class="absolute inset-0 p-8 flex flex-col justify-end text-left z-10 transition-all duration-500 group-hover:justify-start group-hover:pt-10">
                    
                    <!-- Title -->
                    <h3 class="text-xl md:text-2xl font-bold text-white leading-tight mb-0 transform transition-all duration-500 group-hover:text-orange-500 group-hover:scale-95 origin-left">
                        <?php echo h($item['name']); ?>
                        <!-- Decorative line that appears on hover -->
                        <div class="h-1 w-0 bg-orange-600 absolute -bottom-3 left-0 transition-all duration-500 group-hover:w-16"></div>
                    </h3>

                    <!-- Hidden hover content that slides up -->
                    <div class="overflow-hidden max-h-0 opacity-0 group-hover:max-h-[300px] group-hover:opacity-100 transition-all duration-700 ease-[cubic-bezier(0.25,1,0.5,1)] flex flex-col pt-8 h-full">
                        <div class="flex-1 overflow-y-auto pr-2 custom-scrollbar">
                            <?php if ($is_cat && !empty($child_items)): ?>
                                <ul class="space-y-3 mb-6">
                                    <?php foreach ($child_items as $index_child => $child): ?>
                                        <li class="flex items-start text-gray-300 text-sm transform opacity-0 translate-y-4 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-500" style="transition-delay: <?php echo 100 + ($index_child * 30); ?>ms;">
                                            <span class="text-orange-600 mr-3 mt-1 text-[8px]"><i class="fas fa-circle"></i></span>
                                            <span class="leading-snug hover:text-white transition-colors font-medium"> <?php echo h($child['name']); ?> </span>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php else: ?>
                                <p class="text-gray-400 text-sm mb-6 leading-relaxed line-clamp-3">
                                    <?php echo !empty($item['description']) ? h($item['description']) : 'Explore precision-engineered industrial solutions tailored to your manufacturing requirements.'; ?>
                                </p>
                            <?php endif; ?>
                            
                            <!-- Call to Action -->
                            <span class="inline-flex items-center text-orange-600 font-bold uppercase tracking-widest text-[11px] hover:text-orange-400 transition-colors opacity-0 translate-y-4 group-hover:opacity-100 group-hover:translate-y-0 duration-500 delay-300">
                                <?php echo $is_cat ? 'View Group' : 'View Details'; ?>
                                <i class="fas fa-arrow-right ml-2 transform group-hover:translate-x-2 transition-transform"></i>
                            </span>
                        </div>
                    </div>
                </div>
                
                <!-- Corner accent frame -->
                <div class="absolute top-4 right-4 w-12 h-12 border-t border-r border-white/10 group-hover:border-orange-600/30 transition-colors duration-500"></div>
            </a>

            <?php 
            $index++;
            endforeach; 
            ?>
        </div>
        
        <?php if (empty($items)): ?>
        <div class="empty-state">
            <i class="fas fa-box-open text-5xl text-gray-700 mb-4"></i>
            <h3 class="text-xl font-bold text-white mb-2">No Products Found</h3>
            <p class="text-gray-400 text-sm mb-6">We couldn't find any products in this category.</p>
            <a href="products.php" class="px-8 py-3 bg-orange-600 text-white font-bold rounded-lg hover:bg-orange-700 transition">View All Categories</a>
        </div>
        <?php endif; ?>
    </div>
</section>

<!-- Call to Action -->
<section class="py-16 bg-gradient-to-r from-orange-600 to-orange-700 relative overflow-hidden">
    <div class="absolute inset-0 flex items-center justify-center opacity-10">
        <i class="fas fa-cogs text-[300px] animate-gear-rotate"></i>
    </div>
    
    <div class="container mx-auto px-4 lg:px-8 relative z-10 text-center">
        <h2 class="text-3xl md:text-4xl font-bold text-white mb-5">Need a Custom Engineering Solution?</h2>
        <p class="text-white/80 text-base max-w-xl mx-auto mb-8 leading-relaxed">
            Our experts are ready to design machinery tailored to your manufacturing requirements.
        </p>
        <div class="flex flex-wrap justify-center gap-4">
            <a href="contact.php" class="px-8 py-3 bg-black text-white font-bold uppercase text-sm rounded-lg hover:bg-gray-900 transition-all shadow-xl hover:-translate-y-1">
                Request a Quote <i class="fas fa-paper-plane ml-2"></i>
            </a>
            <a href="tel:<?php echo str_replace(' ', '', get_setting('contact_phone')); ?>" class="px-8 py-3 border-2 border-white text-white font-bold uppercase text-sm rounded-lg hover:bg-white hover:text-orange-600 transition-all shadow-xl hover:-translate-y-1">
                Call Our Experts <i class="fas fa-phone ml-2"></i>
            </a>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>