<?
$db = '';
class orders
{
    public function getOrder()
    {
        $db = new connect();
        $sql = "SELECT  `orders`.orderId, `users`.username, `orders`.destination, `orders`.status
        FROM orders 
        JOIN users on `orders`.userId = `users`.userId AND `orders`.status ='Đang vận chuyển'";
        $result = $db->pdo_execute($sql);
        return $result;
    }

    public function getOrderConfirm()
    {
        $db = new connect();
        $sql = "SELECT  `orders`.orderId, `users`.username, `orders`.destination, `orders`.status
        FROM orders 
        JOIN users on `orders`.userId = `users`.userId AND `orders`.status ='Chờ xác nhận'";
        $result = $db->pdo_execute($sql);
        return $result;
    }

    public function getOrderDetail($orderId)
    {
        $db = new connect();
        $sql = "SELECT `orderDetail`.*, `products`.name, `products`.price
            FROM orderDetail
            INNER JOIN products ON `orderDetail`.productId = `products`.ProductId
            WHERE `orderDetail`.orderId = '$orderId' ";
        $result = $db->pdo_query($sql);
        return $result;
    }

    public function getOrderTotal($orderId)
    {
        $db = new connect();

        // Assuming you have a 'orderDetail' table with 'amount' and 'price' columns
        // Using a subquery to calculate the product of 'amount' and 'price' for each row
        $sql = "SELECT SUM(subtotal) AS total
            FROM (
                SELECT `orderDetail`.`amount` * `products`.`price` AS subtotal
                FROM `orderDetail`
                INNER JOIN `products` ON `orderDetail`.`productId` = `products`.`ProductId`
                WHERE `orderDetail`.`orderId` = '$orderId'
            ) AS subquery";

        $result = $db->pdo_query($sql);

        // Assuming your result is an associative array
        if ($result) {
            return $result[0]['total'];
        } else {
            return 0; // or handle the error as needed
        }
    }





    public function delete($orderDetailId)
    {
        $db = new connect();
        $sql = "UPDATE orderdetail SET status = 'Inactive' WHERE orderDetailId	= '$orderDetailId'";
        $result = $db->pdo_execute($sql);
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
