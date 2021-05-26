<?php $thisPage = ""; ?>
<?php
include('nav/header.php');
require_once("database/db_connection.php");
$name = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = test_input($_POST["productName"]);
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
$sql1 = "SELECT id FROM product WHERE name = '$name'";
$query = mysqli_query($conn, $sql1);
$prod_id_array = array();
while ($result = $query->fetch_assoc()) {
    $prod_id_array[] = $result['id'];
}
$ids = join(",", $prod_id_array);
$sql2 = "SELECT * FROM warehouse WHERE id IN (SELECT warehouse_id FROM prod_ware WHERE product_id IN ($ids))";
$warehouse_query = $conn->query($sql2);


?>

<div class="container col-lg-8 mt-5">
    <div class="card p-5 border-success text-center">
        <div class="card-header p-3 mb-5">
            <h5> موجودی <?php echo $name ?></h5>
        </div>
        <?php
        if ($warehouse_query === false || mysqli_num_rows($warehouse_query) == 0) {
            echo $name . " در انبار موجود نمی باشد ";
            echo "<br>"; ?>
            <small class="form-text text-muted">
            برای ایجاد محصول
                <a href="createProduct.php" class="text-success">اینجا</a> را کلیک نمایید </small>

        <?php

        } else {
        ?>
            <table class="table table-hover table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">شماره تماس</th>
                        <th scope="col">آدرس</th>
                        <th scope="col">شهر</th>
                        <th scope="col">نام انبار</th>
                        <th scope="col">کد انبار</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_array($warehouse_query)) { ?>
                        <tr>
                            <td><?php echo $row['tel'] ?></td>
                            <td><?php echo $row['address'] ?></td>
                            <td><?php echo $row['city'] ?></td>
                            <td><a href="showWarehouse.php?id=<?php echo $row['id'] ?>&name=<?php echo $row['name'] ?>" class="text-success" style="text-decoration: none;"><?php echo $row['name'] ?></a></td>
                            <td><?php echo $row['id'] ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php } ?>
    </div>
</div>


<?php
mysqli_close($conn);
?>
</body>

</html>