<?php include 'app/views/shares/header.php'; ?>

<div class="max-w-xl mx-auto text-center border border-outline-variant/30 rounded-2xl p-8 md:p-12 bg-surface shadow-sm my-6">
    <div class="w-16 h-16 bg-emerald-50 text-emerald-600 rounded-full flex items-center justify-center mx-auto mb-6 border border-emerald-100">
        <span class="material-symbols-outlined text-3xl font-bold">done</span>
    </div>
    <h1 class="font-headline-md text-3xl text-emerald-700 mb-3">Đặt Món Thành Công</h1>
    <p class="text-on-surface-variant text-sm mb-4 leading-relaxed">
        Hệ thống bếp L'Etoile đã tiếp nhận yêu cầu từ quý khách. Đơn hàng của bạn mang số ký hiệu định danh:
    </p>
    <div class="inline-block bg-surface-container-high text-tertiary px-4 py-2 rounded-xl font-headline-sm text-xl font-bold mb-6">
        #ORD-<?php echo htmlspecialchars($order_id); ?>
    </div>
    <div class="border-t border-outline-variant/20 pt-6 flex gap-4 justify-center">
        <a href="/webbanhang/Product" class="bg-tertiary text-on-tertiary px-6 py-2.5 rounded-xl text-sm font-medium hover:bg-tertiary/90 transition-colors">Xem Thực Đơn</a>
        <a href="/webbanhang/Product/orderHistory" class="border border-outline-variant text-on-surface-variant px-6 py-2.5 rounded-xl text-sm font-medium hover:bg-surface-container-low transition-colors">Xem Lịch Sử</a>
    </div>
</div>

<?php include 'app/views/shares/footer.php'; ?>