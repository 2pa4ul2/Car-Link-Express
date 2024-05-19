<?php 
    $conn = mysqli_connect('localhost', 'root', '', 'carlink');

    if(isset($_GET['supplier_id'])){
        $supplier_id = $_GET['supplier_id'];
        $delete= mysqli_query($conn, "DELETE FROM `supplier` WHERE `supplier_id`='$supplier_id'");
    }
    elseif(isset($_GET['product_id'])){
        $product_id = $_GET['product_id'];
        $delete= mysqli_query($conn, "DELETE FROM `product` WHERE `product_id`='$product_id'");
    }
    elseif(isset($_GET['category_id'])){
        $category_id = $_GET['category_id'];
        $delete= mysqli_query($conn, "DELETE FROM `category` WHERE `category_id`='$category_id'");
    }

    $select = "SELECT * FROM supplier";
    $selectprod = "SELECT * FROM product";
    $selectcat = "SELECT * FROM category";
    $query = mysqli_query($conn, $select);
    $queryprod = mysqli_query($conn, $selectprod);
    $querycat = mysqli_query($conn, $selectcat);
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
                                    <th>Supplier Id</th>
                                    <th>Supplier Name</th>
                                    <th>Contact Person</th>
                                    <th>Contact Number</th>
                                    <th>Update</th>
                                    <th>Delete</th>
                                </tr>
                            </div>
                            <div class="tbl-content">
                            <?php
                                $num = mysqli_num_rows($query);
                                if($num > 0){
                                    while($result = mysqli_fetch_assoc($query)){
                                        echo"
                                        <tr>
                                            <td>".$result['supplier_id']."</td>
                                            <td>".$result['supplier_name']."</td>
                                            <td>".$result['contact_person']."</td>
                                            <td>".$result['contact_number']."</td>
                                            <td>
                                                <a href='../pages/supplierupdate.php?supplier_id=".$result['supplier_id']."' class='update-btn'>Update</a>
                                            </td>
                                            <td>
                                                <a href='../pages/deleteform.php?supplier_id=".$result['supplier_id']."' class='delete-btn'>Delete</a>
                                            </td>
                                        ";
                                    }
                                    
                                }
                                    
                            ?>
                            </div>
                        </table>
                    </div>
                </div>


                <div class="content">
                    <div class="table-container">
                            <form action="../includes/delete.php" method="post">
                            <table>
                                <div class="tbl-header">
                                    <tr>
                                        <th>Category Id</th>
                                        <th>Category Name</th>
                                        <th>Update</th>
                                        <th>Delete</th>
                                    </tr>
                                </div>
                                <div class="tbl-content">
                                <?php
                                    $num = mysqli_num_rows($query);
                                    if($num > 0){
                                        while($result = mysqli_fetch_assoc($querycat)){
                                            echo"
                                            <tr>
                                                <td>".$result['category_id']."</td>
                                                <td>".$result['category_name']."</td>
                                                <td>
                                                    <a href='../pages/categoryupdate.php?category_id=".$result['category_id']."' class='update-btn'>Update</a>
                                                </td>
                                                <td>
                                                    <a href='../pages/deleteform.php?category_id=".$result['category_id']."' class='delete-btn'>Delete</a>
                                                </td>
                                            ";
                                        }
                                        
                                    }
                                        
                                ?>
                                </div>
                                </table>
                            </form>
                        </div>
                </div>


                <div class="content">
                    <div class="table-container">
                        <table>
                                <tr>
                                    <th>Product Id</th>
                                    <th>Product Name</th>
                                    <th>Supplier Id</th>
                                    <th>Category Id</th>
                                    <th>Price</th>
                                    <th>Update</th>
                                    <th>Delete</th>
                                </tr>
                                <?php
                                    $num = mysqli_num_rows($queryprod);
                                    if($num > 0){
                                        while($result = mysqli_fetch_assoc($queryprod)){
                                            echo"
                                            <tr>
                                                <td>".$result['product_id']."</td>
                                                <td>".$result['product_name']."</td>
                                                <td>".$result['supplier_id']."</td>
                                                <td>".$result['category_id']."</td>
                                                <td>".$result['price']."</td>
                                                <td>
                                                    <a href='../pages/productupdate.php?product_id=".$result['product_id']."' class='update-btn'>Update</a>
                                                </td>
                                                <td>
                                                    <a href='../pages/deleteform.php?product_id=".$result['product_id']."' class='delete-btn'>Delete</a>
                                                </td>
                                            ";
                                        }
                                        
                                    }
                                        
                                ?>
                            </table>
                        </div>
                </div>
            </div>
        </div>
    </main>
    
    <script src="../assets/js/script.js"></script>
</body>
</html>