<?php include 'includes/header.php'; ?>

<style>
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

/* Ensure images fit */
img {
    max-width: 100%;
    height: auto;
}

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

@keyframes slideInDown {
    from {
        transform: translateY(-50px);
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

@keyframes neonGlow {
    0%, 100% {
        box-shadow: 0 0 5px #FF6B00,
                   0 0 10px #FF6B00,
                   0 0 15px #FF6B00;
    }
    50% {
        box-shadow: 0 0 10px #FF6B00,
                   0 0 20px #FF6B00,
                   0 0 30px #FF6B00,
                   0 0 40px #FF6B00;
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

@keyframes countUp {
    from {
        transform: translateY(10px);
        opacity: 0;
    }
    to {
        transform: translateY(0);
        opacity: 1;
    }
}

@keyframes pulseScale {
    0%, 100% {
        transform: scale(1);
        box-shadow: 0 0 0 0 rgba(255, 107, 0, 0.7);
    }
    50% {
        transform: scale(1.2);
        box-shadow: 0 0 0 10px rgba(255, 107, 0, 0);
    }
}

@keyframes globeGlow {
    from {
        opacity: 0.3;
    }
    to {
        opacity: 0.7;
    }
}

@keyframes shake {
    0%, 100% { transform: translateX(0); }
    25% { transform: translateX(-5px); }
    75% { transform: translateX(5px); }
}

@keyframes bounce {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-10px); }
}

@keyframes ripple {
    0% {
        box-shadow: 0 0 0 0 rgba(255, 107, 0, 0.4);
    }
    70% {
        box-shadow: 0 0 0 20px rgba(255, 107, 0, 0);
    }
    100% {
        box-shadow: 0 0 0 0 rgba(255, 107, 0, 0);
    }
}

@keyframes gearRotate {
    from {
        transform: rotate(0deg);
    }
    to {
        transform: rotate(360deg);
    }
}

@keyframes badgePulse {
    0%, 100% {
        transform: scale(1);
        box-shadow: 0 0 0 0 rgba(255, 107, 0, 0.4);
    }
    50% {
        transform: scale(1.05);
        box-shadow: 0 0 0 10px rgba(255, 107, 0, 0.1);
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

.animate-slide-in-down {
    animation: slideInDown 0.8s ease-out forwards;
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

.animate-neon-glow {
    animation: neonGlow 2s ease-in-out infinite;
}

.animate-gear-rotate {
    animation: gearRotate 20s linear infinite;
}

.animate-badge-pulse {
    animation: badgePulse 2s ease-in-out infinite;
}

/* Hover Effects */
.hover-scale {
    transition: transform 0.3s ease;
}

.hover-scale:hover {
    transform: scale(1.05);
}

.hover-lift {
    transition: all 0.3s ease;
}

.hover-lift:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
}

.hover-glow:hover {
    box-shadow: 0 0 20px rgba(255, 107, 0, 0.4);
}

.hover-rotate:hover {
    transform: rotate(5deg) scale(1.05);
    transition: transform 0.3s ease;
}

.hover-shake:hover {
    animation: shake 0.5s ease-in-out;
}

.hover-bounce:hover {
    animation: bounce 0.5s;
}

/* Card Styling */
.value-card {
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    border: 1px solid rgba(255, 107, 0, 0.1);
    position: relative;
    overflow: hidden;
}

.value-card:hover {
    border-color: rgba(255, 107, 0, 0.5);
    background: linear-gradient(135deg, rgba(31, 41, 55, 0.8), rgba(17, 24, 39, 0.9));
    transform: translateY(-5px);
}

.value-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 107, 0, 0.1), transparent);
    transition: left 0.7s;
}

.value-card:hover::before {
    left: 100%;
}

.milestone-card {
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.milestone-card:hover {
    border-color: #FF6B00;
    transform: translateX(5px);
}

.milestone-card::before {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    width: 4px;
    height: 100%;
    background: linear-gradient(to bottom, #FF6B00, #FF8A00);
    opacity: 0;
    transition: opacity 0.3s ease;
}

.milestone-card:hover::before {
    opacity: 1;
}

.team-card {
    transition: all 0.4s ease;
}

.team-card:hover {
    transform: translateY(-8px);
    border-color: #FF6B00;
}

.team-card:hover .team-initial {
    transform: scale(1.1);
}

.stats-card {
    transition: all 0.3s ease;
}

.stats-card:hover {
    transform: translateY(-5px);
    background: linear-gradient(135deg, #1F2937, #111827);
    border-color: #FF6B00;
}

.stats-card:hover .stat-number {
    animation: countUp 1s ease-out forwards;
}

.advantage-card {
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
    overflow: hidden;
    background: linear-gradient(145deg, rgba(17, 24, 39, 0.9), rgba(31, 41, 55, 0.8));
    border: 1px solid rgba(255, 107, 0, 0.15);
}

.advantage-card:hover {
    transform: translateY(-8px) scale(1.02);
    border-color: rgba(255, 107, 0, 0.5);
    box-shadow: 0 25px 50px rgba(255, 107, 0, 0.15);
}

.advantage-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 107, 0, 0.1), transparent);
    transition: left 0.7s ease;
}

.advantage-card:hover::before {
    left: 100%;
}

.advantage-badge {
    position: absolute;
    top: -12px;
    right: 20px;
    background: linear-gradient(135deg, #FF6B00, #FF8A00);
    color: white;
    padding: 8px 20px;
    border-radius: 20px;
    font-size: 0.75rem;
    font-weight: bold;
    letter-spacing: 0.5px;
    text-transform: uppercase;
    box-shadow: 0 6px 20px rgba(255, 107, 0, 0.3);
    z-index: 10;
}

.advantage-number {
    position: absolute;
    top: 20px;
    left: 20px;
    width: 40px;
    height: 40px;
    background: linear-gradient(135deg, rgba(255, 107, 0, 0.2), rgba(255, 107, 0, 0.1));
    border: 2px solid rgba(255, 107, 0, 0.3);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
    color: #FF6B00;
    font-size: 1.25rem;
}

/* Gradient Text */
.gradient-text {
    background: linear-gradient(90deg, #FF6B00, #FF8A00);
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
}

/* Shimmer Button */
.shimmer-btn {
    position: relative;
    overflow: hidden;
}

.shimmer-btn::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
    transition: left 0.5s;
}

.shimmer-btn:hover::before {
    left: 100%;
}

/* Timeline Dot */
.timeline-dot {
    width: 12px;
    height: 12px;
    background: #FF6B00;
    border-radius: 50%;
    position: relative;
    animation: pulseScale 2s infinite;
}

.timeline-dot::after {
    content: '';
    position: absolute;
    width: 20px;
    height: 20px;
    border: 2px solid rgba(255, 107, 0, 0.3);
    border-radius: 50%;
    top: -4px;
    left: -4px;
    animation: pulse-glow 2s infinite;
}

/* Global Presence Animation */
.globe-container {
    position: relative;
    border-radius: 16px;
    overflow: hidden;
    border: 2px solid rgba(255, 107, 0, 0.2);
}

.globe-container::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: radial-gradient(circle at 30% 30%, rgba(255, 107, 0, 0.2) 0%, transparent 50%);
    animation: globeGlow 4s ease-in-out infinite alternate;
}

.globe-overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(135deg, rgba(0, 0, 0, 0.7), rgba(255, 107, 0, 0.1));
    display: flex;
    align-items: center;
    justify-content: center;
}

.globe-content {
    position: relative;
    z-index: 2;
    background: rgba(17, 24, 39, 0.8);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 107, 0, 0.2);
}

.globe-pulse {
    position: absolute;
    width: 100%;
    height: 100%;
    border-radius: 50%;
    animation: ripple 2s linear infinite;
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

.animate-on-scroll-left {
    opacity: 0;
    transform: translateX(-50px);
    transition: opacity 0.8s ease, transform 0.8s ease;
}

.animate-on-scroll-left.active {
    opacity: 1;
    transform: translateX(0);
}

.animate-on-scroll-right {
    opacity: 0;
    transform: translateX(50px);
    transition: opacity 0.8s ease, transform 0.8s ease;
}

.animate-on-scroll-right.active {
    opacity: 1;
    transform: translateX(0);
}

.animate-on-scroll-scale {
    opacity: 0;
    transform: scale(0.9);
    transition: opacity 0.8s ease, transform 0.8s ease;
}

.animate-on-scroll-scale.active {
    opacity: 1;
    transform: scale(1);
}

/* Staggered Animation */
.stagger-item {
    opacity: 0;
    transform: translateY(20px);
    transition: all 0.5s ease;
}

.stagger-item.visible {
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
.animation-delay-1500 { animation-delay: 1500ms !important; }

/* Why Choose Us Special Styling - FIXED LAYOUT */
.perspective-1000 {
    perspective: 1000px;
}

.transform-style-3d {
    transform-style: preserve-3d;
}

.performance-meter {
    position: relative;
    height: 8px;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 4px;
    overflow: hidden;
    margin: 15px 0;
}

.performance-meter::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    height: 100%;
    background: linear-gradient(90deg, #FF6B00, #FF8A00);
    border-radius: 4px;
    animation: shimmer 2s infinite linear;
}

.quality-indicator {
    display: inline-flex;
    align-items: center;
    padding: 4px 12px;
    background: rgba(34, 197, 94, 0.15);
    color: #22c55e;
    border-radius: 20px;
    font-size: 0.75rem;
    font-weight: 600;
}

.trust-badge {
    display: inline-flex;
    align-items: center;
    padding: 8px 16px;
    background: linear-gradient(135deg, rgba(255, 107, 0, 0.2), rgba(255, 107, 0, 0.1));
    border: 1px solid rgba(255, 107, 0, 0.3);
    border-radius: 8px;
    font-weight: 600;
}

.animated-checkmark {
    width: 24px;
    height: 24px;
    background: linear-gradient(135deg, #22c55e, #16a34a);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    animation: bounceIn 0.5s ease-out;
}

/* Additional Styles for Why Choose Us Section - FIXED */
#why-choose {
    position: relative;
}

#why-choose .container-custom {
    position: relative;
    z-index: 10;
}

/* FIX for left column spacing */
#why-choose .left-column-content {
    margin-top: 40px !important;
    padding-top: 40px !important;
}

