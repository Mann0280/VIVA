<?php include 'includes/header.php'; ?>

<!-- Lenis Smooth Scroll Library -->
<script src="https://unpkg.com/lenis@1.1.0/dist/lenis.min.js"></script>
<!-- GSAP Library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>

<!-- Contact Hero Section -->
<section class="relative py-20 bg-black overflow-hidden">
    <!-- Background Elements -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-0 left-0 w-64 h-64 bg-gradient-to-br from-orange-600 to-transparent rounded-full blur-3xl animate-pulse-slow"></div>
        <div class="absolute bottom-0 right-0 w-64 h-64 bg-gradient-to-tl from-orange-600 to-transparent rounded-full blur-3xl animate-pulse-slow animation-delay-1000"></div>
    </div>
    
    <div class="container mx-auto px-4 lg:px-8 relative z-10">
        <div class="max-w-4xl mx-auto text-center">
            <!-- Contact Badge -->
            <div class="inline-flex items-center space-x-2 bg-orange-600/20 border border-orange-600/50 px-4 py-2 rounded-sm mb-8" data-animate="fade-up">
                <span class="w-2 h-2 bg-orange-600 rounded-full animate-pulse"></span>
                <span class="text-sm font-medium text-orange-600 uppercase tracking-wider">Contact Us</span>
            </div>
            
            <!-- Main Title -->
            <h1 class="text-4xl md:text-6xl lg:text-7xl font-bold text-white mb-6 leading-tight" data-animate="fade-up">
                GET IN TOUCH
                <span class="block text-orange-600">WITH OUR TEAM</span>
            </h1>
            
            <!-- Description -->
            <p class="text-xl text-gray-400 mb-10 max-w-2xl mx-auto leading-relaxed" data-animate="fade-up">
                Have questions about our machinery solutions? Our engineering experts are ready to help you find the perfect equipment for your needs.
            </p>
            
            <!-- Quick Contact Info -->
            <div class="flex flex-wrap justify-center gap-8 mt-12">
                <div class="text-center hover:scale-105 transition-transform duration-500" data-animate="fade-up">
                    <div class="w-14 h-14 bg-orange-600/20 border border-orange-600/30 rounded-lg flex items-center justify-center mx-auto mb-4 hover:bg-orange-600/30 hover:border-orange-600/50 transition-all duration-300">
                        <i class="fas fa-phone-alt text-orange-600 text-xl"></i>
                    </div>
                    <p class="text-white font-bold">+91 92656 09416 <br> +91 99244 41090 </p>
                    <p class="text-gray-400 text-sm">Call Us</p>
                </div>
                
                <div class="text-center hover:scale-105 transition-transform duration-500" data-animate="fade-up" data-delay="0.1">
                    <div class="w-14 h-14 bg-orange-600/20 border border-orange-600/30 rounded-lg flex items-center justify-center mx-auto mb-4 hover:bg-orange-600/30 hover:border-orange-600/50 transition-all duration-300">
                        <i class="fas fa-envelope text-orange-600 text-xl"></i>
                    </div>
                    <p class="text-white font-bold">vivaengineering@yahoo.com <br> sales@vivaengg.com </p>
                    <p class="text-gray-400 text-sm">Email Us</p>
                </div>
                
                <div class="text-center hover:scale-105 transition-transform duration-500" data-animate="fade-up" data-delay="0.2">
                    <div class="w-14 h-14 bg-orange-600/20 border border-orange-600/30 rounded-lg flex items-center justify-center mx-auto mb-4 hover:bg-orange-600/30 hover:border-orange-600/50 transition-all duration-300">
                        <i class="fas fa-clock text-orange-600 text-xl"></i>
                    </div>
                    <p class="text-white font-bold">Mon - Sat: 9AM - 9PM</p>
                    <p class="text-gray-400 text-sm">Working Hours</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Main Contact Section -->
