<?php include 'app/views/shares/header.php'; ?>

<div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
    <div class="lg:col-span-7">
        <div class="bg-surface border border-outline-variant/30 rounded-2xl p-6 md:p-8 shadow-sm">
            <h2 class="font-headline-sm text-2xl text-tertiary mb-6 border-b border-outline-variant/20 pb-3">Thông Tin Giao Hàng & Đặt Bàn</h2>
            
            <form id="checkoutForm" method="POST" action="/webbanhang/Product/processCheckout" onsubmit="return validateFrontend()">
                <div class="space-y-5">
                    <div>
                        <label class="block text-sm font-medium text-on-surface mb-2">Họ tên quý khách <span class="text-rose-500">*</span></label>
                        <input type="text" id="customer_name" name="customer_name" class="w-full rounded-xl border-outline-variant/40 focus:border-tertiary focus:ring-tertiary bg-surface-container-lowest text-sm p-3" placeholder="Nhập tên người nhận món..." required>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-on-surface mb-2">Số điện thoại chính <span class="text-rose-500">*</span></label>
                            <input type="text" id="phone" name="phone" class="w-full rounded-xl border-outline-variant/40 focus:border-tertiary focus:ring-tertiary bg-surface-container-lowest text-sm p-3" placeholder="Ví dụ: 0912345678" required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-on-surface mb-2">Số điện thoại phụ (Tùy chọn)</label>
                            <input type="text" id="phone2" name="phone2" class="w-full rounded-xl border-outline-variant/40 focus:border-tertiary focus:ring-tertiary bg-surface-container-lowest text-sm p-3" placeholder="Ví dụ: 0988777666">
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-on-surface mb-2">Địa chỉ giao hàng / Số bàn <span class="text-rose-500">*</span></label>
                        <textarea id="address" name="address" rows="3" class="w-full rounded-xl border-outline-variant/40 focus:border-tertiary focus:ring-tertiary bg-surface-container-lowest text-sm p-3" placeholder="Nhập địa chỉ nhà cụ thể hoặc số bàn..." required></textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-on-surface mb-2">Ghi chú yêu cầu món ăn</label>
                        <textarea id="note" name="note" rows="3" class="w-full rounded-xl border-outline-variant/40 focus:border-tertiary focus:ring-tertiary bg-surface-container-lowest text-sm p-3" placeholder="Ví dụ: Bít tết làm chín vừa, không ăn cay, ít hành..."></textarea>
                    </div>
                </div>
                
                <button type="submit" class="w-full bg-tertiary text-on-tertiary py-3.5 px-4 rounded-xl font-medium tracking-wide text-sm hover:bg-tertiary/90 transition-all duration-300 shadow-lg shadow-tertiary/10 mt-8 uppercase">
                    Xác nhận đặt đơn thượng hạng
                </button>
            </form>
        </div>
    </div>

    <div class="lg:col-span-5">
        <div class="bg-surface-container-low border border-outline-variant/30 rounded-2xl p-6 shadow-sm">
            <h3 class="font-headline-sm text-xl text-on-surface mb-4">Tóm Tắt Đơn Đặt</h3>
            <div class="divide-y divide-outline-variant/20 max-h-80 overflow-y-auto pr-2">
                <?php $total = 0; foreach ($cart as $item): $total += $item['price'] * $item['quantity']; ?>
                    <div class="py-3 flex justify-between items-center gap-4">
                        <div>
                            <span class="font-medium text-sm text-on-surface block"><?php echo htmlspecialchars($item['name']); ?></span>
                            <span class="text-xs text-on-surface-variant">Số lượng: <?php echo $item['quantity']; ?> x <?php echo number_format($item['price'], 0, ',', '.'); ?>đ</span>
                        </div>
                        <span class="font-medium text-sm text-on-surface-variant flex-shrink-0"><?php echo number_format($item['price'] * $item['quantity'], 0, ',', '.'); ?>đ</span>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="border-t border-outline-variant/40 pt-4 mt-4 flex justify-between items-baseline">
                <span class="font-semibold text-on-surface-variant">Thành tiền toàn bộ:</span>
                <span class="font-headline-sm text-2xl text-tertiary font-black"><?php echo number_format($total, 0, ',', '.'); ?> VNĐ</span>
            </div>
        </div>
    </div>
</div>

<script>
function validateFrontend() {
    const name = document.getElementById('customer_name').value.trim();
    const phone = document.getElementById('phone').value.trim();
    const phone2 = document.getElementById('phone2').value.trim();
    const address = document.getElementById('address').value.trim();
    
    if(name === "" || phone === "" || address === "") {
        alert("⚠️ Vui lòng hoàn thành toàn bộ thông tin yêu cầu.");
        return false;
    }
    
    const phoneRegex = /^[0-9]{10,11}$/;
    if(!phoneRegex.test(phone)) {
        alert("❌ Số điện thoại chính không hợp lệ! Vui lòng điền dãy số gồm 10 hoặc 11 kí tự.");
        return false;
    }
    if(phone2 !== "" && !phoneRegex.test(phone2)) {
        alert("❌ Số điện thoại phụ không hợp lệ! Vui lòng kiểm tra lại.");
        return false;
    }
    return true;
}
</script>

<?php include 'app/views/shares/footer.php'; ?>