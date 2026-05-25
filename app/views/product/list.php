<?php include 'app/views/shares/header.php'; ?>

<div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-8">
    <div>
        <h1 class="font-headline-md text-4xl text-tertiary mb-1">Thực Đơn Tinh Hoa</h1>
        <p class="text-on-surface-variant text-sm">Hương vị ẩm thực Châu Âu cổ điển giữa lòng thành phố</p>
    </div>
    <a href="/webbanhang/Product/add" class="border border-tertiary text-tertiary px-5 py-2.5 rounded-lg font-label-md text-xs uppercase tracking-wider hover:bg-tertiary hover:text-white transition-all duration-300">
        + Thêm Món Mới
    </a>
</div>

<div class="mb-10 flex flex-col md:flex-row gap-4 justify-between items-center bg-surface-container-low/50 p-4 rounded-2xl border border-outline-variant/20">
    <div class="flex flex-wrap gap-2 w-full md:w-auto">
        <button onclick="filterCategory('all')" class="cate-btn active bg-tertiary text-on-tertiary px-4 py-2 rounded-xl text-xs font-semibold uppercase tracking-wider transition-all">Tất cả</button>
        <?php 
            // Khởi tạo nhanh kết nối để lấy danh mục cho bộ lọc ngoài trang chủ
            $db = (new Database())->getConnection();
            $categories = (new CategoryModel($db))->getCategories();
            foreach ($categories as $cat): 
        ?>
            <button onclick="filterCategory('<?php echo htmlspecialchars($cat->name); ?>')" class="cate-btn bg-surface border border-outline-variant/30 text-on-surface-variant px-4 py-2 rounded-xl text-xs font-semibold uppercase tracking-wider hover:border-tertiary hover:text-tertiary transition-all">
                <?php echo htmlspecialchars($cat->name); ?>
            </button>
        <?php endforeach; ?>
    </div>
    
    <div class="relative w-full md:w-72">
        <span class="material-symbols-outlined absolute left-3 top-2.5 text-outline-variant text-xl">search</span>
        <input type="text" id="searchInput" onkeyup="searchMenu()" class="w-full pl-10 pr-4 py-2 rounded-xl border-outline-variant/40 focus:border-tertiary focus:ring-tertiary bg-surface text-sm" placeholder="Tìm kiếm món ăn...">
    </div>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" id="menuGrid">
    <?php foreach ($products as $product): ?>
        <div class="product-card bg-surface border border-outline-variant/30 rounded-xl overflow-hidden shadow-sm hover:shadow-md transition-all duration-300 flex flex-col group" data-category="<?php echo htmlspecialchars($product->category_name); ?>" data-name="<?php echo htmlspecialchars(mb_strtolower($product->name, 'UTF-8')); ?>">
            <div class="overflow-hidden relative h-56 bg-surface-container flex items-center justify-center">
                <?php if ($product->image): ?>
                    <img src="/webbanhang/<?php echo $product->image; ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                <?php else: ?>
                    <span class="material-symbols-outlined text-outline-variant text-5xl">restaurant</span>
                <?php endif; ?>
            </div>
            
            <div class="p-6 flex-1 flex flex-col justify-between">
                <div>
                    <h5 class="font-headline-sm text-xl text-on-surface group-hover:text-tertiary transition-colors line-clamp-1 mb-2"><?php echo htmlspecialchars($product->name); ?></h5>
                    <span class="inline-block bg-tertiary-container text-on-tertiary-container text-xs px-2.5 py-1 rounded-full font-medium mb-3">
                        <?php echo htmlspecialchars($product->category_name); ?>
                    </span>
                    <p class="text-on-surface-variant text-sm line-clamp-2 mb-4 h-10"><?php echo htmlspecialchars($product->description); ?></p>
                </div>
                
                <div class="pt-4 border-t border-outline-variant/20 flex items-center justify-between gap-4">
                    <span class="font-headline-sm text-xl text-tertiary font-bold">
                        <?php echo number_format($product->price, 0, ',', '.'); ?> VNĐ
                    </span>
                    <a href="/webbanhang/Product/addToCart/<?php echo $product->id; ?>" class="flex items-center gap-1.5 bg-tertiary text-on-tertiary px-4 py-2 rounded-lg font-label-md text-xs uppercase tracking-wider hover:bg-tertiary/90 transition-colors shadow-sm">
                        <span class="material-symbols-outlined text-sm">add_shopping_cart</span> Đặt món
                    </a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<script>
function filterCategory(cateName) {
    // Đổi màu nút đang chọn
    const buttons = document.querySelectorAll('.cate-btn');
    buttons.forEach(btn => {
        btn.classList.remove('bg-tertiary', 'text-on-tertiary');
        btn.classList.add('bg-surface', 'text-on-surface-variant', 'border');
    });
    event.target.classList.remove('bg-surface', 'text-on-surface-variant', 'border');
    event.target.classList.add('bg-tertiary', 'text-on-tertiary');

    // Ẩn/Hiện thẻ món ăn
    const cards = document.querySelectorAll('.product-card');
    cards.forEach(card => {
        if(cateName === 'all' || card.getAttribute('data-category') === cateName) {
            card.style.display = 'flex';
        } else {
            card.style.display = 'none';
        }
    });
}

function searchMenu() {
    const keyword = document.getElementById('searchInput').value.toLowerCase().trim();
    const cards = document.querySelectorAll('.product-card');
    cards.forEach(card => {
        const name = card.getAttribute('data-name');
        if(name.includes(keyword)) {
            card.style.display = 'flex';
        } else {
            card.style.display = 'none';
        }
    });
}
</script>

<?php include 'app/views/shares/footer.php'; ?>