@media (min-width: 1024px) {
    #why-choose .left-column-content {
        margin-top: 60px !important;
        padding-top: 60px !important;
    }
}
</style>

<!-- Hero Section -->
<section class="relative min-h-[80vh] flex items-center bg-black overflow-hidden">
    <div class="absolute inset-0 parallax" data-speed="0.3">
        <img src="https://images.unsplash.com/photo-1581094794329-c8112a89af12?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80" 
             alt="Industrial Machinery"
             class="w-full h-full object-cover opacity-30">
        <div class="absolute inset-0 bg-gradient-to-r from-black via-black/90 to-transparent"></div>
    </div>
    
    <!-- Floating Particles -->
    <div class="particles-container absolute inset-0"></div>
    
    <div class="container-custom relative z-10">
        <div class="max-w-3xl">
            <!-- Badge -->
            <div class="inline-flex items-center space-x-2 bg-orange-600/20 border border-orange-600/50 px-4 py-2 rounded-sm mb-6 animate-pulse-glow hover-shake" data-aos="fade-down">
                <span class="w-2 h-2 bg-orange-600 rounded-full animate-pulse"></span>
                <span class="text-sm font-medium text-orange-600 uppercase tracking-wider">Our Legacy</span>
            </div>
            
            <!-- Title -->
            <h1 class="hero-title text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-4 leading-tight" data-aos="fade-up">
                <span class="block animate-slide-in-left">ENGINEERING</span>
                <span class="block text-gray-300 animate-float animate-wave animation-delay-300">EXCELLENCE</span>
                <span class="block text-orange-500 gradient-text animate-gradient-flow">SINCE 2008</span>
            </h1>
            
            <!-- Description -->
            <p class="text-lg text-gray-300 mb-8 leading-relaxed animate-on-scroll-left" data-aos="fade-up" data-aos-delay="100">
                Pioneering industrial machinery solutions with 16+ years of expertise, precision engineering, and innovation.
            </p>
            
            <!-- Buttons -->
            <div class="flex flex-wrap gap-4 mb-8" data-aos="fade-up" data-aos-delay="200">
                <a href="#story" class="shimmer-btn px-6 py-3 bg-gradient-to-r from-orange-600 to-orange-700 text-white font-bold uppercase text-sm hover:from-orange-700 hover:to-orange-800 transition-all duration-300 rounded-lg hover-scale">
                    <span class="flex items-center">
                        Our Journey <i class="fas fa-arrow-down ml-2 animate-bounce"></i>
                    </span>
                </a>
                <a href="contact.php" class="shimmer-btn px-6 py-3 border-2 border-orange-600 text-orange-600 font-bold uppercase text-sm hover:bg-orange-600 hover:text-white transition-all duration-300 rounded-lg hover-bounce">
                    <span class="flex items-center">
                        Connect With Us <i class="fas fa-handshake ml-2"></i>
                    </span>
                </a>
            </div>
            
            <!-- Stats -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4" data-aos="fade-up" data-aos-delay="300">
                <?php
                $heroStats = [
                    ['value' => '200+', 'label' => 'Projects'],
                    ['value' => '16+', 'label' => 'Years'],
                    ['value' => '50+', 'label' => 'Countries'],
                    ['value' => '100+', 'label' => 'Experts']
                ];
                
                foreach ($heroStats as $index => $stat):
                ?>
                <div class="stats-card bg-gray-900/50 border border-gray-800 p-4 rounded-lg text-center hover-lift animate-on-scroll stagger-item" data-delay="<?php echo $index * 100; ?>">
                    <div class="text-2xl md:text-3xl font-bold text-orange-500 mb-1 stat-number animate-scale-in"><?php echo $stat['value']; ?></div>
                    <p class="text-gray-400 text-xs uppercase tracking-wider animate-fade-in"><?php echo $stat['label']; ?></p>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    
    <!-- Floating Elements -->
    <div class="absolute top-1/4 right-10 w-32 h-32 bg-gradient-to-br from-orange-600/20 to-transparent rounded-full blur-3xl animate-pulse"></div>
    <div class="absolute bottom-10 left-10 w-24 h-24 bg-gradient-to-tr from-orange-600/10 to-transparent rounded-full blur-2xl animate-pulse animation-delay-1000"></div>
</section>

<!-- Our Story -->
<section id="story" class="py-20 bg-black">
    <div class="container-custom">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <!-- Image -->
            <div data-aos="fade-right" data-aos-delay="100">
                <div class="relative group">
                    <img src="https://images.unsplash.com/photo-1581094794329-c8112a89af12?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                         alt="Our Story"
                         class="rounded-lg w-4/5 h-60 object-cover mx-auto shadow-lg transform group-hover:scale-105 transition-transform duration-500 animate-on-scroll-scale">
                    
                    <div class="absolute -bottom-3 -right-3 bg-gradient-to-br from-orange-600 to-orange-700 text-white p-4 rounded-lg shadow-xl animate-float hover-scale hover-rotate">
                        <div class="text-2xl font-bold animate-bounce-in">2008</div>
                        <div class="text-sm opacity-90 animate-fade-in">Founded Year</div>
                    </div>
                </div>
            </div>
            
            <!-- Content -->
            <div data-aos="fade-left" data-aos-delay="200">
                <div class="mb-6 animate-on-scroll-right">
                    <span class="text-orange-500 font-bold uppercase tracking-wider border-l-4 border-orange-600 pl-4 animate-slide-in-left">Our Story</span>
                </div>
                
                <h2 class="section-title text-3xl md:text-4xl font-bold text-white mb-6 animate-on-scroll-right">
                    Building Industrial Excellence Since 2008
                </h2>
                
                <p class="text-gray-300 mb-8 leading-relaxed animate-on-scroll-right animation-delay-100">
                    VIVA ENGINEERING started with a vision to revolutionize industrial manufacturing. From a small workshop to a global leader, we've been delivering precision machinery solutions for over 16 years.
                </p>
                
                <div class="space-y-4 mb-8">
                    <?php
                    $storyPoints = [
                        'Founded in 2008 focusing on precision slitting machinery',
                        'Expanded to 50+ countries with 200+ successful projects',
                        'ISO 9001:2015 certified quality management',
                        'Pioneered sustainable manufacturing practices'
                    ];
                    
                    foreach ($storyPoints as $index => $point):
                    ?>
                    <div class="flex items-start group stagger-item" data-delay="<?php echo $index * 100; ?>">
                        <div class="flex-shrink-0 w-6 h-6 bg-gradient-to-br from-orange-600 to-orange-700 rounded-full flex items-center justify-center mr-4 mt-1 group-hover:scale-110 transition-transform duration-300 animate-rotate-in">
                            <i class="fas fa-check text-xs text-white"></i>
                        </div>
                        <p class="text-gray-300 group-hover:text-white transition-colors duration-300"><?php echo $point; ?></p>
                    </div>
                    <?php endforeach; ?>
                </div>
                
                <a href="#values" class="shimmer-btn inline-flex items-center px-8 py-3 bg-gradient-to-r from-orange-600 to-orange-700 text-white font-bold uppercase hover:from-orange-700 hover:to-orange-800 transition-all duration-300 rounded-lg hover-scale animate-on-scroll-right animation-delay-400">
                    <span class="flex items-center group">
                        Our Values
                        <i class="fas fa-arrow-right ml-3 transform group-hover:translate-x-2 transition-transform duration-300"></i>
                    </span>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Why Choose Us Section - FIXED LAYOUT -->
