<?php

class User
{
    function getUser()
    {
        $db = new connect();
        $select = "SELECT * from users WHERE status = 'Active'";
        return $db->pdo_query($select);
    }

    function getUserInactive()
    {
        $db = new connect();
        $select = "SELECT * from users WHERE status = 'Inactive'";
        return $db->pdo_query($select);
    }

    function getuserId($userId)
    {
        $db = new connect();
        $userId = is_array($userId) ? implode(",", $userId) : $userId;

        $query = "SELECT * FROM users WHERE `userId` = '$userId'";
        $result = $db->pdo_query_one($query);
        return $result;
    }

    public function getOrder($userId)
    {
        $db = new connect();
        $userId = is_array($userId) ? implode(",", $userId) : $userId;
        $sql = "SELECT `users`.username AS 'Người mua', `orders`.totalPrice AS 'Tổng tiền', 
           `orders`.date AS 'Ngày mua', `orders`.destination AS 'Địa chỉ', 
           `orders`.status AS 'Trạng thái', `products`.name AS 'Tên', `products`.image AS 'Hình', 
           `products`.price AS 'Giá', `orderdetail`.amount AS 'Số lượng', `orders`.status AS 'Trạng thái',
            `orders`.orderId
            FROM orders 
            JOIN users ON `orders`.userId = `users`.userId 
            JOIN orderdetail ON `orders`.orderId = `orderdetail`.orderId
            JOIN products ON `orderdetail`.productId = `products`.productId
            WHERE  `orders`.userId = $userId";

//        $params = array(':userId' => $userId);
        $result = $db->pdo_execute($sql);

        return $result;
    }


    function checkUser($username, $password)
    {
        $db = new connect();
        $select = "SELECT * from users where userName='$username' AND Password='$password' AND `role` ='admin' ";
        $result = $db->pdo_query_one($select);
        if ($result != null)
            return true;
        else
            return false;
    }

    function checkClient($username, $password)
    {
        $db = new connect();
        $select = "SELECT * from users where userName='$username' AND Password='$password' AND `role` ='member' ";
        $result = $db->pdo_query_one($select);
        if ($result != null)
            return true;
        else
            return false;
    }

    function userId($username, $password)
    {
        $db = new connect();
        $select = "SELECT userId from users where username='$username' and password='$password'";
        $result = $db->pdo_query_one($select);
        return $result;
    }

    function logout()
    {
        session_start();
        $_SESSION = array();
        session_destroy();
        header('Location: ../view/login.php');
        exit();
    }

    function getFullName()
    {
        $db = new connect();
        $select = "SELECT FullName from users";
        $result = $db->pdo_query_one($select);
        return $result;
    }

    public function updatehiddenActive($userId)
    {
        $db = new connect();
        $update = "UPDATE users SET status = 'Inactive' WHERE userId = '$userId'";
        $result = $db->pdo_query($update);
        return $result;
    }

    public function updatehiddenInactive($userId)
    {
        $db = new connect();
        $update = "UPDATE users SET status = 'Active' WHERE userId = '$userId'";
        $result = $db->pdo_query($update);
        return $result;
    }

    public function update($userId, $username, $password, $fullName, $phone, $email, $address, $avatar, $role, $status)
    {
        $db = new connect();
        $query = "UPDATE users SET 
         username = '$username',
         password = '$password',
         fullName = '$fullName',
         phone = '$phone',
         email = '$email',
         address = '$address',
         avatar = '$avatar',
         role = '$role',
         status = '$status'
         where userId = '" . $userId . "'";
        $result = $db->pdo_execute($query);
        return $result;
    }

    function updateProfile($userId, $fullName, $phone, $email, $address)
    {
        $db = new connect();
        $userId = is_array($userId) ? implode(",", $userId) : $userId;

        $sql = "UPDATE users 
                SET 
                fullName = '$fullName',
                phone = '$phone',
                address = '$address',
                email = '$email'
                WHERE userId ='" . $userId . "'";
        $result = $db->pdo_query($sql);
        return $result;
    }

    function getInfoProfile($userId, $column)
    {
        $db = new connect();
        $sql = "SELECT * FROM users WHERE userId  = $userId";
        $result = $db->pdo_query($sql);
        foreach ($result as $row) {
            return $row[$column];
        }
    }

    public function countUsers()
    {
        try {
            $db = new connect();
            $query = "SELECT COUNT(*) as total FROM users";
            $result = $db->pdo_query_one($query);

            if ($result) {
                $count = $result['total'];
                return $count;
            } else {
                return 0;
            }
        } catch (PDOException $e) {
            throw $e;
        }
    }

    public function getLogin($userId)
    {
        $db = new connect();
        $sql = "SELECT username FROM users WHERE userId = '$userId'";
        $result = $db->pdo_execute($sql);
        return $result['username'];
    }


}


?>