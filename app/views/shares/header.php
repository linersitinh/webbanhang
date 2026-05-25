<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>L'Etoile - Nhà hàng Châu Âu</title>
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400..800;1,400..800&family=Be+Vietnam+Pro:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "tertiary-container": "#fff3f2",
                        "outline-variant": "#cac6bd",
                        "surface-container-highest": "#f3dedd",
                        "on-error-container": "#93000a",
                        "on-tertiary-container": "#b84f4a",
                        "inverse-primary": "#cac6bd",
                        "on-secondary-fixed": "#3a0a00",
                        "secondary-fixed-dim": "#ffb59f",
                        "surface-dim": "#ead5d5",
                        "secondary-fixed": "#ffdbd1",
                        "inverse-on-surface": "#ffedec",
                        "error": "#ba1a1a",
                        "surface-container-lowest": "#ffffff",
                        "secondary": "#9a452b",
                        "on-tertiary": "#ffffff",
                        "on-secondary-fixed-variant": "#7b2e16",
                        "on-primary-container": "#727068",
                        "inverse-surface": "#3a2d2d",
                        "on-tertiary-fixed": "#410004",
                        "on-secondary-container": "#762b13",
                        "primary-container": "#f9f5eb",
                        "surface-container": "#ffe9e8",
                        "tertiary-fixed": "#ffdad7",
                        "on-surface-variant": "#484740",
                        "primary-fixed": "#e6e2d8",
                        "outline": "#79776f",
                        "on-surface": "#241919",
                        "primary-fixed-dim": "#cac6bd",
                        "on-error": "#ffffff",
                        "surface-tint": "#605e57",
                        "on-primary-fixed-variant": "#484740",
                        "surface-variant": "#f3dedd",
                        "surface-container-high": "#f9e3e3",
                        "surface": "#fff8f7",
                        "on-background": "#241919",
                        "secondary-container": "#ff9474",
                        "error-container": "#ffdad6",
                        "on-secondary": "#ffffff",
                        "primary": "#605e57",
                        "tertiary-fixed-dim": "#ffb3ad",
                        "surface-bright": "#fff8f7",
                        "tertiary": "#a13e3a",
                        "surface-container-low": "#fff0f0",
                        "on-tertiary-fixed-variant": "#812625",
                        "on-primary-fixed": "#1c1c16",
                        "background": "#fff8f7",
                        "on-primary": "#ffffff"
                    },
                    "borderRadius": {
                        "DEFAULT": "0.125rem",
                        "lg": "0.25rem",
                        "xl": "0.5rem",
                        "full": "0.75rem"
                    },
                    "spacing": {
                        "margin-mobile": "20px",
                        "container-max": "1200px",
                        "gutter": "24px",
                        "margin-desktop": "64px",
                        "unit": "8px"
                    },
                    "fontFamily": {
                        "headline-sm": ["EB Garamond"],
                        "headline-md": ["EB Garamond"],
                        "body-lg": ["Be Vietnam Pro"],
                        "display-lg-mobile": ["EB Garamond"],
                        "body-md": ["Be Vietnam Pro"],
                        "display-lg": ["EB Garamond"],
                        "label-md": ["Be Vietnam Pro"]
                    },
                    "fontSize": {
                        "headline-sm": ["24px", { "lineHeight": "1.4", "fontWeight": "600" }],
                        "headline-md": ["32px", { "lineHeight": "1.3", "fontWeight": "500" }],
                        "body-lg": ["18px", { "lineHeight": "1.6", "fontWeight": "400" }],
                        "display-lg-mobile": ["40px", { "lineHeight": "1.2", "fontWeight": "500" }],
                        "body-md": ["16px", { "lineHeight": "1.6", "fontWeight": "400" }],
                        "display-lg": ["64px", { "lineHeight": "1.1", "letterSpacing": "-0.02em", "fontWeight": "500" }],
                        "label-md": ["14px", { "lineHeight": "1.2", "letterSpacing": "0.05em", "fontWeight": "600" }]
                    }
                }
            }
        }
    </script>
    <style>
        body {
            background-image: url('data:image/svg+xml,%3Csvg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg"%3E%3Cfilter id="noiseFilter"%3E%3CfeTurbulence type="fractalNoise" baseFrequency="0.65" numOctaves="3" stitchTiles="stitch"/%3E%3C/filter%3E%3Crect width="100%25" height="100%25" filter="url(%23noiseFilter)" opacity="0.05"/%3E%3C/svg%3E');
        }
        .leader-line {
            flex-grow: 1;
            border-bottom: 2px dotted theme('colors.outline-variant');
            opacity: 0.5;
            margin: 0 12px 6px 12px;
        }
    </style>
