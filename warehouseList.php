<?php $thisPage = "warehouseList"; ?>
<?php
include('nav/header.php');
session_start();
require_once("database/db_connection.php");
$sql_fetch_ware = "SELECT * FROM warehouse ORDER BY id ASC";
$query = mysqli_query($conn, $sql_fetch_ware); ?>
<div class="container col-lg-8 mt-5">
    <div class="card p-5 border-success text-center">
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
                while ($row = mysqli_fetch_array($query)) { ?>
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
    </div>
</div>
<?php
mysqli_close($conn);
?>
</body>

</html>