<section id="why-choose" class="py-28 bg-gradient-to-br from-gray-950 via-black to-gray-950 relative overflow-hidden">
    <!-- Animated Background Elements -->
    <div class="absolute inset-0 z-0">
        <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-transparent via-orange-500/50 to-transparent animate-pulse"></div>
        <div class="absolute top-1/4 -right-32 w-96 h-96 bg-gradient-to-b from-orange-600/10 via-transparent to-transparent rounded-full blur-3xl animate-pulse"></div>
        <div class="absolute bottom-1/4 -left-32 w-96 h-96 bg-gradient-to-t from-orange-600/10 via-transparent to-transparent rounded-full blur-3xl animate-pulse animation-delay-1500"></div>
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[800px] h-[800px]">
            <div class="absolute inset-0 bg-[radial-gradient(circle_at_center,rgba(255,107,0,0.1)_0%,transparent_70%)] animate-ping opacity-20"></div>
        </div>
    </div>

    <!-- Floating Gears -->
    <div class="absolute top-20 right-20 z-0 opacity-5">
        <div class="text-8xl animate-gear-rotate">⚙️</div>
    </div>
    <div class="absolute bottom-20 left-20 z-0 opacity-5">
        <div class="text-6xl animate-gear-rotate animation-delay-1000" style="animation-direction: reverse;">⚙️</div>
    </div>

    <div class="container-custom relative z-10">
        <!-- Section Header -->
        <div class="text-center mb-20" data-aos="fade-up" data-aos-delay="100">
            <!-- Animated Badge -->
            <div class="inline-block relative mb-8 animate-on-scroll-scale">
                <div class="absolute -inset-1 bg-gradient-to-r from-orange-600 to-orange-800 rounded-lg blur-lg opacity-50 animate-pulse"></div>
                <div class="relative bg-gradient-to-r from-orange-600 to-orange-700 text-white px-8 py-3 rounded-lg font-bold uppercase tracking-wider text-sm flex items-center space-x-3 animate-badge-pulse">
                    <span class="w-2 h-2 bg-white rounded-full animate-pulse"></span>
                    <span>Industry Leadership</span>
                    <span class="w-2 h-2 bg-white rounded-full animate-pulse animation-delay-300"></span>
                </div>
            </div>

            <!-- Main Title -->
            <h2 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-8 leading-tight">
                <span class="block mb-4 animate-on-scroll-right">
                    Why <span class="relative inline-block">
                        Choose
                        <span class="absolute -bottom-2 left-0 w-full h-1 bg-gradient-to-r from-orange-600 to-orange-800 rounded-full animate-pulse"></span>
                    </span> Us?
                </span>
                <span class="block text-3xl md:text-4xl gradient-text animate-gradient-flow">
                    Excellence in Every Revolution
                </span>
            </h2>

            <!-- Subtitle -->
            <p class="text-xl text-gray-300 max-w-3xl mx-auto leading-relaxed animate-on-scroll-left animation-delay-200">
                As India's premier film slitting machinery manufacturer, we combine 16+ years of expertise with 
                cutting-edge technology to deliver unmatched precision, reliability, and performance.
            </p>
        </div>

        <!-- Core Advantages Grid - FIXED with mt-40 on left column -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 mb-20">
            <!-- Left Column - Visual Showcase - WITH MT-40 FIX -->
            <div class="relative left-column-content" data-aos="fade-right" data-aos-delay="300">
                <!-- Main Machine Visual -->
                <div class="relative group mt-10 lg:mt-12">
                    <!-- 3D Card Container -->
                    <div class="relative bg-gradient-to-br from-gray-900 to-black border-2 border-orange-600/30 rounded-3xl p-2 overflow-hidden transform-style-3d perspective-1000 hover:scale-[1.02] transition-all duration-700 hover:border-orange-500/50 hover:shadow-2xl hover:shadow-orange-600/20">
                        <!-- Glow Effect -->
                        <div class="absolute -inset-1 bg-gradient-to-r from-orange-600/20 via-transparent to-orange-600/20 rounded-3xl blur-xl opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                        
                        <!-- Machine Image with Overlay -->
                        <div class="relative z-10 rounded-2xl overflow-hidden">
                            <div class="aspect-video relative overflow-hidden">
                                <img src="https://images.unsplash.com/photo-1581094794329-c8112a89af12?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80" 
                                     alt="Precision Slitting Machinery"
                                     class="w-full h-1full object-cover transform group-hover:scale-110 transition-transform duration-700">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>
                            </div>
                            
                            <!-- Performance Stats Overlay -->
                            <div class="absolute bottom-0 left-0 right-0 p-6 bg-gradient-to-t from-black/90 to-transparent">
                                <div class="grid grid-cols-3 gap-4">
                                    <div class="text-center">
                                        <div class="text-2xl font-bold text-orange-500 animate-count" data-count="99">99%</div>
                                        <div class="text-xs text-gray-300 uppercase tracking-wider">Uptime</div>
                                    </div>
                                    <div class="text-center">
                                        <div class="text-2xl font-bold text-orange-500 animate-count" data-count="95">95%</div>
                                        <div class="text-xs text-gray-300 uppercase tracking-wider">Efficiency</div>
                                    </div>
                                    <div class="text-center">
                                        <div class="text-2xl font-bold text-orange-500 animate-count" data-count="99.5">99.5%</div>
                                        <div class="text-xs text-gray-300 uppercase tracking-wider">Accuracy</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Quality Badge -->
                        <div class="absolute top-6 right-6 z-20">
                            <div class="bg-gradient-to-r from-green-600 to-green-700 text-white px-4 py-2 rounded-full font-bold text-sm flex items-center space-x-2 animate-badge-pulse">
                                <i class="fas fa-certificate"></i>
                                <span>ISO 9001:2015</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Floating Stats Cards -->
                    <div class="grid grid-cols-3 gap-4 mt-8">
                        <div class="bg-gray-900/50 border border-gray-800 rounded-xl p-4 text-center hover:bg-gradient-to-br hover:from-gray-900 hover:to-black hover:border-orange-500/30 transition-all duration-300 hover:scale-105 hover:-translate-y-2 animate-float">
                            <div class="text-3xl font-bold text-orange-500 mb-1">16+</div>
                            <div class="text-xs text-gray-400 uppercase tracking-wider">Years Experience</div>
                        </div>
                        <div class="bg-gray-900/50 border border-gray-800 rounded-xl p-4 text-center hover:bg-gradient-to-br hover:from-gray-900 hover:to-black hover:border-orange-500/30 transition-all duration-300 hover:scale-105 hover:-translate-y-2 animate-float animation-delay-300">
                            <div class="text-3xl font-bold text-orange-500 mb-1">200+</div>
                            <div class="text-xs text-gray-400 uppercase tracking-wider">Machines Installed</div>
                        </div>
                        <div class="bg-gray-900/50 border border-gray-800 rounded-xl p-4 text-center hover:bg-gradient-to-br hover:from-gray-900 hover:to-black hover:border-orange-500/30 transition-all duration-300 hover:scale-105 hover:-translate-y-2 animate-float animation-delay-600">
                            <div class="text-3xl font-bold text-orange-500 mb-1">50+</div>
                            <div class="text-xs text-gray-400 uppercase tracking-wider">Countries Served</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column - Key Advantages -->
            <div class="space-y-8" data-aos="fade-left" data-aos-delay="400">
                <!-- Advantage 1 -->
                <div class="advantage-card group relative p-8 rounded-2xl overflow-hidden hover:scale-[1.02] transition-all duration-500">
                    <div class="advantage-number animate-bounce-in">01</div>
                    <div class="advantage-badge animate-badge-pulse">
                        <i class="fas fa-crown mr-2"></i>Industry Leader
                    </div>
                    
                    <div class="flex items-start mb-6">
                        <div class="flex-shrink-0 mr-4">
                            <div class="w-14 h-14 bg-gradient-to-br from-orange-600/20 to-orange-700/10 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-500 animate-pulse-glow">
                                <i class="fas fa-medal text-2xl text-orange-500"></i>
                            </div>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-white mb-3">India's Premier Manufacturer</h3>
                            <p class="text-gray-300 leading-relaxed">
                                As the leading film slitting rewinding machine manufacturer in India, we set industry standards with our precision engineering and innovative solutions.
                            </p>
                        </div>
                    </div>
                    
                    <div class="flex items-center justify-between mt-6">
                        <div class="flex items-center space-x-2">
                            <div class="w-2 h-2 bg-orange-500 rounded-full animate-pulse"></div>
                            <span class="text-sm text-gray-400">Trusted by Fortune 500 companies</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <div class="w-2 h-2 bg-orange-500 rounded-full animate-pulse animation-delay-200"></div>
                            <span class="text-sm text-gray-400">Award-winning quality</span>
                        </div>
                    </div>
                </div>

                <!-- Advantage 2 -->
                <div class="advantage-card group relative p-8 rounded-2xl overflow-hidden hover:scale-[1.02] transition-all duration-500">
                    <div class="advantage-number animate-bounce-in animation-delay-100">02</div>
                    <div class="advantage-badge animate-badge-pulse animation-delay-200">
                        <i class="fas fa-cogs mr-2"></i>Custom Solutions
                    </div>
                    
                    <div class="flex items-start mb-6">
                        <div class="flex-shrink-0 mr-4">
                            <div class="w-14 h-14 bg-gradient-to-br from-orange-600/20 to-orange-700/10 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-500 animate-pulse-glow">
                                <i class="fas fa-pencil-ruler text-2xl text-orange-500"></i>
                            </div>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-white mb-3">Tailored Engineering Solutions</h3>
                            <p class="text-gray-300 leading-relaxed">
                                Every production line is unique. We provide fully customized machinery solutions designed specifically for your operational needs and production goals.
                            </p>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-2 gap-4 mt-6">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-gradient-to-br from-orange-600/20 to-orange-700/10 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                <i class="fas fa-ruler-combined text-orange-500"></i>
                            </div>
                            <span class="text-sm text-gray-300">Custom Specifications</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-gradient-to-br from-orange-600/20 to-orange-700/10 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                <i class="fas fa-coins text-orange-500"></i>
                            </div>
                            <span class="text-sm text-gray-300">Cost-Effective</span>
                        </div>
                    </div>
                </div>

                <!-- Advantage 3 -->
                <div class="advantage-card group relative p-8 rounded-2xl overflow-hidden hover:scale-[1.02] transition-all duration-500">
                    <div class="advantage-number animate-bounce-in animation-delay-200">03</div>
                    <div class="advantage-badge animate-badge-pulse animation-delay-400">
                        <i class="fas fa-gem mr-2"></i>Premium Quality
                    </div>
                    
                    <div class="flex items-start mb-6">
                        <div class="flex-shrink-0 mr-4">
                            <div class="w-14 h-14 bg-gradient-to-br from-orange-600/20 to-orange-700/10 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-500 animate-pulse-glow">
                                <i class="fas fa-shield-alt text-2xl text-orange-500"></i>
                            </div>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-white mb-3">Uncompromising Quality Standards</h3>
                            <p class="text-gray-300 leading-relaxed">
                                Built with premium components and subjected to rigorous testing, our machines deliver exceptional performance, durability, and low maintenance requirements.
                            </p>
                        </div>
                    </div>
                    
                    <!-- Quality Indicators -->
                    <div class="flex items-center justify-between mt-6">
                        <div class="text-center">
                            <div class="w-12 h-12 bg-gradient-to-br from-green-600/20 to-green-700/10 rounded-full flex items-center justify-center mx-auto mb-2">
                                <i class="fas fa-check text-green-500"></i>
                            </div>
                            <span class="text-xs text-gray-400">100% Tested</span>
                        </div>
                        <div class="text-center">
                            <div class="w-12 h-12 bg-gradient-to-br from-blue-600/20 to-blue-700/10 rounded-full flex items-center justify-center mx-auto mb-2">
                                <i class="fas fa-clock text-blue-500"></i>
                            </div>
                            <span class="text-xs text-gray-400">Long Life</span>
                        </div>
                        <div class="text-center">
                            <div class="w-12 h-12 bg-gradient-to-br from-purple-600/20 to-purple-700/10 rounded-full flex items-center justify-center mx-auto mb-2">
                                <i class="fas fa-tools text-purple-500"></i>
                            </div>
                            <span class="text-xs text-gray-400">Low Maintenance</span>
                        </div>
                        <div class="text-center">
                            <div class="w-12 h-12 bg-gradient-to-br from-orange-600/20 to-orange-700/10 rounded-full flex items-center justify-center mx-auto mb-2">
                                <i class="fas fa-bolt text-orange-500"></i>
                            </div>
                            <span class="text-xs text-gray-400">High Output</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Additional Features -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-20">
            <!-- Feature 1 -->
            <div class="bg-gradient-to-br from-gray-900/50 to-black/50 border border-gray-800 rounded-2xl p-8 text-center hover:border-orange-500/50 hover:scale-105 transition-all duration-500 group" data-aos="fade-up" data-aos-delay="100">
                <div class="w-20 h-20 bg-gradient-to-br from-orange-600/20 to-orange-700/10 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-500 animate-float">
                    <i class="fas fa-headset text-3xl text-orange-500"></i>
                </div>
                <h4 class="text-xl font-bold text-white mb-4">24/7 Technical Support</h4>
                <p class="text-gray-300 mb-6">Round-the-clock expert assistance for uninterrupted operations.</p>
                <div class="inline-flex items-center text-orange-500 font-medium">
                    <span>Always Available</span>
                    <i class="fas fa-arrow-right ml-2 group-hover:translate-x-2 transition-transform duration-300"></i>
                </div>
            </div>

            <!-- Feature 2 -->
            <div class="bg-gradient-to-br from-gray-900/50 to-black/50 border border-gray-800 rounded-2xl p-8 text-center hover:border-orange-500/50 hover:scale-105 transition-all duration-500 group" data-aos="fade-up" data-aos-delay="200">
                <div class="w-20 h-20 bg-gradient-to-br from-orange-600/20 to-orange-700/10 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-500 animate-float animation-delay-300">
                    <i class="fas fa-shipping-fast text-3xl text-orange-500"></i>
                </div>
                <h4 class="text-xl font-bold text-white mb-4">Global Installation</h4>
                <p class="text-gray-300 mb-6">Seamless installation and commissioning worldwide.</p>
                <div class="inline-flex items-center text-orange-500 font-medium">
                    <span>Worldwide Service</span>
                    <i class="fas fa-arrow-right ml-2 group-hover:translate-x-2 transition-transform duration-300"></i>
                </div>
            </div>

            <!-- Feature 3 -->
            <div class="bg-gradient-to-br from-gray-900/50 to-black/50 border border-gray-800 rounded-2xl p-8 text-center hover:border-orange-500/50 hover:scale-105 transition-all duration-500 group" data-aos="fade-up" data-aos-delay="300">
                <div class="w-20 h-20 bg-gradient-to-br from-orange-600/20 to-orange-700/10 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-500 animate-float animation-delay-600">
                    <i class="fas fa-graduation-cap text-3xl text-orange-500"></i>
                </div>
                <h4 class="text-xl font-bold text-white mb-4">Complete Training</h4>
                <p class="text-gray-300 mb-6">Comprehensive operator training and skill development.</p>
                <div class="inline-flex items-center text-orange-500 font-medium">
                    <span>Expert Training</span>
                    <i class="fas fa-arrow-right ml-2 group-hover:translate-x-2 transition-transform duration-300"></i>
                </div>
            </div>
        </div>

        <!-- CTA Section -->
        <div class="text-center relative" data-aos="fade-up" data-aos-delay="400">
            <!-- Animated Border -->
            <div class="absolute -inset-1 bg-gradient-to-r from-orange-600 via-orange-500 to-orange-600 rounded-3xl blur-lg opacity-30 animate-gradient-flow"></div>
            
            <div class="relative bg-gradient-to-br from-gray-900 to-black border-2 border-orange-600/30 rounded-3xl p-12">
                <h3 class="text-3xl md:text-4xl font-bold text-white mb-6">
                    Ready to <span class="gradient-text">Transform</span> Your Production Line?
                </h3>
                <p class="text-xl text-gray-300 mb-10 max-w-2xl mx-auto">
                    Partner with India's most trusted film slitting machinery manufacturer. Get a personalized consultation and discover how our solutions can boost your productivity.
                </p>
                
                <div class="flex flex-col sm:flex-row gap-6 justify-center">
                    <a href="contact.php" class="shimmer-btn group relative px-10 py-4 bg-gradient-to-r from-orange-600 to-orange-700 text-white font-bold uppercase rounded-lg hover:from-orange-700 hover:to-orange-800 transition-all duration-300 hover:scale-105 hover:shadow-2xl hover:shadow-orange-600/30">
                        <span class="flex items-center justify-center">
                            <i class="fas fa-calendar-check mr-3"></i>
                            Schedule Free Consultation
                            <i class="fas fa-arrow-right ml-3 transform group-hover:translate-x-2 transition-transform duration-300"></i>
                        </span>
                    </a>
                    <a href="products.php" class="shimmer-btn group relative px-10 py-4 border-2 border-orange-600 text-orange-600 font-bold uppercase rounded-lg hover:bg-orange-600 hover:text-white transition-all duration-300 hover:scale-105">
                        <span class="flex items-center justify-center">
                            <i class="fas fa-cogs mr-3"></i>
                            Browse Our Machines
                            <i class="fas fa-external-link-alt ml-3"></i>
                        </span>
                    </a>
                </div>
                
                <!-- Trust Badges -->
                <div class="mt-12 flex flex-wrap justify-center gap-6">
                    <div class="flex items-center space-x-2 text-sm text-gray-400">
                        <i class="fas fa-check-circle text-green-500"></i>
                        <span>ISO 9001:2015 Certified</span>
                    </div>
                    <div class="flex items-center space-x-2 text-sm text-gray-400">
                        <i class="fas fa-check-circle text-green-500"></i>
                        <span>16+ Years Experience</span>
                    </div>
                    <div class="flex items-center space-x-2 text-sm text-gray-400">
                        <i class="fas fa-check-circle text-green-500"></i>
                        <span>200+ Happy Clients</span>
                    </div>
                    <div class="flex items-center space-x-2 text-sm text-gray-400">
                        <i class="fas fa-check-circle text-green-500"></i>
                        <span>50+ Countries Served</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Mission & Vision -->
