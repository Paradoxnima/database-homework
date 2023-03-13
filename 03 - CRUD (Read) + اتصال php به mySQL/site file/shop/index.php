<?php

  include('config/db_connection.php');

  $sql = 'SELECT * FROM products';
  $res = mysqli_query($conn, $sql);
  $products = mysqli_fetch_all($res, MYSQLI_ASSOC);
  mysqli_free_result($res);
  mysqli_close($conn);



?>



<?php include('assets/pages/header.php') ?>


<h1 class="text-center">مدیریت محصولات</h1>

<input class="form-control" id="myInput" type="text" placeholder="جست و جو کنید..." />
<br />


<table class="table table-bordered table-striped text-center">
  <thead>
    <tr>
      <th>#</th>
      <th>محصول</th>
      <th>موجودی</th>
      <th>قیمت</th>
      <th>وضعیت نمایش</th>
      <th>ویرایش / حدف</th>
    </tr>
  </thead>
  <tbody id="myTable">
    <?php foreach($products as $product){ ?>
    <tr>
      <td><?php echo $product['id'] ?></td>
      <td><?php echo $product['name'] ?></td>
      <td><?php echo $product['inventory'] ?></td>
      <td><?php echo $product['price'] ?> تومان</td>
      <td>
        <?php 
          if($product['status'] == 'true'){
            echo 'فعال';
          }else{
            echo 'غیرفعال';
          }        
        ?>
      </td>
      <td>
        <a href="update.php?id=<?php echo $product['id']; ?>">
          <i class="fa-solid fa-pen-to-square btn btn-success"></i>
        </a>
        <a href="delete.php?id=<?php echo $product['id']; ?>">
          <i class="fa-solid fa-trash btn btn btn-danger"></i>
        </a>
      </td>
    </tr>
    <?php } ?>
  </tbody>
</table>


<div class="addNewButton">
  <a href="add.php" class="btn btn-warning">اضافه ی محصول جدید</a>
</div>




<?php include('assets/pages/footer.php') ?>