<section class="py-20 bg-black">
    <div class="container mx-auto px-4 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Contact Information Cards -->
            <div class="lg:col-span-1 space-y-8">
                <!-- Address Card -->
                <div class="bg-gray-900 border border-gray-800 rounded-xl p-8 hover:border-orange-600 transition-all duration-500 hover:scale-105 hover:shadow-xl hover:shadow-orange-600/10 group" data-animate="fade-right">
                    <div class="w-16 h-16 bg-gradient-to-br from-orange-600 to-orange-700 rounded-lg flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-500">
                        <i class="fas fa-map-marker-alt text-2xl text-white group-hover:rotate-12 transition-transform duration-500"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-white mb-4 group-hover:text-orange-500 transition-colors duration-300">Visit Our Office</h3>
                    <p class="text-gray-400 mb-6">
                         Plot No. 17 , K.P. Ind.Estate, <br> Bakrol Bujrang Road Bakrol, <br> Ahmedabad, Gujarat - 382430 <br> India
                    </p>
                    <a href="#" class="inline-flex items-center text-orange-600 font-bold hover:text-orange-500 transition-colors duration-300 group-hover:translate-x-2 transition-transform duration-300">
                        <i class="fas fa-directions mr-2"></i>
                        Get Directions
                    </a>
                </div>
                
                <!-- Phone Card -->
                <div class="bg-gray-900 border border-gray-800 rounded-xl p-8 hover:border-orange-600 transition-all duration-500 hover:scale-105 hover:shadow-xl hover:shadow-orange-600/10 group" data-animate="fade-right" data-delay="0.2">
                    <div class="w-16 h-16 bg-gradient-to-br from-orange-600 to-orange-700 rounded-lg flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-500">
                        <i class="fas fa-phone-alt text-2xl text-white group-hover:rotate-12 transition-transform duration-500"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-white mb-4 group-hover:text-orange-500 transition-colors duration-300">Call Us</h3>
                    <div class="space-y-3 mb-6">
                        <a href="tel:+919265609416" class="block text-gray-400 hover:text-orange-500 transition-colors duration-300 group-hover:translate-x-2 transition-transform duration-300">
                            <i class="fas fa-phone mr-3 text-orange-600"></i>
                            +91 92656 09416
                        </a>
                        <a href="tel:+919924441090" class="block text-gray-400 hover:text-orange-500 transition-colors duration-300 group-hover:translate-x-2 transition-transform duration-300">
                            <i class="fas fa-phone mr-3 text-orange-600"></i>
                            +91 99244 41090
                        </a>
                    </div>
                    <p class="text-sm text-gray-500">
                        <i class="fas fa-info-circle mr-2"></i>
                        24/7 Technical Support Available
                    </p>
                </div>
                
                <!-- Email Card -->
                <div class="bg-gray-900 border border-gray-800 rounded-xl p-8 hover:border-orange-600 transition-all duration-500 hover:scale-105 hover:shadow-xl hover:shadow-orange-600/10 group" data-animate="fade-right" data-delay="0.4">
                    <div class="w-16 h-16 bg-gradient-to-br from-orange-600 to-orange-700 rounded-lg flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-500">
                        <i class="fas fa-envelope text-2xl text-white group-hover:rotate-12 transition-transform duration-500"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-white mb-4 group-hover:text-orange-500 transition-colors duration-300">Email Us</h3>
                    <div class="space-y-3 mb-6">
                        <a href="mailto:vivaengineering@yahoo.com" class="block text-gray-400 hover:text-orange-500 transition-colors duration-300 group-hover:translate-x-2 transition-transform duration-300">
                            <i class="fas fa-envelope mr-3 text-orange-600"></i>
                            vivaengineering@yahoo.com
                        </a>
                        <a href="mailto:sales@vivaengg.com" class="block text-gray-400 hover:text-orange-500 transition-colors duration-300 group-hover:translate-x-2 transition-transform duration-300">
                            <i class="fas fa-envelope mr-3 text-orange-600"></i>
                            sales@vivaengg.com
                        </a>
                    </div>
                    <p class="text-sm text-gray-500">
                        <i class="fas fa-clock mr-2"></i>
                        Response within 24 hours
                    </p>
                </div>
            </div>
            
            <!-- Contact Form -->
            <div class="lg:col-span-2" data-animate="fade-left">
                <div class="bg-gray-900 border border-gray-800 rounded-xl p-8 lg:p-10 hover:shadow-2xl hover:shadow-orange-600/5 transition-all duration-500">
                    <h2 class="text-3xl lg:text-4xl font-bold text-white mb-2" data-animate="fade-up">Send Us a Message</h2>
                    <p class="text-gray-400 mb-8" data-animate="fade-up" data-delay="0.1">Fill out the form below and we'll get back to you as soon as possible.</p>
                    
                    <form id="contact-form" class="space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div data-animate="fade-up" data-delay="0.2">
                                <label for="name" class="block text-white font-medium mb-2">Full Name *</label>
                                <input type="text" 
                                       id="name" 
                                       name="name"
                                       required
                                       class="w-full px-4 py-3 bg-gray-800 border border-gray-700 text-white rounded-lg focus:outline-none focus:border-orange-600 focus:ring-2 focus:ring-orange-600/20 transition-all duration-300 hover:border-gray-600"
                                       placeholder="Your full name">
                            </div>
                            
                            <div data-animate="fade-up" data-delay="0.3">
                                <label for="email" class="block text-white font-medium mb-2">Email Address *</label>
                                <input type="email" 
                                       id="email" 
                                       name="email"
                                       required
                                       class="w-full px-4 py-3 bg-gray-800 border border-gray-700 text-white rounded-lg focus:outline-none focus:border-orange-600 focus:ring-2 focus:ring-orange-600/20 transition-all duration-300 hover:border-gray-600"
                                       placeholder="Your email address">
                            </div>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div data-animate="fade-up" data-delay="0.4">
                                <label for="phone" class="block text-white font-medium mb-2">Phone Number *</label>
                                <input type="tel" 
                                       id="phone" 
                                       name="phone"
                                       required
                                       class="w-full px-4 py-3 bg-gray-800 border border-gray-700 text-white rounded-lg focus:outline-none focus:border-orange-600 focus:ring-2 focus:ring-orange-600/20 transition-all duration-300 hover:border-gray-600"
                                       placeholder="Your phone number">
                            </div>
                            
                            <div data-animate="fade-up" data-delay="0.5">
                                <label for="company" class="block text-white font-medium mb-2">Company Name</label>
                                <input type="text" 
                                       id="company" 
                                       name="company"
                                       class="w-full px-4 py-3 bg-gray-800 border border-gray-700 text-white rounded-lg focus:outline-none focus:border-orange-600 focus:ring-2 focus:ring-orange-600/20 transition-all duration-300 hover:border-gray-600"
                                       placeholder="Your company name">
                            </div>
                        </div>
                        
                        <div data-animate="fade-up" data-delay="0.6">
                            <label for="subject" class="block text-white font-medium mb-2">Subject *</label>
                            <select id="subject" 
                                    name="subject"
                                    required
                                    class="w-full px-4 py-3 bg-gray-800 border border-gray-700 text-white rounded-lg focus:outline-none focus:border-orange-600 focus:ring-2 focus:ring-orange-600/20 transition-all duration-300 hover:border-gray-600 cursor-pointer">
                                <option value="" disabled selected>Select a subject</option>
                                <option value="quote">Request for Quote</option>
                                <option value="technical">Technical Support</option>
                                <option value="demo">Product Demo Request</option>
                                <option value="service">Service & Maintenance</option>
                                <option value="general">General Inquiry</option>
                            </select>
                        </div>
                        
                        <div data-animate="fade-up" data-delay="0.7">
                            <label for="product" class="block text-white font-medium mb-2">Product Interest</label>
                            <select id="product" 
                                    name="product"
                                    class="w-full px-4 py-3 bg-gray-800  text-white rounded-lg   transition-all duration-300 hover:border-gray-600 ">
                                <option value="" selected>Select product (optional)</option>
                                <option value="slitting">Slitting Machines</option>
                                <option value="cutting">Cutting Machines</option>
                                <option value="coating">Coating Machines</option>
                                <option value="wrapping">Wrapping Machines</option>
                                <option value="custom">Custom Machinery</option>
                            </select>
                        </div>
                        
                        <div data-animate="fade-up" data-delay="0.8">
                            <label for="message" class="block text-white font-medium mb-2">Message *</label>
                            <textarea id="message" 
                                      name="message"
                                      rows="6"
                                      required
                                      class="w-full px-4 py-3 bg-gray-800 border border-gray-700 text-white rounded-lg focus:outline-none focus:border-orange-600 focus:ring-2 focus:ring-orange-600/20 transition-all duration-300 hover:border-gray-600 resize-none"
                                      placeholder="Tell us about your requirements..."></textarea>
                        </div>
                        
                        <div data-animate="fade-up" data-delay="0.9">
                            <button type="submit" 
                                    class="w-full bg-gradient-to-r from-orange-600 to-orange-700 text-white font-bold py-4 px-6 rounded-lg hover:from-orange-700 hover:to-orange-800 transition-all duration-500 hover:shadow-lg hover:shadow-orange-600/20 hover:scale-105 active:scale-95">
                                <span class="flex items-center justify-center">
                                    <i class="fas fa-paper-plane mr-3"></i>
                                    Send Message
                                </span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Map Section -->
