<?php
    require_once "../includes/db.php";
    
    // count supplier
    $query_supplier_count = "SELECT COUNT(*) as supplier_count FROM supplier";
    $stmt_supplier_count = $pdo->prepare($query_supplier_count);
    $stmt_supplier_count->execute();
    $supplier_count = $stmt_supplier_count->fetch(PDO::FETCH_ASSOC)['supplier_count'];

    // count category
    $query_category_count = "SELECT COUNT(*) as category_count FROM category";
    $stmt_category_count = $pdo->prepare($query_category_count);
    $stmt_category_count->execute();
    $category_count = $stmt_category_count->fetch(PDO::FETCH_ASSOC)['category_count'];

    // count product
    $query_product_count = "SELECT COUNT(*) as product_count FROM product";
    $stmt_product_count = $pdo->prepare($query_product_count);
    $stmt_product_count->execute();
    $product_count = $stmt_product_count->fetch(PDO::FETCH_ASSOC)['product_count'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/delete.css">
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
                    <button class="tab-btn-secondary">Supplier</button>
                    <button class="tab-btn-secondary">Category</button>
                    <button class="tab-btn-secondary">Product</button>
                    <div class="line"></div>
            </div>    


            <div class="content-box">
                <div class="content">
                    <div class="table-container">
                        <table>
                            <div class="tbl-header">
                                <tr>
                                    <th>Supplier ID</th>
                                    <th>Supplier Name</th>
                                    <th>Contact Person</th>
                                    <th>Contact Number</th>
                                </tr>
                            </div>
                            <div>
                                <?php
                                    require_once "../includes/db.php";
                                    $query = "SELECT * FROM supplier";
                                    $stmt = $pdo -> prepare($query);
                                    $stmt -> execute();
                                    while($row = $stmt -> fetch()){
                                        echo "
                                        <tr>
                                            <td>" . $row['supplier_id'] . "</td>
                                            <td>" . $row['supplier_name'] . "</td>
                                            <td>" . $row['contact_person'] . "</td>
                                            <td>" . $row['contact_number'] . "</td>
                                        </tr>
                                        ";
                                    }
                                ?>
                            </div>
                        </table>
                    </div>
                    <h4>Number of Suppliers: <?php echo $supplier_count; ?></h4>
                </div>


                <div class="content">
                    <div class="table-container">
                        <table>
                            <div class="tbl-header-category">
                                <tr>
                                    <th>Category ID</th>
                                    <th>Category Name</th>
                                </tr>
                            </div>
                            <div>
                                <?php
                                    require_once "../includes/db.php";
                                    $query = "SELECT * FROM category";
                                    $stmt = $pdo -> prepare($query);
                                    $stmt -> execute();
                                    while($row = $stmt -> fetch()){
                                        echo "
                                        <tr>
                                            <td>" . $row['category_id'] . "</td>
                                            <td>" . $row['category_name'] . "</td>
                                        </tr>
                                        ";
                                    }
                                ?>
                            </div>
                        </table>
                    </div>
                    <h4>Number of Categories: <?php echo $category_count; ?></h4>
                </div>


                <div class="content">
                    <div class="table-container">
                        <table>
                            <div class="tbl-header">
                                <tr>
                                    <th>Product ID</th>
                                    <th>Product Name</th>
                                    <th>Supplier ID</th>
                                    <th>Category ID</th>
                                    <th>Price</th>
                                </tr>
                            </div>
                            <div>
                                <?php
                                    require_once "../includes/db.php";
                                    $query = "SELECT * FROM product";
                                    $stmt = $pdo -> prepare($query);
                                    $stmt -> execute();
                                    while($row = $stmt -> fetch()){
                                        echo "
                                        <tr>
                                            <td>" . $row['product_id'] . "</td>
                                            <td>" . $row['product_name'] . "</td>
                                            <td>" . $row['supplier_id'] . "</td>
                                            <td>" . $row['category_id'] . "</td>
                                            <td>$" . $row['price'] . "</td>
                                        </tr>
                                        ";
                                    }
                                ?>
                            </div>
                        </table>
                    </div>
                    <h4>Number of Products: <?php echo $product_count; ?></h4>
                </div>
                
            </div>
        </div>
    </main>
    

    <script src="../assets/js/script.js"></script>
</body>
</html>