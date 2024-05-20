<?php
    require_once "../includes/db.php";

    $query_supplier_count = "SELECT supplier.supplier_name, COUNT(product.product_id) AS car_count
                            FROM supplier
                            LEFT JOIN product ON supplier.supplier_id = product.supplier_id
                            GROUP BY supplier.supplier_id
                            ORDER BY supplier.supplier_name";
    $stmt_supplier_count = $pdo->prepare($query_supplier_count);
    $stmt_supplier_count->execute();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/query.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <title>Carlink</title>
</head>
<body>
    <header>
            <nav>
                <img class="logo" src="../assets/images/logo3.png" alt="">
                <ul>
                        <li><a class="nav-button" href="../index.php">Home</a></li>
                        <li><a class="nav-button" href="create.php">Create</a></li>
                        <li><a class="nav-button" href="deleteform.php">Modify</a></li>
                        <li><a class="nav-button" href="view.php">Display</a></li>
                        <li><a class="nav-button" href="querycategory.php">Query 1</a></li>
                        <li><a class="nav-button" href="querydistributed.php">Query 2</a></li>
                </ul>
                <a class="login-btn" href="">Log in</a>
            </nav>
    </header>
    <main>
        <div class="container">
            <div class="content-btn">
                    <button class="tab-btn-secondary">Distributed Car Report</button>
                    <div class="line"></div>
            </div>    


            <div class="content-box">
                <div class="content">
                    <div class="table-container">
                        <table>
                            <div class="tbl-header">
                                <tr>
                                    <th>Supplier Name</th>
                                    <th>Contact Person</th>
                                    <th>Contact Number</th>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                </tr>
                            </div>
                            <div>
                                <?php
                                    require_once "../includes/db.php";
                                    $query = "SELECT supplier.supplier_name, supplier.contact_person, supplier.contact_number, product.product_name, product.price
                                            FROM supplier INNER JOIN (category INNER JOIN product ON category.category_id = product.category_id) ON supplier.supplier_id = product.supplier_id;
                                    ";
                                    $stmt = $pdo -> prepare($query);
                                    $stmt -> execute();
                                    while($row = $stmt -> fetch()){
                                        echo "
                                        <tr>
                                            <td>" . $row['supplier_name'] . "</td>
                                            <td>" . $row['contact_person'] . "</td>
                                            <td>" . $row['contact_number'] . "</td>
                                            <td>" . $row['product_name'] . "</td>
                                            <td>$" . $row['price'] . "</td>
                                        </tr>
                                        ";
                                    }
                                ?>
                            </div>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="count-container">
            <div class="content-btn">
                    <button class="tab-btn-secondary">Car Count Per Category</button>
            </div>    
            <div class="content-box">
                <div class="content">
                    <div class="table-container">
                    <table>
                            <div class="tbl-header">
                                <tr>
                                    <th>Supplier Name</th>
                                    <th>Car Distributed</th>
                                </tr>
                            </div>
                            <div>
                                <?php
                                    while($row = $stmt_supplier_count->fetch(PDO::FETCH_ASSOC)){
                                        echo "
                                        <tr>
                                            <td>" . $row['supplier_name'] . "</td>
                                            <td>" . $row['car_count'] . "</td>
                                        </tr>
                                        ";
                                    }
                                ?>
                            </div>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>