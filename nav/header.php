<!DOCTYPE html>
<html lang="en">

<head>
    <title>انبار</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <style>
        #currentpage a {
            color: red;

        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item" <?php if ($thisPage == "FindProduct")
                                                echo " id=\"currentpage\""; ?>>
                        <a class="nav-link" href="findProduct.php">یافتن یک محصول</a>
                    </li>
                    <li class="nav-item" <?php if ($thisPage == "warehouseList")
                                                echo " id=\"currentpage\""; ?>>
                        <a class="nav-link" href="warehouseList.php">مشاهده لیست انبارها</a>
                    </li>
                    <li class="nav-item" <?php if ($thisPage == "CreateProduct")
                                                echo " id=\"currentpage\""; ?>>
                        <a class="nav-link" href="createProduct.php">ایجاد محصول</a>
                    </li>
                    <li class="nav-item" <?php if ($thisPage == "CreateWarehouse")
                                                echo " id=\"currentpage\""; ?>>
                        <a class="nav-link" href="createWarehouse.php">ایجاد انبار</a>
                    </li>
                    <li class="nav-item" <?php if ($thisPage == "home")
                                                echo " id=\"currentpage\""; ?>>
                        <a class="nav-link" href="index.php">خانه<span class="sr-only">(current)</span></a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>