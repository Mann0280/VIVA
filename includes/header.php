<?php
$current_page = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="Film Slitting Rewinding Machine, Slitting Rewinding Machine Manufacturer, Film Slitting Machine India, Roll to Roll Slitting Machine, Jumbo Roll Slitting Machine, Film Converting Machine, Slitting Rewinder for Plastic Film">

    
    <!-- SEO Meta Tags -->
    <title><?php 
    if(isset($page_title)) {
        echo $page_title;
    } else {
        if($current_page == 'index.php') echo "VIVA ENGINEERING | Premium Industrial Machinery";
        elseif($current_page == 'about.php') echo "About VIVA ENGINEERING | Engineering Excellence";
        elseif($current_page == 'products.php') echo "Products | VIVA ENGINEERING Solutions";
        elseif($current_page == 'gallery.php') echo "Gallery | VIVA ENGINEERING Projects";
        elseif($current_page == 'contact.php') echo "Contact VIVA ENGINEERING | Get a Quote";
        else echo "VIVA ENGINEERING | Industrial Machinery";
    }
    ?></title>
    
    <meta name="description" content="<?php echo isset($meta_description) ? htmlspecialchars($meta_description) : 'VIVA ENGINEERING - Precision engineering in slitting, rewinding, and coating machinery. Industrial manufacturing excellence.'; ?>">
    <meta name="keywords" content="Film Slitting Rewinding Machine, Slitting Rewinding Machine Manufacturer, Film Slitting Machine India, Roll to Roll Slitting Machine, Jumbo Roll Slitting Machine, Film Converting Machine, Slitting Rewinder for Plastic Film">
    <meta name="author" content="VIVA ENGINEERING">
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&family=Roboto+Slab:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Tailwind Config -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        black: '#000000',
                        white: '#ffffff',
                        orange: {
                            600: '#FF5722',
                            700: '#E64A19',
                            800: '#D84315',
                        },
                        gray: {
                            50: '#f9fafb',
                            100: '#f3f4f6',
                            200: '#e5e7eb',
                            300: '#d1d5db',
                            400: '#9ca3af',
                            500: '#6b7280',
                            600: '#4b5563',
                            700: '#374151',
                            800: '#1f2937',
                            900: '#111827',
                        }
                    },
                    fontFamily: {
                        heading: ['Montserrat', 'sans-serif'],
                        body: ['Roboto Slab', 'serif'],
                    },
                    animation: {
                        'spin-slow': 'spin 8s linear infinite',
                        'float': 'float 6s ease-in-out infinite',
                        'pulse': 'pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                        'bounce': 'bounce 1s infinite',
                        'fade-up': 'fade-up 0.8s ease-out forwards',
                        'shimmer': 'shimmer 2s linear infinite',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(-20px)' },
                        },
                        'fade-up': {
                            '0%': { opacity: '0', transform: 'translateY(20px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' },
                        },
                        shimmer: {
                            '0%': { backgroundPosition: '-1000px 0' },
                            '100%': { backgroundPosition: '1000px 0' },
                        }
                    }
                }
            }
        }
    </script>
    
    <!-- Custom CSS -->
    <style>
        /* Smooth Scroll */
        html {
            scroll-behavior: smooth;
        }
        
        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }
        
        ::-webkit-scrollbar-track {
            background: #111111;
        }
        
        ::-webkit-scrollbar-thumb {
            background: #FF5722;
            border-radius: 4px;
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: #E64A19;
        }
        
        /* Navigation Link Animations */
        .nav-link {
            position: relative;
            padding: 8px 0;
            transition: color 0.3s ease;
        }
        
       
        
        .nav-link:hover::after,
        .nav-link.active::after {
            width: 100%;
        }
        
        .nav-link.active {
            color: #FF5722;
            font-weight: 600;
        }
        
        /* Mobile Navigation Links */
        .mobile-nav-link {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 16px 0;
            border-bottom: 1px solid #333333;
            transition: all 0.3s ease;
        }
        
        .mobile-nav-link:hover {
            color: #FF5722;
            padding-left: 8px;
        }
        
        .mobile-nav-link.active {
            color: #FF5722;
            font-weight: 600;
        }
        
        /* Gradient Text */
        .gradient-text {
            background: linear-gradient(135deg, #FF5722 0%, #E64A19 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        /* Section Title */
        .section-title {
            font-size: 3.5rem;
            font-weight: 800;
            line-height: 1.1;
        }
        
        /* Section Subtitle */
        .section-subtitle {
            font-size: 1.125rem;
            color: #9ca3af;
            max-width: 700px;
            margin: 0 auto;
        }
        
        /* Buttons */
        .btn-primary {
            background: #FF5722;
            color: #ffffff;
            padding: 14px 32px;
            border-radius: 8px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            background: #E64A19;
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(255, 87, 34, 0.3);
        }
        
        .btn-secondary {
            background: transparent;
            color: #FF5722;
            padding: 14px 32px;
            border-radius: 8px;
            font-weight: 600;
            border: 2px solid #FF5722;
            display: inline-flex;
            align-items: center;
            transition: all 0.3s ease;
        }
        
        .btn-secondary:hover {
            background: #FF5722;
            color: #ffffff;
            transform: translateY(-2px);
        }
        
        /* Stats */
        .stat-number {
            font-size: 3rem;
            font-weight: 800;
            color: #FF5722;
            line-height: 1;
        }
        
        /* Product Card */
        .product-card {
            background: #1a1a1a;
            border-radius: 16px;
            border: 1px solid #333333;
            overflow: hidden;
            transition: all 0.4s ease;
        }
        
        .product-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 25px 50px rgba(255, 87, 34, 0.15);
            border-color: #FF5722;
        }
        
        .img-hover-zoom {
            overflow: hidden;
        }
        
        .img-hover-zoom img {
            transition: transform 0.6s ease;
        }
        
        .product-card:hover .img-hover-zoom img {
            transform: scale(1.1);
        }
        
        /* Feature Card */
        .feature-card {
            background: #1a1a1a;
            border-radius: 16px;
            padding: 32px;
            border: 1px solid #333333;
            transition: all 0.4s ease;
        }
        
        .feature-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(255, 87, 34, 0.1);
            border-color: #FF5722;
        }
        
        .icon-wrapper {
            width: 64px;
            height: 64px;
            background: #333333;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 24px;
            transition: all 0.3s ease;
        }
        
        .feature-card:hover .icon-wrapper {
            background: #FF5722;
        }
        
        .feature-card:hover .icon-wrapper i {
            color: #ffffff;
        }
        
        /* Testimonial Card */
        .testimonial-card {
            background: #1a1a1a;
            border-radius: 16px;
            padding: 40px;
            border: 1px solid #333333;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        }
        
        /* Hamburger Menu Animation */
        #mobile-menu.active {
            transform: translateX(0);
        }
        
        #mobile-menu-button.active #bar1 {
            transform: rotate(45deg) translate(6px, 6px);
        }
        
        #mobile-menu-button.active #bar2 {
            transform: rotate(-45deg) translate(1px, -1px);
        }
        
        #mobile-menu-button.active #bar3 {
            width: 32px;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .section-title {
                font-size: 2.5rem;
            }
        }
    </style>
    
    <!-- Favicon -->
    <link rel="icon" type="image/jpeg" href="v.jpeg">
    <link rel="shortcut icon" type="image/jpeg" href="v.jpeg">
    <link rel="apple-touch-icon" type="image/jpeg" href="v.jpeg">