<section class="py-20 bg-gray-900">
    <div class="container mx-auto px-4 lg:px-8">
        <div class="text-center mb-12" data-animate="fade-up">
            <h2 class="text-3xl lg:text-4xl font-bold text-white mb-4">Our Location</h2>
            <p class="text-gray-400 max-w-2xl mx-auto">Visit our manufacturing facility in Ahmedabad to see our machinery in action.</p>
        </div>
        
        <div class="bg-gray-800 border border-gray-700 rounded-xl overflow-hidden hover:shadow-xl hover:shadow-orange-600/10 transition-all duration-500" data-animate="scale-up">
            <div class="h-[400px] relative bg-gradient-to-br from-gray-900 to-black flex items-center justify-center group">
                <div class="text-center p-8">
                    <div class="w-20 h-20 bg-gradient-to-br from-orange-600 to-orange-700 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:scale-110 group-hover:rotate-6 transition-all duration-500">
                        <i class="fas fa-industry text-3xl text-white"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-white mb-3 group-hover:text-orange-500 transition-colors duration-300">VIVA ENGINEERING</h3>
                    <p class="text-gray-400 mb-4">Plot No. 17 , K.P.Ind.Estate,</p>
                    <p class="text-gray-400 mb-6">Bakrol Bujrang Road Bakrol,</p>
                    <p class="text-gray-400 mb-6">Ahmedabad, Gujarat - 382430 India</p>
                    <a href="#" class="inline-flex items-center text-orange-600 font-bold hover:text-orange-500 transition-colors duration-300 group-hover:translate-x-2 transition-transform duration-300">
                        <i class="fas fa-map-marker-alt mr-2"></i>
                        View on Google Maps
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="py-20 bg-black">
    <div class="container mx-auto px-4 lg:px-8">
        <div class="max-w-4xl mx-auto">
            <div class="text-center mb-12" data-animate="fade-up">
                <h2 class="text-3xl lg:text-4xl font-bold text-white mb-4">Frequently Asked Questions</h2>
                <p class="text-gray-400">Find answers to common questions about our products and services.</p>
            </div>
            
            <div class="space-y-4">
                <!-- FAQ Item 1 -->
                <div class="bg-gray-900 border border-gray-800 rounded-lg overflow-hidden hover:border-gray-700 transition-all duration-300" data-animate="fade-up" data-delay="0.1">
                    <button class="faq-question w-full text-left px-6 py-4 flex justify-between items-center text-white font-medium hover:bg-gray-800 transition-all duration-300 group">
                        <span class="group-hover:text-orange-500 transition-colors duration-300">What is your response time for inquiries?</span>
                        <i class="fas fa-chevron-down transition-all duration-500 group-hover:rotate-180 group-hover:text-orange-500"></i>
                    </button>
                    <div class="faq-answer px-6 py-4 border-t border-gray-800 text-gray-400 hidden overflow-hidden">
                        <div class="animate-slide-down">
                            We respond to all inquiries within 24 hours. For urgent technical support, please call our emergency support line available 24/7.
                        </div>
                    </div>
                </div>
                
                <!-- FAQ Item 2 -->
                <div class="bg-gray-900 border border-gray-800 rounded-lg overflow-hidden hover:border-gray-700 transition-all duration-300" data-animate="fade-up" data-delay="0.2">
                    <button class="faq-question w-full text-left px-6 py-4 flex justify-between items-center text-white font-medium hover:bg-gray-800 transition-all duration-300 group">
                        <span class="group-hover:text-orange-500 transition-colors duration-300">Do you offer product demonstrations?</span>
                        <i class="fas fa-chevron-down transition-all duration-500 group-hover:rotate-180 group-hover:text-orange-500"></i>
                    </button>
                    <div class="faq-answer px-6 py-4 border-t border-gray-800 text-gray-400 hidden overflow-hidden">
                        <div class="animate-slide-down">
                            Yes, we offer product demonstrations at our facility in Ahmedabad. You can request a demo through our contact form or by calling our sales team.
                        </div>
                    </div>
                </div>
                
                <!-- FAQ Item 3 -->
                <div class="bg-gray-900 border border-gray-800 rounded-lg overflow-hidden hover:border-gray-700 transition-all duration-300" data-animate="fade-up" data-delay="0.3">
                    <button class="faq-question w-full text-left px-6 py-4 flex justify-between items-center text-white font-medium hover:bg-gray-800 transition-all duration-300 group">
                        <span class="group-hover:text-orange-500 transition-colors duration-300">What is your warranty policy?</span>
                        <i class="fas fa-chevron-down transition-all duration-500 group-hover:rotate-180 group-hover:text-orange-500"></i>
                    </button>
                    <div class="faq-answer px-6 py-4 border-t border-gray-800 text-gray-400 hidden overflow-hidden">
                        <div class="animate-slide-down">
                            All our machinery comes with a standard 2-year warranty covering manufacturing defects. Extended warranty options are available for purchase.
                        </div>
                    </div>
                </div>
                
                <!-- FAQ Item 4 -->
                <div class="bg-gray-900 border border-gray-800 rounded-lg overflow-hidden hover:border-gray-700 transition-all duration-300" data-animate="fade-up" data-delay="0.4">
                    <button class="faq-question w-full text-left px-6 py-4 flex justify-between items-center text-white font-medium hover:bg-gray-800 transition-all duration-300 group">
                        <span class="group-hover:text-orange-500 transition-colors duration-300">Do you provide installation and training?</span>
                        <i class="fas fa-chevron-down transition-all duration-500 group-hover:rotate-180 group-hover:text-orange-500"></i>
                    </button>
                    <div class="faq-answer px-6 py-4 border-t border-gray-800 text-gray-400 hidden overflow-hidden">
                        <div class="animate-slide-down">
                            Yes, we provide professional installation and comprehensive operator training for all our machinery. This is included with most of our premium packages.
                        </div>
                    </div>
                </div>
                
                <!-- FAQ Item 5 -->
                <div class="bg-gray-900 border border-gray-800 rounded-lg overflow-hidden hover:border-gray-700 transition-all duration-300" data-animate="fade-up" data-delay="0.5">
                    <button class="faq-question w-full text-left px-6 py-4 flex justify-between items-center text-white font-medium hover:bg-gray-800 transition-all duration-300 group">
                        <span class="group-hover:text-orange-500 transition-colors duration-300">Can you customize machinery to specific requirements?</span>
                        <i class="fas fa-chevron-down transition-all duration-500 group-hover:rotate-180 group-hover:text-orange-500"></i>
                    </button>
                    <div class="faq-answer px-6 py-4 border-t border-gray-800 text-gray-400 hidden overflow-hidden">
                        <div class="animate-slide-down">
                            Absolutely! We specialize in custom machinery solutions. Our engineering team can design and build equipment tailored to your specific production needs.
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="text-center mt-10" data-animate="fade-up" data-delay="0.6">
                <p class="text-gray-400">
                    Still have questions? 
                    <a href="tel:+919265609416" class="text-orange-600 hover:text-orange-500 transition-colors duration-300 font-bold hover:scale-105 inline-block transition-transform duration-300">
                        Call us at +91 92656 09416
                    </a>
                </p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-gradient-to-r from-gray-900 to-black">
    <div class="container mx-auto px-4 lg:px-8">
        <div class="max-w-4xl mx-auto text-center">
            <div class="bg-gray-900 border border-gray-800 rounded-2xl p-8 lg:p-12 hover:shadow-2xl hover:shadow-orange-600/10 transition-all duration-500" data-animate="scale-up">
                <h2 class="text-3xl lg:text-4xl font-bold text-white mb-6" data-animate="fade-up">Need Immediate Assistance?</h2>
                <p class="text-gray-400 mb-8 text-lg" data-animate="fade-up" data-delay="0.1">
                    Our technical support team is available 24/7 to help you with any machinery issues or urgent inquiries.
                </p>
                
                <div class="flex flex-col sm:flex-row gap-4 justify-center" data-animate="fade-up" data-delay="0.2">
                    <a href="tel:+919265609416" class="bg-gradient-to-r from-orange-600 to-orange-700 text-white font-bold py-4 px-8 rounded-lg hover:from-orange-700 hover:to-orange-800 transition-all duration-500 hover:shadow-lg hover:shadow-orange-600/20 hover:scale-105 active:scale-95">
                        <i class="fas fa-phone-alt mr-3 animate-pulse"></i>
                        Emergency Support: +91 92656 09416
                    </a>
                    <a href="mailto:vivaengineering@yahoo.com" class="bg-gray-800 border border-gray-700 text-white font-bold py-4 px-8 rounded-lg hover:bg-gray-700 hover:border-gray-600 transition-all duration-500 hover:scale-105 active:scale-95">
                        <i class="fas fa-envelope mr-3"></i>
                        Email Support
                    </a>
                </div>
                
                <div class="mt-8 pt-8 border-t border-gray-800" data-animate="fade-up" data-delay="0.3">
                    <div class="flex flex-wrap justify-center gap-6 text-gray-400">
                        <div class="flex items-center group" data-animate="fade-up" data-delay="0.4">
                            <div class="w-2 h-2 bg-green-500 rounded-full mr-2 animate-pulse group-hover:scale-150 transition-transform duration-300"></div>
                            <span class="group-hover:text-white transition-colors duration-300">24/7 Availability</span>
                        </div>
                        <div class="flex items-center group" data-animate="fade-up" data-delay="0.5">
                            <div class="w-2 h-2 bg-orange-500 rounded-full mr-2 animate-pulse group-hover:scale-150 transition-transform duration-300"></div>
                            <span class="group-hover:text-white transition-colors duration-300">Expert Technicians</span>
                        </div>
                        <div class="flex items-center group" data-animate="fade-up" data-delay="0.6">
                            <div class="w-2 h-2 bg-blue-500 rounded-full mr-2 animate-pulse group-hover:scale-150 transition-transform duration-300"></div>
                            <span class="group-hover:text-white transition-colors duration-300">Remote Diagnostics</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Success Modal -->
