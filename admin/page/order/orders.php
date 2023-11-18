<?
$db = '';
class orders
{
    public function getOrder()
    {
        $db = new connect();
        $sql = "SELECT  `orders`.orderId, `users`.username, `orders`.totalPrice, `orders`.destination, `orders`.status
        FROM orders 
        JOIN users on `orders`.userId = `users`.userId";
        $result = $db->pdo_execute($sql);
        return $result;
    }

    public function getOrderDetail($orderId)
    {
        $db = new connect();
        $sql = "SELECT `products`.name, `orderDetail`.price
        FROM orderDetail
        INNER JOIN products ON `orderDetail`.productId = `products`.productId
        WHERE `orderDetail`.orderId = '$orderId'";
        $result = $db->pdo_query($sql);
        return $result;
    }

    public function conditionOrder($orderId)
    {
        $db = new connect();
        $sql = "UPDATE orders SET status = 'Đang vận chuyển' WHERE orderId = '$orderId'";
        $result = $db->pdo_execute($sql);
        return $result;
    }

    public function cancelOrder($orderId)
    {
        $db = new connect();
        $sql = "UPDATE orders SET status = 'Đã hủy' WHERE orderId = '$orderId'";
        $result = $db->pdo_execute($sql);
        return $result;
    }

    public function thongKe()
    {
        $db = new connect();
        $sql = "SELECT DAY(date) as Tháng, COUNT(orderId) as 'Số đơn hàng'
                FROM orders
                GROUP BY DAY(date)";
        $result = $db->pdo_query($sql);
        return $result;
    }
}
