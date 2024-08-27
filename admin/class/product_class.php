<?php
include "database.php";
?>
<?php
class product {
    private $db;

    public function __construct(){
        $this->db = new Database();
    }
    public function show_category(){
        $query = "SELECT * FROM tbl_category ORDER BY category_id DESC";
        $result = $this->db->select($query);
        return $result;
    }
    public function show_brand(){
        // $query = "SELECT * FROM tbl_brand ORDER BY brand_id DESC";
        $query = "SELECT tbl_brand.*, tbl_category.category_name 
        FROM tbl_brand INNER JOIN tbl_category ON tbl_brand.category_id = tbl_category.category_id 
        ORDER BY tbl_brand.brand_id DESC";
        $result = $this->db->select($query);
        return $result;
    }
    public function show_brand_ajax($category_id){
        $query = "SELECT * FROM tbl_brand WHERE category_id = '$category_id'";
        $result = $this->db->select($query);
        return $result;
    }
    public function show_product(){
        $query = "SELECT tbl_product.*, tbl_category.category_name, tbl_brand.brand_name 
                  FROM tbl_product 
                  INNER JOIN tbl_category ON tbl_product.category_id = tbl_category.category_id 
                  INNER JOIN tbl_brand ON tbl_product.brand_id = tbl_brand.brand_id
                  ORDER BY tbl_product.product_id DESC";
        $result = $this->db->select($query);
        return $result;
    }
    public function insert_product() {
        $product_name = $_POST['product_name'];
        $product_code = $_POST['product_code'];
        $category_id = $_POST['category_id'];
        $brand_id = $_POST['brand_id'];
        $product_price = $_POST['product_price'];
        $product_sale = $_POST['product_sale'];
        $product_desc = $_POST['product_desc'];
        $product_img = $_FILES['product_img']['name'];
        move_uploaded_file($_FILES['product_img']['tmp_name'], "uploads/".$_FILES['product_img']['name']);
        $query = "INSERT into tbl_product(
        product_name,
        product_code,
        category_id,
        brand_id,
        product_price,
        product_sale,
        product_desc,
        product_img) 
        VALUES (
        '$product_name',
        '$product_code',
        '$category_id',
        '$brand_id',
        '$product_price',
        '$product_sale',
        '$product_desc',
        '$product_img')";
        $result = $this->db->insert($query);
        // header('location:brandlist.php');
        if ($result){
            $query = "SELECT * FROM tbl_product ORDER BY product_id DESC LIMIT 1";
            $result = $this->db->select($query)->fetch_assoc();
            $product_id = $result['product_id'];
            $filename = $_FILES['product_img_desc']['name'];
            $fileImgDesc = $_FILES['product_img_desc']['tmp_name'];
            foreach($filename as $key =>$value){
                $query = "INSERT INTO tbl_product_img_desc(product_id, product_img_desc) VALUES ('$product_id','$value')";
                move_uploaded_file($fileImgDesc[$key], "uploads/".$value);
                $result = $this->db->insert($query);
            }
        }
        return $result;
    }
    public function delete_product($product_id){
        $query = "DELETE tbl_product, tbl_product_img_desc 
                  FROM tbl_product 
                  INNER JOIN tbl_product_img_desc 
                  ON tbl_product.product_id = tbl_product_img_desc.product_id 
                  WHERE tbl_product.product_id = '$product_id'";
        $result = $this->db->delete($query);
        header('location:productlist.php');
        return $result;
    }











    



    public function get_brand($brand_id){
        $query = "SELECT * FROM tbl_brand WHERE brand_id = '$brand_id'";
        $result = $this->db->select($query);
        return $result;
    }
    public function update_brand($category_id, $brand_name, $brand_id){
        $query = "UPDATE tbl_brand SET brand_name = '$brand_name', category_id='$category_id' WHERE brand_id = '$brand_id' ";
        $result = $this->db->update($query);
        header('location:brandlist.php');
        return $result;
    }

}
?>