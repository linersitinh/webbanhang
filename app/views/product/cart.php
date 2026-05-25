<?php include 'app/views/shares/header.php'; ?>

<h1 class="font-headline-md text-4xl text-tertiary mb-6">Bàn Đặt Món Của Bạn</h1>

<div id="cartContainer">
<?php if (!empty($cart)): ?>
    <form id="cartForm" method="POST" action="/webbanhang/Product/updateCart">
        <div class="border border-outline-variant/30 rounded-xl overflow-hidden bg-surface shadow-sm">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-surface-container-low border-b border-outline-variant/30 text-on-surface-variant font-label-md text-xs uppercase tracking-wider">
                        <th class="p-4 md:p-6">Món ăn</th>
                        <th class="p-4 md:p-6 text-center">Đơn giá</th>
                        <th class="p-4 md:p-6 text-center" style="width: 18%">Số lượng</th>
                        <th class="p-4 md:p-6 text-right">Tổng thành tiền</th>
                        <th class="p-4 md:p-6 text-center">Thao tác</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-outline-variant/20">
                    <?php $grand_total = 0; foreach ($cart as $id => $item): 
                        $subtotal = $item['price'] * $item['quantity']; $grand_total += $subtotal; ?>
                        <tr class="hover:bg-surface-container-low/30 transition-colors" id="row-<?php echo $id; ?>">
                            <td class="p-4 md:p-6">
                                <div class="flex items-center gap-4">
                                    <div class="w-16 h-16 rounded-lg overflow-hidden bg-surface-container flex items-center justify-center border border-outline-variant/20 flex-shrink-0">
                                        <?php if ($item['image']): ?>
                                            <img src="/webbanhang/<?php echo $item['image']; ?>" class="w-full h-full object-cover">
                                        <?php else: ?>
                                            <span class="material-symbols-outlined text-outline-variant">restaurant</span>
                                        <?php endif; ?>
                                    </div>
                                    <span class="font-medium text-on-surface block truncate"><?php echo htmlspecialchars($item['name']); ?></span>
                                </div>
                            </td>
                            <td class="p-4 md:p-6 text-center font-medium">
                                <span id="price-<?php echo $id; ?>"><?php echo number_format($item['price'], 0, ',', '.'); ?></span> đ
                            </td>
                            
                            <td class="p-4 md:p-6 text-center">
                                <div class="flex items-center justify-center border border-outline-variant/40 rounded-xl w-32 mx-auto overflow-hidden bg-surface-container-lowest">
                                    <button type="button" onclick="changeQtyBtn('<?php echo $id; ?>', -1)" class="px-3 py-2 text-on-surface-variant hover:bg-tertiary/10 hover:text-tertiary font-bold transition-colors select-none">-</button>
                                    
                                    <input type="number" id="input-<?php echo $id; ?>" name="quantities[<?php echo $id; ?>]" value="<?php echo $item['quantity']; ?>" min="1" oninput="validateAndSendAjax('<?php echo $id; ?>', this.value)" onkeypress="return isNumberKey(event)" class="w-12 text-center border-0 bg-transparent focus:ring-0 text-sm font-semibold p-0 [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none" required>
                                    
                                    <button type="button" onclick="changeQtyBtn('<?php echo $id; ?>', 1)" class="px-3 py-2 text-on-surface-variant hover:bg-tertiary/10 hover:text-tertiary font-bold transition-colors select-none">+</button>
                                </div>
                            </td>
                            
                            <td class="p-4 md:p-6 text-right font-headline-sm text-lg text-tertiary font-bold">
                                <span id="subtotal-<?php echo $id; ?>"><?php echo number_format($subtotal, 0, ',', '.'); ?></span> đ
                            </td>
                            <td class="p-4 md:p-6 text-center">
                                <a href="/webbanhang/Product/removeFromCart/<?php echo $id; ?>" class="text-rose-600 hover:text-rose-800 transition-colors">
                                    <span class="material-symbols-outlined text-xl">delete</span>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <tr class="bg-surface-container-low/40">
                        <td colspan="3" class="p-4 md:p-6 text-right font-semibold text-on-surface-variant">Tổng tiền đơn hàng:</td>
                        <td colspan="2" class="p-4 md:p-6 text-right font-headline-sm text-2xl text-tertiary font-black">
                            <span id="grandTotal"><?php echo number_format($grand_total, 0, ',', '.'); ?></span> VNĐ
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <div class="flex justify-end gap-4 mt-6">
            <a href="/webbanhang/Product" class="text-center border border-tertiary text-tertiary px-6 py-2.5 rounded-xl text-sm font-medium hover:bg-tertiary/5 transition-colors">Chọn Thêm Món</a>
            <a href="/webbanhang/Product/checkout" class="text-center bg-tertiary text-on-tertiary px-8 py-2.5 rounded-xl text-sm font-medium hover:bg-tertiary/90 transition-all shadow-md shadow-tertiary/10">Tiến Hành Thanh Toán</a>
        </div>
    </form>
