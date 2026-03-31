<?php
$is_modal = isset($_GET['modal']) && $_GET['modal'] == 'true';
$mode = $_GET['mode'] ?? 'single'; // single or multiple

if (!$is_modal) {
    $page_title = 'Media Library';
    require_once 'includes/header.php';
} else {
    require_once 'includes/db.php';
    require_once 'includes/functions.php';
}
?>

<div class="space-y-6 <?php echo $is_modal ? 'p-6 bg-gray-900 rounded-xl max-h-[85vh] flex flex-col' : ''; ?>" id="viva-media-library-container">
    
    <!-- Header Area -->
    <div class="flex items-center justify-between shrink-0">
        <div>
            <h2 class="<?php echo $is_modal ? 'text-xl' : 'text-2xl'; ?> font-heading font-bold">Media <span class="text-orange-600">Library</span></h2>
            <?php if(!$is_modal): ?>
                <p class="text-sm text-gray-400">Manage all your uploaded images and assets in one place.</p>
            <?php else: ?>
                <p class="text-xs text-gray-400">Select <?php echo $mode; ?> image(s). Use Ctrl/Cmd to select multiple if enabled.</p>
            <?php endif; ?>
        </div>
        <div class="flex items-center space-x-3">
            <input type="text" id="media-search" placeholder="Search images..." class="bg-gray-800 border-gray-700 rounded-lg text-sm px-4 py-2 text-white focus:border-orange-500 hidden sm:block">
            
            <button onclick="document.getElementById('media-file-input').click()" class="bg-orange-600 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded-lg transition-all shadow-md active:scale-95 flex items-center text-sm">
                <i class="fas fa-upload mr-2"></i> Upload
            </button>
            <input type="file" id="media-file-input" multiple class="hidden" onchange="VIVAMedia.upload(this.files)">
            
            <?php if($is_modal): ?>
            <button onclick="VIVAMedia.confirmSelection()" id="media-confirm-btn" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-6 rounded-lg transition-all shadow-md active:scale-95 flex items-center text-sm opacity-50 cursor-not-allowed" disabled>
                <i class="fas fa-check mr-2"></i> Insert Selection
            </button>
            <?php endif; ?>
        </div>
    </div>

    <!-- Main Workspace -->
    <div class="flex flex-col lg:flex-row gap-6 <?php echo $is_modal ? 'overflow-hidden flex-1' : ''; ?>">
        
        <!-- Grid Area -->
        <div class="flex-1 card p-4 border-gray-800/50 shadow-xl flex flex-col <?php echo $is_modal ? 'overflow-y-auto' : 'min-h-[50vh]'; ?>">
            <div id="media-grid" class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4">
                <div class="col-span-full py-10 text-center text-gray-500">
                    <i class="fas fa-circle-notch fa-spin text-3xl mb-4 text-orange-600"></i>
                    <p class="font-medium">Loading library...</p>
                </div>
            </div>
            
            <!-- Pagination -->
            <div id="media-pagination" class="flex justify-center items-center space-x-2 mt-auto pt-6 border-t border-gray-800/50"></div>
        </div>
        
        <!-- Inspection Sidebar -->
        <div class="w-full lg:w-80 card p-5 border-gray-800/50 shrink-0 hidden lg:block" id="media-sidebar">
            <div class="text-center py-10 text-gray-500" id="media-sidebar-empty">
                <i class="fas fa-mouse-pointer text-2xl mb-3"></i>
                <p class="text-xs uppercase tracking-wider font-bold">Select an image</p>
            </div>
            
            <div id="media-sidebar-content" class="hidden space-y-4">
                <div class="w-full h-40 bg-gray-900 rounded-lg overflow-hidden border border-gray-800 flex items-center justify-center p-2">
                    <img id="sidebar-preview" src="" class="max-w-full max-h-full object-contain">
                </div>
                
                <div class="space-y-1 text-xs text-gray-400 border-b border-gray-800 pb-4">
                    <p><strong class="text-gray-300">File:</strong> <span id="sidebar-filename" class="break-all">...</span></p>
                    <p><strong class="text-gray-300">Type:</strong> <span id="sidebar-type">...</span></p>
                    <p><strong class="text-gray-300">Size:</strong> <span id="sidebar-size">...</span> kb</p>
                    <p><strong class="text-gray-300">ID:</strong> <span id="sidebar-id">...</span></p>
                </div>
                
                <div class="space-y-3 pt-2">
                    <div>
                        <label class="block text-xs font-bold text-gray-400 mb-1">Alt Text (SEO)</label>
                        <input type="text" id="sidebar-alt" class="w-full bg-gray-900 border border-gray-700 rounded-lg text-sm px-3 py-2 text-white focus:border-orange-500 transition-colors" onblur="VIVAMedia.saveMeta()">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-400 mb-1">Title</label>
                        <input type="text" id="sidebar-title" class="w-full bg-gray-900 border border-gray-700 rounded-lg text-sm px-3 py-2 text-white focus:border-orange-500 transition-colors" onblur="VIVAMedia.saveMeta()">
                    </div>
                </div>
                
                <div class="pt-4 flex justify-between items-center border-t border-gray-800">
                    <button onclick="VIVAMedia.deleteCurrent()" class="text-red-500 hover:text-red-400 text-sm font-bold transition-colors">
                        <i class="fas fa-trash mr-1"></i> Delete
                    </button>
                    <?php if(!$is_modal): ?>
                    <button onclick="VIVAMedia.copyPath()" class="text-blue-500 hover:text-blue-400 text-sm font-bold transition-colors">
                        <i class="fas fa-link mr-1"></i> Copy URL
                    </button>
                    <?php endif; ?>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
