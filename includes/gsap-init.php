<?php
// includes/gsap-init.php
?>
<!-- GSAP Libraries -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollToPlugin.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/TextPlugin.min.js"></script>

<!-- GSAP Initialization -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Register GSAP plugins
    gsap.registerPlugin(ScrollTrigger, ScrollToPlugin, TextPlugin);
    
    // Global animations configuration
    gsap.config({
        nullTargetWarn: false,
    });
    
    // Create global animation timeline
    window.masterTL = gsap.timeline({ paused: false });
});
</script>