<?php else: ?>
    <div class="border border-dashed border-outline-variant/50 rounded-2xl p-12 text-center max-w-xl mx-auto my-8 bg-surface-container-lowest shadow-sm">
        <span class="material-symbols-outlined text-6xl text-outline-variant mb-4">production_quantity_limits</span>
        <h3 class="font-headline-sm text-xl text-on-surface mb-2">Bàn ăn hiện đang trống</h3>
        <p class="text-on-surface-variant text-sm mb-6">Quý khách vui lòng ghé thăm trang thực đơn để lựa chọn những món ăn hảo hạng.</p>
        <a href="/webbanhang/Product" class="inline-block bg-tertiary text-on-tertiary px-6 py-3 rounded-xl text-sm font-medium hover:bg-tertiary/90 transition-colors">Xem Thực Đơn Ngay</a>
    </div>
<?php endif; ?>
</div>

<script>
// Chỉ cho phép gõ phím số
function isNumberKey(evt) {
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) return false;
    return true;
}

function changeQtyBtn(productId, change) {
    const input = document.getElementById('input-' + productId);
    let newQty = parseInt(input.value) + change;
    
    if (newQty < 1) return; // Chặn cứng nút trừ không cho xuống <= 0
    
    input.value = newQty;
    sendQtyAjax(productId, newQty);
}

// Hàm lắng nghe khi khách tự gõ số từ bàn phím
function validateAndSendAjax(productId, qtyValue) {
    let newQty = parseInt(qtyValue);
    
    // Nếu gõ số <= 0 hoặc xóa trống thì ép hiển thị về 1 ngay lập tức để không bị âm tiền
    if (isNaN(newQty) || newQty <= 0) {
        newQty = 1;
    }
    sendQtyAjax(productId, newQty);
}

function sendQtyAjax(productId, newQty) {
    let formData = new FormData();
    formData.append('quantities[' + productId + ']', newQty);
    
    fetch('/webbanhang/Product/updateCart', {
        method: 'POST',
        body: formData
    })
    .then(response => {
        if (response.ok) {
            const priceText = document.getElementById('price-' + productId).innerText.replace(/\./g, '');
            const price = parseFloat(priceText);
            
            // Đẩy giá trị mới ra màn hình tính tiền tức thì
            const newSubtotal = price * newQty;
            document.getElementById('subtotal-' + productId).innerText = newSubtotal.toLocaleString('vi-VN');
            
            updateGrandTotal();
        }
    })
    .catch(error => console.error('Error:', error));
}

function updateGrandTotal() {
    let grandTotal = 0;
    <?php if(!empty($cart)): ?>
        <?php foreach($cart as $id => $item): ?>
            if(document.getElementById('subtotal-<?php echo $id; ?>')) {
                const subText = document.getElementById('subtotal-<?php echo $id; ?>').innerText.replace(/\./g, '');
                grandTotal += parseFloat(subText);
            }
        <?php endforeach; ?>
    <?php endif; ?>
    document.getElementById('grandTotal').innerText = grandTotal.toLocaleString('vi-VN');
}
</script>

<?php include 'app/views/shares/footer.php'; ?>