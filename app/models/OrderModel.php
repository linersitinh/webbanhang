<?php
class OrderModel {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function createOrder($customer_name, $phone, $phone2, $address, $note, $cart) {
        try {
            $this->conn->beginTransaction();

            $total_amount = 0;
            foreach ($cart as $item) {
                $total_amount += $item['price'] * $item['quantity'];
            }

            // Chèn dữ liệu vào bảng orders bám sát cấu trúc bảng mới
            $query = "INSERT INTO orders (customer_name, phone, phone2, address, note, total_amount) 
                      VALUES (:customer_name, :phone, :phone2, :address, :note, :total_amount)";
            
            $stmt = $this->conn->prepare($query);
            $stmt->execute([
                ':customer_name' => htmlspecialchars(strip_tags($customer_name)),
                ':phone'         => htmlspecialchars(strip_tags($phone)),
                ':phone2'        => !empty($phone2) ? htmlspecialchars(strip_tags($phone2)) : null,
                ':address'       => htmlspecialchars(strip_tags($address)),
                ':note'          => !empty($note) ? htmlspecialchars(strip_tags($note)) : null,
                ':total_amount'  => $total_amount
            ]);

            $order_id = $this->conn->lastInsertId();

            // Chèn dữ liệu vào bảng order_details
            $query_detail = "INSERT INTO order_details (order_id, product_id, quantity, price) 
                             VALUES (:order_id, :product_id, :quantity, :price)";
            $stmt_detail = $this->conn->prepare($query_detail);

            foreach ($cart as $product_id => $item) {
                $stmt_detail->execute([
                    ':order_id'   => (int)$order_id,
                    ':product_id' => (int)$product_id,
                    ':quantity'   => (int)$item['quantity'],
                    ':price'      => $item['price']
                ]);
            }

            $this->conn->commit();
            return $order_id;
        } catch (Exception $e) {
            $this->conn->rollBack();
            // In trực tiếp nguyên nhân nếu bị lỗi CSDL để phục vụ kiểm tra
            die("Lỗi lưu đơn hàng (MySQL): " . $e->getMessage());
            return false;
        }
    }

    public function getAllOrders() {
        $query = "SELECT * FROM orders ORDER BY created_at DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function getOrderDetails($order_id) {
        $query = "SELECT od.*, p.name as product_name, p.image 
                  FROM order_details od 
                  JOIN product p ON od.product_id = p.id 
                  WHERE od.order_id = :order_id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([':order_id' => $order_id]);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function deleteOrder($order_id) {
        $query = "DELETE FROM orders WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([':id' => $order_id]);
    }
}