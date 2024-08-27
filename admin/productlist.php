<?php
include "header.php";
include "slider.php";
include "class/product_class.php";
?>
<?php
$product = new product;
$show_product = $product->show_product();
?>
            <div class="admin-content-right">
                <div class="admin-content-right-category_list">
                    <h1>Danh sách Loại sản phẩm</h1>
                    <table>
                        <tr>
                            <th>ID</th>
                            <th>Ảnh</th>
                            <th>Tên sản phẩm</th>
                            <th>Danh mục</th>
                            <th>Loại sản phẩm</th>
                            <th>Giá bán</th>
                            <th>Giá giảm</th>
                            <th>Tùy chỉnh</th>
                        </tr>
                        <?php
                        if($show_product){
                            while($result = $show_product->fetch_assoc()){
                        ?>
                        <tr>
                            <td><?php echo $result['product_id'] ?></td>
                            <td><img src="uploads/<?php echo $result['product_img']?>" alt="" style="width:50px; height:100px"></td>
                            <td><?php echo $result['product_name'] ?></td>
                            <td><?php echo $result['brand_name'] ?></td>
                            <td><?php echo $result['category_name'] ?></td>
                            <td><?php echo $result['product_price'] ?></td>
                            <td><?php echo $result['product_sale'] ?></td>
                            <td>
                                <a href="productedit.php?product_id=<?php echo $result['product_id'] ?>">Sửa</a>|
                                <a href="productdelete.php?product_id=<?php echo $result['product_id'] ?>">Xóa</a>
                            </td>
                        </tr>
                        <?php
                            }
                        }
                        ?>
                    </table>
                </div>
            </div>
        </section>
    </body>
</html>