<div id="success-modal" class="fixed inset-0 bg-black/80 backdrop-blur-sm z-50 flex items-center justify-center p-4 hidden">
    <div class="bg-gray-900 border border-gray-800 rounded-2xl max-w-md w-full p-8 text-center">
        <div class="w-20 h-20 bg-gradient-to-br from-orange-600 to-orange-700 rounded-full flex items-center justify-center mx-auto mb-6">
            <i class="fas fa-check text-3xl text-white"></i>
        </div>
        
        <h3 class="text-2xl font-bold text-white mb-4">Message Sent Successfully!</h3>
        <p class="text-gray-400 mb-8">
            Thank you for contacting VIVA ENGINEERING. Our team will review your inquiry and get back to you within 24 hours.
        </p>
        
        <button id="close-success-modal" class="bg-gray-800 hover:bg-gray-700 text-white font-bold py-3 px-8 rounded-lg transition-all duration-300 hover:scale-105 active:scale-95">
            Close
        </button>
    </div>
</div>

<script>
// Initialize Lenis Smooth Scroll
const lenis = new Lenis({
    duration: 1.2,
    easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)), // Custom easing function
    smoothWheel: true,
    smoothTouch: false,
    wheelMultiplier: 1,
    touchMultiplier: 2,
    infinite: false,
});