<section class="py-20 bg-gray-900">
    <div class="container-custom">
        <div class="text-center mb-16" data-aos="fade-up">
            <span class="text-orange-500 font-bold uppercase tracking-wider mb-2 block animate-on-scroll">Our Purpose</span>
            <h2 class="section-title text-3xl md:text-4xl font-bold text-white mb-6 animate-on-scroll animation-delay-100">
                Driving Industrial Transformation
            </h2>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Mission -->
            <div class="bg-gray-800/50 border border-gray-700 p-8 rounded-xl hover-lift hover-glow animate-on-scroll-left" data-aos="fade-right" data-aos-delay="100">
                <div class="flex items-center mb-6">
                    <div class="w-16 h-16 bg-gradient-to-br from-orange-600/20 to-orange-700/10 rounded-xl flex items-center justify-center mr-6 group-hover:scale-110 transition-transform duration-300 animate-pulse-glow">
                        <i class="fas fa-bullseye text-3xl text-orange-500 animate-float"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-white">Our Mission</h3>
                </div>
                <p class="text-gray-300 mb-6 leading-relaxed">
                    To revolutionize industrial manufacturing through precision engineering, innovative solutions, and sustainable practices that drive efficiency and growth for our clients worldwide.
                </p>
                <ul class="space-y-4">
                    <?php
                    $missionPoints = [
                        'Deliver unmatched precision in every machine',
                        'Drive continuous innovation in manufacturing',
                        'Promote sustainable industrial practices',
                        'Build lasting partnerships with clients'
                    ];
                    
                    foreach ($missionPoints as $index => $point):
                    ?>
                    <li class="flex items-center text-gray-300 group stagger-item" data-delay="<?php echo $index * 100; ?>">
                        <div class="w-2 h-2 bg-orange-500 rounded-full mr-3 group-hover:scale-125 transition-transform duration-300 animate-pulse"></div>
                        <span class="group-hover:text-white transition-colors duration-300"><?php echo $point; ?></span>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            
            <!-- Vision -->
            <div class="bg-gray-800/50 border border-gray-700 p-8 rounded-xl hover-lift hover-glow animate-on-scroll-right" data-aos="fade-left" data-aos-delay="200">
                <div class="flex items-center mb-6">
                    <div class="w-16 h-16 bg-gradient-to-br from-orange-600/20 to-orange-700/10 rounded-xl flex items-center justify-center mr-6 group-hover:scale-110 transition-transform duration-300 animate-pulse-glow animation-delay-200">
                        <i class="fas fa-eye text-3xl text-orange-500 animate-float animation-delay-200"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-white">Our Vision</h3>
                </div>
                <p class="text-gray-300 mb-6 leading-relaxed">
                    To be the global leader in industrial machinery manufacturing, recognized for innovation, reliability, and transformative solutions that shape the future of manufacturing.
                </p>
                <ul class="space-y-4">
                    <?php
                    $visionPoints = [
                        'Achieve global leadership in machinery manufacturing',
                        'Set new standards in industrial innovation',
                        'Transform manufacturing processes worldwide',
                        'Create sustainable value for stakeholders'
                    ];
                    
                    foreach ($visionPoints as $index => $point):
                    ?>
                    <li class="flex items-center text-gray-300 group stagger-item" data-delay="<?php echo ($index + 4) * 100; ?>">
                        <div class="w-2 h-2 bg-orange-500 rounded-full mr-3 group-hover:scale-125 transition-transform duration-300 animate-pulse"></div>
                        <span class="group-hover:text-white transition-colors duration-300"><?php echo $point; ?></span>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Values -->
