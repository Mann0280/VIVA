/**
 * VIVA ENGINEERING - Advanced Media Manager
 * Loads the central media library dynamically via AJAX.
 */

window.openMediaManager = function(options, callback) {
    // defaults
    const config = Object.assign({
        multiple: false,
        productName: 'media',
        keyword: 'viva'
    }, options);

    // Provide context for upload renaming
    window.VIVA_ACTIVE_PRODUCT_NAME = config.productName;
    window.VIVA_ACTIVE_PRODUCT_KEYWORD = config.keyword;

    // Create Modal Wrapper if it doesn't exist
    let modalWrapper = document.getElementById('viva-media-modal-wrapper');
    if (!modalWrapper) {
        modalWrapper = document.createElement('div');
        modalWrapper.id = 'viva-media-modal-wrapper';
        modalWrapper.className = 'fixed inset-0 z-[9999] bg-black/80 backdrop-blur-sm flex items-center justify-center p-4 hidden opacity-0 transition-opacity duration-300';
        
        modalWrapper.innerHTML = `
            <div class="relative w-full max-w-7xl h-[90vh] bg-gray-900 rounded-2xl shadow-2xl overflow-hidden border border-gray-800 flex flex-col scale-95 transition-transform duration-300" id="viva-media-modal-inner">
                <button onclick="closeMediaManager()" class="absolute top-4 right-4 z-50 w-10 h-10 bg-gray-800 hover:bg-red-600 hover:text-white rounded-full flex items-center justify-center text-gray-400 transition-colors shadow-lg">
                    <i class="fas fa-times text-lg"></i>
                </button>
                <div id="viva-media-modal-content" class="w-full h-full overflow-hidden flex flex-col">
                    <div class="flex-1 flex items-center justify-center text-gray-500">
                        <i class="fas fa-circle-notch fa-spin text-4xl text-orange-600 mb-4"></i>
                    </div>
                </div>
            </div>
        `;
        document.body.appendChild(modalWrapper);
    }

    // Show Modal
    modalWrapper.classList.remove('hidden');
    // small delay to allow display flex to apply before transforming opacity for animation
    setTimeout(() => {
        modalWrapper.classList.remove('opacity-0');
        document.getElementById('viva-media-modal-inner').classList.remove('scale-95');
    }, 10);

    // Define Global Callback for when the user clicks 'Insert Selection'
    window.onMediaModalConfirm = function(selectedItems) {
        closeMediaManager();
        if (typeof callback === 'function') {
            callback(selectedItems); // selectedItems is the exact JSON format array
        }
    };

    // Load actual UI via AJAX
    const modeStr = config.multiple ? 'multiple' : 'single';
    const adminUrl = window.VIVA_ADMIN_URL || '/VIVA/admin';
    
    fetch(`${adminUrl}/media-library.php?modal=true&mode=${modeStr}`)
        .then(res => res.text())
        .then(html => {
            const container = document.getElementById('viva-media-modal-content');
            container.innerHTML = html;
            
            // Execute scripts inside the injected HTML since innerHTML doesn't automatically run <script> tags
            const scripts = container.getElementsByTagName('script');
            for (let i = 0; i < scripts.length; i++) {
                const newScript = document.createElement('script');
                newScript.text = scripts[i].text;
                document.body.appendChild(newScript).parentNode.removeChild(newScript);
            }
        })
        .catch(err => {
            document.getElementById('viva-media-modal-content').innerHTML = `
                <div class="flex flex-col items-center justify-center h-full text-center text-red-500 p-8">
                    <i class="fas fa-exclamation-triangle text-5xl mb-4"></i>
                    <h2 class="text-2xl font-bold">Failed to load Media Library</h2>
                    <p class="text-gray-400 mt-2">${err.message}</p>
                </div>
            `;
        });
};

window.closeMediaManager = function() {
    const modalWrapper = document.getElementById('viva-media-modal-wrapper');
    if (modalWrapper) {
        modalWrapper.classList.add('opacity-0');
        document.getElementById('viva-media-modal-inner').classList.add('scale-95');
        setTimeout(() => {
            modalWrapper.classList.add('hidden');
            // clear content to save memory
            document.getElementById('viva-media-modal-content').innerHTML = '';
        }, 300);
    }
};