// Animation frame for Lenis
function raf(time) {
    lenis.raf(time);
    requestAnimationFrame(raf);
}
requestAnimationFrame(raf);

// Initialize GSAP with ScrollTrigger
gsap.registerPlugin(ScrollTrigger);

// GSAP Animations
document.addEventListener('DOMContentLoaded', function() {
    // Animate elements with data-animate attribute
    const animatedElements = gsap.utils.toArray('[data-animate]');
    
    animatedElements.forEach(element => {
        const animationType = element.getAttribute('data-animate');
        const delay = element.getAttribute('data-delay') || 0;
        
        // Set initial state based on animation type
        switch(animationType) {
            case 'fade-up':
                gsap.set(element, { y: 50, opacity: 0 });
                break;
            case 'fade-down':
                gsap.set(element, { y: -50, opacity: 0 });
                break;
            case 'fade-left':
                gsap.set(element, { x: 50, opacity: 0 });
                break;
            case 'fade-right':
                gsap.set(element, { x: -50, opacity: 0 });
                break;
            case 'scale-up':
                gsap.set(element, { scale: 0.9, opacity: 0 });
                break;
        }
        
        // Create ScrollTrigger animation
        ScrollTrigger.create({
            trigger: element,
            start: 'top 80%',
            onEnter: () => {
                gsap.to(element, {
                    duration: 1,
                    y: 0,
                    x: 0,
                    scale: 1,
                    opacity: 1,
                    delay: parseFloat(delay) * 0.2,
                    ease: 'power3.out',
                    overwrite: 'auto'
                });
            }
        });
    });
    
    // Stagger animation for form inputs
    const formInputs = gsap.utils.toArray('#contact-form [data-animate]');
    gsap.from(formInputs, {
        duration: 0.8,
        y: 20,
        opacity: 0,
        stagger: 0.1,
        ease: 'power3.out',
        scrollTrigger: {
            trigger: '#contact-form',
            start: 'top 70%',
            toggleActions: 'play none none none'
        }
    });
    
    // Parallax effect for background elements
    const backgroundElements = document.querySelectorAll('.absolute.inset-0.opacity-10 > div');
    backgroundElements.forEach((el, index) => {
        gsap.to(el, {
            y: index % 2 === 0 ? 30 : -30,
            scrollTrigger: {
                trigger: '.relative.py-20',
                start: 'top top',
                end: 'bottom top',
                scrub: true
            }
        });
    });
    
    // Animate FAQ items on click
    document.querySelectorAll('.faq-question').forEach(question => {
        question.addEventListener('click', () => {
            const answer = question.nextElementSibling;
            const icon = question.querySelector('i');
            
            // Close other FAQs
            document.querySelectorAll('.faq-question').forEach(otherQuestion => {
                if (otherQuestion !== question) {
                    const otherAnswer = otherQuestion.nextElementSibling;
                    const otherIcon = otherQuestion.querySelector('i');
                    
                    if (!otherAnswer.classList.contains('hidden')) {
                        gsap.to(otherAnswer, {
                            height: 0,
                            opacity: 0,
                            duration: 0.3,
                            onComplete: () => {
                                otherAnswer.classList.add('hidden');
                                gsap.to(otherIcon, { rotation: 0, duration: 0.3 });
                            }
                        });
                    }
                }
            });
            
            // Toggle current FAQ
            if (answer.classList.contains('hidden')) {
                answer.classList.remove('hidden');
                gsap.fromTo(answer,
                    { height: 0, opacity: 0 },
                    { height: 'auto', opacity: 1, duration: 0.5, ease: 'power2.out' }
                );
                gsap.to(icon, { rotation: 180, duration: 0.3 });
            } else {
                gsap.to(answer, {
                    height: 0,
                    opacity: 0,
                    duration: 0.3,
                    onComplete: () => {
                        answer.classList.add('hidden');
                        gsap.to(icon, { rotation: 0, duration: 0.3 });
                    }
                });
            }
        });
    });
    
    // Animate success modal
    const successModal = document.getElementById('success-modal');
    const closeSuccessModal = document.getElementById('close-success-modal');
    
    if (closeSuccessModal) {
        closeSuccessModal.addEventListener('click', function() {
            gsap.to(successModal, {
                opacity: 0,
                scale: 0.9,
                duration: 0.3,
                onComplete: () => {
                    successModal.classList.add('hidden');
                    gsap.set(successModal, { opacity: 1, scale: 1 });
                }
            });
        });
        
        successModal.addEventListener('click', function(e) {
            if (e.target === this) {
                gsap.to(successModal, {
                    opacity: 0,
                    scale: 0.9,
                    duration: 0.3,
                    onComplete: () => {
                        successModal.classList.add('hidden');
                        gsap.set(successModal, { opacity: 1, scale: 1 });
                    }
                });
            }
        });
    }
    
    // Form submission animation
    const contactForm = document.getElementById('contact-form');
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Basic validation
            const requiredFields = this.querySelectorAll('[required]');
            let isValid = true;
            
            requiredFields.forEach(field => {
                if (!field.value.trim()) {
                    isValid = false;
                    
                    // Shake animation for invalid fields
                    gsap.to(field, {
                        x: [-10, 10, -10, 10, 0],
                        duration: 0.5,
                        ease: 'power1.out'
                    });
                    
                    // Add red border
                    field.classList.add('border-red-500');
                    
                    // Remove red border after 3 seconds
                    setTimeout(() => {
                        field.classList.remove('border-red-500');
                    }, 3000);
                }
            });
            
            if (!isValid) return;
            
            // Show loading animation
            const submitButton = this.querySelector('button[type="submit"]');
            const originalText = submitButton.innerHTML;
            submitButton.innerHTML = '<i class="fas fa-spinner fa-spin mr-3"></i>Sending...';
            submitButton.disabled = true;
            
            // Animate form opacity
            gsap.to(this, {
                opacity: 0.5,
                duration: 0.3
            });
            
            // Simulate form submission
            setTimeout(() => {
                // Reset form
                gsap.to(this, {
                    opacity: 1,
                    duration: 0.3,
                    onComplete: () => {
                        this.reset();
                        submitButton.innerHTML = originalText;
                        submitButton.disabled = false;
                        
                        // Show success modal with animation
                        successModal.classList.remove('hidden');
                        gsap.fromTo(successModal,
                            { opacity: 0, scale: 0.9 },
                            { opacity: 1, scale: 1, duration: 0.5, ease: 'back.out(1.7)' }
                        );
                        
                        // Animate modal content
                        gsap.fromTo(successModal.querySelector('.bg-gray-900'),
                            { y: 50, opacity: 0 },
                            { y: 0, opacity: 1, duration: 0.5, delay: 0.2 }
                        );
                    }
                });
            }, 2000);
        });
    }
    
    // Auto-fill product interest from URL parameter
    const urlParams = new URLSearchParams(window.location.search);
    const product = urlParams.get('product');
    
    if (product) {
        const productSelect = document.getElementById('product');
        if (productSelect) {
            productSelect.value = product;
            
            // Highlight animation
            gsap.fromTo(productSelect,
                { boxShadow: '0 0 0 0 rgba(234, 88, 12, 0)' },
                { 
                    boxShadow: '0 0 0 10px rgba(234, 88, 12, 0.3)',
                    duration: 0.5,
                    repeat: 2,
                    yoyo: true
                }
            );
        }
    }
    
    // Add hover animations for interactive elements
    const interactiveElements = gsap.utils.toArray('.group-hover\\:scale-110, .hover\\:scale-105');
    interactiveElements.forEach(element => {
        element.addEventListener('mouseenter', () => {
            gsap.to(element, {
                scale: element.classList.contains('group-hover:scale-110') ? 1.1 : 1.05,
                duration: 0.3,
                ease: 'power2.out'
            });
        });
        
        element.addEventListener('mouseleave', () => {
            gsap.to(element, {
                scale: 1,
                duration: 0.3,
                ease: 'power2.out'
            });
        });
    });
});

