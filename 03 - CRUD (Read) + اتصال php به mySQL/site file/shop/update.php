<?php

$id = $_GET['id'];
include('config/db_connection.php');
// select id data

$sql = "SELECT * FROM products WHERE id='$id'";
$res = mysqli_query($conn, $sql);
$product = mysqli_fetch_assoc($res);

if (isset($_POST['btn'])) {
    $prName = $_POST['productName'];
    $prInventory = $_POST['productinventory'];
    $prPrice = $_POST['productprice'];
    $prstatusTemp = $_POST['productRadios'];

    if ($prstatusTemp == 'option1') {
        $prstatus = 'true';
    } else {
        $prstatus = 'false';
    }

    
    
    $sqlEdit = "UPDATE `products` SET `name`='$prName',`inventory`='$prInventory',`price`='$prPrice',`status`='$prstatus' WHERE id='$id'";
    $res = mysqli_query($conn, $sqlEdit);
    
    
    header('Location: index.php');
}


?>


<?php include('assets/pages/header.php') ?>


<h1 class="text-center">ویرایش محصولات</h1>



<form class="add-product-frm" method="POST">
    <div class="form-group">
        <label for="productName">نام محصول</label>
        <input type="text" class="form-control" name="productName" value="<?php echo $product['name'] ?>">
    </div><br>
    <div class="form-group">
        <label for="productinventory">موجودی انبار</label>
        <input type="text" class="form-control" name="productinventory" value="<?php echo $product['inventory'] ?>">
    </div><br>
    <div class="form-group">
        <label for="productprice">قیمت محصول</label>
        <input type="text" class="form-control" name="productprice" value="<?php echo $product['price'] ?>">
    </div><br>
    <div class="form-group">
        <div class="form-check">
            <input class="form-check-input" type="radio" name="productRadios" id="productRadios1" value="option1" <?php if($product['status'] == 'true'){echo 'checked'; } ?>>
            <label class="form-check-label text-success" for="productRadios1">
                محصول قابل نمایش باشد
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="productRadios" id="productRadios2" value="option2" <?php if($product['status'] == 'false'){echo 'checked'; } ?>>
            <label class="form-check-label text-danger" for="productRadios2">
                محصول قابل نمایش نباشد
            </label>
        </div>
    </div><br>
    <button type="submit" class="btn btn-primary" name="btn">درج محصول</button>
</form>

<?php include('assets/pages/footer.php') ?>