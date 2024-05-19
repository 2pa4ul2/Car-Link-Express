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
                    <button class="tab-btn-secondary">Car Categories Report</button>
                    <div class="line"></div>
            </div>    


            <div class="content-box">
                <div class="content">
                    <div class="table-container">
                        <table>
                            <div class="tbl-header">
                                <tr>
                                    <th>Category Name</th>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                </tr>
                            </div>
                            <div>
                                <?php
                                    require_once "../includes/db.php";
                                    $query = "SELECT category.category_name, product.product_name, product.price
                                            FROM Category INNER JOIN Product ON category.category_id = product.category_id
                                            ORDER BY category.category_name;
                                                ";
                                    $stmt = $pdo -> prepare($query);
                                    $stmt -> execute();
                                    while($row = $stmt -> fetch()){
                                        echo "
                                        <tr>
                                            <td>" . $row['category_name'] . "</td>
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
    </main>
</body>
</html>