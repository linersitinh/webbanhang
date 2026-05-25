<?php include 'app/views/shares/header.php'; ?>

<h1 class="font-headline-md text-4xl text-tertiary mb-6">Nhật Ký Danh Sách Đơn Hàng Đã Đặt</h1>

<?php if (!empty($orders)): ?>
    <div class="space-y-6">
        <?php foreach ($orders as $order): ?>
            <div class="border border-outline-variant/30 rounded-2xl bg-surface shadow-sm overflow-hidden animate-fade-in">
                <details class="group" open>
                    <summary class="list-none p-5 md:p-6 cursor-pointer flex flex-col md:flex-row md:items-center justify-between gap-4 select-none bg-surface-container-low/20 hover:bg-surface-container-low/40 transition-colors">
                        <div class="space-y-2 w-full md:w-3/4">
                            <div class="flex items-center flex-wrap gap-3">
                                <span class="font-headline-sm text-xl text-tertiary font-bold">Mã đơn hàng: #ORD-<?php echo $order->id; ?></span>
                                <span class="text-xs text-on-surface bg-white border border-outline-variant/40 px-2.5 py-1 rounded-md font-medium">
                                    👤 Khách: <strong><?php echo htmlspecialchars($order->customer_name); ?></strong>
                                </span>
                            </div>
                            
                            <div class="text-sm text-on-surface-variant space-y-1.5">
                                <div class="flex items-center gap-2">
                                    <span class="material-symbols-outlined text-sm text-outline-variant">call</span>
                                    <span>Số điện thoại: <strong><?php echo htmlspecialchars($order->phone); ?></strong> 
                                    <?php if(!empty($order->phone2)): ?> | SĐT phụ: <strong><?php echo htmlspecialchars($order->phone2); ?></strong><?php endif; ?></span>
                                </div>
                                <div class="flex items-start gap-2">
                                    <span class="material-symbols-outlined text-sm text-outline-variant mt-0.5">location_on</span>
                                    <span>Địa chỉ nhận: <?php echo htmlspecialchars($order->address); ?></span>
                                </div>
                                <?php if(!empty($order->note)): ?>
                                    <div class="flex items-start gap-2 text-amber-800 bg-amber-50/60 p-2 rounded-lg border border-amber-100 max-w-2xl">
                                        <span class="material-symbols-outlined text-sm mt-0.5">assignment</span>
                                        <span>Ghi chú món ăn: <em><?php echo htmlspecialchars($order->note); ?></em></span>
                                    </div>
                                <?php endif; ?>
                                <div class="flex items-center gap-2 text-xs text-on-surface-variant/70 pt-1">
                                    <span class="material-symbols-outlined text-xs">calendar_today</span>
                                    <span>Ngày đặt hàng: <?php echo date('d/m/Y \l\ú\c H:i', strtotime($order->created_at)); ?></span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="flex flex-row md:flex-col items-center md:items-end justify-between md:justify-center gap-4 border-t md:border-t-0 border-outline-variant/20 pt-3 md:pt-0">
                            <div class="text-right">
                                <span class="block text-xs text-on-surface-variant uppercase tracking-wider font-medium mb-1">Tổng tiền thanh toán</span>
                                <span class="font-headline-sm text-2xl text-tertiary font-black"><?php echo number_format($order->total_amount, 0, ',', '.'); ?> đ</span>
                            </div>
                            <div class="flex gap-2">
                                <a href="/webbanhang/Product/cancelOrder/<?php echo $order->id; ?>" onclick="return confirm('Quý khách có chắc chắn muốn hủy bỏ đơn hàng này không?')" class="text-xs bg-rose-50 text-rose-600 border border-rose-200 px-3 py-2 rounded-xl hover:bg-rose-600 hover:text-white font-medium transition-all shadow-sm">Hủy đơn hàng</a>
                            </div>
                        </div>
                    </summary>
                    
                    <div class="px-5 md:px-6 pb-6 pt-2 border-t border-outline-variant/10">
                        <p class="text-xs font-semibold text-on-surface-variant uppercase tracking-wider mb-3">Danh sách món ăn chi tiết:</p>
                        <div class="divide-y divide-outline-variant/10 border border-outline-variant/20 rounded-xl overflow-hidden bg-white">
                            <?php 
                                $details = $this->orderModel->getOrderDetails($order->id); 
                                foreach ($details as $detail):
                            ?>
                                <div class="p-3 flex justify-between items-center text-sm hover:bg-surface-container-low/10 transition-colors">
                                    <span class="text-on-surface flex items-center gap-2">
                                        <span class="text-tertiary">🍽</span> <?php echo htmlspecialchars($detail->product_name); ?> 
                                        <span class="bg-surface-container-high text-on-surface-variant font-bold text-xs px-2 py-0.5 rounded-md ml-2">x<?php echo $detail->quantity; ?></span>
                                    </span>
                                    <span class="font-semibold text-on-surface-variant"><?php echo number_format($detail->price * $detail->quantity, 0, ',', '.'); ?> đ</span>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </details>
            </div>
        <?php endforeach; ?>
    </div>
<?php else: ?>
    <div class="text-center py-12 border border-dashed border-outline-variant/40 rounded-2xl bg-surface-container-lowest shadow-sm max-w-xl mx-auto">
        <span class="material-symbols-outlined text-5xl text-outline-variant mb-3">assignment_late</span>
        <p class="text-on-surface-variant font-medium">Hệ thống hiện chưa ghi nhận lịch sử đơn hàng nào.</p>
    </div>
<?php endif; ?>

<?php include 'app/views/shares/footer.php'; ?>