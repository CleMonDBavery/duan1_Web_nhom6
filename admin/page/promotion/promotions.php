<?php
$db = '';

class promotions
{
    public function getStatus()
    {
        $db = new connect();
        $sql = "SELECT * FROM promotions WHERE status = 'Active'";
        $result = $db->pdo_execute($sql);
        return $result;
    }

    public function add($name, $startTime, $endTime, $detail, $promotionType, $discount, $status, $conditionPro)
    {
        $db = new connect();
        $sql = "INSERT INTO promotions (name, startTime, endTime, detail, promotionType, discount, status, conditionPro)
            VALUES ('$name', '$startTime', '$endTime', '$detail', '$promotionType', '$discount', '$status', '$conditionPro')";
        $result = $db->pdo_execute($sql);
        return $result;
    }

    public function hidden($promotionId)
    {
        $db = new connect();
        $sql = "UPDATE promotions SET status = 'Inactive' WHERE promotionId = '$promotionId'";
        $result = $db->pdo_query_one($sql);
        return $result;
    }

}