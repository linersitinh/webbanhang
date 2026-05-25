<?php include 'app/views/shares/header.php'; ?>
<!-- Header Section -->
<section class="w-full max-w-4xl mx-auto px-4 md:px-margin-desktop py-12">
    <a href="/webbanhang/Category/list" class="inline-flex items-center gap-2 font-label-md text-label-md text-tertiary hover:text-tertiary/80 mb-6 transition-colors">
        <span class="material-symbols-outlined" style="font-size: 20px;">arrow_back</span>
        Quay Lại
    </a>
    <h1 class="font-display-lg-mobile text-display-lg-mobile text-on-surface">Thêm Danh Mục</h1>
</section>

<!-- Form Section -->
<section class="w-full max-w-4xl mx-auto px-4 md:px-margin-desktop pb-32">
    <div class="bg-surface border border-outline-variant/20 rounded-lg p-8">
        <form method="POST" action="/webbanhang/Category/save" class="space-y-6">
            <!-- Name Field -->
            <div>
                <label for="name" class="block font-label-md text-label-md text-on-surface mb-2">Tên Danh Mục *</label>
                <input type="text" id="name" name="name" class="w-full px-4 py-3 border border-outline-variant/30 rounded bg-surface focus:outline-none focus:border-tertiary transition-colors font-body-md text-body-md" placeholder="Nhập tên danh mục" required>
            </div>
            
            <!-- Description Field -->
            <div>
                <label for="description" class="block font-label-md text-label-md text-on-surface mb-2">Mô Tả</label>
                <textarea id="description" name="description" rows="4" class="w-full px-4 py-3 border border-outline-variant/30 rounded bg-surface focus:outline-none focus:border-tertiary transition-colors font-body-md text-body-md" placeholder="Nhập mô tả danh mục"></textarea>
            </div>
            
            <!-- Form Actions -->
            <div class="flex gap-4 pt-6 border-t border-outline-variant/20">
                <button type="submit" class="flex-1 bg-tertiary text-on-tertiary px-6 py-3 rounded font-label-md text-label-md uppercase hover:bg-tertiary/90 transition-colors flex items-center justify-center gap-2">
                    <span class="material-symbols-outlined" style="font-size: 20px;">save</span>
                    Lưu Lại
                </button>
                <a href="/webbanhang/Category/list" class="flex-1 bg-surface-container-high text-on-surface px-6 py-3 rounded font-label-md text-label-md uppercase hover:bg-surface-container-highest transition-colors flex items-center justify-center gap-2">
                    <span class="material-symbols-outlined" style="font-size: 20px;">close</span>
                    Hủy
                </a>
            </div>
        </form>
    </div>
</section>

<?php include 'app/views/shares/footer.php'; ?>