</head>
<body class="bg-black text-white font-body">
    
    <!-- Navigation -->
    <nav class="sticky top-0 w-full bg-black/95 backdrop-blur-sm z-50 border-b border-gray-800 shadow-lg">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="flex justify-between items-center py-4">
                <!-- Logo -->
                <a href="index.php" class="flex items-center space-x-3 group">
                    <div class="relative">
                        <div class="w-12 h-12 bg-gradient-to-br from-black-600 to-black-700 rounded-lg flex items-center justify-center  transition-transform duration-700">
                            <div class="w-10 h-10 bg-white rounded-lg flex items-center justify-center">
                                <!-- Using the v.jpeg image as logo -->
                                <img src="v.jpeg" alt="VIVA ENGINEERING Logo" class="w-8 h-8 object-contain">
                            </div>
                        </div>
                    </div>
                    <div>
                        <h1 class="text-xl font-heading font-bold tracking-tight text-white">VIVA<span class="text-orange-600"> ENGINEERING</span></h1>
                        <p class="text-xs text-gray-400 tracking-widest">Think Big We Do</p>
                    </div>
                </a>
                
                <!-- Desktop Menu -->
                <div class="hidden lg:flex items-center space-x-10">
                    <a href="index.php" class="nav-link <?php echo $current_page == 'index.php' ? 'active' : ''; ?> text-gray-300 hover:text-orange-600">Home</a>
                    <a href="products.php" class="nav-link <?php echo $current_page == 'products.php' ? 'active' : ''; ?> text-gray-300 hover:text-orange-600">Products</a>
                    <a href="about.php" class="nav-link <?php echo $current_page == 'about.php' ? 'active' : ''; ?> text-gray-300 hover:text-orange-600">About</a>
                    <a href="gallery.php" class="nav-link <?php echo $current_page == 'gallery.php' ? 'active' : ''; ?> text-gray-300 hover:text-orange-600">Gallery</a>
                    <a href="contact.php" class="nav-link <?php echo $current_page == 'contact.php' ? 'active' : ''; ?> text-gray-300 hover:text-orange-600">Contact</a>
                    
                    
                </div>
                
                <!-- Mobile Menu Button -->
                <button id="mobile-menu-button" class="lg:hidden relative z-50 w-12 h-12 flex flex-col justify-center items-center group focus:outline-none">
                    <span class="w-8 h-0.5 bg-white mb-2 transition-all duration-300 transform origin-center" id="bar1"></span>
                    <span class="w-8 h-0.5 bg-white transition-all duration-300 transform origin-center" id="bar2"></span>
                  
                </button>
            </div>
            
            <!-- Mobile Menu -->
            <div id="mobile-menu" class="lg:hidden fixed top-0 left-0 w-full h-screen bg-black transform -translate-x-full transition-transform duration-500 flex flex-col justify-center px-8 z-40">
                <div class="space-y-6">
                    <a href="index.php" class="mobile-nav-link <?php echo $current_page == 'index.php' ? 'active' : ''; ?> text-gray-300">
                        <span class="text-xl font-medium">Home</span>
                        <i class="fas fa-chevron-right text-gray-400 text-lg"></i>
                    </a>
                    <a href="products.php" class="mobile-nav-link <?php echo $current_page == 'products.php' ? 'active' : ''; ?> text-gray-300">
                        <span class="text-xl font-medium">Products</span>
                        <i class="fas fa-chevron-right text-gray-400 text-lg"></i>
                    </a>
                    <a href="about.php" class="mobile-nav-link <?php echo $current_page == 'about.php' ? 'active' : ''; ?> text-gray-300">
                        <span class="text-xl font-medium">About</span>
                        <i class="fas fa-chevron-right text-gray-400 text-lg"></i>
                    </a>
                    <a href="gallery.php" class="mobile-nav-link <?php echo $current_page == 'gallery.php' ? 'active' : ''; ?> text-gray-300">
                        <span class="text-xl font-medium">Gallery</span>
                        <i class="fas fa-chevron-right text-gray-400 text-lg"></i>
                    </a>
                    <a href="contact.php" class="mobile-nav-link <?php echo $current_page == 'contact.php' ? 'active' : ''; ?> text-gray-300">
                        <span class="text-xl font-medium">Contact</span>
                        <i class="fas fa-chevron-right text-gray-400 text-lg"></i>
                    </a>
                </div>
                
                
            </div>
        </div>
    </nav>
    
    <!-- Main Content -->
    <main class="pt-0">

    <script>
    // Mobile Menu Toggle
    document.addEventListener('DOMContentLoaded', function() {
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        const bar1 = document.getElementById('bar1');
        const bar2 = document.getElementById('bar2');
        
        mobileMenuButton.addEventListener('click', function() {
            mobileMenu.classList.toggle('-translate-x-full');
            mobileMenuButton.classList.toggle('active');
            
            // Animate hamburger to X
            if (mobileMenuButton.classList.contains('active')) {
                bar1.style.transform = 'rotate(45deg) translate(6px, 6px)';
                bar2.style.transform = 'rotate(-45deg) translate(1px, -1px)';
                document.body.style.overflow = 'hidden';
            } else {
                bar1.style.transform = 'rotate(0) translate(0, 0)';
                bar2.style.transform = 'rotate(0) translate(0, 0)';
                document.body.style.overflow = '';
            }
        });
        
        // Close mobile menu when clicking on links
        const mobileLinks = document.querySelectorAll('.mobile-nav-link');
        mobileLinks.forEach(link => {
            link.addEventListener('click', function() {
                mobileMenu.classList.add('-translate-x-full');
                mobileMenuButton.classList.remove('active');
                bar1.style.transform = 'rotate(0) translate(0, 0)';
                bar2.style.transform = 'rotate(0) translate(0, 0)';
                document.body.style.overflow = '';
            });
        });
    });
    </script>