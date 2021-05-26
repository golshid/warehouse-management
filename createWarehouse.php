<?php $thisPage = "CreateWarehouse"; ?>
<?php
include('nav/header.php');
?>
<div class="container col-lg-4 mt-5">
    <div class="card p-5 border-success text-right">
        <form action="storeWarehouse.php" method="post" class="needs-validation" novalidate>
            <div class="form-group">
                <label for="warehouseName">اسم انبار</label>
                <input type="text" class="form-control text-right" id="warehouseName" name="warehouseName" aria-describedby="warehouseName" required>
            </div>
            <div class="form-group">
                <label for="warehouseCity">شهر انبار</label>
                <input type="text" class="form-control text-right" id="warehouseCity" name="warehouseCity" aria-describedby="warehouseCity" required>
            </div>
            <div class="form-group">
                <label for="warehouseAddress">آدرس انبار</label>
                <input type="text" class="form-control text-right" id="warehouseAddress" name="warehouseAddress" aria-describedby="warehouseAddress">
            </div>
            <div class="form-group">
                <label for="warehouseTel">شماره تماس</label>
                <input type="tel" class="form-control text-right" id="warehouseTel" name="warehouseTel" aria-describedby="warehouseTel">
            </div>
            <button type="submit" class="btn btn-success mt-5 p-2">ثبت انبار</button>
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