window.VIVAMedia = {
    page: 1,
    limit: 15,
    mode: '<?php echo $mode; ?>', // 'single' or 'multiple'
    isModal: <?php echo $is_modal ? 'true' : 'false'; ?>,
    items: [],
    selectedIds: [],
    searchQuery: '',

    init: function() {
        this.load();
        
        const searchInput = document.getElementById('media-search');
        if(searchInput) {
            let timeout = null;
            searchInput.addEventListener('input', (e) => {
                clearTimeout(timeout);
                this.searchQuery = e.target.value;
                timeout = setTimeout(() => this.load(1), 500);
            });
        }
    },

    load: function(page = 1) {
        this.page = page;
        const grid = document.getElementById('media-grid');
        const adminUrl = window.VIVA_ADMIN_URL || '/VIVA/admin';
        
        fetch(`${adminUrl}/api/media.php?action=fetch&page=${page}&limit=${this.limit}`)
            .then(res => res.json())
            .then(res => {
                if (res.success) {
                    this.items = res.data;
                    
                    // Client-side search for speed, or wait it's just basic text filter on loaded data for now
                    let displayItems = this.items;
                    if(this.searchQuery) {
                        const q = this.searchQuery.toLowerCase();
                        displayItems = this.items.filter(i => (i.file_name && i.file_name.toLowerCase().includes(q)) || (i.title && i.title.toLowerCase().includes(q)) || (i.alt_text && i.alt_text.toLowerCase().includes(q)));
                    }

                    if (displayItems.length === 0) {
                        grid.innerHTML = `
                            <div class="col-span-full py-20 text-center">
                                <i class="fas fa-images text-4xl text-gray-700 mb-4"></i>
                                <p class="text-gray-500 italic">No media found.</p>
                            </div>
                        `;
                    } else {
                        grid.innerHTML = displayItems.map(item => {
                            const isSelected = this.selectedIds.includes(item.id);
                            const path = `${adminUrl}/../${item.file_path}`;
                            return `
                                <div onclick="VIVAMedia.toggleSelect(${item.id})" class="media-item relative aspect-square rounded-lg border-2 overflow-hidden cursor-pointer transition-all ${isSelected ? 'border-orange-500 shadow-[0_0_15px_rgba(234,88,12,0.5)]' : 'border-gray-800 hover:border-gray-600'}">
                                    <img src="${path}" class="w-full h-full object-cover p-1">
                                    ${isSelected ? '<div class="absolute top-2 right-2 w-6 h-6 bg-orange-500 rounded-full flex items-center justify-center text-white text-xs shadow-md z-1"><i class="fas fa-check"></i></div>' : ''}
                                </div>
                            `;
                        }).join('');
                    }
                    this.renderPagination(res.pagination);
                }
            });
    },

    renderPagination: function(meta) {
        const container = document.getElementById('media-pagination');
        if (!meta || meta.pages <= 1) { container.innerHTML = ''; return; }
        
        let html = '';
        for (let i = 1; i <= meta.pages; i++) {
            html += `<button class="w-8 h-8 rounded-md text-xs font-bold transition-colors ${meta.page === i ? 'bg-orange-600 text-white' : 'bg-gray-800 text-gray-400 hover:bg-gray-700 hover:text-white'}" onclick="VIVAMedia.load(${i})">${i}</button>`;
        }
        container.innerHTML = html;
    },

    toggleSelect: function(id) {
        id = parseInt(id);
        const item = this.items.find(i => i.id === id);
        if(!item) return;

        if (this.mode === 'single') {
            this.selectedIds = [id];
        } else {
            const idx = this.selectedIds.indexOf(id);
            if (idx > -1) this.selectedIds.splice(idx, 1);
            else this.selectedIds.push(id);
        }

        this.load(this.page); // fast re-render grid states
        this.updateSidebar(item);
        this.updateConfirmButton();
    },

    updateSidebar: function(item) {
        document.getElementById('media-sidebar-empty').classList.add('hidden');
        document.getElementById('media-sidebar-content').classList.remove('hidden');
        
        const adminUrl = window.VIVA_ADMIN_URL || '/VIVA/admin';
        document.getElementById('sidebar-preview').src = `${adminUrl}/../${item.file_path}`;
        document.getElementById('sidebar-filename').innerText = item.file_name;
        document.getElementById('sidebar-type').innerText = item.file_type;
        document.getElementById('sidebar-size').innerText = Math.round((item.file_size || 0)/1024);
        document.getElementById('sidebar-id').innerText = item.id;
        document.getElementById('sidebar-alt').value = item.alt_text || '';
        document.getElementById('sidebar-title').value = item.title || '';
        
        // Store current inspecting item
        this.currentInspectingId = item.id;
    },

    updateConfirmButton: function() {
        const btn = document.getElementById('media-confirm-btn');
        if(btn) {
            if (this.selectedIds.length > 0) {
                btn.disabled = false;
                btn.classList.remove('opacity-50', 'cursor-not-allowed');
                btn.innerHTML = `<i class="fas fa-check mr-2"></i> Insert ${this.selectedIds.length} Item(s)`;
            } else {
                btn.disabled = true;
                btn.classList.add('opacity-50', 'cursor-not-allowed');
                btn.innerHTML = `<i class="fas fa-check mr-2"></i> Insert Selection`;
            }
        }
    },

    saveMeta: function() {
        if(!this.currentInspectingId) return;
        const alt = document.getElementById('sidebar-alt').value;
        const title = document.getElementById('sidebar-title').value;
        
        const fd = new FormData();
        fd.append('id', this.currentInspectingId);
        fd.append('alt_text', alt);
        fd.append('title', title);

        fetch((window.VIVA_ADMIN_URL || '/VIVA/admin') + '/api/media.php?action=update_meta', {
            method: 'POST', body: fd
        });

        // Update local object
        const item = this.items.find(i => i.id === this.currentInspectingId);
        if(item) { item.alt_text = alt; item.title = title; }
    },

    upload: function(files) {
        if(!files.length) return;
        
        // Pass contextual variables if opened from product editor
        const productName = window.VIVA_ACTIVE_PRODUCT_NAME || 'media';
        const keyword = window.VIVA_ACTIVE_PRODUCT_KEYWORD || 'asset';

        const fd = new FormData();
        for(let i=0; i<files.length; i++) fd.append('files[]', files[i]);
        fd.append('product_name', productName);
        fd.append('keyword', keyword);

        const btn = document.getElementById('media-file-input').previousElementSibling;
        const ogHtml = btn.innerHTML;
        btn.innerHTML = `<i class="fas fa-spinner fa-spin mr-2"></i> Uploading...`;
        btn.disabled = true;

        fetch((window.VIVA_ADMIN_URL || '/VIVA/admin') + '/api/media.php?action=upload', {
            method: 'POST', body: fd
        }).then(res => res.json()).then(res => {
            btn.innerHTML = ogHtml;
            btn.disabled = false;
            if(res.success) {
                // Auto-select newly uploaded items
                res.uploaded.forEach(u => {
                    if (this.mode === 'single') this.selectedIds = [u.id];
                    else this.selectedIds.push(u.id);
                });
                this.load(1);
            } else alert(res.message);
        }).catch(e => {
            btn.innerHTML = ogHtml; btn.disabled = false; alert("Upload failed");
        });
    },

    deleteCurrent: function() {
        if(!this.currentInspectingId) return;
        if(!confirm("Permanently delete this image?")) return;
        
        const fd = new FormData();
        fd.append('id', this.currentInspectingId);
        fetch((window.VIVA_ADMIN_URL || '/VIVA/admin') + '/api/media.php?action=delete', {
            method: 'POST', body: fd
        }).then(res => res.json()).then(res => {
            if(res.success) {
                // Remove from local arrays
                this.selectedIds = this.selectedIds.filter(id => id !== this.currentInspectingId);
                document.getElementById('media-sidebar-empty').classList.remove('hidden');
                document.getElementById('media-sidebar-content').classList.add('hidden');
                this.load(this.page);
            }
        });
    },

    copyPath: function() {
        const path = document.getElementById('sidebar-preview').src;
        navigator.clipboard.writeText(path).then(() => alert("Copied!"));
    },

    confirmSelection: function() {
        if(this.selectedIds.length === 0) return;
        
        // Map exact requested JSON format for selection output
        // { "id": 1, "path": "uploads/media/product/img1.jpg", "alt": "..." }
        const resultPayload = this.selectedIds.map(id => {
            const item = this.items.find(i => i.id === id);
            return {
                id: item.id,
                path: item.file_path,
                alt: item.alt_text || item.title || item.file_name
            };
        });

        // Trigger global callback if defined
        if (typeof window.onMediaModalConfirm === 'function') {
            window.onMediaModalConfirm(resultPayload);
        }
    }
};

// Initialize
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', () => VIVAMedia.init());
} else {
    VIVAMedia.init();
}
</script>

<?php 
if (!$is_modal) {
    require_once 'includes/footer.php'; 
}
?>