</head>
<body class="bg-surface text-on-surface min-h-screen flex flex-col font-body-md">

<nav class="fixed top-0 w-full z-50 flex justify-between items-center px-4 md:px-margin-desktop h-20 bg-surface border-b border-outline-variant/20 shadow-sm">
    <div class="font-headline-md text-headline-md text-tertiary tracking-tight">L'Etoile</div>
    <div class="hidden md:flex items-center gap-8">
        <a class="font-label-md text-label-md text-on-surface-variant hover:text-tertiary transition-colors" href="/webbanhang/">Trang Chủ</a>
        <a class="font-label-md text-label-md text-on-surface-variant hover:text-tertiary transition-colors" href="/webbanhang/Product">Thực Đơn</a>
        <a class="font-label-md text-label-md text-on-surface-variant hover:text-tertiary transition-colors" href="/webbanhang/Category/list">Danh Mục</a>
        <a class="font-label-md text-label-md text-on-surface-variant hover:text-tertiary transition-colors" href="/webbanhang/Product/orderHistory">Lịch Sử Đơn</a>
    </div>
    <a href="/webbanhang/Product/cart" class="flex items-center gap-2 bg-tertiary text-on-tertiary px-4 py-2 rounded-xl font-label-md text-label-md uppercase hover:bg-tertiary/90 transition-all duration-300 shadow-md shadow-tertiary/20">
        <span class="material-symbols-outlined" style="font-size: 20px;">shopping_cart</span>
        <span><?php echo isset($_SESSION['cart']) ? array_sum(array_column($_SESSION['cart'], 'quantity')) : 0; ?></span>
    </a>
</nav>

<main class="pt-28 pb-16 w-full max-w-[1200px] mx-auto px-4 flex-1">

<?php if (isset($_GET['status'])): ?>
    <?php 
        $isSuccess = $_GET['status'] === 'success';
        $bgClass = $isSuccess ? 'bg-emerald-50 border-emerald-200 text-emerald-800' : 'bg-rose-50 border-rose-200 text-rose-800';
        $icon = $isSuccess ? 'check_circle' : 'warning';
        $msg = 'Đã có lỗi xảy ra trong hệ thống.';
        if ($_GET['message'] === 'added') $msg = 'Đã thêm thành công món ăn này vào bàn của bạn!';
        if ($_GET['message'] === 'removed') $msg = 'Đã xóa món ăn khỏi danh sách đặt hàng.';
        if ($_GET['message'] === 'updated') $msg = 'Đã cập nhật lại số lượng món ăn thành công.';
        if ($_GET['message'] === 'emptyfields') $msg = 'Vui lòng điền đầy đủ các thông tin bắt buộc!';
        if ($_GET['message'] === 'invalidphone') $msg = 'Số điện thoại không hợp lệ! Vui lòng kiểm tra lại.';
        if ($_GET['message'] === 'emptycart') $msg = 'Giỏ món ăn đang trống, vui lòng chọn món trước!';
        if ($_GET['message'] === 'cancelled') $msg = '💔 Đã hủy đơn hàng thành công theo yêu cầu.';
    ?>
    <div class="mb-6 flex items-center gap-3 border p-4 rounded-xl shadow-sm <?php echo $bgClass; ?> animate-fade-in">
        <span class="material-symbols-outlined"><?php echo $icon; ?></span>
        <span class="font-medium"><?php echo $msg; ?></span>
    </div>
<?php endif; ?>