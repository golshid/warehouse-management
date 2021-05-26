<?php $thisPage = ""; ?>
<?php
include('nav/header.php');
?>

<div class="container text-center border-success col-lg-4 mt-5">
    <div class="card">
        <div class="card-header">
            <h6>جستجوی محصول در انبار ها</h6>
        </div>
        <div class="card-body p-5 border-success text-right">
            <form action="searchResult.php" method="post" class="needs-validation text-right" novalidate>
                <div class="form-group">
                    <input type="text" class="form-control text-right" id="productName" name="productName" aria-describedby="productName" placeholder="اسم محصول" required>
                </div>
                <button type="submit" class="btn btn-outline-success pr-3 pl-3">جستجو</button>

            </form>
        </div>
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