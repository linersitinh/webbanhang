<?php include 'app/views/shares/header.php'; ?>
<!-- Main Content -->
<section class="w-full max-w-6xl mx-auto px-4 md:px-margin-desktop py-12 pb-32">
    <a href="/webbanhang/Product" class="inline-flex items-center gap-2 font-label-md text-label-md text-tertiary hover:text-tertiary/80 mb-8 transition-colors">
        <span class="material-symbols-outlined" style="font-size: 20px;">arrow_back</span>
        Quay Lại
    </a>
    
    <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
        <!-- Image Section -->
        <div class="flex items-start justify-center">
            <?php if ($product->image): ?>
                <img src="/webbanhang/<?php echo htmlspecialchars($product->image); ?>" alt="<?php echo htmlspecialchars($product->name); ?>" class="w-full rounded-lg shadow-lg object-cover max-h-96">
            <?php else: ?>
                <div class="w-full h-96 bg-gradient-to-br from-surface-container-low to-surface-container-high rounded-lg flex items-center justify-center">
                    <span class="material-symbols-outlined text-outline-variant text-7xl" style="font-variation-settings: 'FILL' 0;">restaurant</span>
                </div>
            <?php endif; ?>
        </div>
        
        <!-- Info Section -->
        <div class="flex flex-col gap-6">
            <div>
                <p class="font-label-md text-label-md text-on-surface-variant mb-2 uppercase tracking-wider"><?php echo htmlspecialchars($product->category_name); ?></p>
                <h1 class="font-display-lg-mobile md:font-headline-md text-display-lg-mobile md:text-headline-md text-on-surface mb-2"><?php echo htmlspecialchars($product->name); ?></h1>
            </div>
            
            <div class="pt-4 border-t-2 border-outline-variant/20">
                <h2 class="font-display-lg text-display-lg text-tertiary"><?php echo number_format($product->price, 0); ?> đ</h2>
            </div>
            
            <div class="bg-surface-container-low p-6 rounded-lg">
                <h3 class="font-headline-sm text-headline-sm text-on-surface mb-3">Mô Tả</h3>
                <p class="font-body-md text-body-md text-on-surface-variant leading-relaxed"><?php echo nl2br(htmlspecialchars($product->description)); ?></p>
            </div>
            
            <div class="flex gap-4 pt-6">
                <a href="/webbanhang/Product/addToCart/<?php echo $product->id; ?>" class="flex-1 flex items-center justify-center gap-2 bg-tertiary text-on-tertiary px-8 py-4 rounded font-label-md text-label-md uppercase hover:bg-tertiary/90 transition-colors">
                    <span class="material-symbols-outlined" style="font-size: 24px;">add_shopping_cart</span>
                    Thêm Vào Giỏ
                </a>
                <a href="/webbanhang/Product/edit/<?php echo $product->id; ?>" class="flex-1 flex items-center justify-center gap-2 bg-surface-container-high text-on-surface px-8 py-4 rounded font-label-md text-label-md uppercase hover:bg-surface-container-highest transition-colors">
                    <span class="material-symbols-outlined" style="font-size: 24px;">edit</span>
                    Sửa
                </a>
            </div>
        </div>
    </div>
</section>

<?php include 'app/views/shares/footer.php'; ?>