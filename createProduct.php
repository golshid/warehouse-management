<?php $thisPage = "CreateProduct"; ?>
<?php
include('nav/header.php');
session_start();
require_once("database/db_connection.php");
$sql = "SELECT id,name FROM warehouse";
$query = mysqli_query($conn, $sql);
?>

<div class="container col-lg-4 mt-5">
    <div class="card p-5 border-success text-right">
        <form action="storeProduct.php" method="post" class="needs-validation text-right" novalidate>
            <div class="form-group">
                <label for="productName">اسم محصول</label>
                <input type="text" class="form-control text-right" id="productName" name="productName" aria-describedby="productName" required>
            </div>
            <div class="form-group">
                <label for="productPrice">قیمت</label>
                <input type="text" class="form-control text-right" id="productPrice" name="productPrice" aria-describedby="productPrice" required>
            </div>
            <div class="form-group">
                <label for="productWeight">وزن</label>
                <input type="number" class="form-control text-right" id="productWeight" name="productWeight" aria-describedby="productWeight" required>
            </div>
            <div class="form-group text-right">
                <label for="warehouses">متعلق به انبار </label>
                <select id="warehouses" class="form-control" name="warehouses" required>
                    <?php
                    while ($row = mysqli_fetch_array($query)) { ?>
                        <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
                    <?php } ?>
                </select>
                <small id="warehouseHelp" class="form-text text-muted">
                    درصورتیکه انبار موردنظر شما در لیست موجود نمی باشد برای ایجاد آن <a href="createWarehouse.php" class="text-success">اینجا</a> را کلیک نمایید </small>
            </div>
            <button type="submit" class="btn btn-success mt-5 p-2">ثبت محصول</button>
        </form>
    </div>
</div>

<script>
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            var forms = document.getElementsByClassName('needs-validation');
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>