<section id="values" class="py-20 bg-black">
    <div class="container-custom">
        <div class="text-center mb-16" data-aos="fade-up">
            <span class="text-orange-500 font-bold uppercase tracking-wider mb-2 block animate-on-scroll">Core Values</span>
            <h2 class="section-title text-3xl md:text-4xl font-bold text-white mb-6 animate-on-scroll animation-delay-100">
                What Defines Us
            </h2>
            <p class="text-gray-300 max-w-2xl mx-auto animate-on-scroll animation-delay-200">
                Our values guide every decision and action in serving our clients, shaping our culture and driving our success.
            </p>
        </div>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <?php
            $values = [
                [
                    'icon' => 'fas fa-medal',
                    'title' => 'Quality Excellence',
                    'desc' => 'Uncompromising quality in every machine we design and manufacture',
                    'color' => 'from-orange-500 to-orange-600'
                ],
                [
                    'icon' => 'fas fa-lightbulb',
                    'title' => 'Innovation',
                    'desc' => 'Continuous pursuit of better solutions through R&D and technology',
                    'color' => 'from-blue-500 to-cyan-600'
                ],
                [
                    'icon' => 'fas fa-handshake',
                    'title' => 'Integrity',
                    'desc' => 'Ethical practices, transparency, and trust in all relationships',
                    'color' => 'from-green-500 to-emerald-600'
                ],
                [
                    'icon' => 'fas fa-users',
                    'title' => 'Collaboration',
                    'desc' => 'Strong partnerships for mutual growth and success',
                    'color' => 'from-purple-500 to-pink-600'
                ]
            ];
            
            foreach ($values as $index => $value):
            ?>
            <div class="value-card p-8 rounded-xl animate-on-scroll hover-rotate" data-aos="fade-up" data-aos-delay="<?php echo $index * 100; ?>">
                <div class="text-4xl mb-6">
                    <div class="w-16 h-16 bg-gradient-to-br <?php echo $value['color']; ?> rounded-lg flex items-center justify-center mx-auto group-hover:scale-110 transition-transform duration-300 animate-bounce-in">
                        <i class="<?php echo $value['icon']; ?> text-white text-2xl animate-float"></i>
                    </div>
                </div>
                <h3 class="text-xl font-bold text-white mb-4 text-center animate-slide-in-up"><?php echo $value['title']; ?></h3>
                <p class="text-gray-300 text-center leading-relaxed animate-fade-in animation-delay-300"><?php echo $value['desc']; ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Timeline -->
<section class="py-20 bg-gray-900">
    <div class="container-custom">
        <div class="text-center mb-16" data-aos="fade-up">
            <span class="text-orange-500 font-bold uppercase tracking-wider mb-2 block animate-on-scroll">Our Journey</span>
            <h2 class="section-title text-3xl md:text-4xl font-bold text-white mb-6 animate-on-scroll animation-delay-100">
                Milestones Timeline
            </h2>
        </div>
        
        <div class="space-y-6 max-w-3xl mx-auto relative">
            <!-- Timeline Line -->
            <div class="absolute left-8 md:left-1/2 top-0 bottom-0 w-0.5 bg-gradient-to-b from-orange-600 to-transparent transform -translate-x-1/2 animate-shimmer"></div>
            
            <?php
            $milestones = [
                [
                    'year' => '2008',
                    'title' => 'Company Foundation',
                    'desc' => 'VIVA ENGINEERING established in Mumbai with focus on precision machinery',
                    'side' => 'left'
                ],
                [
                    'year' => '2013',
                    'title' => 'Factory Expansion',
                    'desc' => 'Doubled manufacturing capacity and launched new product lines',
                    'side' => 'right'
                ],
                [
                    'year' => '2016',
                    'title' => 'ISO Certification',
                    'desc' => 'Achieved ISO 9001:2015 for quality management excellence',
                    'side' => 'left'
                ],
                [
                    'year' => '2020',
                    'title' => 'Global Expansion',
                    'desc' => 'Expanded operations to 50+ countries across 5 continents',
                    'side' => 'right'
                ],
                [
                    'year' => '2024',
                    'title' => 'Digital Transformation',
                    'desc' => 'Implemented Industry 4.0 technologies and smart manufacturing',
                    'side' => 'left'
                ]
            ];
            
            foreach ($milestones as $index => $milestone):
            ?>
            <div class="relative stagger-item" data-delay="<?php echo $index * 100; ?>" data-aos="fade-up" data-aos-delay="<?php echo $index * 100; ?>">
                <!-- Timeline Dot -->
                <div class="absolute left-6 md:left-2/4 w-4 h-4 bg-orange-900 rounded-full transform -translate-x-1/2 timeline-dot animate-neon-glow"></div>
                
                <!-- Milestone Card -->
                <div class="milestone-card bg-gray-800 border border-gray-700 p-6 rounded-xl ml-12 md:ml-0 md:w-5/12 <?php echo $milestone['side'] == 'left' ? 'md:mr-auto md:pr-12 animate-on-scroll-left' : 'md:ml-auto md:pl-12 animate-on-scroll-right'; ?> hover-shake">
                    <div class="flex items-center mb-4">
                        <div class="bg-gradient-to-r from-orange-600 to-orange-700 text-white px-5 py-2 rounded-full font-bold mr-4 animate-pulse-glow">
                            <?php echo $milestone['year']; ?>
                        </div>
                        <h3 class="text-xl font-bold text-white animate-slide-in-up"><?php echo $milestone['title']; ?></h3>
                    </div>
                    <p class="text-gray-300 leading-relaxed animate-fade-in animation-delay-200"><?php echo $milestone['desc']; ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Global Reach -->
