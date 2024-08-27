<?php
include "header.php";
include "slider.php";
include "class/product_class.php";
?>
<?php
$product = new product;
if ($_SERVER['REQUEST_METHOD']==='POST'){
    // var_dump($_POST,$_FILES);
    // echo '<pre>';
    // echo print_r($_FILES['product_img_desc']);
    // echo '</pre>';
    $insert_product = $product->insert_product($_POST, $_FILES);
}
?>
            <div class="admin-content-right">
                <div class="admin-content-right-product_add">
                    <h1>Thêm Sản Phẩm</h1>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <label for="">Nhập tên sản phẩm <span style="color: red">*</span></label>
                        <input name="product_name" required type="text" placeholder="Nhập tên sản phẩm" />
                        <label for="">Nhập mã sản phẩm <span style="color: red">*</span></label>
                        <input required name="product_code" type="text" placeholder="Nhập mã sản phẩm" />
                        <label for="">Chọn danh mục <span style="color: red">*</span></label>
                        <select name="category_id" id="category_id">
                            <option value="">--Chọn--</option>
                            <?php
                            $show_category = $product -> show_category();
                            if($show_category){while($result = $show_category ->fetch_assoc()){
                            ?>
                            <option value="<?php echo $result['category_id'] ?>"><?php echo $result['category_name'] ?></option>
                            <?php
                            }}    
                            ?>
                        </select>
                        <label for="">Chọn loại sản phẩm<span style="color: red">*</span></label>
                        <select name="brand_id" id="brand_id">
                            <option value="">--Chọn--</option>

                        </select>
                        <label for="">Giá sản phẩm <span style="color: red">*</span></label>
                        <input name="product_price" required type="text" placeholder="Giá sản phẩm" />
                        <label for="">Giá khuyến mãi <span style="color: red">*</span></label>
                        <input name="product_sale" required type="text" placeholder="Giá khuyến mãi" />
                        <label for="">Mô tả sản phẩm <span style="color: red">*</span></label>
                        <textarea required name="product_desc" id="" cols="30" rows="10" placeholder="Mô tả sản phẩm"></textarea>
                        <label for="">Ảnh sản phẩm <span style="color: red">*</span></label>
                        <input name="product_img" required type="file" id="imageFile" accept="image/*"/>
                        <label for="">Ảnh Mô tả <span style="color: red">*</span></label>
                        <input name="product_img_desc[]" required multiple type="file" id="imageFile" accept="image/*" />
                        <button type="submit">Thêm</button>
                    </form>
                </div>
            </div>
        </section>
    </body>
    <script>
        $(document).ready(function(){
            $("#category_id").change(function(){
                var x = $(this).val()
                $.get("productadd_ajax.php",{category_id:x},function(data){
                    $("#brand_id").html(data);
                })
            })
        })
    </script>
</html>