// Add CSS for basic animations and smooth transitions
const style = document.createElement('style');
style.textContent = `
/* Smooth scrolling */
html.lenis {
    height: auto;
}

.lenis.lenis-smooth {
    scroll-behavior: auto;
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

/* Animation Classes */
.animate-slide-down {
    animation: slideDown 0.5s ease-out;
}

.animate-pulse {
    animation: pulse 2s ease-in-out infinite;
}

.animate-pulse-slow {
    animation: pulse 4s ease-in-out infinite;
}

/* Keyframe Animations */
@keyframes slideDown {
    from {
        opacity: 0;
        transform: translateY(-10px);
        max-height: 0;
    }
    to {
        opacity: 1;
        transform: translateY(0);
        max-height: 500px;
    }
}

@keyframes pulse {
    0%, 100% {
        opacity: 1;
    }
    50% {
        opacity: 0.5;
    }
}

/* FAQ Animation */
.faq-answer {
    max-height: 10;
    opacity: 0;
    overflow: hidden;
    transition: max-height 0.3s ease-out, opacity 0.3s ease-out;
}

/* Smooth transitions */
* {
    transition: background-color 0.3s ease, border-color 0.3s ease, color 0.3s ease;
}

/* Loading spinner */
.fa-spinner {
    animation: spin 1s linear infinite;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}
`;
document.head.appendChild(style);
</script>

<?php include 'includes/footer.php'; ?>