<section class="py-20 bg-black relative overflow-hidden parallax-section">
    <!-- Background Elements -->
    <div class="absolute inset-0 opacity-10 parallax-layer layer-1">
        <div class="absolute top-10 left-10 w-64 h-64 bg-gradient-to-br from-orange-600 to-transparent rounded-full blur-3xl animate-pulse"></div>
        <div class="absolute bottom-10 right-10 w-64 h-64 bg-gradient-to-tl from-orange-600 to-transparent rounded-full blur-3xl animate-pulse animation-delay-1000"></div>
    </div>
    
    <!-- 3D Globe Container -->
    <div class="absolute top-1/2 left-1/4 w-96 h-96 -translate-y-1/2 opacity-10 pointer-events-none">
        <div class="relative w-full h-full" id="3d-globe"></div>
    </div>
    
    <div class="container-custom relative z-10">
        <div class="text-center mb-16" data-aos="fade-up" data-aos-anchor-placement="top-center">
            <div class="inline-flex items-center justify-center mb-6">
                <div class="w-16 h-16 bg-gradient-to-br from-orange-600/20 to-orange-700/10 rounded-xl flex items-center justify-center mr-4 animate-rotate-in hover-scale cursor-pointer"
                     data-tilt 
                     data-tilt-max="25" 
                     data-tilt-speed="400" 
                     data-tilt-perspective="500">
                    <i class="fas fa-globe-americas text-3xl text-orange-500 animate-float"></i>
                </div>
                <span class="text-orange-500 font-bold uppercase tracking-wider text-lg animate-slide-in-right">Global Presence</span>
            </div>
            
            <h2 class="section-title text-3xl md:text-4xl lg:text-5xl font-bold text-white mb-6 animate-on-scroll animation-delay-100 leading-tight">
                <span class="gradient-text animate-gradient-flow">Worldwide</span> 
                <span class="text-white">Impact &</span>
                <span class="block mt-2 text-orange-400 animate-wave">Global Reach</span>
            </h2>
            
            <p class="text-gray-300 text-lg max-w-3xl mx-auto leading-relaxed animate-on-scroll animation-delay-200" 
               data-splitting>
                Connecting industries across <span class="text-orange-400 font-bold">50+ countries</span> with precision machinery solutions, expert support, and transformative technology partnerships.
            </p>
        </div>
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <!-- Animated Globe with Interactive Map -->
            <div class="globe-container animate-on-scroll-left relative group" data-aos="fade-right" data-aos-delay="200">
                <div class="relative overflow-hidden rounded-2xl border-2 border-orange-600/30 hover:border-orange-500 transition-all duration-500 group-hover:scale-[1.02] group-hover:shadow-2xl group-hover:shadow-orange-600/20">
                    <!-- Interactive World Map -->
                    <div class="world-map-container w-full h-96 bg-gradient-to-br from-gray-900 to-black relative overflow-hidden cursor-grab active:cursor-grabbing" id="world-map">
                        <!-- Map will be rendered with JavaScript -->
                        <div class="absolute inset-0 flex items-center justify-center">
                            <div class="relative">
                                <div class="w-48 h-48 rounded-full border-2 border-orange-600/30 animate-pulse-glow"></div>
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <div class="w-32 h-32 rounded-full border-2 border-orange-500/50 animate-pulse-glow animation-delay-500"></div>
                                </div>
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <div class="w-20 h-20 rounded-full bg-gradient-to-br from-orange-600 to-orange-700 flex items-center justify-center animate-neon-glow">
                                        <i class="fas fa-globe-americas text-3xl text-white animate-rotate-in"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Animated Connection Lines -->
                        <div class="absolute inset-0">
                            <svg class="w-full h-full" id="connection-lines">
                                <!-- Lines will be dynamically generated -->
                            </svg>
                        </div>
                        
                        <!-- Location Points -->
                        <div class="location-points absolute inset-0">
                            <!-- Points will be dynamically generated -->
                        </div>
                    </div>
                    
                    <!-- Map Controls -->
                    <div class="absolute bottom-4 right-4 flex space-x-2">
                        <button class="map-control bg-gray-900/80 hover:bg-orange-600 text-white w-10 h-10 rounded-full flex items-center justify-center transition-all duration-300 hover:scale-110 hover:rotate-12"
                                onclick="zoomInMap()">
                            <i class="fas fa-search-plus"></i>
                        </button>
                        <button class="map-control bg-gray-900/80 hover:bg-orange-600 text-white w-10 h-10 rounded-full flex items-center justify-center transition-all duration-300 hover:scale-110 hover:-rotate-12"
                                onclick="zoomOutMap()">
                            <i class="fas fa-search-minus"></i>
                        </button>
                        <button class="map-control bg-gray-900/80 hover:bg-orange-600 text-white w-10 h-10 rounded-full flex items-center justify-center transition-all duration-300 hover:scale-110 hover:rotate-180"
                                onclick="resetMap()">
                            <i class="fas fa-sync-alt"></i>
                        </button>
                    </div>
                    
                    <!-- Map Info Overlay -->
                    <div class="absolute top-4 left-4 bg-gray-900/90 backdrop-blur-sm border border-orange-600/30 rounded-lg p-4 max-w-xs transform -translate-x-full opacity-0 group-hover:translate-x-0 group-hover:opacity-100 transition-all duration-500">
                        <h4 class="text-white font-bold mb-2 flex items-center">
                            <i class="fas fa-map-marker-alt text-orange-500 mr-2"></i>
                            Interactive Global Map
                        </h4>
                        <p class="text-gray-300 text-sm">
                            Explore our global presence. Click on markers to see details of our operations in each region.
                        </p>
                    </div>
                    
                    <!-- Pulse Effect -->
                    <div class="absolute inset-0 rounded-2xl overflow-hidden">
                        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-4 h-4 bg-orange-500 rounded-full animate-ping opacity-20"></div>
                    </div>
                </div>
                
                <!-- Stats Overlay -->
                <div class="absolute -bottom-6 left-1/2 transform -translate-x-1/2 flex space-x-4">
                    <div class="bg-gradient-to-r from-orange-600 to-orange-700 text-white px-6 py-3 rounded-lg shadow-xl flex items-center space-x-3 animate-float hover-scale cursor-pointer"
                         data-tilt
                         data-tilt-max="15">
                        <i class="fas fa-plane text-lg"></i>
                        <div>
                            <div class="font-bold text-xl">50+</div>
                            <div class="text-xs opacity-90">Countries</div>
                        </div>
                    </div>
                    <div class="bg-gradient-to-r from-orange-700 to-orange-800 text-white px-6 py-3 rounded-lg shadow-xl flex items-center space-x-3 animate-float animation-delay-300 hover-scale cursor-pointer"
                         data-tilt
                         data-tilt-max="15"
                         data-tilt-reverse="true">
                        <i class="fas fa-users text-lg"></i>
                        <div>
                            <div class="font-bold text-xl">200+</div>
                            <div class="text-xs opacity-90">Clients</div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Enhanced Stats Grid with Advanced Animations -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 animate-on-scroll-right" data-aos="fade-left" data-aos-delay="300">
                <?php
                $globalStats = [
                    [
                        'value' => '50+',
                        'label' => 'Countries Served',
                        'icon' => 'fas fa-globe-americas',
                        'color' => 'from-orange-600 to-orange-700',
                        'description' => 'Global footprint across 5 continents',
                        'trend' => '+5 this year'
                    ],
                    [
                        'value' => '200+',
                        'label' => 'Global Clients',
                        'icon' => 'fas fa-handshake',
                        'color' => 'from-blue-600 to-blue-700',
                        'description' => 'Trusted by industry leaders',
                        'trend' => '+25% growth'
                    ],
                    [
                        'value' => '15+',
                        'label' => 'Awards Won',
                        'icon' => 'fas fa-trophy',
                        'color' => 'from-yellow-600 to-yellow-700',
                        'description' => 'Industry recognition',
                        'trend' => 'Excellence in innovation'
                    ],
                    [
                        'value' => '24/7',
                        'label' => 'Global Support',
                        'icon' => 'fas fa-headset',
                        'color' => 'from-green-600 to-green-700',
                        'description' => 'Round-the-clock assistance',
                        'trend' => '99.9% uptime'
                    ]
                ];
                
                foreach ($globalStats as $index => $stat):
                ?>
                <div class="stats-card group relative bg-gray-900/50 border border-gray-700 p-6 rounded-2xl text-center hover-lift animate-on-scroll-scale overflow-hidden cursor-pointer"
                     data-aos="zoom-in"
                     data-aos-delay="<?php echo $index * 100 + 400; ?>"
                     data-tilt
                     data-tilt-max="10"
                     data-tilt-speed="400"
                     data-tilt-perspective="1000"
                     onmouseenter="animateCounter(this, '<?php echo str_replace('+', '', $stat['value']); ?>')">
                    
                    <!-- Card Background Effect -->
                    <div class="absolute inset-0 bg-gradient-to-br <?php echo $stat['color']; ?> opacity-0 group-hover:opacity-10 transition-opacity duration-500"></div>
                    
                    <!-- Animated Border -->
                    <div class="absolute inset-0 rounded-2xl overflow-hidden">
                        <div class="absolute w-32 h-32 bg-gradient-to-r <?php echo $stat['color']; ?> opacity-20 -top-16 -left-16 group-hover:scale-150 group-hover:rotate-45 transition-all duration-700"></div>
                    </div>
                    
                    <!-- Icon -->
                    <div class="relative mb-4">
                        <div class="w-16 h-16 mx-auto bg-gradient-to-br <?php echo $stat['color']; ?> rounded-xl flex items-center justify-center group-hover:scale-110 group-hover:rotate-12 transition-all duration-500 shadow-lg animate-bounce-in">
                            <i class="<?php echo $stat['icon']; ?> text-2xl text-white animate-float"></i>
                        </div>
                    </div>
                    
                    <!-- Main Content -->
                    <div class="relative">
                        <div class="text-4xl md:text-5xl font-bold text-orange-500 mb-2 stat-counter" data-count="<?php echo str_replace('+', '', $stat['value']); ?>">
                            <?php echo $stat['value']; ?>
                        </div>
                        
                        <h3 class="text-white font-bold text-lg mb-2 animate-slide-in-up">
                            <?php echo $stat['label']; ?>
                        </h3>
                        
                        <p class="text-gray-300 text-sm mb-3 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <?php echo $stat['description']; ?>
                        </p>
                        
                        <!-- Trend Indicator -->
                        <div class="flex items-center justify-center space-x-1 text-xs text-gray-400 group-hover:text-orange-400 transition-colors duration-300">
                            <i class="fas fa-chart-line"></i>
                            <span><?php echo $stat['trend']; ?></span>
                        </div>
                    </div>
                    
                    <!-- Progress Bar -->
                    <div class="mt-6">
                        <div class="w-full h-2 bg-gray-800 rounded-full overflow-hidden">
                            <div class="h-full bg-gradient-to-r <?php echo $stat['color']; ?> animate-shimmer progress-bar" 
                                 style="width: <?php echo (($index + 1) * 25); ?>%; animation-delay: <?php echo $index * 0.2; ?>s;"></div>
                        </div>
                    </div>
                    
                    <!-- Hover Effect -->
                    <div class="absolute inset-0 border-2 border-transparent group-hover:border-orange-500/30 rounded-2xl transition-all duration-500 pointer-events-none"></div>
                    
                    <!-- Particle Effect on Hover -->
                    <div class="particles-container absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-500 pointer-events-none"></div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        
        <!-- Additional Stats Row -->
        <div class="mt-16 grid grid-cols-2 md:grid-cols-4 gap-6 animate-on-scroll" data-aos="fade-up" data-aos-delay="600">
            <div class="bg-gray-900/30 border border-gray-700/50 p-4 rounded-xl text-center hover:bg-gray-900/50 transition-all duration-300 group">
                <div class="text-2xl font-bold text-orange-500 mb-1 animate-count">5000+</div>
                <p class="text-gray-400 text-xs uppercase tracking-wider group-hover:text-orange-400 transition-colors duration-300">Machines Installed</p>
            </div>
            <div class="bg-gray-900/30 border border-gray-700/50 p-4 rounded-xl text-center hover:bg-gray-900/50 transition-all duration-300 group">
                <div class="text-2xl font-bold text-orange-500 mb-1 animate-count">98%</div>
                <p class="text-gray-400 text-xs uppercase tracking-wider group-hover:text-orange-400 transition-colors duration-300">Client Retention</p>
            </div>
            <div class="bg-gray-900/30 border border-gray-700/50 p-4 rounded-xl text-center hover:bg-gray-900/50 transition-all duration-300 group">
                <div class="text-2xl font-bold text-orange-500 mb-1 animate-count">10M+</div>
                <p class="text-gray-400 text-xs uppercase tracking-wider group-hover:text-orange-400 transition-colors duration-300">Operating Hours</p>
            </div>
            <div class="bg-gray-900/30 border border-gray-700/50 p-4 rounded-xl text-center hover:bg-gray-900/50 transition-all duration-300 group">
                <div class="text-2xl font-bold text-orange-500 mb-1 animate-count">100%</div>
                <p class="text-gray-400 text-xs uppercase tracking-wider group-hover:text-orange-400 transition-colors duration-300">ISO Certified</p>
            </div>
        </div>
        
        <!-- Animated Connection Path -->
        <div class="mt-20 relative">
            <div class="h-1 bg-gradient-to-r from-transparent via-orange-600 to-transparent animate-pulse rounded-full"></div>
            <div class="absolute top-1/2 left-0 w-full flex justify-between transform -translate-y-1/2">
                <?php for ($i = 0; $i < 5; $i++): ?>
                <div class="w-4 h-4 bg-orange-600 rounded-full animate-pulse-glow" style="animation-delay: <?php echo $i * 0.2; ?>s;"></div>
                <?php endfor; ?>
            </div>
        </div>
    </div>
</section>

