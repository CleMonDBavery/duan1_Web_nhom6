<?php
class User
{
    function getUser()
    {
        $db = new connect();
        $select = "SELECT * from users";
        return $db->pdo_query($select);
    }
    function getuserId($id)
    {
        $db = new connect();
        $select = "SELECT * from users  where userId = '" . $id . "'";
        return $db->pdo_query($select);
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
    function userId($username, $password)
    {
        $db = new connect();
        $select = "SELECT userId from users where UserName='$username' and Password='$password'";
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

    function getFullName(){
        $db = new connect();
        $select = "SELECT FullName from users";
        $result = $db->pdo_query_one($select);
        return $result;
    }
    public function update($id, $FullName, $Email, $Avatar, $Password , $Address, $Phone)
    {
        $db = new connect();
        $query = "UPDATE users SET 
         FullName = '$FullName',
         Email = '$Email', 
         Avatar = '$Avatar', 
         Password = '$Password', 
         Address = '$Address', 
         Phone = '$Phone'
        
         where userId = '" . $id . "'";
        $result = $db->pdo_execute($query);
        return $result;
    }
    function getInfoProfile($id, $column)
    {
        $db = new connect();
        $sql = "SELECT * FROM users WHERE userId  = $id";
        $result = $db->pdo_query($sql);
        foreach ($result as $row) {
            return $row[$column];
        }
    }
    public function countUsers(){
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
}


?>