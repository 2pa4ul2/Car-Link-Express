<?php 
    $conn = mysqli_connect('localhost', 'root', '', 'database');

    if(isset($_GET['supplier_id'])){
        $supplier_id = $_GET['supplier_id'];
        $delete= mysqli_query($conn, "DELETE FROM `supplier` WHERE `supplier_id`='$supplier_id'");
    }
    elseif(isset($_GET['product_id'])){
        $product_id = $_GET['product_id'];
        $delete= mysqli_query($conn, "DELETE FROM `product` WHERE `product_id`='$product_id'");
    }

    $select = "SELECT * FROM supplier";
    $selectprod = "SELECT * FROM product";
    $query = mysqli_query($conn, $select);
    $queryprod = mysqli_query($conn, $selectprod);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/create.css">
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
                        <li><a class="nav-button" href="updateform.php">Update</a></li>
                        <li><a class="nav-button" href="deleteform.php">Delete</a></li>
                        <li><a class="nav-button" href="view.php">Display</a></li>
                        <li><a class="nav-button" href="#">Query</a></li>
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
                        <table>
                            <tr>
                                <th>Supplier Id</th>
                                <th>Supplier Name</th>
                                <th>Contact Person</th>
                                <th>Contact Number</th>
                            </tr>
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
                                                <a href='../pages/deleteform.php?supplier_id=".$result['supplier_id']."' class='delete-btn'>Delete</a>
                                            </td>
                                        ";
                                    }
                                    
                                }
                                    
                            ?>
                        </table>
                </div>


                <div class="content">
                    <div>
                        <form action="../includes/delete.php" method="post">
                            <label for="category_name">Category Name</label>
                            <select class="select" name="category_name" id="">
                                <option value="None">None</option>
                                <?php
                                    require_once "../includes/db.php";
                                    $query = "SELECT * FROM category";
                                    $stmt = $pdo -> prepare($query);
                                    $stmt -> execute();
                                    while($row = $stmt -> fetch()){
                                        echo "<option value='" . $row['category_name'] . "'>" . $row['category_name'] . "</option>";
                                    }
                                ?>
                            </select>
                            <button class="submit-btn">Submit</button>
                        </form>
                    </div>
                </div>


                <div class="content">
                    <div>
                    <table>
                            <tr>
                                <th>Product Id</th>
                                <th>Product Name</th>
                                <th>Supplier Id</th>
                                <th>Category Id</th>
                                <th>Price</th>
                                <th>Action</th>
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