<!-- Team -->
<section class="py-20 bg-gray-900">
    <div class="container-custom">
        <div class="text-center mb-16" data-aos="fade-up">
            <span class="text-orange-500 font-bold uppercase tracking-wider mb-2 block animate-on-scroll">Our Team</span>
            <h2 class="section-title text-3xl md:text-4xl font-bold text-white mb-6 animate-on-scroll animation-delay-100">
                Leadership Experts
            </h2>
            <p class="text-gray-300 max-w-2xl mx-auto animate-on-scroll animation-delay-200">
                Experienced professionals driving industrial innovation and excellence across global markets.
            </p>
        </div>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            <?php
            $team = [
                [
                    'name' => 'Rajesh Kumar',
                    'role' => 'Founder & CEO',
                    'exp' => '25+ years',
                    'color' => 'from-orange-600 to-orange-700'
                ],
                [
                    'name' => 'Priya Sharma',
                    'role' => 'Head of Engineering',
                    'exp' => '18+ years',
                    'color' => 'from-blue-600 to-blue-700'
                ],
                [
                    'name' => 'Amit Patel',
                    'role' => 'Production Director',
                    'exp' => '20+ years',
                    'color' => 'from-green-600 to-green-700'
                ],
                [
                    'name' => 'Neha Singh',
                    'role' => 'R&D Head',
                    'exp' => '15+ years',
                    'color' => 'from-purple-600 to-purple-700'
                ]
            ];
            
            foreach ($team as $index => $member):
            ?>
            <div class="team-card bg-gray-800 border border-gray-700 p-8 rounded-xl text-center animate-on-scroll hover-bounce" 
                 data-aos="fade-up" 
                 data-aos-delay="<?php echo $index * 100; ?>">
                <div class="w-24 h-24 mx-auto mb-6 rounded-full bg-gradient-to-br <?php echo $member['color']; ?> flex items-center justify-center team-initial transition-transform duration-300 animate-rotate-in">
                    <span class="text-3xl font-bold text-white animate-bounce-in"><?php echo substr($member['name'], 0, 1); ?></span>
                </div>
                <h3 class="text-xl font-bold text-white mb-2 animate-slide-in-up"><?php echo $member['name']; ?></h3>
                <p class="text-orange-500 font-bold mb-3 animate-fade-in animation-delay-100"><?php echo $member['role']; ?></p>
                <p class="text-gray-300 text-sm mb-4 animate-fade-in animation-delay-200">Experience: <?php echo $member['exp']; ?></p>
                <div class="flex justify-center space-x-3">
                    <a href="#" class="w-8 h-8 bg-gray-700 hover:bg-orange-600 rounded-full flex items-center justify-center transition-colors duration-300 animate-scale-in animation-delay-300">
                        <i class="fab fa-linkedin-in text-sm text-white"></i>
                    </a>
                    <a href="#" class="w-8 h-8 bg-gray-700 hover:bg-orange-600 rounded-full flex items-center justify-center transition-colors duration-300 animate-scale-in animation-delay-400">
                        <i class="fas fa-envelope text-sm text-white"></i>
                    </a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="py-24 bg-gradient-to-r from-black via-gray-900 to-black relative overflow-hidden">
    <!-- Background Elements -->
    <div class="absolute inset-0 opacity-10 parallax" data-speed="0.2">
        <div class="absolute top-10 left-10 w-64 h-64 bg-gradient-to-br from-orange-600 to-transparent rounded-full blur-3xl animate-pulse"></div>
        <div class="absolute bottom-10 right-10 w-64 h-64 bg-gradient-to-tl from-orange-600 to-transparent rounded-full blur-3xl animate-pulse animation-delay-1000"></div>
    </div>
    
    <div class="container-custom text-center relative z-10">
        <h2 class="text-4xl md:text-5xl font-bold text-white mb-8 animate-on-scroll" data-aos="fade-up">
            Join Our <span class="gradient-text animate-gradient-flow">Industrial Revolution</span>
        </h2>
        <p class="text-gray-300 text-xl mb-12 max-w-2xl mx-auto leading-relaxed animate-on-scroll animation-delay-100" data-aos="fade-up" data-aos-delay="100">
            Partner with VIVA ENGINEERING for cutting-edge industrial machinery solutions that transform manufacturing efficiency and productivity.
        </p>
        <div class="flex flex-col sm:flex-row gap-6 justify-center animate-on-scroll animation-delay-200" data-aos="fade-up" data-aos-delay="200">
            <a href="contact.php" class="shimmer-btn px-10 py-4 bg-gradient-to-r from-orange-600 to-orange-700 text-white font-bold uppercase hover:from-orange-700 hover:to-orange-800 transition-all duration-300 rounded-lg hover-scale animate-bounce-in">
                <span class="flex items-center group">
                    <i class="fas fa-handshake mr-3"></i>
                    Partner With Us
                    <i class="fas fa-arrow-right ml-3 transform group-hover:translate-x-2 transition-transform duration-300"></i>
                </span>
            </a>
            <a href="products.php" class="shimmer-btn px-10 py-4 border-2 border-orange-600 text-orange-600 font-bold uppercase hover:bg-orange-600 hover:text-white transition-all duration-300 rounded-lg hover-scale animate-bounce-in animation-delay-100">
                <span class="flex items-center group">
                    <i class="fas fa-cogs mr-3"></i>
                    View Products
                    <i class="fas fa-arrow-right ml-3 transform group-hover:translate-x-2 transition-transform duration-300"></i>
                </span>
            </a>
        </div>
    </div>
</section>

<!-- Additional Libraries for Enhanced Effects -->
<script src="https://cdn.jsdelivr.net/npm/vanilla-tilt@1.8.0/dist/vanilla-tilt.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/splitting@1.0.6/dist/splitting.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/splitting@1.0.6/dist/splitting-cells.min.js"></script>
<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/particles.js/2.0.0/particles.min.js"></script>

<script>
// Initialize Vanilla Tilt for 3D card effects
VanillaTilt.init(document.querySelectorAll('[data-tilt]'), {
    max: 25,
    speed: 400,
    glare: true,
    "max-glare": 0.2,
    scale: 1.05,
    perspective: 1000
});

// Initialize Splitting.js for text animations
Splitting();

// Counter animation function for Why Choose Us section
function animateCounter(element, target) {
    const counterElement = element.querySelector('.stat-counter') || element;
    if (!counterElement || counterElement.classList.contains('counting')) return;
    
    counterElement.classList.add('counting');
    
    const value = counterElement.textContent.replace('+', '').replace('%', '');
    if (isNaN(value)) return;
    
    const targetNumber = parseFloat(target);
    const duration = 2000;
    const steps = 60;
    const step = targetNumber / steps;
    let current = 0;
    
    const timer = setInterval(() => {
        current += step;
        if (current >= targetNumber) {
            current = targetNumber;
            clearInterval(timer);
        }
        
        if (element.textContent.includes('%')) {
            counterElement.textContent = current.toFixed(1) + '%';
        } else {
            counterElement.textContent = Math.floor(current) + '+';
        }
    }, duration / steps);
}

// Interactive Map Functions
let mapScale = 1;
const mapContainer = document.getElementById('world-map');

function zoomInMap() {
    mapScale += 0.1;
    updateMapScale();
    createRippleEffect(mapContainer);
}

function zoomOutMap() {
    mapScale = Math.max(0.5, mapScale - 0.1);
    updateMapScale();
    createRippleEffect(mapContainer);
}

function resetMap() {
    mapScale = 1;
    updateMapScale();
    createPulseEffect(mapContainer);
}

function updateMapScale() {
    if (mapContainer) {
        mapContainer.style.transform = `scale(${mapScale})`;
    }
}

// Create ripple effect
function createRippleEffect(element) {
    if (!element) return;
    
    const ripple = document.createElement('div');
    ripple.className = 'absolute inset-0 bg-orange-500/20 rounded-lg pointer-events-none';
    element.appendChild(ripple);
    
    setTimeout(() => {
        ripple.style.transition = 'all 0.5s ease';
        ripple.style.transform = 'scale(2)';
        ripple.style.opacity = '0';
        
        setTimeout(() => {
            if (ripple.parentNode === element) {
                element.removeChild(ripple);
            }
        }, 500);
    }, 10);
}

// Create pulse effect
function createPulseEffect(element) {
    if (!element) return;
    
    element.style.transition = 'transform 0.3s ease';
    element.style.transform = 'scale(1.05)';
    
    setTimeout(() => {
        element.style.transform = 'scale(1)';
        
        setTimeout(() => {
            element.style.transform = 'scale(1.05)';
            
            setTimeout(() => {
                element.style.transform = 'scale(1)';
            }, 300);
        }, 300);
    }, 300);
}

