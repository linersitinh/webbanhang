<?php include 'app/views/shares/header.php'; ?>
<!-- Header Section -->
<section class="w-full max-w-4xl mx-auto px-4 md:px-margin-desktop py-20 text-center">
    <span class="material-symbols-outlined text-outline text-4xl mb-4 block" style="font-variation-settings: 'FILL' 0;">category</span>
    <h1 class="font-display-lg-mobile md:font-display-lg text-display-lg-mobile md:text-display-lg text-on-surface mb-4">Danh Mục Sản Phẩm</h1>
    <p class="font-body-lg text-body-lg text-on-surface-variant">Quản lý các danh mục sản phẩm của nhà hàng</p>
</section>

<!-- Main Content -->
<section class="w-full max-w-6xl mx-auto px-4 md:px-margin-desktop pb-32">
    <div class="flex justify-between items-center mb-8">
        <div class="flex items-center justify-center flex-1">
            <div class="h-px w-12 bg-outline-variant/50"></div>
            <h2 class="font-headline-md text-headline-md text-tertiary mx-6">Danh Mục</h2>
            <div class="h-px w-12 bg-outline-variant/50"></div>
        </div>
        <a href="/webbanhang/Category/add" class="bg-tertiary text-on-tertiary px-6 py-2 rounded font-label-md text-label-md uppercase hover:bg-tertiary/90 transition-colors ml-4">Thêm Danh Mục</a>
    </div>
    
    <div class="bg-surface border border-outline-variant/20 rounded-lg overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="bg-surface-container-high border-b border-outline-variant/20">
                        <th class="px-6 py-4 text-left font-headline-sm text-headline-sm text-on-surface">ID</th>
                        <th class="px-6 py-4 text-left font-headline-sm text-headline-sm text-on-surface">Tên Danh Mục</th>
                        <th class="px-6 py-4 text-left font-headline-sm text-headline-sm text-on-surface">Mô Tả</th>
                        <th class="px-6 py-4 text-center font-headline-sm text-headline-sm text-on-surface">Thao Tác</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-outline-variant/20">
                    <?php if (empty($categories)): ?>
                        <tr>
                            <td colspan="4" class="px-6 py-12 text-center">
                                <span class="material-symbols-outlined text-outline-variant text-5xl mb-4 block" style="font-variation-settings: 'FILL' 0;">inbox</span>
                                <p class="font-body-md text-body-md text-on-surface-variant">Chưa có danh mục nào</p>
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($categories as $cat): ?>
                            <tr class="hover:bg-surface-container-low transition-colors">
                                <td class="px-6 py-4 font-body-md text-body-md text-on-surface"><?php echo $cat->id; ?></td>
                                <td class="px-6 py-4 font-headline-sm text-headline-sm text-on-surface"><?php echo htmlspecialchars($cat->name); ?></td>
                                <td class="px-6 py-4 font-body-md text-body-md text-on-surface-variant max-w-xs truncate"><?php echo htmlspecialchars($cat->description); ?></td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex gap-2 justify-center">
                                        <a href="/webbanhang/Category/edit/<?php echo $cat->id; ?>" class="inline-flex items-center gap-1 bg-surface-container-high text-on-surface px-3 py-2 rounded font-label-md text-label-md hover:bg-surface-container-highest transition-colors text-sm">
                                            <span class="material-symbols-outlined" style="font-size: 16px;">edit</span>
                                            Sửa
                                        </a>
                                        <a href="/webbanhang/Category/delete/<?php echo $cat->id; ?>" class="inline-flex items-center gap-1 bg-error/10 text-error px-3 py-2 rounded font-label-md text-label-md hover:bg-error/20 transition-colors text-sm" onclick="return confirm('Bạn có chắc muốn xóa danh mục này?');">
                                            <span class="material-symbols-outlined" style="font-size: 16px;">delete</span>
                                            Xóa
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<?php include 'app/views/shares/footer.php'; ?>