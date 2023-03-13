<?php

if (isset($_POST['insert'])) {
    $prName = $_POST['productName'];
    $prInventory = $_POST['productinventory'];
    $prPrice = $_POST['productprice'];
    $prstatusTemp = $_POST['productRadios'];

    if ($prstatusTemp == 'option1') {
        $prstatus = 'true';
    } else {
        $prstatus = 'false';
    }


    include('config/db_connection.php');
    
    $sql = "INSERT INTO products (name, inventory, price, status) VALUES ('$prName', '$prInventory', '$prPrice', '$prstatus')";
    $res = mysqli_query($conn, $sql);
    print_r($res);
    mysqli_close($conn);
    header('Location: index.php');
}

?>



<?php include('assets/pages/header.php') ?>


<h1 class="text-center">اضافه کردن محصولات</h1>

<form class="add-product-frm" method="POST">
    <div class="form-group">
        <label for="productName">نام محصول</label>
        <input type="text" class="form-control" name="productName" placeholder="نام محصول مورد نظر را در این قسمت وارد کنید....">
    </div><br>
    <div class="form-group">
        <label for="productinventory">موجودی انبار</label>
        <input type="text" class="form-control" name="productinventory" placeholder="تعداد موجودی انبار محصول را وارد کنید...">
    </div><br>
    <div class="form-group">
        <label for="productprice">قیمت محصول</label>
        <input type="text" class="form-control" name="productprice" placeholder="قیمت محصول">
    </div><br>
    <div class="form-group">
        <div class="form-check">
            <input class="form-check-input" type="radio" name="productRadios" id="productRadios1" value="option1" checked>
            <label class="form-check-label text-success" for="productRadios1">
                محصول قابل نمایش باشد
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="productRadios" id="productRadios2" value="option2">
            <label class="form-check-label text-danger" for="productRadios2">
                محصول قابل نمایش نباشد
            </label>
        </div>
    </div><br>
    <button type="submit" class="btn btn-primary" name="insert">درج محصول</button>
</form>

<?php include('assets/pages/footer.php') ?>