<?php
class products
{

    public function getList()
    {
        $db = new connect();
        $query = 'SELECT * FROM products'; //viết câu lệnh sql select *
        $result = $db->pdo_query($query);
        return $result;
    }

    public function getListLimitPR()
    {
        $db = new connect();
        $query = 'select * from products limit 3';
        $result = $db->pdo_query($query);
        return $result;
    }

    public function getById($productId)
    {
        $db = new connect();
        $query = 'select * from products where productId =' . $productId;
        $result = $db->pdo_query_one($query);
        return $result;
    }

    public function add($name, $priceSale, $price, $description, $categoryId, $image, $status)
    {
        $db = new connect();
        $query = "INSERT INTO products (`name`, `priceSale`, `price`, `image`, `description`, `categoryId`, `status`) VALUES ('$name', '$priceSale', '$price', '$image', '$description', '$categoryId', '$status')";
        $result = $db->pdo_execute($query);
        return $result;
    }

    public function update($productId, $name, $priceSale, $price, $description, $categoryId, $image, $status)
    {
        $db = new connect();
        $query = "UPDATE products SET 
        `name` = '$name',
        `image` = '$image', 
        `price` = '$price', 
        `priceSale` = '$priceSale',
        `description` = '$description', 
        categoryId = '$categoryId',
        `status` = '$status'
        where productId = '" . $productId . "'";
        $result = $db->pdo_query($query);
        return $result;
    }

    function getInfoProduct($productId, $column)
    {
        $db = new connect();
        $sql = "SELECT * FROM products WHERE productId  = $productId";
        $result = $db->pdo_query($sql);
        foreach ($result as $row) {
            return $row[$column];
        }
    }

    public function delete($product_id)
    {
        $db = new connect();
        $query = "DELETE FROM products WHERE product_id = '$product_id'";
        $result = $db->pdo_query_one($query);
        return $result;
    }

    public function getStatus($productId)
    {
        $db = new connect();
        $query = "SELECT Status FROM Products WHERE productId = $productId";
        $result = $db->pdo_query($query);
        return $result;
    }

    public function hiddenActive($productId)
    {
        $db = new connect();
        $sql = "update products set status = 'Inactive' where productId = '$productId'";
        $result = $db->pdo_query_one($sql);
        return $result;
    }

    public function hiddenInactive($productId)
    {
        $db = new connect();
        $sql = "update products set status = 'Active' where productId = '$productId'";
        $result = $db->pdo_query_one($sql);
        return $result;
    }

    public function getList_DESC()
    {
        $db = new connect();
        $select = "select * from products ORDER BY product_id DESC";
        $result = $db->pdo_query($select);
        return $result;
    }

    public function searchProduct($product_name)
    {
        $db = new connect();
        $select = "SELECT * FROM products WHERE product_name LIKE '%$product_name%'";
        $result = $db->pdo_query($select);
        return $result;
    }

    public function productDetail($category_id)
    {
        $db = new connect();
        $select = "SELECT * FROM products WHERE category_id = " . $category_id;
        $result = $db->pdo_query($select);
        return $result;
    }

    public function thongKe()
    {
        $db = new connect();
        $sql = 'SELECT categories . *, COUNT(products.category_id) AS total FROM products 
        INNER JOIN categories ON products.category_id = categories.category_id GROUP BY products.category_id;';
        $result = $db->pdo_query($sql);
        return $result;
    }

    public function renderCategorySelect()
    {
        $db = new connect();
        $query = "SELECT * FROM categories";
        $result = $db->pdo_query($query);

        $output = '<select style="width: 80%; margin: 0 auto" name="category" class="form-control" id="">';
        $output .= '<option selected value="">Chọn danh mục</option>';

        foreach ($result as $row) {
            $output .= '<option value="' . $row['categoryId'] . '">' . $row['name'] . '</option>';
        }

        $output .= '</select>';

        return $output;
    }
}
