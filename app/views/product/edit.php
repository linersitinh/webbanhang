<?php include 'app/views/shares/header.php'; ?>
<!-- Header Section -->
<section class="w-full max-w-4xl mx-auto px-4 md:px-margin-desktop py-12">
    <a href="/webbanhang/Product" class="inline-flex items-center gap-2 font-label-md text-label-md text-tertiary hover:text-tertiary/80 mb-6 transition-colors">
        <span class="material-symbols-outlined" style="font-size: 20px;">arrow_back</span>
        Quay Lại
    </a>
    <h1 class="font-display-lg-mobile text-display-lg-mobile text-on-surface">Cập Nhật Món Ăn</h1>
</section>

<!-- Form Section -->
<section class="w-full max-w-4xl mx-auto px-4 md:px-margin-desktop pb-32">
    <div class="bg-surface border border-outline-variant/20 rounded-lg p-8">
        <form method="POST" action="/webbanhang/Product/update" enctype="multipart/form-data" class="space-y-6">
            <input type="hidden" name="id" value="<?php echo $product->id; ?>">
            <input type="hidden" name="existing_image" value="<?php echo $product->image; ?>">
            
            <!-- Name Field -->
            <div>
                <label for="name" class="block font-label-md text-label-md text-on-surface mb-2">Tên Món Ăn *</label>
                <input type="text" id="name" name="name" class="w-full px-4 py-3 border border-outline-variant/30 rounded bg-surface focus:outline-none focus:border-tertiary transition-colors font-body-md text-body-md" placeholder="Nhập tên món ăn" value="<?php echo htmlspecialchars($product->name); ?>" required>
            </div>
            
            <!-- Category Field -->
            <div>
                <label for="category_id" class="block font-label-md text-label-md text-on-surface mb-2">Danh Mục *</label>
                <select name="category_id" id="category_id" class="w-full px-4 py-3 border border-outline-variant/30 rounded bg-surface focus:outline-none focus:border-tertiary transition-colors font-body-md text-body-md" required>
                    <?php foreach ($categories as $cat): ?>
                        <option value="<?php echo $cat->id; ?>" <?php echo $cat->id == $product->category_id ? 'selected' : ''; ?>><?php echo htmlspecialchars($cat->name); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            
            <!-- Description Field -->
            <div>
                <label for="description" class="block font-label-md text-label-md text-on-surface mb-2">Mô Tả *</label>
                <textarea id="description" name="description" rows="5" class="w-full px-4 py-3 border border-outline-variant/30 rounded bg-surface focus:outline-none focus:border-tertiary transition-colors font-body-md text-body-md" required><?php echo htmlspecialchars($product->description); ?></textarea>
            </div>
            
            <!-- Price Field -->
            <div>
                <label for="price" class="block font-label-md text-label-md text-on-surface mb-2">Giá Tiền (VNĐ) *</label>
                <input type="number" id="price" name="price" step="1000" min="0" class="w-full px-4 py-3 border border-outline-variant/30 rounded bg-surface focus:outline-none focus:border-tertiary transition-colors font-body-md text-body-md" value="<?php echo htmlspecialchars($product->price); ?>" required>
            </div>
            
            <!-- Image Upload -->
            <div>
                <label for="image" class="block font-label-md text-label-md text-on-surface mb-2">Thay Đổi Ảnh (Bỏ trống nếu muốn giữ ảnh cũ)</label>
                <?php if ($product->image): ?>
                    <div class="mb-4 p-4 bg-surface-container-low rounded border border-outline-variant/20">
                        <p class="font-label-md text-label-md text-on-surface-variant mb-2">Ảnh Hiện Tại:</p>
                        <img src="/webbanhang/<?php echo htmlspecialchars($product->image); ?>" alt="Ảnh hiện tại" class="max-h-40 rounded">
                    </div>
                <?php endif; ?>
                <div class="relative border-2 border-dashed border-outline-variant/30 rounded-lg p-6 text-center hover:border-tertiary/50 transition-colors cursor-pointer">
                    <input type="file" id="image" name="image" accept="image/*" class="absolute inset-0 opacity-0 cursor-pointer">
                    <div class="flex flex-col items-center">
                        <span class="material-symbols-outlined text-outline-variant text-4xl mb-2" style="font-variation-settings: 'FILL' 0;">image</span>
                        <p class="font-body-md text-body-md text-on-surface-variant">Kéo thả hoặc nhấp để chọn ảnh</p>
                        <p class="font-label-md text-label-md text-on-surface-variant text-sm mt-1">Hỗ trợ các định dạng: JPG, PNG, GIF</p>
                    </div>
                </div>
            </div>
            
            <!-- Form Actions -->
            <div class="flex gap-4 pt-6 border-t border-outline-variant/20">
                <button type="submit" class="flex-1 bg-tertiary text-on-tertiary px-6 py-3 rounded font-label-md text-label-md uppercase hover:bg-tertiary/90 transition-colors flex items-center justify-center gap-2">
                    <span class="material-symbols-outlined" style="font-size: 20px;">save</span>
                    Cập Nhật
                </button>
                <a href="/webbanhang/Product" class="flex-1 bg-surface-container-high text-on-surface px-6 py-3 rounded font-label-md text-label-md uppercase hover:bg-surface-container-highest transition-colors flex items-center justify-center gap-2">
                    <span class="material-symbols-outlined" style="font-size: 20px;">close</span>
                    Hủy
                </a>
            </div>
        </form>
    </div>
</section>

<?php include 'app/views/shares/footer.php'; ?>