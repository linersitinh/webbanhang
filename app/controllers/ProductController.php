<?php
require_once('app/config/database.php');
require_once('app/models/ProductModel.php');
require_once('app/models/CategoryModel.php');
require_once('app/models/OrderModel.php');

class ProductController {
    private $productModel;
    private $orderModel;
    private $db;

    public function __construct() {
        $this->db = (new Database())->getConnection();
        $this->productModel = new ProductModel($this->db);
        $this->orderModel = new OrderModel($this->db);
    }

    public function index() {
        $products = $this->productModel->getProducts();
        include 'app/views/product/list.php';
    }

    public function show($id) {
        $product = $this->productModel->getProductById($id);
        if ($product) include 'app/views/product/show.php';
    }

    public function addToCart($id) {
        $product = $this->productModel->getProductById($id);
        if (!$product) {
            header('Location: /webbanhang/Product?status=error&message=notfound');
            exit;
        }
        if (!isset($_SESSION['cart'])) { $_SESSION['cart'] = []; }

        if (isset($_SESSION['cart'][$id])) {
            $_SESSION['cart'][$id]['quantity']++;
        } else {
            $_SESSION['cart'][$id] = [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1,
                'image' => $product->image
            ];
        }
        header('Location: /webbanhang/Product/cart?status=success&message=added');
        exit;
    }

    public function removeFromCart($id) {
        if (isset($_SESSION['cart'][$id])) { unset($_SESSION['cart'][$id]); }
        header('Location: /webbanhang/Product/cart?status=success&message=removed');
        exit;
    }

    public function updateCart() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['quantities'])) {
            foreach ($_POST['quantities'] as $id => $qty) {
                $qty = (int)$qty;
                if ($qty > 0 && isset($_SESSION['cart'][$id])) {
                    $_SESSION['cart'][$id]['quantity'] = $qty;
                }
            }
        }
        header('Location: /webbanhang/Product/cart?status=success&message=updated');
        exit;
    }

    public function cart() {
        $cart = $_SESSION['cart'] ?? [];
        include 'app/views/product/cart.php';
    }

    public function checkout() {
        $cart = $_SESSION['cart'] ?? [];
        if (empty($cart)) {
            header('Location: /webbanhang/Product/cart?status=error&message=emptycart');
            exit;
        }
        include 'app/views/product/checkout.php';
    }

    public function processCheckout() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $customer_name = trim($_POST['customer_name'] ?? '');
            $phone         = trim($_POST['phone'] ?? '');
            $phone2        = trim($_POST['phone2'] ?? '');
            $address       = trim($_POST['address'] ?? '');
            $note          = trim($_POST['note'] ?? '');
            $cart          = $_SESSION['cart'] ?? [];

            if (empty($customer_name) || empty($phone) || empty($address)) {
                header('Location: /webbanhang/Product/checkout?status=error&message=emptyfields');
                exit;
            }
            if (empty($cart)) {
                header('Location: /webbanhang/Product/cart?status=error&message=emptycart');
                exit;
            }
            if (!preg_match('/^[0-9]{10,11}$/', $phone)) {
                header('Location: /webbanhang/Product/checkout?status=error&message=invalidphone');
                exit;
            }
            if (!empty($phone2) && !preg_match('/^[0-9]{10,11}$/', $phone2)) {
                header('Location: /webbanhang/Product/checkout?status=error&message=invalidphone');
                exit;
            }

            $order_id = $this->orderModel->createOrder($customer_name, $phone, $phone2, $address, $note, $cart);

            if ($order_id) {
                unset($_SESSION['cart']); // Xóa sạch giỏ hàng khi lưu thành công
                header('Location: /webbanhang/Product/success?order_id=' . $order_id);
                exit;
            } else {
                header('Location: /webbanhang/Product/checkout?status=error&message=dberror');
                exit;
            }
        }
    }

    public function success() {
        $order_id = $_GET['order_id'] ?? 0;
        include 'app/views/product/success.php';
    }

    public function orderHistory() {
        $orders = $this->orderModel->getAllOrders();
        include 'app/views/product/history.php';
    }

    public function cancelOrder($order_id = null) {
        if ($order_id === null) {
            $url = $_GET['url'] ?? '';
            $url = explode('/', rtrim($url, '/'));
            $order_id = isset($url[2]) ? (int)$url[2] : 0;
        }
        if ($order_id > 0 && $this->orderModel->deleteOrder($order_id)) {
            header('Location: /webbanhang/Product/orderHistory?status=success&message=cancelled');
        } else {
            header('Location: /webbanhang/Product/orderHistory?status=error');
        }
        exit;
    }
}