// Initialize interactive map
function initInteractiveMap() {
    const mapContainer = document.getElementById('world-map');
    if (!mapContainer) return;
    
    const linesContainer = document.getElementById('connection-lines');
    const pointsContainer = mapContainer.querySelector('.location-points');
    
    if (!pointsContainer) return;
    
    // Define major operation locations
    const locations = [
        { name: 'USA', x: 25, y: 40, clients: 45, color: '#FF6B00' },
        { name: 'Germany', x: 50, y: 35, clients: 32, color: '#FF8A00' },
        { name: 'Japan', x: 75, y: 40, clients: 28, color: '#FF5722' },
        { name: 'Australia', x: 70, y: 70, clients: 18, color: '#FF9800' },
        { name: 'Brazil', x: 35, y: 65, clients: 22, color: '#FFB74D' },
        { name: 'UAE', x: 55, y: 45, clients: 15, color: '#FFCC80' }
    ];
    
    // Create location points
    locations.forEach(loc => {
        const point = document.createElement('div');
        point.className = 'absolute w-6 h-6 rounded-full cursor-pointer animate-pulse-glow';
        point.style.left = `${loc.x}%`;
        point.style.top = `${loc.y}%`;
        point.style.transform = 'translate(-50%, -50%)';
        point.style.background = `radial-gradient(circle, ${loc.color} 0%, transparent 70%)`;
        point.style.boxShadow = `0 0 20px ${loc.color}`;
        
        // Tooltip
        const tooltip = document.createElement('div');
        tooltip.className = 'absolute bottom-full left-1/2 transform -translate-x-1/2 mb-2 bg-gray-900/90 backdrop-blur-sm border border-orange-600/30 rounded-lg p-3 text-white text-sm whitespace-nowrap opacity-0 pointer-events-none transition-opacity duration-300';
        tooltip.innerHTML = `
            <strong class="text-orange-400">${loc.name}</strong><br>
            <span class="text-gray-300">${loc.clients} clients</span>
        `;
        point.appendChild(tooltip);
        
        // Hover effects
        point.addEventListener('mouseenter', () => {
            tooltip.style.opacity = '1';
            point.style.transform = 'translate(-50%, -50%) scale(1.5)';
            point.style.transition = 'transform 0.3s ease';
        });
        
        point.addEventListener('mouseleave', () => {
            tooltip.style.opacity = '0';
            point.style.transform = 'translate(-50%, -50%) scale(1)';
        });
        
        // Click effect
        point.addEventListener('click', (e) => {
            e.stopPropagation();
            createExplosionEffect(point);
        });
        
        pointsContainer.appendChild(point);
    });
    
    // Create connection lines
    if (linesContainer) {
        const svgNS = "http://www.w3.org/2000/svg";
        const centerX = 50, centerY = 50;
        
        locations.forEach(loc => {
            const line = document.createElementNS(svgNS, "line");
            line.setAttribute("x1", `${centerX}%`);
            line.setAttribute("y1", `${centerY}%`);
            line.setAttribute("x2", `${loc.x}%`);
            line.setAttribute("y2", `${loc.y}%`);
            line.setAttribute("stroke", loc.color);
            line.setAttribute("stroke-width", "1");
            line.setAttribute("stroke-dasharray", "5,5");
            line.setAttribute("opacity", "0.3");
            
            linesContainer.appendChild(line);
        });
    }
}

// Create explosion effect
function createExplosionEffect(element) {
    const rect = element.getBoundingClientRect();
    const x = rect.left + rect.width / 2;
    const y = rect.top + rect.height / 2;
    
    for (let i = 0; i < 15; i++) {
        const particle = document.createElement('div');
        particle.className = 'fixed w-2 h-2 bg-orange-500 rounded-full pointer-events-none z-50';
        particle.style.left = `${x}px`;
        particle.style.top = `${y}px`;
        document.body.appendChild(particle);
        
        const angle = (i / 15) * Math.PI * 2;
        const distance = 50 + Math.random() * 50;
        
        setTimeout(() => {
            particle.style.transition = 'all 1s ease';
            particle.style.transform = `translate(${Math.cos(angle) * distance}px, ${Math.sin(angle) * distance}px)`;
            particle.style.opacity = '0';
            particle.style.scale = '0';
            
            setTimeout(() => {
                if (particle.parentNode === document.body) {
                    document.body.removeChild(particle);
                }
            }, 1000);
        }, 10);
    }
}

// Initialize count animations
function initCountAnimations() {
    const counters = document.querySelectorAll('.animate-count');
    
    counters.forEach(counter => {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting && !counter.classList.contains('animated')) {
                    counter.classList.add('animated');
                    const value = counter.textContent;
                    if (value.includes('+') || value.includes('%')) {
                        const numValue = parseFloat(value.replace(/[^0-9.]/g, ''));
                        animateCounter(counter, numValue);
                    }
                }
            });
        });
        
        observer.observe(counter);
    });
}

// Initialize Why Choose Us Section Animations
function initWhyChooseUsAnimations() {
    // Animate counters in Why Choose Us section
    const whyChooseCounters = document.querySelectorAll('#why-choose .animate-count');
    whyChooseCounters.forEach(counter => {
        const target = parseFloat(counter.getAttribute('data-count'));
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting && !counter.classList.contains('animated')) {
                    counter.classList.add('animated');
                    
                    let current = 0;
                    const increment = target / 50;
                    const duration = 1500;
                    
                    const timer = setInterval(() => {
                        current += increment;
                        if (current >= target) {
                            counter.textContent = target.toFixed(1);
                            if (target % 1 === 0) {
                                counter.textContent = Math.floor(target);
                            }
                            if (counter.textContent.includes('99.5')) {
                                counter.textContent = '99.5%';
                            } else if (counter.textContent.includes('95')) {
                                counter.textContent = '95%';
                            } else if (counter.textContent.includes('99')) {
                                counter.textContent = '99%';
                            }
                            clearInterval(timer);
                        } else {
                            counter.textContent = current.toFixed(1);
                            if (target % 1 === 0) {
                                counter.textContent = Math.floor(current);
                            }
                        }
                    }, duration / 50);
                }
            });
        });
        observer.observe(counter);
    });

    // Add hover effects to advantage cards
    const advantageCards = document.querySelectorAll('#why-choose .advantage-card');
    advantageCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.zIndex = '20';
        });
        card.addEventListener('mouseleave', function() {
            this.style.zIndex = '1';
        });
    });

    // Add click animation to CTA buttons
    const ctaButtons = document.querySelectorAll('#why-choose .shimmer-btn');
    ctaButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            if (this.getAttribute('href') === '#') {
                e.preventDefault();
                
                // Add click animation
                this.style.transition = 'transform 0.1s ease';
                this.style.transform = 'scale(0.95)';
                
                setTimeout(() => {
                    this.style.transform = 'scale(1)';
                    
                    setTimeout(() => {
                        this.style.transform = 'scale(0.95)';
                        
                        setTimeout(() => {
                            this.style.transform = 'scale(1)';
                        }, 100);
                    }, 100);
                }, 100);
            }
        });
    });
}

// Initialize everything when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
    // Initialize interactive map
    initInteractiveMap();
    
    // Initialize count animations
    initCountAnimations();
    
    // Initialize Why Choose Us animations
    initWhyChooseUsAnimations();
    
    // Add smooth scroll behavior for map controls
    document.querySelectorAll('.map-control').forEach(button => {
        button.addEventListener('click', (e) => {
            e.preventDefault();
            
            // Add click animation
            button.style.transition = 'transform 0.1s ease';
            button.style.transform = 'scale(0.9)';
            
            setTimeout(() => {
                button.style.transform = 'scale(1)';
            }, 100);
        });
    });
});
</script>

<!-- AOS Animation -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<script>
// Initialize AOS
AOS.init({
    duration: 800,
    once: true,
    offset: 100
});

// Smooth scroll
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
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

// Create floating particles
function createParticles() {
    const heroSection = document.querySelector('.relative.min-h-\\[80vh\\]');
    if (!heroSection) return;
    
    const particlesContainer = document.createElement('div');
    particlesContainer.className = 'particles-container absolute inset-0';
    heroSection.appendChild(particlesContainer);
    
    for (let i = 0; i < 20; i++) {
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
}

// Parallax scrolling effect
function initParallax() {
    window.addEventListener('scroll', () => {
        const scrolled = window.pageYOffset;
        const parallaxElements = document.querySelectorAll('.parallax');
        
        parallaxElements.forEach(element => {
            const speed = element.dataset.speed || 0.3;
            element.style.transform = `translateY(${scrolled * speed}px)`;
        });
    });
}

// Staggered animations
function animateStaggerItems() {
    const staggerItems = document.querySelectorAll('.stagger-item');
    
    staggerItems.forEach((item, index) => {
        const delay = item.dataset.delay || index * 100;
        setTimeout(() => {
            item.classList.add('visible');
        }, delay);
    });
}

// Scroll-triggered animations
function onScrollAnimations() {
    const elements = document.querySelectorAll('.animate-on-scroll, .animate-on-scroll-left, .animate-on-scroll-right, .animate-on-scroll-scale');
    
    elements.forEach(element => {
        const elementTop = element.getBoundingClientRect().top;
        const elementVisible = 150;
        
        if (elementTop < window.innerHeight - elementVisible) {
            element.classList.add('active');
        }
    });
}

// Enhanced button hover effects
function initHoverEffects() {
    document.querySelectorAll('.shimmer-btn').forEach(button => {
        button.addEventListener('mouseenter', function() {
            this.classList.add('shadow-lg', 'shadow-orange-600/20');
        });
        
        button.addEventListener('mouseleave', function() {
            this.classList.remove('shadow-lg', 'shadow-orange-600/20');
        });
    });
    
    document.querySelectorAll('.value-card, .team-card, .milestone-card').forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.zIndex = '10';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.zIndex = '1';
        });
    });
}

// Number counting animation
function animateNumbers() {
    const numberElements = document.querySelectorAll('.stat-number');
    
    numberElements.forEach(element => {
        const originalText = element.textContent;
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    // Trigger count animation
                    element.classList.add('counting');
                    observer.unobserve(element);
                }
            });
        });
        observer.observe(element);
    });
}

// Initialize all animations
document.addEventListener('DOMContentLoaded', function() {
    // Create floating particles
    createParticles();
    
    // Initialize parallax
    initParallax();
    
    // Animate staggered items
    animateStaggerItems();
    
    // Setup scroll animations
    window.addEventListener('scroll', onScrollAnimations);
    onScrollAnimations(); // Trigger on load
    
    // Initialize hover effects
    initHoverEffects();
    
    // Animate numbers
    animateNumbers();
    
    // Add CSS for animation delays
    const style = document.createElement('style');
    style.textContent = `
        .particle {
            animation-delay: var(--delay, 0s);
            animation-duration: var(--duration, 3s);
        }
    `;
    document.head.appendChild(style);
});

// Add intersection observer for scroll animations
const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('animated');
        }
    });
}, observerOptions);

// Observe all animatable elements
document.querySelectorAll('.animate-on-scroll, .stagger-item').forEach(el => {
    observer.observe(el);
});
</script>

<?php include 'includes/footer.php'; ?>